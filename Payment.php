<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookstore</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="vendor/fontawesome/js/all.min.js"></script>
    <script src="js/main.js"> </script>
    <script src="js/payment.js"></script>
    <link rel="stylesheet" href="css/stylesheet.css">
    <link rel="stylesheet" href="css/payment.css">
    <!--Font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="./css/Style2.css">
    <link rel="stylesheet" href="css/cart.css">
    <style>
        /* Đảm bảo các select được hiển thị trên các dòng riêng biệt */
select {
    display: block;
    width: 100%;
    padding: 0.5rem;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 4px;
    margin-bottom: 1rem; /* Khoảng cách giữa các select */
}

    </style>
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
            <a href="index.php">Trang chủ</a>
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

    <script>
document.addEventListener('DOMContentLoaded', function() {
    var addressSelect = document.getElementById('addressSelect');
    var checkOutBottom = document.getElementById('checkOutBottom');

    // Ẩn ban đầu phần in-check-out-bottom
    checkOutBottom.style.display = 'block'; // Mặc định hiển thị

    // Xử lý sự kiện khi lựa chọn thay đổi
    addressSelect.onchange = function() {
        var selectedValue = addressSelect.value;

        if (selectedValue === 'existingAddress') {
            // Nếu chọn địa chỉ đăng nhập, ẩn phần in-check-out-bottom
            checkOutBottom.style.display = 'none';
        } else {
            // Nếu chọn địa chỉ mới, hiển thị lại phần in-check-out-bottom
            checkOutBottom.style.display = 'block';
        }
    };
});
</script>

        <form id="checkoutForm" action="bill.php" method="post">
        <div class="slider5">

            <div class="in-checkout-top">
                <h3>ĐỊA CHỈ GIAO HÀNG</h3>
            </div>
            <div class="checkout">
                
            <div class="in-checkout">
            <div class="in-check-out-address">
                
                    <select id="addressSelect" name="addressSelect" required>
                        <option value="newAddress">Địa chỉ mới</option>
                        <option value="existingAddress">Địa chỉ đăng nhập</option>
                    </select>
                </div>

                <div id="checkOutBottom" class="in-check-out-bottom">
            <div class="in-check-out-name">
                <label for="name">Họ và tên người nhận</label>
                <input type="text" id="name" name="name" pattern="[a-zA-Z\s]+" placeholder="Nhập không dấu (son,kien,phuong)" required>
            </div>
            <div class="in-check-out-phone">
                <label for="phoneNumber">Số điện thoại</label>
                <input type="tel" id="phoneNumber" name="phoneNumber" pattern="[0-9]+" minlength="10" placeholder="Nhập không dấu cách(1234567891)" required>
            </div>
            <div class="in-check-out-address">
                <label for="deliveryAddress">Địa chỉ nhận hàng</label>
                <input type="text" id="deliveryAddress" name="deliveryAddress" placeholder="Nhập địa chỉ giao hàng" required>
            </div>
            <div>
                <select class="form-select form-select-sm mb-3" id="city" name="city" aria-label=".form-select-sm"required>
                    <option value="" selected>Chọn tỉnh thành</option >
                </select>
                <select class="form-select form-select-sm mb-3" id="district" name="district" aria-label=".form-select-sm" required>
                    <option value="" selected>Chọn quận huyện</option>
                </select>
                <select class="form-select form-select-sm" id="ward" name="ward" aria-label=".form-select-sm"required>
                    <option value="" selected>Chọn phường xã</option>
                </select>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
   <!-- Đoạn mã JavaScript để lấy dữ liệu địa điểm và hiển thị lên các select -->
   <script>
  document.addEventListener('DOMContentLoaded', function() {
    var citis = document.getElementById("city");
    var districts = document.getElementById("district");
    var wards = document.getElementById("ward");
    var locationFileUrl = "js/location.js";
    var Parameter = {
      url: locationFileUrl,
      method: "GET",
      responseType: "json" // Sử dụng responseType là "json" để Axios tự động parse JSON
    };

    axios(Parameter)
      .then(function(response) {
        renderCity(response.data);
      })
      .catch(function(error) {
        console.error('Error fetching location data:', error);
      });

    function renderCity(data) {
      // Đổ dữ liệu các thành phố vào dropdown thành phố (city)
      data.forEach(function(city) {
        citis.options[citis.options.length] = new Option(city.Name, city.Id);
      });

      // Xử lý sự kiện khi chọn thành phố
      citis.onchange = function() {
        districts.length = 1; // Xóa tất cả các options trừ option đầu tiên (placeholder)
        wards.length = 1; // Xóa tất cả các options trừ option đầu tiên (placeholder)

        if (this.value !== "") {
          var selectedCity = data.find(function(item) {
            return item.Id === this.value;
          }, this);

          // Đổ dữ liệu các quận/huyện vào dropdown quận/huyện (district)
          if (selectedCity) {
            selectedCity.Districts.forEach(function(district) {
              districts.options[districts.options.length] = new Option(district.Name, district.Id);
            });
          }
        }
      };

      // Xử lý sự kiện khi chọn quận/huyện
      districts.onchange = function() {
        wards.length = 1; // Xóa tất cả các options trừ option đầu tiên (placeholder)

        if (this.value !== "") {
          var selectedCity = data.find(function(item) {
            return item.Id === citis.value;
          });

          if (selectedCity) {
            var selectedDistrict = selectedCity.Districts.find(function(district) {
              return district.Id === this.value;
            }, this);

            // Đổ dữ liệu các phường/xã vào dropdown phường/xã (ward)
            console.log(selectedDistrict);
            if (selectedDistrict) {
              selectedDistrict.Wards.forEach(function(ward) {
                wards.options[wards.options.length] = new Option(ward.Name, ward.Id);
              });
            }
          }
        }
      };
    }
  });
