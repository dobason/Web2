<?php
session_start();
require_once 'db/dbhelper.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $maKH = $_SESSION['Ma_KH'];
    $tenNguoiNhan = $_POST['name'];
    $soDienThoai = $_POST['phoneNumber'];
    $diaChiNhanHang = $_POST['deliveryAddress'];
    $thanhPhoId = $_POST['city'];
    $quanId = $_POST['district'];
    $phuongId = $_POST['ward'];
    $totalAmount = $_SESSION['totalAmount'];
    $paymentMethod = $_POST['paymentMethod'];

    $conn = openDatabaseConnection();

    $escapedTenNguoiNhan = mysqli_real_escape_string($conn, $tenNguoiNhan);
    $escapedDiaChiNhanHang = mysqli_real_escape_string($conn, $diaChiNhanHang);

    $thanhPho = getCityNameById($thanhPhoId);
    $quan = getDistrictNameById($quanId);
    $phuong = getWardNameById($phuongId);

    $thanhToan = '';
    if ($paymentMethod === 'tienmat') {
        $thanhToan = 'Tiền mặt';
    } elseif ($paymentMethod === 'online') {
        $thanhToan = 'Trực tuyến';
    }

    $ngayDH = date('d-m-Y'); // Lấy ngày hiện tại theo định dạng 'DD-MM-YYYY'
    $ngayGH = date('d-m-Y', strtotime('+2 days')); // Lấy ngày hiện tại +2 ngày theo định dạng 'DD-MM-YYYY'
    
    $sqlInsertHoaDon = "INSERT INTO hoa_don (Ma_KH, Ten_Nguoi_Nhan_Hang, SDT, Dia_Chi_Nhan_Hang, Thanh_Pho, Quan, Phuong, Thanh_Toan, Tong_Tien, Ngay_DH, Ngay_GH, Tinh_Trang) 
                        VALUES ('$maKH', '$escapedTenNguoiNhan', '$soDienThoai', '$escapedDiaChiNhanHang', '$thanhPho', '$quan', '$phuong', '$thanhToan', '$totalAmount', 
                        '$ngayDH', '$ngayGH', 'Chưa xác nhận')";
    $sqlupdate ="UPDATE khach_hang(Ngay_Hoat_Dong) VaLUES('$ngayDH')";
    

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
                        // Truy vấn UPDATE để cập nhật bảng khach_hang
                        $sqlUpdateKhachHang = "UPDATE khach_hang 
                        SET Tong_Tien = (
                            SELECT SUM(Tong_Tien) 
                            FROM hoa_don 
                            WHERE Ma_KH = '$maKH'
                        ),
                        So_Luong = (
                            SELECT COUNT(Ma_HD) 
                            FROM hoa_don 
                            WHERE Ma_KH = '$maKH'
                        ),
                        Ngay_Hoat_Dong = '$ngayDH'
                        WHERE Ma_KH = '$maKH'";
 
 
    
                        $resultUpdateKhachHang = mysqli_query($conn, $sqlUpdateKhachHang);
    
                        if ($resultUpdateKhachHang) {
                            // Xóa session liên quan sau khi đã tạo đơn hàng thành công
                            unset($_SESSION['cartItems']);
                            unset($_SESSION['totalAmount']);
                            header('Location: print-bill.php');
                            exit();
                        } else {
                            echo "Có lỗi xảy ra khi cập nhật thông tin khách hàng: " . mysqli_error($conn);
                        }
    
                        mysqli_stmt_close($stmtDeleteCartItems); // Đóng statement
                    } else {
                        echo "Có lỗi xảy ra khi xóa thông tin trong bảng gio_hang: " . mysqli_error($conn);
                    }
                    mysqli_stmt_close($stmtDeleteCartItems); // Đóng statement
                } else {
                    echo "Lỗi khi chuẩn bị truy vấn xóa thông tin trong bảng gio_hang: " . mysqli_error($conn);
                }
    
                mysqli_stmt_close($stmtChiTiet); // Đóng statement
            } else {
                echo "Có lỗi xảy ra khi thực hiện truy vấn thêm chi tiết đơn hàng: " . mysqli_error($conn);
            }
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
