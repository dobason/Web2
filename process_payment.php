<?php
session_start(); // Bắt đầu session

require_once 'db/dbhelper.php'; // Import file chứa các hàm kết nối và thực thi truy vấn

if (isset($_SESSION['Ma_KH'])) {
    $maKH = $_SESSION['Ma_KH']; // Lấy mã khách hàng từ session

    // Truy vấn cơ sở dữ liệu để lấy thông tin đơn hàng của khách hàng hiện tại
    $sql = "SELECT * FROM hoa_don WHERE Ma_KH = ?"; // Điều kiện là Ma_KH của khách hàng

    $conn = openDatabaseConnection(); // Mở kết nối đến cơ sở dữ liệu

    // Sử dụng tham số trong truy vấn SQL
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 's', $maKH);

    // Thực thi truy vấn
    mysqli_stmt_execute($stmt);

    // Lấy kết quả
    $result = mysqli_stmt_get_result($stmt);

    // Xử lý kết quả
  
        // Lấy thông tin đơn hàng
        $orderInfo = mysqli_fetch_assoc($result);

        // Lấy thông tin đơn hàng và chuyển hướng đến trang bill.php để hiển thị
        $_SESSION['MaHD'] = $orderInfo['MaHD']; // Lưu MaHD vào session
        header('Location: bill.php');
        exit(); // Dừng luồng thực thi để chuyển hướng
   

    // Đóng câu lệnh và kết nối đến cơ sở dữ liệu
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    // Xử lý khi không tìm thấy mã khách hàng trong session
    echo "Vui lòng đăng nhập để xem đơn hàng.";
    // Chuyển hướng đến trang đăng nhập
    header('Location: dangnhap.php');
    exit(); // Dừng luồng thực thi để chuyển hướng
}

?>
