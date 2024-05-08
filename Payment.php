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



                <?php
                // Include file header.php để sử dụng giao diện phía trên
                require_once 'header.php';
                ?>

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

    <main>
        <form id="checkoutForm" action="bill.php" method="post">
        <div class="slider5">

            <div class="in-checkout-top">
                <h3>ĐỊA CHỈ GIAO HÀNG</h3>
            </div>
            <div class="checkout">
            <div class="in-checkout">

        <div class="in-check-out-bottom">
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
        <label for="tienmat"><span>Thanh toán bằng tiền mặt</span></label>
        <br><br>
        <input type="radio" id="online" name="paymentMethod" value="online" required>
        <label for="online"><span>Thanh toán trực tuyến</span></label>
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
                <button type="submit" class="show-popup-button" >Hoàn tất đặt hàng</button>
                
            </div>
        </div>
            </form> 
      

    </footer>

   



</body>

</html>