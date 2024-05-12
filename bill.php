<?php
session_start();
require_once 'db/dbhelper.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy mã khách hàng từ session
    $maKH = $_SESSION['Ma_KH'];

    // Kết nối đến cơ sở dữ liệu
    $conn = openDatabaseConnection();

    // Biến lưu trữ thông tin khách hàng
    $tenNguoiNhan = '';
    $soDienThoai = '';
    $diaChiNhanHang = '';
    $thanhPhoId = '';
    $quanId = '';
    $phuongId = '';

    $thanhPho = '';
    $quan = '';
    $phuong = '';

    if (empty($_POST['name']) || empty($_POST['phoneNumber']) || empty($_POST['deliveryAddress']) || empty($_POST['city']) || empty($_POST['district']) || empty($_POST['ward'])) {
        $sqlGetCustomerInfo = "SELECT Ten_KH, SDT, Dia_Chi, Thanh_Pho, Quan, Phuong FROM khach_hang WHERE Ma_KH = '$maKH'";
        $resultCustomerInfo = mysqli_query($conn, $sqlGetCustomerInfo);
    echo "Câu truy vấn SQL: " . $sqlGetCustomerInfo . "<br>";
        if ($resultCustomerInfo && mysqli_num_rows($resultCustomerInfo) > 0) {
            $row = mysqli_fetch_assoc($resultCustomerInfo);
            $tenNguoiNhan =$row['Ten_KH'];
            $soDienThoai =  $row['SDT'];
            $diaChiNhanHang =  $row['Dia_Chi'];
            $thanhPho = $row['Thanh_Pho'];
            $quan =  $row['Quan'];
            $phuong = $row['Phuong'];
        } else {
            echo "Không tìm thấy thông tin khách hàng.";
            mysqli_close($conn);
            exit(); // Dừng xử lý nếu không tìm thấy thông tin khách hàng
        }
    } else {
        // Lấy thông tin từ biểu mẫu POST
        $tenNguoiNhan = $_POST['name'];
        $soDienThoai = $_POST['phoneNumber'];
        $diaChiNhanHang = $_POST['deliveryAddress'];
        $thanhPhoId = $_POST['city'];
        $quanId = $_POST['district'];
        $phuongId = $_POST['ward'];
         $totalAmount = $_SESSION['totalAmount'];
    }
  
    // Escape các giá trị trước khi sử dụng trong câu truy vấn SQL để tránh SQL injection
    
    $escapedTenNguoiNhan = mysqli_real_escape_string($conn, $tenNguoiNhan);
    $escapedSoDienThoai = mysqli_real_escape_string($conn, $soDienThoai);
    $escapedDiaChiNhanHang = mysqli_real_escape_string($conn, $diaChiNhanHang);

  // Lấy tên thành phố, quận/huyện, phường/xã từ ID nếu được lấy từ form
