<?php
require_once 'db/dbhelper.php';

// Kiểm tra nếu là yêu cầu POST từ AJAX
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy thông tin từ yêu cầu AJAX
    $maHD = $_POST['maHD'];
    $tinhTrang = $_POST['tinhTrang'];

    // Chuẩn bị truy vấn SQL để cập nhật trạng thái
    $sql = "UPDATE hoa_don SET Tinh_Trang = ? WHERE Ma_HD = ?";
    $params = ['si', $tinhTrang, $maHD]; // s là kiểu string, i là kiểu integer (Ma_HD)

    // Thực thi truy vấn và kiểm tra kết quả
    $result = execute($sql, $params);
    header('Location: admin-bill.php ' );
    exit; // Đảm bảo dừng luồng xử lý sau khi chuyển hướng
    if ($result !== false) {
        // Trả về kết quả thành công cho AJAX
        echo json_encode(['status' => 'success', 'message' => 'Cập nhật trạng thái thành công']);
    } else {
        // Trả về thông báo lỗi cho AJAX nếu thất bại
        echo json_encode(['status' => 'error', 'message' => 'Cập nhật trạng thái thất bại']);
    }
} else {
    // Trả về thông báo lỗi nếu không phải là yêu cầu POST
    echo json_encode(['status' => 'error', 'message' => 'Yêu cầu không hợp lệ']);
}
?>
