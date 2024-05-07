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
                  <img src="images/logo.png" class="img-fluid rounded-normal" alt="">
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
                     <li><a href="admin-invoice-details.php
                     "><i class="ri-record-circle-line"></i>Chi Tiết Hóa Đơn</a></li>
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
                        <a href="index.html" class="header-logo">
                           <img src="images/logo.png" class="img-fluid rounded-normal" alt="">
                           <div class="logo-title">
                              <span class="text-primary text-uppercase">goodreads</span>
                           </div>
                        </a>
                     </div>
                  </div>
                  <div class="navbar-breadcrumb">
                     <h5 class="mb-0">Khách Hàng</h5>
                     <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                           <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
                           <li class="breadcrumb-item active" aria-current="page">Khách Hàng</li>
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
                                    <a href="profile.html" class="iq-sub-card iq-bg-primary-hover">
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
                                       <a class="bg-primary iq-sign-btn" href="sign-in.html" role="button">Sign out<i class="ri-login-box-line ml-2"></i></a>
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
                              <h4 class="card-title">Danh sách khách hàng</h4>
                           </div>
                           <div class="iq-card-header-toolbar d-flex align-items-center">
                           <a href="#" id="addBookButton" class="btn btn-primary">Thêm khách hàng</a>


                           <div class="modal fade" id="addCustomerModal" tabindex="-1" role="dialog" aria-labelledby="addCustomerModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCustomerModalLabel">Thêm Khách Hàng</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addCustomerForm" action="process_add_customer.php" method="post">
                    <div class="form-group">
                        <label for="name">Họ Tên:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="account">Tài Khoản:</label>
                        <input type="text" class="form-control" id="account" name="account" required>
                    </div>
                    <div class="form-group">
                        <label for="pass">Mật Khẩu:</label>
                        <input type="password" class="form-control" id="pass" name="pass" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal sửa thông tin khách hàng -->
<div class="modal fade" id="editCustomerModal" tabindex="-1" role="dialog" aria-labelledby="editCustomerModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCustomerModalLabel">Sửa Thông Tin Khách Hàng</h5>
               
            </div>
            <div class="modal-body">
            <form id="editCustomerForm" action="edit-customer.php" method="post">
    <input type="hidden" name="customerId" id="customerId">
    <div class="form-group">
        <label for="editName">Họ Tên:</label>
        <input type="text" class="form-control" id="editName" name="editName" required>
    </div>
    <div class="form-group">
        <label for="editAccount">Tài Khoản:</label>
        <input type="text" class="form-control" id="editAccount" name="editAccount" required>
    </div>
    <div class="form-group">
        <label for="editPassword">Mật Khẩu:</label>
        <input type="password" class="form-control" id="editPassword" name="editPassword" required>
    </div>
    <button type="submit" class="btn btn-primary">Lưu</button>
</form>

            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
// Hàm mở modal chỉnh sửa thông tin khách hàng
function openEditModal(customerId) {
      // Đặt giá trị customerId cho input hidden trong form modal
      document.getElementById('customerId').value = customerId;

// Gọi modal thông qua id của modal
$('#editCustomerModal').modal('show');
    // Đặt giá trị customerId cho input hidden trong form modal
    document.getElementById('customerId').value = customerId;

    // Gọi AJAX để lấy thông tin khách hàng từ server
    $.ajax({
        url: 'get-customer-info.php',
        type: 'POST',
        data: { customerId: customerId },
        dataType: 'json', // Kiểu dữ liệu nhận được từ server
        success: function(response) {
            // Cập nhật các trường input trong modal với thông tin từ server
            document.getElementById('editName').value = response.name;
            document.getElementById('editAccount').value = response.account;
            // Không nên đặt mật khẩu trên form khi hiển thị lên modal
            // document.getElementById('editPassword').value = response.password;

        
        },
        error: function(xhr, status, error) {
            console.error('Error fetching customer information:', error);
            // Xử lý lỗi nếu có
        }
    });
}

    
</script>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <div class="table-responsive">
                              <table class="data-tables table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                    <th style="width: 1%;">Mã khách hàng</th>
                                    <th style="width: 10%;">Họ và tên</th>
                                    <th style="width: 15%;">Tài khoản</th>
                                    <th style="width: 5%;">Mật Khẩu</th>
                                    <th style="width: 5%;">Địa chỉ</th>
                                    <th style="width: 5%;">Phường</th>
                                    <th style="width: 5%;">Quận</th>
                                    <th style="width: 5%;">Thành phố</th>
                                    <th style="width: 1%;">Tình trạng</th>
                                    <th style="width: 26%;">Hoạt động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
