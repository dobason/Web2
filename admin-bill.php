<!doctype php>
<php lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Admin Dashboard - goodreads</title>
      <!-- Favicon -->
      <link rel="shortcut icon" href="images/favicon.ico" />
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="css/dataTables.bootstrap4.min.css">
      <!-- Typography CSS -->
      <link rel="stylesheet" href="css/typography.css">
      <!-- Style CSS -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Responsive CSS -->
      <link rel="stylesheet" href="css/responsive.css">

   </head>
   <body>
      <?php
         require('./php/classes/database.php');
         $result = Database::getAllRows('hoa_don');
         Database::closeConnection();
      ?>
      <!-- loader Start -->
      <div id="loading">
         <div id="loading-center">
         </div>
      </div>
      <!-- loader END -->
      <!-- Wrapper Start -->
      <div class="wrapper">
         <!-- Sidebar  -->
         <div class="iq-sidebar">
            <div class="iq-sidebar-logo d-flex justify-content-between">
               <a href="index.php" class="header-logo">
                  
                  <div class="logo-title">
                     <span class="text-primary text-uppercase">goodreads</span>
                  </div>
               </a>
               <div class="iq-menu-bt-sidebar">
                  <div class="iq-menu-bt align-self-center">
                     <div class="wrapper-menu">
                        <div class="main-circle"><i class="las la-bars"></i></div>
                     </div>
                  </div>
               </div>
            </div>
            <div id="sidebar-scrollbar">
               <nav class="iq-sidebar-menu">
                  <ul id="iq-sidebar-toggle" class="iq-menu">
                  <li><a href="admin-dashboard.php
                  "><i class="las la-home iq-arrow-left"></i>Bảng Điều Khiển</a></li>
                     <li><a href="admin-bill.php
                     "><i class="ri-record-circle-line"></i>Đơn Hàng</a></li>
                 
                     <li><a href="admin-user.php
                     "><i class="ri-record-circle-line"></i>Khách Hàng</a></li>
                     <li><a href="admin-books.php
                     "><i class="ri-record-circle-line"></i>Sách</a></li>
                 
                     <li><a href="admin-login.php
                     "><i class="ri-record-circle-line"></i>Đăng Xuất</a></li>
                  </ul>
               </nav>
               <div id="sidebar-bottom" class="p-3 position-relative">
                  <div class="iq-card">
                     <div class="iq-card-body">
                        <div class="sidebarbottom-content">
                           <div class="image"><img src="images/page-img/side-bkg.png" alt=""></div>                           
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- TOP Nav Bar -->
         <div class="iq-top-navbar">
            <div class="iq-navbar-custom">
               <nav class="navbar navbar-expand-lg navbar-light p-0">
                  <div class="iq-menu-bt d-flex align-items-center">
                     <div class="wrapper-menu">
                        <div class="main-circle"><i class="las la-bars"></i></div>
                     </div>
                     <div class="iq-navbar-logo d-flex justify-content-between">
                        <a href="index.php" class="header-logo">
                           <img src="images/logo.png" class="img-fluid rounded-normal" alt="">
                           <div class="logo-title">
                              <span class="text-primary text-uppercase">goodreads</span>
                           </div>
                        </a>
                     </div>
                  </div>
                  <div class="navbar-breadcrumb">
                     <h5 class="mb-0">Hóa Đơn</h5>
                     <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                           <li class="breadcrumb-item"><a href="index.php">Admin</a></li>
                           <li class="breadcrumb-item active" aria-current="page">Hóa Đơn</li>
                        </ul>
                     </nav>
                  </div>
                  <div class="iq-search-bar">
                     <form action="#" class="searchbox">
                        <input type="text" class="text search-input" placeholder="Tìm kiếm sản phẩm...">
                        <a class="search-link" href="#"><i class="ri-search-line"></i></a>
                     </form>
                  </div>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"  aria-label="Toggle navigation">
                  <i class="ri-menu-3-line"></i>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav ml-auto navbar-list">
                        <li class="nav-item nav-icon search-content">
                           <a href="#" class="search-toggle iq-waves-effect text-gray rounded">
                              <i class="ri-search-line"></i>
                           </a>
                           <form action="#" class="search-box p-0">
                              <input type="text" class="text search-input" placeholder="Type here to search...">
                              <a class="search-link" href="#"><i class="ri-search-line"></i></a>
                           </form>
                        </li>
                        
                 
                     </ul>
                  </div>
               </nav>
            </div>
         </div>
         <!-- TOP Nav Bar END -->
         <!-- Page Content  -->
         <div id="content-page" class="content-page">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-sm-12">


                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Danh sách hóa đơn</h4>
                           </div>
                           <!-- <div class="iq-card-header-toolbar d-flex align-items-center">
                              <a href="admin-add-book.php" class="btn btn-primary">Thêm sách</a>
                           </div> -->
                        </div>
                        <div class="iq-card-body">
                        <form method="get">
                        <style>
                select {
            width: 150px; /* Độ rộng */
            height: 30px; /* Chiều cao */
            padding: 5px; /* Khoảng cách nội dung trong select */
            font-size: 14px; /* Cỡ chữ */
        }
        button{
         border-radius:8px ;
        }
        .mb-3-1{
         margin-left: 20px;
        }
                </style>
        <label for="start_date"></label>
        <input type="date" id="start_date" name="start_date">

        <label for="end_date">Đến ngày:</label>
        <input type="date" id="end_date" name="end_date">

        <label for="status"></label>
        <select id="status" name="status">
            <option value="">Tình trạng</option>
            <option value="Chưa xác nhận">Chưa xác nhận</option>
            <option value="Đã Xác nhận">Đã xác nhận</option>
            <option value="Đã giao">Đã giao</option>
            <option value="Đã hủy">Hủy đơn</option>
        </select>
    
        <select class="form-select form-select-sm mb-3-1" id="city" name="city" aria-label=".form-select-sm" >
                    <option value="" selected>Chọn tỉnh thành</option >
                </select>
                <select class="form-select form-select-sm mb-3" id="district" name="district" aria-label=".form-select-sm">
                    <option value="" selected>Chọn quận huyện</option>
                </select>
                <select class="form-select form-select-sm" id="ward" name="ward" aria-label=".form-select-sm">
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
        <button type="submit">Lọc</button>
    </form>
                           <div class="table-responsive">
                              <table class="data-tables table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 8%;">Mã hóa đơn</th>
                                        <th style="width: 15%;">Tên người nhận</th>
                                        <th style="width: 15%;">Thành phố</th>
                                        <th style="width: 15%;">Quận</th>
                                        <th style="width: 12%;">Tổng tiền</th>
                                        <th style="width: 10%;">Ngày đặt</th>
                          
                                        <th style="width: 10%;">Ngày giao</th>
                                        <th style="width: 5%;">Tình trạng</th>
                                        <th style="width: 8%;">Xem</th>
                                        <th style="width: 15%;">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                           
                                <?php
