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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Web</title>
   <style>
        .in-slider1-bottom-top-left{
            text-align: center;
        }
        .cart-in-slider1{
        width: 36%;

        }
        .cart-in-slider2{
        width: 9%;
        }
        .cart-in-slider3{
            text-align: left;
        width: 10%;
        }
        .product-right{
        width: 20%;
        }
        
        .in-slider1-product{
            text-align: center;
        }
   </style>
</head>

<body>
    
<header>

<!--Navbar-->
<nav class="navbar navbar-expand-lg fixed-to">
    <div class="container">
        <a class="navbar-brand" href="index.php">GOODREADS</a>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <form class="d-flex" method="GET">
                <input class="form-control me-2" type="search" placeholder="Tìm kiếm sản phẩm" aria-label="Search" name="Ten_Sach">
                <button class="btn btn-outline-success" type="submit">Search</button>
                <div id="bookListContainer"></div>
            </form>
        </div>
      
        <?php require_once 'header.php'; ?>
        <button class="navbar-toggler pe-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>

<!---Kết nối database-->
<?php require('./php/classes/database.php'); ?>

</header>
    <hr>
    <h1 style="text-align:center" >Giỏ hàng</h1>
    <hr>
    <div class="cart-slider1">
        <div class="in-slider1">
            <div class="in-slider1-bottom">
                <div class="in-slider1-bottom-left">
                    <div class="in-slider1-bottom-top-left">
                        <div class="cart-in-slider1" >Thông tin sản phẩm</div>
                        <div class="cart-in-slider2">Giá</div>
                        <div class="cart-in-slider2">Số Lượng</div>
                        <div class="cart-in-slider3">Tổng Giá</div>

                    </div>
                    <div class="in-slider1-products">

                    <div class="cart-container">

<?php
require_once 'db/dbhelper.php';

// Kiểm tra xem người dùng đã đăng nhập chưa
if (isset($_SESSION['Ma_KH'])) {
    $maKhachHang = $_SESSION['Ma_KH'];

    // Truy vấn dữ liệu từ bảng gio_hang theo Ma_KH
    $sql = "SELECT gio_hang.*, sach.Ten_Sach, sach.Hinh_Anh, sach.Don_Gia 
            FROM gio_hang 
            LEFT JOIN sach ON gio_hang.Ma_Sach = sach.Ma_Sach
            WHERE gio_hang.Ma_KH = $maKhachHang";

    $cartItems = executeResult($sql);

    if (!is_null($cartItems) && is_array($cartItems) && count($cartItems) > 0) {
        foreach ($cartItems as $item) {
            $productName = $item['Ten_Sach'];
            $imagePath = $item['Hinh_Anh'];
            $price = $item['Don_Gia'];
            $quantity = $item['So_Luong'];
            $productId = $item['Ma_Sach'];
            $total = $price * $quantity;
    
            echo '<div class="in-slider1-product">';
            echo '<div class="product-left">';
            echo '<img src="' . $imagePath . '" alt="' . $productName . '">';
            echo '</div>';
            echo '<div class="product-title">';
            echo '<p>' . $productName . '</p>';
            echo '</div>';
            echo '<div class="product-price">';
            echo '<p>' . number_format($price, 0, ',', '.') . 'đ</p>';
            echo '</div>';
            echo '<div class="product-mid">';
            echo '<div class="in-product-mid">';
            
            echo '<div class="button" onclick="updateQuantity(' . $productId . ', \'decrement\')">-</div>';
            echo '<input type="text" value="' . $quantity . '" class="number" id="quantity' . $productId . '" readonly>';
            echo '<div class="button" onclick="updateQuantity(' . $productId . ', \'increment\')">+</div>';
            echo '</div>';
            echo '</div>';
            
            echo '<div class="product-total" id="total_' . $productId . '">';
            echo '<p data-price="' . $price . '">' . number_format($total, 0, ',', '.') . 'đ</p>'; // Hiển thị giá trị total
            echo '</div>';
            
            echo '<div class="product-right">';
            echo '<button class="fa-solid fa-trash" onclick="confirmDelete(' . $productId . ')"></button>';
            echo '</div>';
            echo '</div>';
        }
    }  else {
        echo '<p>Giỏ hàng của bạn đang trống.</p>';
    }
} else {
    echo '<p>Vui lòng đăng nhập để xem giỏ hàng.</p>';
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
                window.location.reload();
                // Cập nhật thành công, có thể xử lý dữ liệu response.total nếu cần
            } else {
                console.log('Có lỗi xảy ra khi cập nhật số lượng sản phẩm');
            }
        },
        error: function() {
            console.log('Lỗi khi gửi yêu cầu cập nhật số lượng sản phẩm');
        }
    });
    calculateTotalPrice();
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
            
                console.log('Đã xóa sản phẩm có ID: ' + productId);
                window.location.reload(); // Tải lại trang để cập nhật danh sách giỏ hàng
            
        }
    };
    var data = 'product_id=' + encodeURIComponent(productId);
    xhr.send(data);
}

