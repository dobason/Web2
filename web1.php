<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=" stylesheet" href="css/stylesheet.css">
    <link rel=" stylesheet" href="stylefont.css">
    <link rel=" stylesheet" href="css/cart.css">
    <script src="js/product.js"></script>
    <script src="./vendor/fontawesome/js/all.min.js"></script>
    <script src="/cart.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Web</title>
   <style>
    .in-slider1-bottom-top-left{
        text-align: center;
        justify-content: center;
    }
    .product-right{
        width: 16%;
    }
    .in-slider1-product{
        text-align: center;
    }
   </style>
</head>

<body>
    
    <header>


        <div class="big-menu">


            <div class="in-big-menu">
                <div class="logo">
                    <a href="index.php" onclick="momodal()"><img src="IMG/logo.jpg"></a>
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

<?php
require_once 'db/dbhelper.php';

$sql = "SELECT gio_hang.*, sach.Ten_Sach, sach.Hinh_Anh, sach.Don_Gia 
        FROM gio_hang 
        LEFT JOIN sach ON gio_hang.Ma_Sach = sach.Ma_Sach";

$cartItems = executeResult($sql);

if (!empty($cartItems) && is_array($cartItems) && count($cartItems) > 0) {
    echo '<table width="600" align="center" border="1" cellpadding="5" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111">';
    echo '<tr>';
    echo '<th>Tên sách</th>';
    echo '<th>Hình ảnh</th>';
    echo '<th>Số lượng</th>';
    echo '<th>Đơn giá</th>';
    echo '<th>Tổng tiền</th>';
    echo '<th>Trạng thái</th>';
    echo '</tr>';
    
    foreach ($cartItems as $item) {
        $productName = $item['Ten_Sach'];
        $imagePath = $item['Hinh_Anh'];
        $price = $item['Don_Gia'];
        $quantity = $item['So_Luong'];
        $productId = $item['Ma_Sach'];
        $total = $price * $quantity;

        echo '<tr>';
        echo '<td>' . $productName . '</td>';
        echo '<td><img src="' . $imagePath . '" alt="' . $productName . '"></td>';
        echo '<div class="button" onclick="updateQuantity(' . $productId . ', \'decrement\')">-</div>';
        echo '<td><input type="text" value="' . $quantity . '" class="number" id="quantity' . $productId . '" readonly>';
        echo '<p class="button" onclick="updateQuantity(' . $productId . ', \'increment\')">+</td>';
        echo '<td>' . number_format($price, 0, ',', '.') . 'đ</td>';
        echo '<td class="product-total" id="total_' . $productId . '">';
        echo '<p data-price="' . $price . '">' . number_format($total, 0, ',', '.') . 'đ</td>'; // Hiển thị giá trị total
        echo '<td><button class="fa-solid fa-trash" onclick="confirmDelete(' . $productId . ')"></button></td>';
        echo '</tr>';
    }
} else {
    echo '<p>Không có sản phẩm nào trong giỏ hàng.</p>';
}
?>


<script>
function updateQuantity(productId, action) {
    let quantityElement = document.getElementById('quantity' + productId);
    let currentQuantity = parseInt(quantityElement.value);

    if (action === 'increment') {
        quantityElement.value = currentQuantity + 1;
    } else if (action === 'decrement') {
        if (currentQuantity > 1) {
            quantityElement.value = currentQuantity - 1;
        }
    }

    // Tính lại tổng giá trị mới
    let newQuantity = parseInt(quantityElement.value);
    let priceElement = document.querySelector('#total_' + productId + ' p');
    let price = parseFloat(priceElement.getAttribute('data-price')); // Lấy giá trị đơn giá từ thuộc tính data-price
    let newTotal = price * newQuantity;

    // Cập nhật tổng giá trị trên giao diện người dùng
    priceElement.innerText = newTotal.toLocaleString() + 'đ';

    // Gọi AJAX để cập nhật số lượng trên máy chủ
    updateCartQuantity(productId, newQuantity);
}

function updateCartQuantity(productId, newQuantity) {
    $.ajax({
        url: 'update_quantity.php',
        type: 'POST',
        data: {
            product_id: productId,
            quantity: newQuantity
        },
        success: function(response) {
            if (response && response.success) {
                console.log('Đã cập nhật số lượng sản phẩm có ID: ' + productId);
                // Cập nhật thành công, có thể xử lý dữ liệu response.total nếu cần
            } else {
                console.log('Có lỗi xảy ra khi cập nhật số lượng sản phẩm');
            }
        },
        error: function() {
            console.log('Lỗi khi gửi yêu cầu cập nhật số lượng sản phẩm');
        }
    });
}












function confirmDelete(productId) {
    // Hiển thị hộp thoại xác nhận xóa sản phẩm
    if (confirm("Bạn có chắc chắn muốn xóa sản phẩm này không?")) {
        // Nếu người dùng nhấn OK, gọi hàm để xóa sản phẩm
        deleteProduct(productId);
    } else {
        // Nếu người dùng nhấn Cancel, không làm gì cả
        console.log("Không xóa sản phẩm");
    }
}


function deleteProduct(productId) {
    var xhr = new XMLHttpRequest();
    var url = 'delete-book-in-cart.php';
    xhr.open('POST', url, true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                console.log('Đã xóa sản phẩm có ID: ' + productId);
                window.location.reload(); // Tải lại trang để cập nhật danh sách giỏ hàng
            } else {
                console.log('Lỗi khi xóa sản phẩm');
            }
        }
    };
    var data = 'product_id=' + encodeURIComponent(productId);
    xhr.send(data);
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