require_once 'db/dbhelper.php'; // Include database helper functions

// Xử lý dữ liệu ngày bắt đầu và kết thúc được gửi từ form
// Xử lý dữ liệu ngày bắt đầu và kết thúc được gửi từ form
$start_date = $_GET['start_date'] ?? '';
$end_date = $_GET['end_date'] ?? '';

// Chuyển đổi định dạng ngày tháng từ yyyy-mm-dd sang dd-mm-yyyy (nếu có dữ liệu)
if (!empty($start_date)) {
    $start_date = date('d-m-Y', strtotime($start_date));
}

if (!empty($end_date)) {
    $end_date = date('d-m-Y', strtotime($end_date));
}

$status_filter = $_GET['status'] ?? ''; // Lấy giá trị filter theo Tinh_Trang
$city_filter = $_GET['city'] ?? ''; // Lấy giá trị filter theo Tinh/Thanh pho
$district_filter = $_GET['district'] ?? ''; // Lấy giá trị filter theo Quan/Huyen
$ward_filter = $_GET['ward'] ?? ''; // Lấy giá trị filter theo Xa/Phuong

// Đảm bảo thực hiện truy vấn an toàn bằng cách sử dụng prepared statements
$query = "SELECT * FROM hoa_don WHERE 1"; // Bắt đầu từ WHERE 1 để có thể thêm điều kiện nếu có

