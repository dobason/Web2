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
                     <li><a href="admin-category.php
                     "><i class="ri-record-circle-line"></i>Thể Loại Sách</a></li>
                     <li><a href="dangnhap.php
                     "><i class="ri-record-circle-line"></i>Đăng Xuất</a></li>
                  </ul>
               </nav>
               <div id="sidebar-bottom" class="p-3 position-relative">
                  <div class="iq-card">
                     <div class="iq-card-body">
                        <div class="sidebarbottom-content">
                           <div class="image"><img src="images/page-img/side-bkg.png" alt=""></div>                           
                           <button type="submit" class="btn w-100 btn-primary mt-4 view-more">goodreads</button>
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
                                       <h5 class="mb-0 text-white line-height">Admin</h5>
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
                                    <a href="profile-edit.php" class="iq-sub-card iq-bg-primary-hover">
                                       <div class="media align-items-center">
                                          <div class="rounded iq-card-icon iq-bg-primary">
                                             <i class="ri-profile-line"></i>
                                          </div>
                                          <div class="media-body ml-3">
                                             <h6 class="mb-0 ">Sổ địa chỉ</h6>
                                          </div>
                                       </div>
                                    </a>
                                    <a href="account-setting.php" class="iq-sub-card iq-bg-primary-hover">
                                       <div class="media align-items-center">
                                          <div class="rounded iq-card-icon iq-bg-primary">
                                             <i class="ri-account-box-line"></i>
                                          </div>
                                          <div class="media-body ml-3">
                                             <h6 class="mb-0 ">Đơn hàng của tôi</h6>
                                          </div>
                                       </div>
                                    </a>
                                    <a href="wishlist.php" class="iq-sub-card iq-bg-primary-hover">
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
                                       <a class="bg-primary iq-sign-btn" href="sign-in.php" role="button">Sign out<i class="ri-login-box-line ml-2"></i></a>
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
                           <div class="table-responsive">
                              <table class="data-tables table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 8%;">Mã hóa đơn</th>
                                        <th style="width: 15%;">Tên người nhận</th>
                                        <th style="width: 15%;">Địa chỉ</th>
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

// Retrieve invoice data from the database (assuming $result is fetched elsewhere)
foreach ($result as $key => $row) {
    $maHD = $row['MaHD']; 
    $ten = $row['Ten_Nguoi_Nhan_Hang'];
    $soluong = $row['Dia_Chi_Nhan_Hang'];
    $tongTien = number_format($row['Tong_Tien'], 0, ',', '.'); // Format total amount
    $ngayDH = $row['Ngay_DH'];
    $ngayGH = $row['Ngay_GH'];
    $tinhTrang = $row['Tinh_Trang'];

    echo '<tr>';
    echo '<td>' . $maHD . '</td>'; // Mã hóa đơn
    echo '<td>' . $ten . '</td>'; 
    echo '<td>' . $soluong . '</td>'; 
    echo '<td>' . $tongTien . '</td>'; // Tổng tiền
    echo '<td>' . $ngayDH . '</td>'; // Ngày đặt hàng
    echo '<td>' . $ngayGH . '</td>'; // Ngày giao hàng
    echo '<td>' . $tinhTrang . '</td>'; // Tình trạng

    echo '<td>';
    echo '<a href="bill-customer.php?maHD=' . $maHD . '" class="detail-btn" data-toggle="modal" data-target="#detailModal">Chi tiết</a>';
    echo '</td>';

    echo '<td>'; // Cột điều khiển
    if ($tinhTrang === '0') {
        echo '<button class="confirm-btn" data-maHD="' . $maHD . '">Xác nhận</button>';
    } else if ($tinhTrang === 'Đã xác nhận') {
        echo '<button class="success-btn" data-maHD="' . $maHD . '">Đã giao</button>';
        echo '<button class="cancel-btn" data-maHD="' . $maHD . '">Hủy đơn</button>';
      
    }
    echo '</td>';
    echo '</tr>';
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
            url: 'update_status.php',
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