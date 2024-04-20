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
</head>

<body>

    <header>


        <div class="big-menu">


            <div class="in-big-menu">
                <div class="logo">
                    <a href="index.html" onclick="momodal()"><img src="IMG/logo.jpg"></a>
                </div>




                <div class="box">
                    <div class="container-1">
                        <span class="icon"><i class="fa fa-search"></i></span>
                        <input type="search" id="search" placeholder="Search..." />
                        <ul id="searchSuggestions" class="search-suggestions"></ul>
                    </div>
                </div>



                <div class="top-right-item">

                    <i class="fa fa-user"></i>
                    <span class="text-tk">
                        <p id="namelogin">Tài khoản<i class="fa fa-caret-down"></i></p>
                        <div class="dropdown-content">
                            <a href="dangnhap.html" class="dropdown-item"><i class="np fa fa-arrow-right"></i>Đăng
                                nhập</a>
                            <a href="dangki.html" class="dropdown-item"><i class="np fa fa-user-plus"></i>Đăng ký</a>
                        </div>
                    </span>

                </div>

                <div class="top-right-item">
                    <a href="cart.html"  id="gioHangLink"><i class="fa fa-shopping-basket" aria-hidden="true"></i></a>
                    <p id="cartItemCount">0</p>
                </div>

            </div>
        </div>
        <div class="menu-bar">
            <div class="menu-bar-content">
                <ul>
                    <li><a href="web1.html"><i class="fa-solid fa-book"></i> Văn học trong nước <span
                                class="menu-bar-content-icon"> <i class="fa-solid fa-caret-down"></i></span></a>
                        <div class="sub-menu">
                            <ul>
                                <div class="in-sub-menu">
                                    <div class="sub-menu1">
                                        <li> <a href="web1.html">Tiểu thuyết</a></li>
                                        <li> <a href="web1.html">Truyện ngắn</a></li>
                                        <li> <a href="web1.html">Light Novel</a></li>
                                        <li> <a href="web1.html">Trinh thám</a></li>
                                      

                                    </div>
                                    <div class="sub-menu3">
                                        <li> <a href="web1.html">Ngôn Tình
                                            </a></li>
                                        <li> <a href="web1.html">Thơ Ca
                                            </a></li>
                                        <li> <a href="web1.html">Huyền bí
                                            </a></li>
                                        <li> <a href="web1.html">Combo Văn Học
                                            </a></li>
                                            <li> <a href="web1.html"> Tất cả sách ></a></li>
                                    </div>

                                    <div class="sub-menu-pic">
                                        <li> <a href="#"><img src="IMG/menu1.jpg"></a></li>

                                    </div>
                                </div>
                            </ul>
                        </div>
                    </li>
                    <li><a href="#"><i class="fa-solid fa-paintbrush"></i> Sách theo chủ đề <i
                                class="fa-solid fa-caret-down"></i></a>
                        <div class="sub-menu">
                            <ul>
                                <div class="in-sub-menu">
                                    <div class="sub-menu2">
                                        <div class="in-sub-menu2">
                                            <li> <a href="#">Trí tuệ Do Thái</a></li>
                                            <li> <a href="#">Ngoại ngữ</a></li>
                                            <li> <a href="#">Triết học Phương Đông</a></li>
                                            <li> <a href="#">Triết học Phương Tây</a></li>

                                            
                                        </div>

                                    </div>
                                    <div class="sub-menu3">
                                       <li> <a href="#">Chính trị </a></li>
                                            <li> <a href="#">Lịch sử thế giới</a></li>
                                            <li> <a href="#">Tôn giáo</a></li>
                                            <li> <a href="#">Kỹ năng sống</a></li>
                                            <li> <a href="web1.html">Tất cả sách ></a></li>
                                         
                                    </div>

                                    

                                    <div class="sub-menu-pic">
                                        <li> <a href="#"><img src="IMG/menu1.jpg"></a></li>

                                    </div>
                                </div>
                            </ul>
                        </div>
                    </li>
                    <li><a href="#"><i class="fa-solid fa-tablet"></i> Truyện tranh - Thiếu nhi <i
                                class="fa-solid fa-caret-down"></i></a>
                        <div class="sub-menu">
                            <ul>
                                <div class="in-sub-menu">
                                    <div class="sub-menu1">
                                        <li> <a href="#">Sách truyện thiếu nhi</a></li>
                                        <li> <a href="#">Sách teen</a></li>
                                        <li> <a href="#">Doraemon</a></li>
                                        <li> <a href="#">Conan</a></li>
                                        <li> <a href="#">Tặng kèm poster</a></li>
                                    </div>


                                    <div class="sub-menu3">
                                        <li> <a href="#">Sách ảnh</a></li>
                                        <li> <a href="#">Triết học cho trẻ</a></li>
                                        <li> <a href="#">Nhập môn lập trình</a></li>
                                        <li> <a href="#">Tư tưởng Hồ Chí Minh</a></li>
                                        <li> <a href="#">Triết học Mác - Lênin</a></li>
                                        <li> <a href="web1.html">Tất cả sách ></a></li>
                                    </div>

                                    <div class="sub-menu-pic">
                                        <li> <a href="#"><img src="IMG/menu1.jpg"></a></li>

                                    </div>
                                </div>
                            </ul>
                        </div>
                    </li>

                    <li><a href="#"><i class="fa-solid fa-gift"></i> Sách giáo khoa <i
                                class="fa-solid fa-caret-down"></i></a>
                        <div class="sub-menu">
                            <ul>
                                <div class="in-sub-menu">
                                    <div class="sub-menu2">
                                        <div class="in-sub-menu2">
                                            <li> <a href="#">Sách giáo khoa cấp 1</a></li>
                                            <li> <a href="#">Sách giáo khoa cấp 2</a></li>
                                            <li> <a href="#">Sách giáo khoa cấp 3</a></li>
                                            <li> <a href="#">Sách giáo khoa nâng cao</a></li>
                                        </div>

                                    </div>
                                    <div class="sub-menu3">
                                        <li> <a href="#">Bộ đề thi các năm</a></li>
                                        <li> <a href="#">Luyện đề Ielts</a></li>
                                        <li> <a href="#">Sách bài tập nâng cao</a></li>
                                        <li> <a href="#">Sách Mai Lan Hương</a></li>
                                        <li> <a href="web1.html">Tất cả sách ></a></li>
                                    </div>

                                    <div class="sub-menu-pic">
                                        <li> <a href="#"><img src="IMG/menu1.jpg"></a></li>

                                    </div>
                                </div>
                            </ul>
                        </div>
                    </li>


                </ul>
            </div>
        </div>

        <div id="backtop">
            <i class="fa-solid fa-arrow-up"></i>

        </div>
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

    // Kiểm tra nếu sản phẩm tồn tại và hiển thị thông tin sản phẩm
    if ($product) {
        $productName = $product['Ten_Sach'];
        $imagePath =  $product['Hinh_Anh'];
        $author = $product['Ten_Tac_Gia'];
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
        echo '<button class="buyNowButton" data-image="' . $imagePath . '" data-title="' . $productName . '" data-quantity="1" onclick="addToCart(this)">Mua ngay</button>';
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



        <div class="slider5">

            <section class="slider-product-one">
                <div class="container">

                    <div class="slider-product-one-content">
                        <h2>Sản phẩm có liên quan</h2>
                        <div class="slider-product-one-content-items">

                            <div class="slider-product-one-content-item">

                                <a href="product.html"><img src="IMG/product2.jpg" alt=""></a>
                                <div class="slider-product-one-content-item-text">
                                    <div class="slider-product-one-content-item-picture">
                                        <li><img src="IMG/freeship.png" alt="">
                                            <p> Miễn phí giao hàng</p>
                                        </li>
                                    </div>
                                    <div class="slider-text1">
                                        <li><a href="#">
                                                <p>Tôi là Bêtô</p>
                                            </a></li>
                                    </div>
                                    <div class="slider-text2">
                                        <li><a href=#>Nguyễn Nhật Ánh</a></li>
                                    </div>
                                  
                                    <li>72,000<sup><u>đ</u></sup></li>
                                </div>
                            </div>

                            <div class="slider-product-one-content-item">

                                <a href="product.html"><img src="IMG/product3.jpg" alt=""></a>
                                <div class="slider-product-one-content-item-text">
                                    <div class="slider-product-one-content-item-picture">
                                        <li><img src="IMG/freeship.png" alt="">
                                            <p> Miễn phí giao hàng</p>
                                        </li>
                                    </div>
                                    <div class="slider-text1">
                                        <li><a href="#">
                                                <p>Tôi thấy hoa vàng trên cỏ xanh</p>
                                            </a></li>
                                    </div>
                                    <div class="slider-text2">
                                        <li><a href=#>Nguyễn Nhật Ánh</a></li>
                                    </div>
                                    
                                    <li>56.500<sup><u>đ</u></sup></li>
                                </div>
                            </div>


                            <div class="slider-product-one-content-item">

                                <a href="product.html"><img src="IMG/product4.jpg" alt=""></a>
                                <div class="slider-product-one-content-item-text">
                                    <div class="slider-product-one-content-item-picture">
                                        <li><img src="IMG/freeship.png" alt="">
                                            <p> Miễn phí giao hàng</p>
                                        </li>
                                    </div>
                                    <div class="slider-text1">
                                        <li><a href="#">
                                                <p>Mùa hè không tên</p>
                                            </a></li>
                                    </div>
                                    <div class="slider-text2">
                                        <li><a href=#>Nguyễn Nhật Ánh</a></li>
                                    </div>
                                   
                                    <li>110,000<sup><u>đ</u></sup></li>
                                </div>
                            </div>


                            <div class="slider-product-one-content-item">

                                <a href="product.html"><img src="IMG/product5.jpg" alt=""></a>
                                <div class="slider-product-one-content-item-text">
                                    <div class="slider-product-one-content-item-picture">
                                        <li><img src="IMG/freeship.png" alt="">
                                            <p> Miễn phí giao hàng</p>
                                        </li>
                                    </div>
                                    <div class="slider-text1">
                                        <li><a href="#">
                                                <p>Cho tôi xin một vé đi Tuổi Thơ</p>
                                            </a></li>
                                    </div>
                                    <div class="slider-text2">
                                        <li><a href=#>Nguyễn Nhật Ánh</a></li>
                                    </div>
                                    <li>80,000<sup><u>đ</u></sup></li>
                                </div>
                            </div>





                        </div>
                    </div>

                </div>
            </section>
        </div>

    </div>
</main>
    <footer>
        <div class="footer">
           
        
            <div class="in-footer-body">
                <div class="in-footer-body-left">
                    <p>Phương thức thanh toán</p>
                    <li><img src="IMG/pay1.png"></li>
                    <li><img src="IMG/pay2.png"></li>
                    <li><img src="IMG/pay3.png"></li>
                    <li><img src="IMG/pay4.png"></li>
                    <li><img src="IMG/pay5.webp"></li>
                </div>
        
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
                    <li><a href="/gioi_thieu.html">Giới thiệu GOODREADS</a></li>
                    <li><a href="">GOODREADS trên Facebook</a></li>
                    <li><a href="">Liên hệ GOODREADS</a></li>
                    <li><a href="">Đặt hàng theo yêu cầu</a</li>
                </div>
                 <div class="in-footer-body-right">
                    <p>Kết nối với chúng tôi</p>
                    <li><a href="#"><img src="IMG/contact1.webp"></a></li>
                    <li><a href="https://www.facebook.com/profile.php?id=100066245906401"><img src="IMG/contact2.webp"></a></li>
                    <li><a href="#"><img src="IMG/contact3.webp"></a></li>
                    <li><a href="#"><img src="IMG/contact4.webp"></a></li>
                    <li><a href="#">Liên hệ hợp tác kinh doanh</a></li>
                    <li><a href="#">Tuyển dụng</a></li><br>
                    <li><a href="#">Chính sách đổi - trả</a></li>
                    <li><a href="#">Chính sách bồi hoàn</a></li>
                    <li><a href="#">Câu hỏi thường gặp (FAQs)</a></li>
        
        
        
                </div>
                </div>
        
               
        </div>
        <div class="footer-bottom">
            <p>&copy; 2023 Bookstore</p>
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
    <script>
        function addToCart(button) {
            // Kiểm tra trạng thái đăng nhập ở đây
            var isLoggedIn = checkLoginStatus(); // Hàm kiểm tra đăng nhập
    
            if (isLoggedIn) {
                // Thực hiện thêm sản phẩm vào giỏ hàng
                var image = button.getAttribute('data-image');
                var title = button.getAttribute('data-title');
                var quantity = button.getAttribute('data-quantity');
    
                // Gọi hàm thêm sản phẩm vào giỏ hàng
                addToCartFunction(image, title, quantity);
            } else {
                // Nếu chưa đăng nhập, chuyển hướng đến trang đăng nhập
                alert('Vui lòng đăng nhập trước khi mua hàng!');
                window.location.href = 'dangnhap.html'; // Điều hướng đến trang đăng nhập
            }
        }
    
        function checkLoginStatus() {
            // Hàm kiểm tra đăng nhập, trả về true nếu đã đăng nhập và ngược lại
            var loggedInUser = localStorage.getItem('loggedInUser');
            return loggedInUser !== null;
        }
    
        // Các hàm khác ở đây, bao gồm đăng nhập và thêm sản phẩm vào giỏ hàng
        // ...
    
    </script>
</body>

</html>