// Thêm điều kiện ngày nếu được cung cấp
if (!empty($start_date) && !empty($end_date)) {
    $query .= " AND Ngay_GH BETWEEN '$start_date' AND '$end_date'";
}

// Thêm điều kiện lọc theo Tinh_Trang nếu được chọn
if (!empty($status_filter)) {
    $query .= " AND Tinh_Trang = '$status_filter'";
}

// Thêm điều kiện lọc theo Tinh/Thanh pho nếu được chọn
if (!empty($city_filter)) {
    $cityName = getCityNameById($city_filter);
    if (!empty($cityName)) {
        $query .= " AND Thanh_Pho = '$cityName'";
    }
}

// Thêm điều kiện lọc theo Quan/Huyen nếu được chọn
if (!empty($district_filter)) {
    $districtName = getDistrictNameById($district_filter);
    if (!empty($districtName)) {
        $query .= " AND Quan = '$districtName'";
    }
}

// Thêm điều kiện lọc theo Xa/Phuong nếu được chọn
if (!empty($ward_filter)) {
    $wardName = getWardNameById($ward_filter);
    if (!empty($wardName)) {
        $query .= " AND Xa = '$wardName'";
    }
}

// Thực hiện truy vấn
$result = executeResult($query);

// Hiển thị dữ liệu theo kết quả từ truy vấn
foreach ($result as $row) {
    $maHD = $row['Ma_HD']; 
    $ten = $row['Ten_Nguoi_Nhan_Hang'];
    $thanhpho = $row['Thanh_Pho'];
    $quan = $row['Quan'];
    $tongTien = number_format($row['Tong_Tien'], 0, ',', '.'); // Format total amount
    $ngayDH = $row['Ngay_DH'];
    $ngayGH = $row['Ngay_GH'];
    $tinhTrang = $row['Tinh_Trang'];
    $xacnhan = $row['Ngay_XN'];

    echo '<tr>';
    echo '<td>' . htmlspecialchars($maHD) . '</td>'; // Mã hóa đơn
    echo '<td>' . htmlspecialchars($ten) . '</td>'; 
    echo '<td>' . htmlspecialchars($thanhpho) . '</td>'; 
    echo '<td>' . htmlspecialchars($quan) . '</td>'; 
    echo '<td>' . htmlspecialchars($tongTien) . '</td>'; // Tổng tiền
    echo '<td>' . htmlspecialchars($ngayDH) . '</td>'; // Ngày đặt hàng
 
    echo '<td>' . htmlspecialchars($ngayGH) . '</td>'; // Ngày giao hàng
    echo '<td>' . htmlspecialchars($tinhTrang) . '</td>'; // Tình trạng

    echo '<td>';
    echo '<a href="detail-bill.php?maHD=' . urlencode($maHD) . '" class="detail-btn" data-toggle="modal" data-target="#detailModal">Chi tiết</a>';
    echo '</td>';

    echo '<td>'; // Cột điều khiển
    if ($tinhTrang === 'Chưa xác nhận') {
        echo '<button class="confirm-btn" data-maHD="' . htmlspecialchars($maHD) . '">Xác nhận</button>';
    } else if ($tinhTrang === 'Đã xác nhận') {
        echo '<button class="success-btn" data-maHD="' . htmlspecialchars($maHD) . '">Đã giao</button>';
        echo '<button class="cancel-btn" data-maHD="' . htmlspecialchars($maHD) . '">Hủy đơn</button>';
    }
    echo '</td>';
    echo '</tr>';
}

