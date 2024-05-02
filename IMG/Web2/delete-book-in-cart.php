<?php
session_start();
require_once 'db/dbhelper.php';

// Kiểm tra xem người dùng đã đăng nhập hay chưa
if (isset($_SESSION['Ma_KH'])) {
    // Lấy mã khách hàng từ session
    $maKH = $_SESSION['Ma_KH'];

    // Kiểm tra sự tồn tại của 'product_id' trong POST
    if (isset($_POST['product_id'])) {
        $productId = $_POST['product_id'];

        // Xây dựng câu truy vấn DELETE từ bảng gio_hang
        $sql = "DELETE FROM gio_hang WHERE Ma_Sach = ? AND Ma_KH = ?";
        $params = ['ii', $productId, $maKH]; // ii là kiểu integer

        // Thực thi truy vấn DELETE
        $result = execute($sql, $params);

        if ($result) {
            http_response_code(200); // Xóa thành công
        } else {
            http_response_code(500); // Lỗi khi xóa
        }
    }
} 
?>