if (!empty($thanhPhoId) && !empty($quanId) && !empty($phuongId)) {
    $thanhPho = getCityNameById($thanhPhoId);
    $quan = getDistrictNameById($quanId);
    $phuong = getWardNameById($phuongId);
}


    // Kiểm tra và lấy phương thức thanh toán
    $paymentMethod = isset($_POST['paymentMethod']) ? $_POST['paymentMethod'] : '';

    $thanhToan = '';
    if ($paymentMethod === 'tienmat') {
        $thanhToan = 'Tiền mặt';
    } elseif ($paymentMethod === 'online') {
        $thanhToan = 'Trực tuyến';
    }
    $totalAmount = $_SESSION['totalAmount'];

    // Thực hiện câu truy vấn để chèn hóa đơn vào cơ sở dữ liệu
    $sqlInsertHoaDon = "INSERT INTO hoa_don (Ma_KH, Ten_Nguoi_Nhan_Hang, SDT, Dia_Chi_Nhan_Hang, Thanh_Pho, Quan, Phuong, Thanh_Toan, Tong_Tien, Ngay_DH, Ngay_GH, Tinh_Trang) 
                        VALUES ('$maKH', '$escapedTenNguoiNhan', '$escapedSoDienThoai', '$escapedDiaChiNhanHang', '$thanhPho', '$quan', '$phuong', '$thanhToan', '$totalAmount', CURDATE(), '0', 'Chưa xác nhận')";

    $resultInsertHoaDon = mysqli_query($conn, $sqlInsertHoaDon);

    if ($resultInsertHoaDon) {
        // Lấy Ma_HD của đơn hàng vừa được thêm vào
        $maHD = mysqli_insert_id($conn);

        // Thực hiện câu truy vấn để chèn chi tiết hóa đơn từ giỏ hàng vào bảng chi_tiet_hoa_don
        $sqlInsertChiTiet = "INSERT INTO chi_tiet_hoa_don (Ma_HD, Ma_KH, Ma_GH, Ten_Sach, So_Luong, Don_Gia, Ma_Sach)
                             SELECT ?, gh.Ma_KH, gh.Ma_GH, gh.Ten_Sach, gh.So_Luong, gh.Don_Gia, gh.Ma_Sach
                             FROM gio_hang gh
                             WHERE gh.Ma_KH = ?";

        $stmtChiTiet = mysqli_prepare($conn, $sqlInsertChiTiet);
        if ($stmtChiTiet) {
            mysqli_stmt_bind_param($stmtChiTiet, "ii", $maHD, $maKH);
            $resultInsertChiTiet = mysqli_stmt_execute($stmtChiTiet);

            if ($resultInsertChiTiet) {
                // Xóa thông tin trong bảng gio_hang sau khi đã tạo đơn hàng thành công
                $sqlDeleteCartItems = "DELETE FROM gio_hang WHERE Ma_KH = ?";
                $stmtDeleteCartItems = mysqli_prepare($conn, $sqlDeleteCartItems);
                if ($stmtDeleteCartItems) {
                    mysqli_stmt_bind_param($stmtDeleteCartItems, "i", $maKH);
                    $resultDeleteCartItems = mysqli_stmt_execute($stmtDeleteCartItems);

                    if ($resultDeleteCartItems) {
                        // Cập nhật tổng hóa đơn và số lượng hóa đơn của khách hàng
                        $sqlUpdateKhachHang = "UPDATE khach_hang 
                                               SET Tong_HD = (SELECT SUM(Tong_Tien) FROM hoa_don WHERE Ma_KH = '$maKH'),
                                                   Tong_SoLuong = (SELECT COUNT(Ma_HD) FROM hoa_don WHERE Ma_KH = '$maKH')
                                               WHERE Ma_KH = '$maKH'";

                        $resultUpdateKhachHang = mysqli_query($conn, $sqlUpdateKhachHang);

                        if ($resultUpdateKhachHang) {
                            // Xóa các session liên quan sau khi đã tạo đơn hàng thành công
                            unset($_SESSION['cartItems']);
                            unset($_SESSION['totalAmount']);
                            mysqli_stmt_close($stmtDeleteCartItems);
                            mysqli_stmt_close($stmtChiTiet);
                            mysqli_close($conn);
                            header('Location: print-bill.php');
                            exit();
                        } else {
                            echo "Có lỗi xảy ra khi cập nhật thông tin khách hàng: " . mysqli_error($conn);
                        }
                    } else {
                        echo "Có lỗi xảy ra khi xóa thông tin trong bảng gio_hang: " . mysqli_error($conn);
                    }
                    mysqli_stmt_close($stmtDeleteCartItems);
                } else {
                    echo "Lỗi khi chuẩn bị truy vấn xóa thông tin trong bảng gio_hang: " . mysqli_error($conn);
                }
            } else {
                echo "Có lỗi xảy ra khi thực hiện truy vấn thêm chi tiết đơn hàng: " . mysqli_error($conn);
            }
            mysqli_stmt_close($stmtChiTiet);
        } else {
            echo "Lỗi khi chuẩn bị truy vấn thêm chi tiết đơn hàng: " . mysqli_error($conn);
        }
    } else {
        echo "Có lỗi xảy ra trong quá trình tạo đơn hàng: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    echo "Dữ liệu không hợp lệ.";
}

function getCityNameById($cityId) {
    $data = getDataFromJson();
    foreach ($data as $city) {
        if ($city['Id'] === $cityId) {
            return $city['Name'];
        }
    }
    return '';
}

function getDistrictNameById($districtId) {
    $data = getDataFromJson();
    foreach ($data as $city) {
        foreach ($city['Districts'] as $district) {
            if ($district['Id'] === $districtId) {
                return $district['Name'];
            }
        }
    }
    return '';
}

function getWardNameById($wardId) {
    $data = getDataFromJson();
    foreach ($data as $city) {
        foreach ($city['Districts'] as $district) {
            foreach ($district['Wards'] as $ward) {
                if ($ward['Id'] === $wardId) {
                    return $ward['Name'];
                }
            }
        }
    }
    return '';
}

function getDataFromJson() {
    $jsonData = file_get_contents('js/locations.json');
    return json_decode($jsonData, true);
}
?>