// Các hàm lấy tên của thành phố, quận/huyện, phường/xã từ id
function getCityNameById($cityId) {
    $data = getDataFromJson(); // Lấy dữ liệu từ JSON
    foreach ($data as $city) {
        if ($city['Id'] === $cityId) {
            return $city['Name'];
        }
    }
    return ''; // Trả về chuỗi rỗng nếu không tìm thấy
}

function getDistrictNameById($districtId) {
    $data = getDataFromJson(); // Lấy dữ liệu từ JSON
    foreach ($data as $city) {
        foreach ($city['Districts'] as $district) {
            if ($district['Id'] === $districtId) {
                return $district['Name'];
            }
        }
    }
    return ''; // Trả về chuỗi rỗng nếu không tìm thấy
}

function getWardNameById($wardId) {
    $data = getDataFromJson(); // Lấy dữ liệu từ JSON
    foreach ($data as $city) {
        foreach ($city['Districts'] as $district) {
            foreach ($district['Wards'] as $ward) {
                if ($ward['Id'] === $wardId) {
                    return $ward['Name'];
                }
            }
        }
    }
    return ''; // Trả về chuỗi rỗng nếu không tìm thấy
}

// Hàm để lấy dữ liệu từ tập dữ liệu JSON
function getDataFromJson() {
    $jsonData = file_get_contents('js/locations.json');
    return json_decode($jsonData, true);
}
?>






<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
$(document).ready(function() {
    $('.confirm-btn').click(function() {
        var maHD = $(this).attr('data-maHD'); // Lấy mã hóa đơn từ thuộc tính data-maHD của nút
        
        // Gửi yêu cầu AJAX để cập nhật trạng thái đã giao
        $.ajax({
            type: 'POST',
            url: 'update_status.php',
            data: { maHD: maHD, tinhTrang: 'Đã xác nhận' },
            success: function(response) {
                // Xử lý phản hồi từ server nếu cần
                console.log(response); // In phản hồi ra console (có thể xử lý tiếp theo ở đây)
                location.reload();
                // Hiển thị thông báo đã giao (div-da-giao)
                $('#div-da-giao-' + maHD).show();
            },
            error: function(xhr, status, error) {
                console.error(error); // Xử lý lỗi nếu có
            }
        });
    });

    $('.success-btn').click(function() {
        var maHD = $(this).attr('data-maHD'); // Lấy mã hóa đơn từ thuộc tính data-maHD của nút
        
        // Gửi yêu cầu AJAX để cập nhật trạng thái đã giao
        $.ajax({
            type: 'POST',
            url: 'update_status_GH.php',
            data: { maHD: maHD, tinhTrang: 'Đã giao' },
            success: function(response) {
                // Xử lý phản hồi từ server nếu cần
                console.log(response); // In phản hồi ra console (có thể xử lý tiếp theo ở đây)
                location.reload();
                // Hiển thị thông báo đã giao (div-da-giao)
                $('#div-da-giao-' + maHD).show();
            },
            error: function(xhr, status, error) {
                console.error(error); // Xử lý lỗi nếu có
            }
        });
    });

    $('.cancel-btn').click(function() {
        var maHD = $(this).attr('data-maHD'); // Lấy mã hóa đơn từ thuộc tính data-maHD của nút
        
        // Gửi yêu cầu AJAX để cập nhật trạng thái đã hủy
        $.ajax({
            type: 'POST',
            url: 'update_status.php',
            data: { maHD: maHD, tinhTrang: 'Đã hủy' },
            success: function(response) {
                // Xử lý phản hồi từ server nếu cần
                console.log(response); // In phản hồi ra console (có thể xử lý tiếp theo ở đây)
                location.reload();
                // Hiển thị thông báo đã hủy (div-da-huy)
                $('#div-da-huy-' + maHD).show();
            },
            error: function(xhr, status, error) {
                console.error(error); // Xử lý lỗi nếu có
            }
        });
    });
});
</script>








