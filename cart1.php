<?php
require_once 'db/dbhelper.php';

if (isset($_GET['id'])) {
    $productID = $_GET['id'];

    // Truy vấn cơ sở dữ liệu để lấy thông tin chi tiết của sản phẩm với ID là $productID
    $sql = "SELECT * FROM sach WHERE Ma_Sach = '$productID'";
    $product = executeSingleResult($sql);

    // Kiểm tra nếu sản phẩm tồn tại và hiển thị thông tin sản phẩm
    if ($product) {
        $productName = $product['Ten_Sach'];
        $imagePath =  $product['Hinh_Anh'];
        $price = number_format($product['Don_Gia'], 0, ',', '.');
        $description = $product['Mo_Ta'];

        // Hiển thị thông tin chi tiết của sản phẩm
        echo '<div class="product">';
        echo '<div class="product-left">';
        echo '<div class="product-top">';
        echo '<img src="' . $imagePath . '" id="main-img">';
        echo '</div>';
        echo '</div>';
        echo '<div class="product-right">';
        echo '<div class="product-right-top">';
        echo '<h2>' . $productName . '</h2>';
        echo '<p>' . $price . 'đ</p>';
        echo '<div class="product-shopping">';
        echo '<input type="number" style="height:38px; width: 100px; margin:14px; border-radius: 10px;">';
        echo '<a href="cart.php?action=add&id=' . $product['Ma_Sach'] . '" class="buyNowButton" data-image="' . $imagePath . '" data-title="' . $productName . '" data-quantity="1">Mua ngay</a>';

        echo '</div>';
        echo '</div>';
        echo '<h3>Thông tin & Khuyến mãi:</h3>';
        echo '<ul>';
        echo '<li>Đổi trả hàng trong vòng 7 ngày</li>';
        echo '<li>Freeship nội thành Sài Gòn từ 150.000đ</li>';
        echo '<li>Freeship toàn quốc từ 250.000đ</li>';
        echo '</ul>';
        echo '</div>';
        echo '</div>';
        echo '<div class="middle2">';
        echo '<h3>Mô tả sản phẩm: </h3>';
        echo '<p>' . $description . '</p>';
        echo '</div>';
    } else {
        echo '<p>Sản phẩm không tồn tại.</p>';
    }
}
?>