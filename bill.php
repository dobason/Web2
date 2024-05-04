<?php
session_start();
require_once 'db/dbhelper.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Nhận thông tin được gửi từ form trang payment.php
    $maKH = $_SESSION['Ma_KH']; // Lấy Ma_KH từ session
    $tenNguoiNhan = $_POST['name'];
    $soDienThoai = $_POST['phoneNumber'];
    $diaChiNhanHang = $_POST['deliveryAddress'];
    $thanhPhoId = $_POST['city']; // Lấy id của thành phố từ form
    $quanId = $_POST['district']; // Lấy id của quận/huyện từ form
    $phuongId = $_POST['ward']; // Lấy id của phường/xã từ form
    $totalAmount = $_SESSION['totalAmount']; // Lấy tổng tiền từ session

    // Thực hiện truy vấn INSERT để lưu thông tin đơn hàng vào bảng hoa_don
    $conn = openDatabaseConnection();

    // Sử dụng phương thức escape để tránh SQL Injection
    $escapedTenNguoiNhan = mysqli_real_escape_string($conn, $tenNguoiNhan);
    $escapedDiaChiNhanHang = mysqli_real_escape_string($conn, $diaChiNhanHang);

    // Lấy tên của thành phố từ id
    $thanhPho = getCityNameById($thanhPhoId);

    // Lấy tên của quận/huyện từ id
    $quan = getDistrictNameById($quanId);

    // Lấy tên của phường/xã từ id
    $phuong = getWardNameById($phuongId);

    // Xây dựng câu lệnh SQL chèn dữ liệu
    $sqlInsertHoaDon = "INSERT INTO hoa_don (Ma_KH, Ten_Nguoi_Nhan_Hang, SDT, Dia_Chi_Nhan_Hang, Thanh_Pho, Quan, Phuong, Tong_Tien, Ngay_DH) 
                        VALUES ('$maKH', '$escapedTenNguoiNhan', '$soDienThoai', '$escapedDiaChiNhanHang', '$thanhPho', '$quan', '$phuong', '$totalAmount', NOW())";

    // Thực thi câu lệnh SQL chèn dữ liệu vào bảng hoa_don
    $resultInsertHoaDon = mysqli_query($conn, $sqlInsertHoaDon);

    if ($resultInsertHoaDon) {
        // Lấy Ma_HD của đơn hàng vừa được thêm vào
        $maHD = mysqli_insert_id($conn);

        // Truy vấn INSERT để thêm chi tiết hóa đơn từ bảng gio_hang vào bảng chi_tiet_hoa_don
        $sqlInsertChiTiet = "INSERT INTO chi_tiet_hoa_don (Ma_HD, Ma_KH, Ma_GH, Ten_Sach, So_Luong, Don_Gia)
                             SELECT ?, gh.Ma_KH, gh.Ma_GH, gh.Ten_Sach, gh.So_Luong, gh.Don_Gia
                             FROM gio_hang gh
                             WHERE gh.Ma_KH = ?";

        $stmtChiTiet = mysqli_prepare($conn, $sqlInsertChiTiet);
        mysqli_stmt_bind_param($stmtChiTiet, "ii", $maHD, $maKH);
        $resultInsertChiTiet = mysqli_stmt_execute($stmtChiTiet);

        if ($resultInsertChiTiet) {
            // Xóa thông tin trong bảng gio_hang sau khi đã tạo đơn hàng thành công
            $sqlDeleteCartItems = "DELETE FROM gio_hang WHERE Ma_KH = ?";
            $stmtDeleteCartItems = mysqli_prepare($conn, $sqlDeleteCartItems);
            mysqli_stmt_bind_param($stmtDeleteCartItems, "i", $maKH);
            $resultDeleteCartItems = mysqli_stmt_execute($stmtDeleteCartItems);

            if ($resultDeleteCartItems) {
                // Xóa session liên quan sau khi đã tạo đơn hàng thành công
                unset($_SESSION['cartItems']);
                unset($_SESSION['totalAmount']);
                echo "Đơn hàng đã được tạo thành công.";
            } else {
                echo "Có lỗi xảy ra khi xóa thông tin trong bảng gio_hang.";
            }
        } else {
            echo "Có lỗi xảy ra khi thêm chi tiết đơn hàng.";
        }
    } else {
        echo "Có lỗi xảy ra trong quá trình tạo đơn hàng.";
    }

    // Đóng kết nối đến cơ sở dữ liệu
    mysqli_stmt_close($stmtChiTiet);
    mysqli_stmt_close($stmtDeleteCartItems);
    mysqli_close($conn);
} else {
    echo "Dữ liệu không hợp lệ.";
}

// Các hàm lấy tên của thành phố, quận/huyện, phường/xã từ id
function getCityNameById($cityId) {
    $data = getDataFromJson(); // Lấy dữ liệu từ JSON
    foreach ($data as $city) {
        if ($city['Id'] === $cityId) {
            return $city['Name'];
        }
    }
    return ''; // Trả về chuỗi rỗng nếu không tìm thấy
}

function getDistrictNameById($districtId) {
    $data = getDataFromJson(); // Lấy dữ liệu từ JSON
    foreach ($data as $city) {
        foreach ($city['Districts'] as $district) {
            if ($district['Id'] === $districtId) {
                return $district['Name'];
            }
        }
    }
    return ''; // Trả về chuỗi rỗng nếu không tìm thấy
}

function getWardNameById($wardId) {
    $data = getDataFromJson(); // Lấy dữ liệu từ JSON
    foreach ($data as $city) {
        foreach ($city['Districts'] as $district) {
            foreach ($district['Wards'] as $ward) {
                if ($ward['Id'] === $wardId) {
                    return $ward['Name'];
                }
            }
        }
    }
    return ''; // Trả về chuỗi rỗng nếu không tìm thấy
}

// Hàm để lấy dữ liệu từ tập dữ liệu JSON
function getDataFromJson() {
    $jsonData = file_get_contents('js/locations.json');
    return json_decode($jsonData, true);
}
?>
