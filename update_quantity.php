<?php
require_once 'db/dbhelper.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['product_id']) && isset($_POST['quantity'])) {
        $productId = $_POST['product_id'];
        $newQuantity = $_POST['quantity'];

        // Cập nhật số lượng sản phẩm trong cơ sở dữ liệu
        $sql = "UPDATE gio_hang SET So_Luong = $newQuantity WHERE Ma_Sach = '$productId'";
        $result = execute($sql);

        if ($result) {
            echo json_encode(array('success' => true));
            exit();
        }
    }
}

// Trường hợp xử lý không thành công
echo json_encode(array('success' => false));
// Lấy dữ liệu gửi từ client
$productId = $_POST['product_id'];
$newQuantity = $_POST['quantity'];

// Cập nhật số lượng sản phẩm trong giỏ hàng
$sqlUpdate = "UPDATE gio_hang SET So_Luong = $newQuantity WHERE Ma_Sach = '$productId'";
execute($sqlUpdate);

// Tính lại tổng tiền (Thành tiền)
$item = executeSingleResult("SELECT * FROM gio_hang WHERE Ma_Sach = '$productId'");
if ($item) {
    $totalPrice = $item['Don_Gia'] * $newQuantity;
    $sqlUpdateTotalPrice = "UPDATE gio_hang SET Tong_Tien = $totalPrice WHERE Ma_Sach = '$productId'";
    execute($sqlUpdateTotalPrice);
}

?>
