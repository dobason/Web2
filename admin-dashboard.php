<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Admin Dashboard - goodreads</title>
      <!-- Favicon -->
      <link rel="shortcut icon" href="images/favicon.ico" />
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
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
         $result = Database::getAllRows('khach_hang');
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
                  <img src="" class="img-fluid rounded-normal" alt="">
                  <div class="logo-title">
                     <span  class="text-primary text-uppercase">goodreads</span>
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
                     <li><a href="admin-dashboard.php"><i class="las la-home iq-arrow-left"></i>Bảng Điều Khiển</a></li>
                     <li><a href="admin-bill.php"><i class="ri-record-circle-line"></i>Đơn Hàng</a></li>
                     <li><a href="admin-user.php"><i class="ri-record-circle-line"></i>Khách Hàng</a></li>
                     <li><a href="admin-books.php"><i class="ri-record-circle-line"></i>Sách</a></li>
                     <li><a href="admin-category.php"><i class="ri-record-circle-line"></i>Thể Loại Sách</a></li>
                     <li><a href="admin-login.php"><i class="ri-record-circle-line"></i>Đăng Xuất</a></li>
                  </ul>
               </nav>
               <div id="sidebar-bottom" class="p-3 position-relative">
                  <div class="iq-card">
                     <div class="iq-card-body">
                        <div class="sidebarbottom-content">
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
                        <a href="index.html" class="header-logo">
                           <img src="images/logo.png" class="img-fluid rounded-normal" alt="">
                           <div class="logo-title">
                              <span class="text-primary text-uppercase">goodreads</span>
                           </div>
                        </a>
                     </div>
                  </div>
                  <div class="navbar-breadcrumb">
                     <h5 class="mb-0">Trang Chủ</h5>
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
                        
                       
                        <li class="line-height pt-3">
                           <a href="#" class="search-toggle iq-waves-effect d-flex align-items-center">
                              <img src="IMG/user.png" class="img-fluid rounded-circle mr-3" alt="user">
                              <div class="caption">
                                 <h6 class="mb-1 line-height">Admin</h6>
                                 <p class="mb-0 text-primary">Tài Khoản</p>
                              </div>
                           </a>
                           <div class="iq-sub-dropdown iq-user-dropdown">
                              <div class="iq-card shadow-none m-0">
                                 <div class="iq-card-body p-0 ">
                                    <div class="bg-primary p-3">
                                       <h5 class="mb-0 text-white line-height">Xin Chào Admin</h5>
                                    </div>
                                    <a href="profile.php" class="iq-sub-card iq-bg-primary-hover">
                                       <div class="media align-items-center">
                                          <div class="rounded iq-card-icon iq-bg-primary">
                                             <i class="ri-file-user-line"></i>
                                          </div>
                                          <div class="media-body ml-3">
                                             <h6 class="mb-0 ">Tài khoản của tôi</h6>
                                          </div>
                                       </div>
                                    </a>
                                    <a href="profile-edit.html" class="iq-sub-card iq-bg-primary-hover">
                                       <div class="media align-items-center">
                                          <div class="rounded iq-card-icon iq-bg-primary">
                                             <i class="ri-profile-line"></i>
                                          </div>
                                          <div class="media-body ml-3">
                                             <h6 class="mb-0 ">Sổ địa chỉ</h6>
                                          </div>
                                       </div>
                                    </a>
                                    <a href="account-setting.html" class="iq-sub-card iq-bg-primary-hover">
                                       <div class="media align-items-center">
                                          <div class="rounded iq-card-icon iq-bg-primary">
                                             <i class="ri-account-box-line"></i>
                                          </div>
                                          <div class="media-body ml-3">
                                             <h6 class="mb-0 ">Đơn hàng của tôi</h6>
                                          </div>
                                       </div>
                                    </a>
                                    <a href="wishlist.html" class="iq-sub-card iq-bg-primary-hover">
                                       <div class="media align-items-center">
                                          <div class="rounded iq-card-icon iq-bg-primary">
                                             <i class="ri-heart-line"></i>
                                          </div>
                                          <div class="media-body ml-3">
                                             <h6 class="mb-0 ">Yêu Thích</h6>
                                          </div>
                                       </div>
                                    </a>
                                    <div class="d-inline-block w-100 text-center p-3">
                                       <a class="bg-primary iq-sign-btn" href="admin-login.php" role="button">Đăng xuất<i class="ri-login-box-line ml-2"></i></a>
   
                                    </div>
                                 </div>
                              </div>
                           </div>
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
                  <div class="col-md-6 col-lg-3">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-body">
                           <div class="d-flex align-items-center">
                              <div class="rounded-circle iq-card-icon bg-primary"><i class="ri-user-line"></i></div>
                              <div class="text-left ml-3">                                 
                                 <h2 class="mb-0"><span class="counter">100</span></h2>
                                 <h5 class="">Người dùng</h5>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6 col-lg-3">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-body">
                           <div class="d-flex align-items-center">
                              <div class="rounded-circle iq-card-icon bg-danger"><i class="ri-book-line"></i></div>
                              <div class="text-left ml-3">                                 
                                 <h2 class="mb-0"><span class="counter">10</span></h2>
                                 <h5 class="">Sách</h5>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6 col-lg-3">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-body">
                           <div class="d-flex align-items-center">
                              <div class="rounded-circle iq-card-icon bg-warning"><i class="ri-shopping-cart-2-line"></i></div>
                              <div class="text-left ml-3">                                 
                                 <h2 class="mb-0"><span class="counter">100</span></h2>
                                 <h5 class="">Đơn Hàng</h5>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6 col-lg-3">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-body">
                           <div class="d-flex align-items-center">
                              <div class="rounded-circle iq-card-icon bg-info"><i class="ri-radar-line"></i></div>
                              <div class="text-left ml-3">                                 
                                 <h2 class="mb-0"><span class="counter">69</span></h2>
                                 <h5 class="">Chờ Duyệt</h5>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-12">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">5 khách hàng có tổng tiền hàng mua cao nhất</h4>
                           </div>
                           <div class="iq-card-header-toolbar d-flex align-items-center">
                              <div class="dropdown">
                                 <span class="dropdown-toggle text-primary" id="dropdownMenuButton5" data-toggle="dropdown">
                                 <i class="ri-more-fill"></i>
                                 </span>
                                 <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton5">
                                    <a class="dropdown-item" href="#"><i class="ri-eye-fill mr-2"></i>Xem</a>
                                    <a class="dropdown-item" href="#"><i class="ri-delete-bin-6-fill mr-2"></i>Xoá</a>
                                    <a class="dropdown-item" href="#"><i class="ri-pencil-fill mr-2"></i>Sửa</a>
                                    <a class="dropdown-item" href="#"><i class="ri-printer-fill mr-2"></i>In</a>
                                    <a class="dropdown-item" href="#"><i class="ri-file-download-fill mr-2"></i>Tải xuống</a>
                                 </div>
                              </div>
                           </div>
                        </div>

                       
                        <div class="iq-card-body">
                           <div class="table-responsive">
                              <table class="table mb-0 table-borderless">
                                 <thead>
                                    <tr>
                                       <th scope="col">Mã khách hàng</th>
                                       <th scope="col">Họ và tên</th>
                                       <th scope="col">Tổng tiền</th>
                                       <th scope="col">Tình trạng</th>
                                       <th scope="col">Lịch sử mua hàng</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 <?php

