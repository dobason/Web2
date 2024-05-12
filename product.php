<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=" stylesheet" href="css/product.css">
    <link rel=" stylesheet" href="css/stylesheet.css">
    <script src="js/product.j"></script>
    <script src="vendor/fontawesome/js/all.min.js"></script>
    <script src="js/main.js"></script>
    <title>Document</title>
    <link rel="stylesheet" href="./css/Style2.css">
    <link rel="stylesheet" type="text/css" href="css/stylesheet.css">

</head>

<body>

<header class="header">

<div class="header-1">
    <a href="index.php" class="logo"> <i class="fas fa-book"></i> GoodReads </a>

    <!-- Tìm Kiếm -->
    <form class="search-form" method="GET">
        <input class="form-control me-2" type="search" placeholder="Tìm kiếm sản phẩm" aria-label="Search" name="Ten_Sach">
        <button class="btn btn-outline-success" type="submit">Search</button>
        <div id="bookListContainer"></div>
    </form>

    <!-- Chỗ giỏ hàng và chỗ đăng nhập -->
    <div class="icons" style="display:flex;align-items:center">
        <a href="cart.php" class="fas fa-shopping-cart"></a>
        <?php require_once 'header.php'; ?>
    </div>
</div>

<div class="header-2">
    <nav class="navbar">
        <a href="#home">Trang chủ</a>
        <a href="#featured">Danh mục</a>
        <a href="#arrivals">Sách mới</a>
        <a href="#reviews">Khách hàng</a>
        <a href="#blogs">Bài viết</a>
    </nav>
</div>

<!---Kết nối database-->
<?php require('./php/classes/database.php'); ?>

</header>

<main>

        <div id=wrapper>
          <div id="backtop">
            <i class="fa-solid fa-arrow-up"></i>

        </div>                      

      
<?php
require_once 'db/dbhelper.php';

if (isset($_GET['id'])) {
    $productID = $_GET['id'];

    // Truy vấn cơ sở dữ liệu để lấy thông tin chi tiết của sản phẩm với ID là $productID
    $sql = "SELECT * FROM sach WHERE Ma_Sach = '$productID'";
    $product = executeSingleResult($sql);

    // Hiển thị thông tin chi tiết của sản phẩm
    if ($product) {
        displayProductDetail($product);
    } else {
        echo '<p>Sản phẩm không tồn tại.</p>';
    }
}

function displayProductDetail($product) {
    echo '<div class="product">';
    echo '<div class="product-left">';
    echo '<div class="product-top">';
    echo '<img src="' . htmlentities($product['Hinh_Anh']) . '" id="main-img">';
    echo '</div>';
    echo '</div>';
    echo '<div class="product-right">';
    echo '<div class="product-right-top">';
    echo '<h2>' . htmlentities($product['Ten_Sach']) . '</h2>'; 
    echo '<p><span style="color:red;">Tác giả: </span>'. htmlentities($product['Ten_Tac_Gia']).'</p>';
    echo '<p><span style="color:red;">Đơn giá:</span>' . number_format($product['Don_Gia'], 0, ',', '.') . 'đ</p>';
    echo '<div class="product-shopping">';
    echo '<form action="add_to_cart.php" method="post">';
    echo '<input type="hidden" name="product_id" value="' . $product['Ma_Sach'] . '">';
    echo '<input type="hidden" name="product_name" value="' . htmlentities($product['Ten_Sach']) . '">';
    echo '<input type="hidden" name="product_image" value="' . htmlentities($product['Hinh_Anh']) . '">';
    echo '<input type="hidden" name="product_price" value="' . $product['Don_Gia'] . '">';

    // Kiểm tra Ma_KH trong session và hiển thị nút "Mua ngay" chỉ khi Ma_KH tồn tại
    if (isset($_SESSION['Ma_KH'])) {
        echo '<button type="submit" class="buyNowButton">Mua ngay</button>';
    } else {
        // Nếu Ma_KH không tồn tại trong session, hiển thị thông báo JavaScript
        echo '<button type="button" class="buyNowButton" onclick="showLoginAlert()">Mua ngay</button>';
        echo '<script>';
        echo 'function showLoginAlert() {';
        echo 'alert("Vui lòng đăng nhập trước khi mua hàng.");';
        echo '}';
        echo '</script>';
    }

    echo '</form>';
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
    echo '<p>' . htmlentities($product['Mo_Ta']) . '</p>';
    echo '</div>';
}

?>
    <section class="featured" id="featured">
</main>
<footer>
        <div class="footer" style="background:var(--green);">
            <div class="in-footer-body" >

                <div class="in-footer-body-mid">
                    <p>Tài khoản của bạn</p>
                    <li><a href="">Cập nhật tài khoản</a></li>
                    <li><a href="">Giỏ hàng</a></li>
                    <li><a href="">Lịch sử giao dịch</a></li>
                    <li><a href="">Sản phẩm yêu thích</a></li>
                    <li><a href="">Kiểm tra đơn hàng</a></li>
                </div>

                <div class="in-footer-body-mid">
                    <p>GOODREADS</a>
                        <li><a href="gioi_thieu.html">Giới thiệu GOODREADS</a></li>
                        <li><a href="">GOODREADS trên Facebook</a></li>
                        <li><a href="">Liên hệ GOODREADS</a></li>
                        <li><a href="">Đặt hàng theo yêu cầu</a< /li>
                </div>
                <div class="in-footer-body-right">
                    <p>Kết nối với chúng tôi</p>
                    <li><a href="#">Liên hệ hợp tác kinh doanh</a></li>
                    <li><a href="#">Tuyển dụng</a></li><br>
                    <li><a href="#">Chính sách đổi - trả</a></li>
                    <li><a href="#">Chính sách bồi hoàn</a></li>
                    <li><a href="#">Câu hỏi thường gặp (FAQs)</a></li>
                </div>
            </div>
        </div>
        <div class="footer-bottom" style="background:var(--dark-color);">
            <p>&copy; 2023 sachtore</p>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
     
    <script>
        $(() => {
            $('p img').click(function () {
                let imgPath = $(this).attr('src');
                $('#main-img').attr('src', imgPath);
            })
        })
    </script>

    <script>
        $(document).ready(function () {
            $(window).scroll(function () {
                if ($(this).scrollTop()) {
                    $('#backtop').fadeIn();
                }
                else {
                    $('#backtop').fadeOut();
                }
            });
            $("#backtop").click(function () {
                $('html,body').animate({ scrollTop: 0 }, 1000);
            });
        });



    </script>
    <script src="js/p.js"></script>
    
</body>

</html>
