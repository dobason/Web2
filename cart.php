<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=" stylesheet" href="css/stylesheet.css">
    <link rel=" stylesheet" href="stylefont.css">
    <link rel=" stylesheet" href="css/cart.css">
    <script src="/js/product.js"></script>
    <script src="./vendor/fontawesome/js/all.min.js"></script>
    <script src="/js/cart.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Web</title>
   
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
                    <a href="cart.html" id="gioHangLink"><i class="fa fa-shopping-basket" aria-hidden="true"></i></a>
                    <p id="cartItemCount">0</p>
                </div>

            </div>
        </div>
        <div class="menu-bar">
            <div class="menu-bar-content">
                <ul>
                    <li><a href="web1.html"><i class="fa-solid fa-book"></i> Văn học trong nước <span class="menu-bar-content-icon"> <i class="fa-solid fa-caret-down"></i></span></a>
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
                    <li><a href="#"><i class="fa-solid fa-paintbrush"></i> Sách theo chủ đề <i class="fa-solid fa-caret-down"></i></a>
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
                    <li><a href="#"><i class="fa-solid fa-tablet"></i> Truyện tranh - Thiếu nhi <i class="fa-solid fa-caret-down"></i></a>
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

                    <li><a href="#"><i class="fa-solid fa-gift"></i> Sách giáo khoa <i class="fa-solid fa-caret-down"></i></a>
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

    <div class="cart-slider1">
        <div class="in-slider1">
            <div class="in-slider1-bottom">
                <div class="in-slider1-bottom-left">
                    <div class="in-slider1-bottom-top-left">
                        <div class="cart-in-slider1">Thông tin sản phẩm</div>

                        <div class="cart-in-slider2">Số lượng</div>

                        <div class="cart-in-slider3">Thành tiền</div>

                    </div>
                    <div class="in-slider1-products">

                    <div class="cart-container">
                    <?php
require_once 'db/dbhelper.php';

// Lấy danh sách sản phẩm trong giỏ hàng từ bảng gio_hang
$cartItems = getAllCartItems();

// Hiển thị từng sản phẩm trong giỏ hàng
foreach ($cartItems as $item) {
    $productName = $item['Ten_Sach'];
    $imagePath = $item['Hinh_Anh'];
    $price = $item['Don_Gia'];
    $quantity = $item['So_Luong'];
    $productId = $item['Ma_Sach'];

    echo '<div class="in-slider1-product">';
    echo '<div class="product-left">';
    echo '<img src="' . $imagePath . '" alt="' . $productName . '">';
    echo '</div>';
    echo '<div class="product-title">';
    echo '<p>' . $productName . '</p>';
    echo '</div>';
    echo '<div class="product-mid">';
    echo '<div class="in-product-mid">';
    echo '<div class="button" onclick="updateQuantity(\'' . $productId . '\', ' . ($quantity - 1) . ')">-</div>';
    echo '<input type="text" value="' . $quantity . '" class="number" id="quantity' . $productId . '" readonly>';
    echo '<div class="button" onclick="updateQuantity(\'' . $productId . '\', ' . ($quantity + 1) . ')">+</div>';
    echo '</div>';
    echo '</div>';
    echo '<div class="product-price">';
    echo '<p>' . number_format($price, 0, ',', '.') . 'đ</p>'; // Định dạng giá tiền
    echo '</div>';
    echo '<div class="product-right">';
    echo '<i class="fa-solid fa-trash" onclick="confirmDelete(\'' . $productName . '\')"></i>';
    echo '</div>';
    echo '</div>';
}

// Đoạn mã JavaScript để gửi yêu cầu AJAX
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
function updateQuantity(productId, newQuantity) {
    $.ajax({
        url: 'update_quantity.php',
        type: 'POST',
        data: {
            product_id: productId,
            quantity: newQuantity
        },
        success: function(response) {
            if (response && response.success) {
                // Thực hiện yêu cầu AJAX để lấy lại dữ liệu giỏ hàng sau khi cập nhật
                $.ajax({
                    url: 'get_cart_items.php',
                    type: 'GET',
                    success: function(cartItems) {
                        // Hiển thị lại dữ liệu giỏ hàng mới trên giao diện
                        displayCartItems(cartItems);
                    },
                    error: function() {
                        console.log('Lỗi khi lấy lại dữ liệu giỏ hàng');
                    }
                });
            } else {
                console.log('Lỗi khi cập nhật số lượng');
            }
        },
        error: function() {
            console.log('Lỗi khi gửi yêu cầu AJAX');
        }
    });
}

function displayCartItems(cartItems) {
    // Hiển thị lại các sản phẩm trong giỏ hàng với dữ liệu mới
    // Ví dụ: cập nhật số lượng và tổng tiền của từng mặt hàng
    cartItems.forEach(function(item) {
        var productId = item.Ma_Sach;
        var quantity = item.So_Luong;
        var totalPrice = item.Tong_Tien;

        // Cập nhật số lượng và tổng tiền trên giao diện
        $('#quantity' + productId).val(quantity);
        $('#totalPrice' + productId).text(numberWithCommas(totalPrice) + 'đ');
    });
}

function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}


</script>














</div>





















                    </div>
                </div>

                <div class="in-slider1-bottom-right">
                    <div class="total-price">
                        <div class="in-total-price">
                            <div id="total" class="total-info">
                                <div class="total-row">
                                    <span class="total-label">Tổng cộng:</span>
                                    <span id="total-price">0 đ</span>
                                </div>
                                <div class="total-row">
                                    <span class="total-label">Thuế (10%):</span>
                                    <span id="tax">0 đ</span>
                                </div>
                                <div class="total-row">
                                    <span class="total-label">Tổng cộng kèm thuế:</span>
                                    <span id="total-with-tax">0 đ</span>
                                </div>
                            </div>

                            <a href="/Payment.html">
                                <div class="pay">
                                    <p>THANH TOÁN</p>
                                </div>
                            </a>
                            <div class="bottom-pay">
                                <p>(Giảm giá trên web chỉ áp dụng cho bán lẻ)</p>
                            </div>
                        </div>
                    </div>

                </div>



            </div>
        </div>
    </div>

    </div>


</body>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

<script src="js/p.js"></script>

</html>