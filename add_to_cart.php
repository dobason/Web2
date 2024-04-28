<?php
require_once 'db/dbhelper.php';

// Kiểm tra nếu là phương thức POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Kiểm tra các thông tin sản phẩm được gửi từ form
    if (isset($_POST['product_id'], $_POST['product_name'], $_POST['product_image'], $_POST['product_price'])) {
        // Lấy thông tin sản phẩm từ form
        $productId = $_POST['product_id'];
        $productName = $_POST['product_name'];
        $productImage = $_POST['product_image'];
        $productPrice = $_POST['product_price'];

        // Tránh SQL Injection bằng cách sử dụng Prepared Statements
        $productId = intval($productId);
        $productName = htmlspecialchars($productName);
        $productImage = htmlspecialchars($productImage);
        $productPrice = intval($productPrice);

        session_start();
        // Kiểm tra nếu khách hàng đã đăng nhập
        if (isset($_SESSION['Ma_KH'])) {
            $maKH = $_SESSION['Ma_KH'];

            // Kiểm tra sự tồn tại của giỏ hàng của khách hàng
            $existingCart = executeSingleResult("SELECT * FROM gio_hang WHERE Ma_KH = $maKH");

            if (!$existingCart) {
                // Nếu chưa có giỏ hàng cho khách hàng này, thêm mới
                $insertCartSql = "INSERT INTO gio_hang (Ma_KH) VALUES ($maKH)";
                $result = execute($insertCartSql);

                if (!$result) {
                    echo "Lỗi khi tạo giỏ hàng mới.";
                    exit(); // Dừng thực thi nếu có lỗi
                }
                
                // Lấy Ma_GH của giỏ hàng mới được tạo
                $newMaGH = mysqli_insert_id(openDatabaseConnection());
            } else {
                // Giỏ hàng của khách hàng đã tồn tại
                $newMaGH = $existingCart['Ma_GH'];
            }

            // Thêm sản phẩm vào giỏ hàng
            $sqlInsert = "INSERT INTO gio_hang (Ma_KH, Ma_Sach, Ten_Sach, Hinh_Anh, Don_Gia, So_Luong) 
                          VALUES ($maKH, $productId, '$productName', '$productImage', $productPrice, 1)";

            $result = execute($sqlInsert);

            if ($result) {
                // Chuyển hướng người dùng đến trang giỏ hàng sau khi thêm sản phẩm thành công
                header('Location: cart.php');
                exit();
            } else {
                echo "Lỗi khi thêm sản phẩm vào giỏ hàng.";
            }
        } else {
            echo "Vui lòng đăng nhập để mua hàng.";
        }
    } else {
        echo "Thiếu thông tin sản phẩm.";
    }
} else {
    echo "Yêu cầu không hợp lệ.";
}
?>