require_once 'db/dbhelper.php';
// Thực hiện kết nối đến cơ sở dữ liệu và các biến khác
$conn = openDatabaseConnection();

// Thực hiện truy vấn SQL để cập nhật thông tin khách hàng
$start_date = $_GET['start_date'] ?? '';
$end_date = $_GET['end_date'] ?? '';
if (!empty($start_date) && !empty($end_date)) {
    // Truy vấn SQL UPDATE
    $query_update = "UPDATE khach_hang kh
                        JOIN (
                            SELECT kh.Ma_KH,
                                   SUM(CASE WHEN hd.Tinh_Trang = 'Đã giao' THEN 1 ELSE 0 END) AS So_Hoa_Don_Da_Giao,
                                   SUM(CASE WHEN hd.Tinh_Trang = 'Đã giao' THEN hd.Tong_HD ELSE 0 END) AS Tong_Tien_Tat_Ca
                            FROM khach_hang kh
                            LEFT JOIN hoa_don hd ON kh.Ma_KH = hd.Ma_KH AND hd.Tinh_Trang = 'Đã giao' AND hd.Ngay_XN BETWEEN '$start_date' AND '$end_date'
                            WHERE kh.Trang_Thai = 1
                            GROUP BY kh.Ma_KH
                        ) AS temp ON kh.Ma_KH = temp.Ma_KH
                    SET kh.So_Luong = temp.So_Hoa_Don_Da_Giao,
                        kh.Tong_HD = temp.Tong_Tien_Tat_Ca;";
    
    // Thực hiện truy vấn UPDATE
    $update_result = mysqli_query($conn, $query_update);

    if (!$update_result) {
        echo "Đã có lỗi xảy ra trong quá trình cập nhật thông tin khách hàng.";
        mysqli_close($conn);
        exit; // Thoát khỏi mã nếu có lỗi cập nhật
    }
}