<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Đợi tài liệu HTML được tải hoàn chỉnh trước khi gắn các sự kiện
    document.addEventListener("DOMContentLoaded", function() {
        // Lắng nghe sự kiện click trên các phần tử có class là 'detail-btn'
        const detailButtons = document.querySelectorAll('.detail-btn');
        detailButtons.forEach(function(button) {
            button.addEventListener('click', function(event) {
                // Ngăn chặn hành vi mặc định của thẻ <a> (chuyển hướng)
                event.preventDefault();
                // Lấy giá trị của thuộc tính 'href' của thẻ <a>
                const url = button.getAttribute('href');
                // Chuyển hướng người dùng đến URL đã lấy được
                window.location.href = url;
            });
        });
    });
</script>


      
                                </tbody>
                            </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Wrapper END -->
      <!-- Footer -->
      <footer class="iq-footer">
         <div class="container-fluid">
            <div class="row">
               <div class="col-lg-6">
                  <ul class="list-inline mb-0">
                     <li class="list-inline-item"><a href="privacy-policy.php">Chính sách bảo mật</a></li>
                     <li class="list-inline-item"><a href="terms-of-service.php">Điều khoản sử dụng</a></li>
                  </ul>
               </div>
            </div>
         </div>
      </footer>
      <!-- Footer END -->
      <!-- color-customizer -->
      <!-- color-customizer END -->
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/jquery.dataTables.min.js"></script>
      <script src="js/dataTables.bootstrap4.min.js"></script>
      <!-- Appear JavaScript -->
      <script src="js/jquery.appear.js"></script>
      <!-- Countdown JavaScript -->
      <script src="js/countdown.min.js"></script>
      <!-- Counterup JavaScript -->
      <script src="js/waypoints.min.js"></script>
      <script src="js/jquery.counterup.min.js"></script>
      <!-- Wow JavaScript -->
      <script src="js/wow.min.js"></script>
      <!-- Apexcharts JavaScript -->
      <script src="js/apexcharts.js"></script>
      <!-- Slick JavaScript -->
      <script src="js/slick.min.js"></script>
      <!-- Select2 JavaScript -->
      <script src="js/select2.min.js"></script>
      <!-- Owl Carousel JavaScript -->
      <script src="js/owl.carousel.min.js"></script>
      <!-- Magnific Popup JavaScript -->
      <script src="js/jquery.magnific-popup.min.js"></script>
      <!-- Smooth Scrollbar JavaScript -->
      <script src="js/smooth-scrollbar.js"></script>
      <!-- lottie JavaScript -->
      <script src="js/lottie.js"></script>
      <!-- am core JavaScript -->
      <script src="js/core.js"></script>
      <!-- am charts JavaScript -->
      <script src="js/charts.js"></script>
      <!-- am animated JavaScript -->
      <script src="js/animated.js"></script>
      <!-- am kelly JavaScript -->
      <script src="js/kelly.js"></script>
      <!-- am maps JavaScript -->
      <script src="js/maps.js"></script>
      <!-- am worldLow JavaScript -->
      <script src="js/worldLow.js"></script>
      <!-- Raphael-min JavaScript -->
      <script src="js/raphael-min.js"></script>
      <!-- Morris JavaScript -->
      <script src="js/morris.js"></script>
      <!-- Morris min JavaScript -->
      <script src="js/morris.min.js"></script>
      <!-- Flatpicker Js -->
      <script src="js/flatpickr.js"></script>
      <!-- Style Customizer -->
      <script src="js/style-customizer.js"></script>
      <!-- Chart Custom JavaScript -->
      <script src="js/chart-custom.js"></script>
      <!-- Custom JavaScript -->
      <script src="js/custom.js"></script>
   </body>
</php>