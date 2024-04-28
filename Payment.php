<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookstore</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="vendor/fontawesome/js/all.min.js"></script>
    <script src="js/main.js"> </script>
    <script src="js/payment.js"></script>
    <link rel="stylesheet" href="css/stylesheet.css">
    <link rel="stylesheet" href="css/payment.css">
    <link rel="stylesheet" href="css/cart.css">
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



                <?php
// Include file header.php để sử dụng giao diện phía trên
require_once 'header.php';
?>

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
        <div class="popup" id="popup">
            <div class="in-popup">
                <div class="in-popup-top">
                    <img src="IMG/in-popup.png">    
                </div>
                <div class="in-popup-bottom">
                    <p>THANH TOÁN THÀNH CÔNG</p>
                </div>
            </div>
        </div>

        <div class="popup-false" id="popup-false">
            <div class="in-popup">
                <div class="in-popup-top">
                    <img src="IMG/dau cheo.png">    
                </div>
                <div class="in-popup-bottom">
                    <p>VUI LÒNG ĐIỀN LẠI THÔNG TIN</p>
                </div>
            </div>
        </div>
        <div class="slider5">
           
                <div class="in-checkout-top">
                    <h3>ĐỊA CHỈ GIAO HÀNG</h3>
                </div>
                <div class="checkout">
                    <div class="in-checkout">
                        <div class="in-check-out-bottom">
                            
                            <div class="in-check-out-name">
                                <label for="name">Họ và tên người nhận</label>
                                <input type="text" id="name" pattern="[a-zA-Z\s]+" placeholder="Nhập tên người nhận" required>
                            </div>
                            <div class="in-check-out-phone">
                                <label for="phoneNumber">Số điện thoại</label>
                                <input type="tel" id="phoneNumber" pattern="[0-9]+"minlength="10" placeholder="Nhập đủ 10 số" required>
                            </div>
                            <div class="in-check-out-address">
                                <label for="deliveryAddress">Địa chỉ nhận hàng</label>
                                <input type="text" id="deliveryAddress" placeholder="Nhập địa chỉ giao hàng" required>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

        <div class="slider5">
           
            <div class="in-checkout-top">
                <h3>PHƯƠNG THỨC VẬN CHUYỂN</h3>
            </div>
            <form>
                <div class="transport">
                    <div class="in-transport-bottom">
                        <label>
                            <h4>Giao hàng tiêu chuẩn</h4>
                            <input type="radio" id="standard" name="deliveryType" onchange="setDeliveryTime('standard')">
                            <span id="deliveryTimeDisplayStandard"></span>
                        </label>
                    </div>
                    
                    <div class="in-transport-bottom">
                        <label>
                            <h4>Giao hàng tiết kiệm</h4>
                            <input type="radio" id="economy" name="deliveryType" onchange="setDeliveryTime('economy')">
                            <span id="deliveryTimeDisplayEconomy"></span>
                        </label>
                    </div>
                </div>
            </form>
    </div>

    <div class="slider5">
           
        <div class="in-checkout-top">
            <h3>PHƯƠNG THỨC THANH TOÁN</h3>
        </div>
        <div class="transport">
            <div class="in-checkout">

                <div class="in-transport-bottom">
                    <form action="" class="info-nhan-hang" onclick="total()">
                        <input type="radio" id="zalopay" name="choice" value="ZaloPay">
                        <label for="zalopay"><img src="IMG/pay1.png" style="width:40px;height:24px"><span>APPLE PAY</span></label>
                        <br><br>
                        <input type="radio" id="vnpay" name="choice" value="VNPAY">
                        <label for="vnpay"><img src="IMG/pay2.png" style="width:40px;height:24px"><span>VNPAY</span></label>
                        <br><br>
                        <input type="radio" id="shopeepay" name="choice" value="ShopeePay">
                        <label for="shopeepay"><img src="IMG/pay3.png" style="width:40px;height:24px"><span>Ví MOMO</span></label>
                        <br><br>
                        <input type="radio" id="momo" name="choice" value="Momo">
                        <label for="momo"><img src="IMG/pay4.png" style="width:40px;height:24px"><span>ONEPAY</span></label>
                        <br><br>
                        <input type="radio" id="atm" name="choice" value="ATM">
                        <label for="atm"><img src="IMG/pay5.webp" style="width:40px;height:24px"><span>ZaloPay</span></label>
                        <br><br>
                        <input type="radio" id="money" name="choice" value="Money">
                        <label for="money"><img src="IMG/pay6.png" style="width:40px;height:24px"><span>Thanh toán bằng tiền mặt khi nhận hàng</span></label>
                        <br>
                    </form>
                </div>
                
            </div>
        </div>