foreach ($result as $key => $row) {
    $customerId = $row['Ma_KH'];
    $customerName = $row['Ten_KH'];
    $account = $row['Tai_Khoan'];
    $password = $row['Mat_Khau'];
    $diachi = $row['Dia_Chi'];
    $thanhPho = $row['Thanh_Pho'];
    $quan = $row['Quan'];
    $phuong = $row['Phuong'];
    $status = $row['Trang_Thai'];

    echo "
        <tr>
            <td>{$customerId}</td>
            <td>{$customerName}</td>
            <td>{$account}</td>
            <td>{$password}</td>
            <td>{$diachi}</td>
            <td>{$thanhPho}</td>
            <td>{$quan}</td>
            <td>{$phuong}</td>
            <td>{$status}</td>
            <td>
                <div class='flex align-items-center list-user-action'>
                
                <a href='#' class='edit-customer-link bg-primary' onclick='openEditModal({$customerId})' data-toggle='tooltip' data-placement='top' title='Chỉnh sửa'>
                <i class='ri-pencil-line'></i>
                  
                    <a href='#' class='bg-primary' onclick='confirmLockUser({$customerId}, \"{$customerName}\")' data-toggle='tooltip' data-placement='top' title='Khóa'>
                        <i class='ri-delete-bin-line'></i>
                    </a>
                 
                    <a href='#' class='bg-primary' onclick='confirmunLockUser({$customerId}, \"{$customerName}\")' data-toggle='tooltip' data-placement='top' title='Mở khóa'>
                        <i class='ri-lock-line'></i>
                    </a>
                </div>
            </td>
        </tr>
    ";
}
?>


<script>
// Hàm xác nhận khóa người dùng
function confirmLockUser(customerId, customerName) {
    // Hiển thị hộp thoại xác nhận
    var confirmMessage = `Bạn có chắc chắn muốn khóa người dùng "${customerName}"?`;
    if (confirm(confirmMessage)) {
        // Nếu người dùng xác nhận, gọi AJAX để khóa người dùng
        lockUser(customerId);
    }
}

// Hàm gọi AJAX để khóa người dùng
function lockUser(customerId) {
    $.ajax({
        url: 'lock-user.php',
        method: 'POST',
        data: { customer_id: customerId },
        success: function(response) {
            // Xử lý khi khóa người dùng thành công
            console.log('Khóa người dùng thành công');
            // Có thể thực hiện các hành động khác sau khi khóa người dùng thành công
            // Ví dụ: làm mới trang để cập nhật danh sách khách hàng
            location.reload(); // Làm mới trang sau khi khóa người dùng
        },
        error: function(xhr, status, error) {
            // Xử lý khi có lỗi xảy ra trong quá trình khóa người dùng
            console.error('Đã xảy ra lỗi khi khóa người dùng:', error);
            alert('Đã xảy ra lỗi khi khóa người dùng. Vui lòng thử lại.');
        }
    });
}
</script>


<script>
// Hàm xác nhận khóa người dùng
function confirmunLockUser(customerId, customerName) {
    // Hiển thị hộp thoại xác nhận
    var confirmMessage = `Bạn có muốn mở khóa người dùng "${customerName}"?`;
    if (confirm(confirmMessage)) {
        // Nếu người dùng xác nhận, gọi AJAX để khóa người dùng
        unlockUser(customerId);
    }
}

// Hàm gọi AJAX để khóa người dùng
function unlockUser(customerId) {
    $.ajax({
        url: 'unlock-user.php',
        method: 'POST',
        data: { customer_id: customerId },
        success: function(response) {
            // Xử lý khi khóa người dùng thành công
            console.log('Mở hóa người dùng thành công');
            // Có thể thực hiện các hành động khác sau khi khóa người dùng thành công
            // Ví dụ: làm mới trang để cập nhật danh sách khách hàng
            location.reload(); // Làm mới trang sau khi khóa người dùng
        },
        error: function(xhr, status, error) {
            // Xử lý khi có lỗi xảy ra trong quá trình khóa người dùng
            console.error('Đã xảy ra lỗi khi mở khóa người dùng:', error);
            alert('Đã xảy ra lỗi khi mở khóa người dùng. Vui lòng thử lại.');
        }
    });
}
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
                     <li class="list-inline-item"><a href="privacy-policy.html">Chính sách bảo mật</a></li>
                     <li class="list-inline-item"><a href="terms-of-service.html">Điều khoản sử dụng</a></li>
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
      <script>
        $(document).ready(function() {
   // Xử lý sự kiện khi nhấp vào nút "Thêm sách"
   $('#addBookButton').click(function(e) {
      e.preventDefault();
      $('#addCustomerModal').modal('show'); // Hiển thị modal để thêm sách
   });


});

       </script>
   </body>
</html>