<?php
require_once 'db/dbhelper.php';

// Kiểm tra nếu là yêu cầu POST từ AJAX
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy thông tin từ yêu cầu AJAX
    $maHD = $_POST['maHD'];
    $tinhTrang = $_POST['tinhTrang'];

    // Tính ngày giao hàng là ngày hiện tại + 2 ngày
    $ngayGiaoHang = date('Y-m-d', strtotime('+2 days'));

    // Lấy ngày hiện tại để cập nhật trường Ngay_XN
    $ngayXacNhan = date('Y-m-d'); // Ngày hiện tại

    // Chuẩn bị truy vấn SQL để cập nhật trạng thái, ngày giao hàng và ngày xác nhận
    $sql = "UPDATE hoa_don 
            SET Tinh_Trang = ?, Ngay_GH = ?, Ngay_XN = ?
            WHERE Ma_HD = ?";
    $params = ['sssi', $tinhTrang, $ngayGiaoHang, $ngayXacNhan, $maHD]; // s là kiểu string, i là kiểu integer (Ma_HD)

    // Thực thi truy vấn và kiểm tra kết quả
    $result = execute($sql, $params);

    if ($result !== false) {
        // Trả về kết quả thành công cho AJAX
        echo json_encode(['status' => 'success', 'message' => 'Cập nhật trạng thái, ngày giao hàng và ngày xác nhận thành công']);
    } else {
        // Trả về thông báo lỗi cho AJAX nếu thất bại
        echo json_encode(['status' => 'error', 'message' => 'Cập nhật trạng thái, ngày giao hàng và ngày xác nhận thất bại']);
    }
} else {
    // Trả về thông báo lỗi nếu không phải là yêu cầu POST
    echo json_encode(['status' => 'error', 'message' => 'Yêu cầu không hợp lệ']);
}
?>