</script>


            </div>
           
        </div>

  
</div>

            </div>
        </div>

    <div class="slider5">
        <div class="in-checkout-top">
            <h3>PHƯƠNG THỨC THANH TOÁN</h3>
        </div>
        
        <div class="in-transport-bottom">
        <input type="radio" id="tienmat" name="paymentMethod" value="tienmat" required>
        <label for="tienmat">Thanh toán bằng tiền mặt</label>
        <br><br>
        <input type="radio" id="online" name="paymentMethod" value="online" required>
        <label for="online">Thanh toán trực tuyến</label>
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
                 

                  // Kiểm tra xem có tồn tại mã khách hàng trong session hay không
                  if (isset($_SESSION['Ma_KH'])) {
                      $maKH = $_SESSION['Ma_KH'];
                  
                      // Truy vấn cơ sở dữ liệu để lấy thông tin giỏ hàng của khách hàng hiện tại
                      $sql = "SELECT gio_hang.*, sach.Ten_Sach, sach.Hinh_Anh, sach.Don_Gia 
                              FROM gio_hang 
                              LEFT JOIN sach ON gio_hang.Ma_Sach = sach.Ma_Sach
                              WHERE gio_hang.Ma_KH = $maKH";
                  
                      $cartItems = executeResult($sql);
                  
                      if (!is_null($cartItems) && is_array($cartItems) && count($cartItems) > 0) {
                          // Duyệt qua từng sản phẩm trong giỏ hàng để hiển thị thông tin
                          foreach ($cartItems as $item) {
                              $productName = $item['Ten_Sach'];
                              $imagePath = $item['Hinh_Anh'];
                              $price = $item['Don_Gia'];
                              $quantity = $item['So_Luong'];
                              $total = $price * $quantity;
                  
                              // Hiển thị thông tin sản phẩm trong giỏ hàng
                              echo '<div class="in-transport-bottom">';
                              echo '<div class="in-slider1-product" id="product1">';
                              echo '<div class="product-left">';
                              echo '<img src="' . $imagePath . '" alt="' . $productName . '">';
                              echo '</div>';
                              echo '<div class="product-title">';
                              echo '<p>' . $productName . '</p>';
                              echo '</div>';
                              echo '<div class="product-mid">';
                              echo '<p>' . $quantity . '</p>';
                              echo '</div>';
                              echo '<div class="product-mid">';
                              echo '<p>' . number_format($price, 0, ',', '.') . 'đ</p>';
                              echo '</div>';
                              echo '<div class="product-price">';
                              echo '<p data-price="' . $price . '">' . number_format($total, 0, ',', '.') . 'đ</p>';
                              echo '</div>';
                              echo '</div>';
                              echo '</div>';
                          }
                      } else {
                          // Xử lý khi không có sản phẩm trong giỏ hàng
                          echo "Giỏ hàng của bạn đang trống.";
                      }
                  } else {
                      // Xử lý khi không tìm thấy mã khách hàng trong session
                      echo "Vui lòng đăng nhập để xem giỏ hàng.";
                      // Chuyển hướng đến trang đăng nhập
                      header('Location: dangnhap.php');
                      exit(); // Dừng luồng thực thi để chuyển hướng
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


            $totalAmount = calculateTotalAmount($cartItems);
            // Hiển thị giá trị Tong_HD trong thẻ <span>
            echo '<div class="in-footer-body1">';
            echo '<div class="in-footer-price-total">';
            echo 'Tổng tiền: <span id="total-price">' . number_format($totalAmount, 0, ',', '.') . 'đ</span>';
            echo '</div>';
            echo '</div>';


        
           
            
            require_once 'db/dbhelper.php'; // Import file chứa các hàm kết nối và thực thi truy vấn
            
            // Kiểm tra xem session Ma_KH có tồn tại hay không
            if (isset($_SESSION['Ma_KH'])) {
                $maKH = $_SESSION['Ma_KH']; // Lấy mã khách hàng từ session
            
                // Lấy tổng tiền từ biến $totalAmount (đã tính toán trước đó)
                $totalAmount = calculateTotalAmount($cartItems); // Hàm tính tổng hóa đơn từ danh sách sản phẩm trong giỏ hàng
    
            }
            
            // Hàm tính tổng hóa đơn từ danh sách sản phẩm trong giỏ hàng
            function calculateTotalAmount($cartItems)
            {
                $totalAmount = 0;
                foreach ($cartItems as $item) {
                    $price = $item['Don_Gia'];
                    $quantity = $item['So_Luong'];
                    $totalAmount += $price * $quantity;
                }
                return $totalAmount;
            }
            // Lưu totalAmount vào session
$_SESSION['totalAmount'] = $totalAmount;

        
            
            
            ?>

            <div class="out">
                <a href="cart.php">
                    <div class="return">
                        <p>Trở lại</p>
                    </div>
                </a>
                <button type="submit" class="show-popup-button" style="background:var(--green);" >Hoàn tất đặt hàng</button>
                
            </div>
        </div>
            </form> 
      

    </footer>

   



</body>

</html>
