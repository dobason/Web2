<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=" stylesheet" href="/css/stylesheet.css">
    <link rel=" stylesheet" href="stylefont.css">
    <link rel=" stylesheet" href="/css/cart.css">
    <script src="/js/product.js"></script>
    <script src="./vendor/fontawesome/js/all.min.js" ></script>
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

                    <div class="in-slider1-product" id="product1">
                        <div class="product-left">
                            <img src="/IMG/in-pic1.jpg">
                        </div>
                        <div class="product-title">
                            <p>Thỏ bảy màu và những người nghĩ nó là bạn</p>
                        </div>
                        <div class="product-mid">
                            <div class="in-product-mid">
                                <div class="button" onclick="updateQuantity('product1', 'decrement')">-</div>
                                <input type="text" value="1" class="number" id="quantity-product1">
                                <div class="button" onclick="updateQuantity('product1', 'increment')">+</div>
                            </div>
                        </div>
                        <div class="product-price">
                            <p>19.000 đ</p>
                        </div>
                        <div class="product-right">
                            <i class="fa-solid fa-trash" onclick="confirmDelete('product1')"></i>
                            
                        </div>
                    </div>
                    
                
                    

                <div class="in-slider1-product" id="product2">
                    <div class="product-left">
                        <img src="/IMG/in-pic2.jpg">
                    </div>
                    <div class="product-title">
                        <p>Tháng 9 này có cậu</p>
                    </div>
                    <div class="product-mid">
                        <div class="in-product-mid">
                            <div class="button" onclick="updateQuantity('product2', 'decrement')">-</div>
                            <input type="text" value="1" class="number" id="quantity-product2">
                            <div class="button" onclick="updateQuantity('product2', 'increment')">+</div>
                        </div>
                    </div>
                    <div class="product-price">
                        <p>108.000 đ</p>
                    </div>
                    <div class="product-right">
                        <i class="fa-solid fa-trash" onclick="confirmDelete('product2')"></i>
                        
                    </div>
                </div>
                
       
                


                <div class="in-slider1-product" id="product3">
                    <div class="product-left">
                        <img src="/IMG/in-pic3.jpg">
                    </div>
                    <div class="product-title">
                        <p>Tôi thấy hoa vàng trên cỏ xanh</p>
                    </div>
                    <div class="product-mid">
                        <div class="in-product-mid">
                            <div class="button" onclick="updateQuantity('product3', 'decrement')">-</div>
                            <input type="text" value="1" class="number" id="quantity-product3">
                            <div class="button" onclick="updateQuantity('product3', 'increment')">+</div>
                        </div>
                    </div>
                    <div class="product-price">
                        <p>73.000 đ</p>
                    </div>
                    <div class="product-right">
                        <i class="fa-solid fa-trash" onclick="confirmDelete('product3')"></i>
                       
                    </div>
                </div>
                
           
                


                <div class="in-slider1-product" id="product4">
                    <div class="product-left">
                        <img src="/IMG/in-pic4.jpg">
                    </div>
                    <div class="product-title">
                        <p>Giải tích 12</p>
                    </div>
                    <div class="product-mid">
                        <div class="in-product-mid">
                            <div class="button" onclick="updateQuantity('product4', 'decrement')">-</div>
                            <input type="text" value="1" class="number" id="quantity-product4">
                            <div class="button" onclick="updateQuantity('product4', 'increment')">+</div>
                        </div>
                    </div>
                    <div class="product-price">
                        <p>12.000 đ</p>
                    </div>
                    <div class="product-right">
                        <i class="fa-solid fa-trash" onclick="confirmDelete('product4')"></i>
                        
                    </div>
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
                
                <a href="/Payment.html"><div class="pay"><p>THANH TOÁN</p></div></a>
                <div class="bottom-pay"><p>(Giảm giá trên web chỉ áp dụng cho bán lẻ)</p></div>
            </div>
        </div>

        </div>

        
                
            </div>
        </div>
    </div>
  
</div>


</body>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script>
   document.addEventListener('DOMContentLoaded', function () {
    var applyButton = document.getElementById('applyButton');
    applyButton.addEventListener('click', function() {
        showApplySuccessMessage();
    });

    function showApplySuccessMessage() {
        alert("Áp dụng mã giảm thành công");
    }
});

document.addEventListener('DOMContentLoaded', function () {
    var applyButton = document.getElementById('applyButton1');
    applyButton.addEventListener('click', function() {
        showApplySuccessMessage();
    });

    function showApplySuccessMessage() {
        alert("Áp dụng mã giảm thành công");
    }
});
</script>
<script src="js/p.js"></script>
</html>