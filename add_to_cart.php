<?php
require_once 'db/dbhelper.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Kiểm tra xem các thông tin sản phẩm cần thiết đã được gửi từ form hay chưa
    if (isset($_POST['product_id'], $_POST['product_name'], $_POST['product_image'], $_POST['product_price'])) {
        $productId = $_POST['product_id'];
        $productName = $_POST['product_name'];
        $productImage = $_POST['product_image'];
        $productPrice = $_POST['product_price'];

        // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
        $existingItem = executeSingleResult("SELECT * FROM gio_hang WHERE Ma_Sach = '$productId'");

        if ($existingItem) {
            // Nếu sản phẩm đã tồn tại trong giỏ hàng, tăng số lượng lên 1 đơn vị
            $currentQuantity = $existingItem['So_Luong'];
            $newQuantity = $currentQuantity + 1;

            // Cập nhật số lượng sản phẩm trong giỏ hàng
            $sqlUpdateQuantity = "UPDATE gio_hang SET So_Luong = $newQuantity WHERE Ma_Sach = '$productId'";
            $result = execute($sqlUpdateQuantity);

            if ($result) {
                // Chuyển hướng người dùng đến trang giỏ hàng sau khi cập nhật số lượng thành công
                header('Location: cart.php');
                exit();
            } else {
                echo "Lỗi khi cập nhật số lượng sản phẩm trong giỏ hàng.";
            }
        } else {
            // Nếu sản phẩm chưa tồn tại trong giỏ hàng, thực hiện thêm mới
            $sqlInsert = "INSERT INTO gio_hang (Ma_Sach, Ten_Sach, Hinh_Anh, So_Luong, Don_Gia) 
                          VALUES ('$productId', '$productName', '$productImage', 1, '$productPrice')";

            $result = execute($sqlInsert);

            if ($result) {
                // Chuyển hướng người dùng đến trang giỏ hàng sau khi thêm sản phẩm thành công
                header('Location: cart.php');
                exit();
            } else {
                echo "Lỗi khi thêm sản phẩm vào giỏ hàng.";
            }
        }
    } else {
        echo "Thiếu thông tin sản phẩm.";
    }
} else {
    echo "Yêu cầu không hợp lệ.";
}
?>
