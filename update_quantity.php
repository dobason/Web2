<?php
require_once 'db/dbhelper.php';

// Kiểm tra nếu là yêu cầu POST và tồn tại dữ liệu gửi từ client
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'], $_POST['quantity'])) {
    $productId = $_POST['product_id'];
    $newQuantity = $_POST['quantity'];

    // Cập nhật số lượng sản phẩm trong bảng 'gio_hang' với 'Ma_Sach' tương ứng
    $sqlUpdate = "UPDATE gio_hang SET So_Luong = $newQuantity WHERE Ma_Sach = '$productId'";
    $result = execute($sqlUpdate);

    if ($result) {
        // Tính lại tổng tiền (Thành tiền) của sản phẩm sau khi cập nhật số lượng
        $item = executeSingleResult("SELECT * FROM gio_hang WHERE Ma_Sach = '$productId'");
        if ($item) {
            $totalPrice = $item['Don_Gia'] * $newQuantity;

            // Cập nhật tổng tiền (Thành tiền) cho sản phẩm trong bảng 'gio_hang'
            $sqlUpdateTotalPrice = "UPDATE gio_hang SET Tong_Tien = $totalPrice WHERE Ma_Sach = '$productId'";
            execute($sqlUpdateTotalPrice);

            // Trả về dữ liệu JSON cho client để xác nhận cập nhật thành công
            echo json_encode(array('success' => true));
            exit();
        } else {
            echo json_encode(array('success' => false, 'message' => 'Không tìm thấy sản phẩm.'));
            exit();
        }
    } else {
        echo json_encode(array('success' => false, 'message' => 'Không thể cập nhật số lượng sản phẩm.'));
        exit();
    }
} else {
    echo json_encode(array('success' => false, 'message' => 'Yêu cầu không hợp lệ.'));
    exit();
}
?>
