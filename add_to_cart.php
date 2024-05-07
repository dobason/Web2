<?php
session_start();
require_once 'db/dbhelper.php';

// Kiểm tra nếu là phương thức POST và có đủ dữ liệu sản phẩm từ form
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['product_id'], $_POST['product_name'], $_POST['product_image'], $_POST['product_price'])) {
    // Lấy thông tin sản phẩm từ form
    $productId = $_POST['product_id'];
    $productName = $_POST['product_name'];
    $productImage = $_POST['product_image'];
    $productPrice = $_POST['product_price'];

    // Kiểm tra xem người dùng đã đăng nhập chưa
    if (isset($_SESSION['Ma_KH'])) {
        $maKH = $_SESSION['Ma_KH'];

        // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng của người dùng chưa
        $existingCartItem = executeSingleResult("SELECT * FROM gio_hang WHERE Ma_KH = $maKH AND Ma_Sach = $productId");

        if ($existingCartItem) {
            // Nếu sản phẩm đã tồn tại trong giỏ hàng, tăng số lượng lên 1
            $updateQuantitySql = "UPDATE gio_hang SET So_Luong = So_Luong + 1 WHERE Ma_KH = $maKH AND Ma_Sach = $productId";
            $result = execute($updateQuantitySql);

            header('Location: cart.php');
        } else {
            // Nếu sản phẩm chưa tồn tại trong giỏ hàng, thêm mới vào giỏ hàng
            $insertCartItemSql = "INSERT INTO gio_hang (Ma_KH, Ma_Sach, Ten_Sach, Hinh_Anh, Don_Gia, So_Luong) 
                                  VALUES ($maKH, $productId, '$productName', '$productImage', $productPrice, 1)";
            $result = execute($insertCartItemSql);

            if ($result) {
                // Nếu thêm mới thành công, chuyển hướng người dùng đến trang giỏ hàng
                header('Location: cart.php');
                exit();
            } else {
                // Nếu có lỗi khi thêm mới vào giỏ hàng
                echo "Lỗi khi thêm sản phẩm vào giỏ hàng.";
                exit();
            }
        }
    } else {
        // Nếu người dùng chưa đăng nhập, chuyển hướng đến trang đăng nhập
        header('Location: dangnhap.php');
        exit();
    }
} else {
    // Nếu không phải phương thức POST hoặc thiếu dữ liệu sản phẩm từ form, chuyển hướng về trang chủ
    header('Location: index.php');
    exit();
}
?>