</div>


<div class="slider5">
           
    <div class="in-checkout-top">
        <h3>KIỂM TRA LẠI ĐƠN HÀNG</h3>
    </div>
    <div class="transport">
        <div class="in-checkout">
        <?php
require_once 'db/dbhelper.php';

$sql = "SELECT gio_hang.*, sach.Ten_Sach, sach.Hinh_Anh, sach.Don_Gia 
        FROM gio_hang 
        LEFT JOIN sach ON gio_hang.Ma_Sach = sach.Ma_Sach";

$cartItems = executeResult($sql);

if (!is_null($cartItems) && is_array($cartItems) && count($cartItems) > 0) {
    foreach ($cartItems as $item) {
        $productName = $item['Ten_Sach'];
        $imagePath = $item['Hinh_Anh'];
        $price = $item['Don_Gia'];
        $quantity = $item['So_Luong'];
        $productId = $item['Ma_Sach'];
        $total = $price * $quantity;
        echo '<div class="in-transport-bottom">';
        echo ' <div class="in-slider1-product" id="product1">';
        echo ' <div class="product-left">';
        echo '<img src="' . $imagePath . '" alt="' . $productName . '">';
        echo '    </div>';
        echo '    <div class="product-title">';
              echo '   <p>' . $productName . '</p>';
              echo '   </div>';
              echo ' <div class="product-mid">';
              echo '   <p>' . $quantity . '</p>';
              echo '</div>';
              echo '  <div class="product-mid">';
              echo '<p>' . number_format($price, 0, ',', '.') . 'đ</p>';
              echo '  </div>';

              echo '<div class="product-price">';
              echo '<p data-price="' . $price . '">' . number_format($total, 0, ',', '.') . 'đ</p>';
              echo '   </div>';
             
              echo '   </div>';
              echo ' </div>';
       
} 
}
           
            else {
                echo '<p>Không có sản phẩm nào trong giỏ hàng.</p>';
            }
?>
        

       
        </div>
    </div>
</div>




        <!------------------------------------------------------>

    </main>
    <footer>
        <div class="footer">
        <?php
// Kết nối đến cơ sở dữ liệu
require_once 'db/dbhelper.php';

// Lấy thông tin giá trị Tong_HD từ bảng gio_hang (ví dụ: dựa trên id khách hàng)
$idKhachHang = 1; // Ví dụ id của khách hàng

// Truy vấn để lấy Tong_HD từ bảng gio_hang
$sql = "SELECT Tong_HD FROM gio_hang WHERE id_khach_hang = $idKhachHang";
$result = executeSingleResult($sql);

// Kiểm tra nếu có kết quả trả về từ truy vấn
if ($result) {
    $tongHoaDon = $result['Tong_HD'];

    // Hiển thị giá trị Tong_HD trong thẻ <span>
    echo '<div class="in-footer-body1">';
    echo '<div class="in-footer-price-total">';
    echo '<p>Tổng tiền</p><span><p>' . number_format($tongHoaDon) . 'đ</p></span>';
    echo '</div>';
    echo '</div>';
} else {
    echo '<p>Không có dữ liệu hoặc có lỗi xảy ra.</p>';
}
?>

            <div class="out">
                <a href="cart.html"><div class="return"><p>Trở lại</p></div></a>
                <button class="show-popup-button" onclick="confirmPayment()">Xác nhận thanh toán</button>
            </div>
        </div>

    </footer>

    <script>


    </script>



</body>

</html>