function calculateTotalPrice() {
    let totalPrice = 0;

    // Lặp qua từng sản phẩm trong giỏ hàng
    let productElements = document.querySelectorAll('.product-total p');
    productElements.forEach((element) => {
        let priceText = element.innerText; // Ví dụ: "890.000đ"
        let price = parseInt(priceText.replace('đ', '').replace('.', '').replace(',', ''), 10); // Chuyển đổi về số nguyên (loại bỏ dấu chấm và dấu phẩy)
        totalPrice += price; // Cộng dồn tổng số tiền
    });

    // Hiển thị tổng hóa đơn trong thẻ span có id="total-price"
    let totalPriceElement = document.getElementById('total-price');
    totalPriceElement.innerText = totalPrice.toLocaleString() + 'đ'; // Hiển thị số tiền đã tính toán với định dạng số nguyên, ba chữ số thập phân và kèm đơn vị VNĐ
}


// Gọi hàm calculateTotalPrice() khi trang web được tải
document.addEventListener('DOMContentLoaded', function() {
    calculateTotalPrice();
});


function updateCustomerTotal(totalPrice) {
    let maKhachHang = <?php echo isset($_SESSION['Ma_KH']) ? $_SESSION['Ma_KH'] : 'null'; ?>;
    
    if (maKhachHang) {
        $.ajax({
            url: 'update_customer_total.php',
            type: 'POST',
            data: {
                ma_khach_hang: maKhachHang,
                tong_hoa_don: totalPrice
            },
            success: function(response) {
                if (response && response.success) {
                    console.log('Đã cập nhật tổng hóa đơn cho khách hàng có ID: ' + maKhachHang);
                } else {
                    console.log('Có lỗi xảy ra khi cập nhật tổng hóa đơn cho khách hàng');
                }
            },
            error: function() {
                console.log('Lỗi khi gửi yêu cầu cập nhật tổng hóa đơn cho khách hàng');
            }
        });
    }
}


</script>














</div>





















                    </div>
                </div>

                <div class="in-slider1-bottom-right">
                    <div class="total-price">
                        <div class="in-total-price">
                            <div id="total" class="total-info">
                            <?php
require_once 'db/dbhelper.php';

// Truy vấn SQL để tính tổng hóa đơn của mỗi khách hàng từ bảng gio_hang
$sql = "
    SELECT Ma_KH, SUM(Tong_Tien) AS Tong_Hoa_Don
    FROM gio_hang
    GROUP BY Ma_KH;
";

// Thực thi truy vấn để lấy kết quả
$results = executeResult($sql);

$allCustomersUpdated = true;

// Duyệt qua kết quả để cập nhật cột Tong_Hoa_Don trong bảng khach_hang

?>
    
       <div class="total-row">
            <span class="total-label">Tổng giá:</span>
            <span id="total-price"> </span>
        </div>




                            <a href="Payment.php">
                                <div class="pay" style="background:var(--bs-success);">
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