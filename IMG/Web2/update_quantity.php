<?php
require_once 'db/dbhelper.php';

// Kiểm tra nếu là phương thức POST và có tồn tại các dữ liệu cần thiết
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'], $_POST['quantity'])) {
    $productId = $_POST['product_id'];
    $newQuantity = $_POST['quantity'];

    // Cập nhật số lượng sản phẩm trong bảng 'gio_hang'
    $sqlUpdateQuantity = "UPDATE gio_hang SET So_Luong = $newQuantity WHERE Ma_Sach = '$productId'";
    execute($sqlUpdateQuantity);

    // Lấy thông tin sản phẩm sau khi cập nhật số lượng
    $item = executeSingleResult("SELECT * FROM gio_hang WHERE Ma_Sach = '$productId'");

    if ($item) {
        $price = $item['Don_Gia'];
        $newTotal = $price * $newQuantity;

        // Cập nhật tổng giá trị của sản phẩm trong bảng 'gio_hang'
        $sqlUpdateTotal = "UPDATE gio_hang SET Tong_Tien = $newTotal WHERE Ma_Sach = '$productId'";
        execute($sqlUpdateTotal);

        // Tính lại tổng giá trị (Tong_HD) của toàn bộ bảng 'gio_hang'
        $sqlUpdateTotalAmount = "UPDATE gio_hang SET Tong_HD = (SELECT SUM(Tong_Tien) FROM gio_hang)";
        execute($sqlUpdateTotalAmount);

        // Trả về kết quả JSON chứa thông tin sản phẩm sau khi cập nhật
        echo json_encode(array('success' => true, 'total' => $newTotal));
        exit();
    }
}

// Trả về kết quả JSON nếu có lỗi xảy ra
echo json_encode(array('success' => false));
?>
