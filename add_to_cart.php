<?php
require_once 'db/dbhelper.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Lấy Ma_Sach từ yêu cầu POST
    $productID = $_POST['product_id'];

    // Truy vấn để kiểm tra xem sản phẩm có trong giỏ hàng không
    $sqlCheck = "SELECT * FROM gio_hang WHERE Ma_Sach = '$productID'";
    $existingCartItem = executeSingleResult($sqlCheck);

    if ($existingCartItem) {
        // Nếu sản phẩm đã có trong giỏ hàng, tăng số lượng lên 1
        $newQuantity = $existingCartItem['So_Luong'] + 1;

        // Cập nhật số lượng sản phẩm trong giỏ hàng trên CSDL
        $sqlUpdate = "UPDATE gio_hang SET So_Luong = $newQuantity WHERE Ma_Sach = '$productID'";
        execute($sqlUpdate);
    } else {
        // Nếu sản phẩm chưa có trong giỏ hàng, thêm mới vào giỏ hàng với số lượng là 1
        $productName = ''; // Thay bằng tên sản phẩm từ CSDL
        $imagePath = ''; // Thay bằng đường dẫn hình ảnh từ CSDL
        $price = 0; // Thay bằng giá sản phẩm từ CSDL

        // Thêm mới sản phẩm vào giỏ hàng
        $sqlInsert = "INSERT INTO gio_hang (Ma_Sach, Ten_Sach, Hinh_Anh, So_Luong, Don_Gia) 
                      VALUES ('$productID', '$productName', '$imagePath', 1, $price)";
        execute($sqlInsert);
    }

    // Chuyển hướng người dùng đến trang giỏ hàng sau khi thao tác thành công
    header('Location: cart.php');
    exit();
}
?>