// Truy vấn SQL để lấy ra 5 khách hàng có tổng tiền mua hàng cao nhất
$query_top_customers = "SELECT kh.Ma_KH,
                               kh.Ten_KH,
                               kh.Tong_HD,
                               kh.Trang_Thai
                        FROM khach_hang kh
                        WHERE kh.Trang_Thai = '1'
                        ORDER BY kh.Tong_HD DESC
                        LIMIT 5;";

$result_top_customers = mysqli_query($conn, $query_top_customers);

if ($result_top_customers) {
   // Hiển thị dữ liệu trong bảng
   while ($row = mysqli_fetch_assoc($result_top_customers)) {
       // Lấy thông tin khách hàng
       $maKH = $row['Ma_KH'];
       $customerName = $row['Ten_KH'];
       $total = number_format(floatval($row['Tong_HD']), 0, ',', '.'); // Ép kiểu thành số thực trước khi format
       $status = $row['Trang_Thai'];

       // Kiểm tra Trang_Thai để hiển thị cụ thể
       $statusText = ($status == 0) ? 'Không hoạt động' : 'Hoạt động';

       // Tạo liên kết cho cột "Lịch sử mua hàng"
       $historyLink = "bill-customer.php?Ma_KH={$maKH}";

       // Hiển thị thông tin khách hàng trong bảng
       echo "
           <tr>
               <td>{$maKH}</td>
               <td>{$customerName}</td>
               <td>{$total}</td>
               <td>{$statusText}</td>
               <td>
                   <div class='flex align-items-center list-user-action'>
                       <a href='{$historyLink}' class='bg-primary' data-toggle='tooltip' data-placement='top' title='Lịch sử mua hàng'>
                           <i class='ri-file-text-line'></i>
                       </a>
                   </div>
               </td>
           </tr>
       ";
   }
} else {
   echo "Đã có lỗi xảy ra trong quá trình truy vấn thông tin khách hàng.";
}


// Đóng kết nối cơ sở dữ liệu
mysqli_close($conn);
?>

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
                     <li class="list-inline-item"><a href="privacy-policy.html">Chính sách</a></li>
                     <li class="list-inline-item"><a href="terms-of-service.html">Điều khoản</a></li>
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
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-labels"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var ctx = document.getElementById('myPieChart').getContext('2d');
        var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Văn học', 'Truyện tranh', 'SGK'],
                datasets: [{
                    data: [30, 50, 20],
                    backgroundColor: [
                        '#ff6384',
                        '#36a2eb',
                        '#ffce56'
                    ],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    labels: {
                        render: 'percentage',
                        precision: 0,
                        fontSize: 14,
                        fontColor: '#fff',
                        fontStyle: 'bold'
                    }
                }
            }
        });
    });
</script>

   </body>
</html>