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
                     <li><a href="admin-user.php
                     "><i class="ri-record-circle-line"></i>Khách Hàng</a></li>
                     <li><a href="admin-books.php
                     "><i class="ri-record-circle-line"></i>Sách</a></li>
          
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
      
      <div class="input-box">
        <input type="text" id="name" name="name" placeholder="Họ và tên" required />
      </div>
      <div class="input-box">
        <input type="text" id="account" name="account" placeholder="Tên đăng nhập" required />
      </div>
      <div class="input-box">
        <select class="form-select form-select-sm mb-3" id="city" name="city" aria-label=".form-select-sm">
          <option value="" selected>Tỉnh thành</option>
        </select>
        <select class="form-select form-select-sm mb-3" id="district" name="district" aria-label=".form-select-sm">
          <option value="" selected>Quận huyện</option>
        </select>
        <select class="form-select form-select-sm" id="ward" name="ward" aria-label=".form-select-sm">
          <option value="" selected>Phường xã</option>
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
      <div class="input-box">
        <input type="number" id="phone" name="phone" placeholder="Số Điện Thoại" required />
      </div>
      <div class="input-box">
        <input type="password" id="pass" name="pass" placeholder="Mật khẩu" required />
      
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
                        <form method="get">
                        <style>
                select {
            width: 150px; /* Độ rộng */
            height: 30px; /* Chiều cao */
            padding: 5px; /* Khoảng cách nội dung trong select */
            font-size: 14px; /* Cỡ chữ */
                }
                </style>
        <label for="start_date"></label>
        <input type="date" id="start_date" name="start_date">

        <label for="end_date">Đến ngày:</label>
        <input type="date" id="end_date" name="end_date">
        <button type="submit">Lọc</button>
                                <!-- Thêm nút button để chuyển hướng -->
<button id="goToAdminBillPage" class="btn btn-primary">Tải lại</button>

<!-- Đoạn mã JavaScript để xử lý sự kiện khi nhấp vào nút button -->
<script>
    // Bắt sự kiện khi nút button được nhấp
    document.getElementById('goToAdminBillPage').addEventListener('click', function() {
        // Chuyển hướng người dùng đến trang admin-bill.php
        window.location.href = 'admin-bill.php';
    });
</script>
                        </form>

                           <div class="table-responsive">
                              <table class="data-tables table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 1%;">Mã khách hàng</th>
                                        <th style="width: 16%;">Họ và tên</th>
                                        <th style="width: 15%;">Tài khoản</th>
                                          <th style="width: 5%;">Số lượng</th>
                                        <th>Tổng tiền</th>
                                        <th style="width: 1%;">Tình trạng</th>
                                        <th style="width: 20%;">Hoạt động</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php
require_once 'db/dbhelper.php';

// Kết nối đến CSDL
$conn = openDatabaseConnection();

$start_date = $_GET['start_date'] ?? '';
$end_date = $_GET['end_date'] ?? '';
if (!empty($start_date) && !empty($end_date)) {
// Thực hiện truy vấn UPDATE để cập nhật số lượng hóa đơn và tổng tiền cho từng khách hàng trong tháng được chọn
$query_update = "
    UPDATE khach_hang kh
    JOIN (
        SELECT kh.Ma_KH,
               SUM(CASE WHEN hd.Tinh_Trang = 'Đã giao' THEN 1 ELSE 0 END ) AS So_Hoa_Don_Da_Giao,
               SUM(CASE WHEN hd.Tinh_Trang = 'Đã giao' THEN hd.Tong_Tien ELSE 0 END) AS Tong_Tien_Tat_Ca
        FROM khach_hang kh
        LEFT JOIN hoa_don hd ON kh.Ma_KH = hd.Ma_KH AND hd.Tinh_Trang = 'Đã giao' AND hd.Ngay_XN BETWEEN '$start_date' AND '$end_date'
        WHERE kh.Trang_Thai = 1
        GROUP BY kh.Ma_KH
    ) AS temp ON kh.Ma_KH = temp.Ma_KH
    SET kh.So_Luong = temp.So_Hoa_Don_Da_Giao,
        kh.Tong_Tien = temp.Tong_Tien_Tat_Ca;
";

// Thực hiện truy vấn UPDATE
$update_result = mysqli_query($conn, $query_update);

if (!$update_result) {
    echo "Đã có lỗi xảy ra trong quá trình cập nhật thông tin khách hàng.";
    mysqli_close($conn);
    exit; // Thoát khỏi mã nếu có lỗi cập nhật
}

// Bây giờ thực hiện truy vấn SELECT để lấy thông tin khách hàng sau khi cập nhật
$query_select = "
    SELECT kh.Ma_KH,
           kh.Ten_KH,
           kh.Tai_Khoan,
           kh.So_Luong,
           kh.Tong_Tien,
           kh.Trang_Thai
    FROM khach_hang kh
         WHERE kh.Trang_Thai ='1'
    ORDER BY kh.Ma_KH
";

$result = mysqli_query($conn, $query_select);

if ($result) {
    // Duyệt qua kết quả từ truy vấn SELECT để hiển thị thông tin
    while ($row = mysqli_fetch_assoc($result)) {
        $maKH = $row['Ma_KH'];
        $customerName = $row['Ten_KH'];
        $account = $row['Tai_Khoan'];
        $number = $row['So_Luong'];
        $total =number_format($row['Tong_Tien'], 0, ',', '.'); 
        $status = $row['Trang_Thai'];

        // Kiểm tra Trang_Thai để hiển thị cụ thể
        if ($status == 0) {
            $statusText = 'Không hoạt động';
        } else {
            $statusText = 'Hoạt động';
        }

        echo "
            <tr>
                <td>{$maKH}</td>
                <td>{$customerName}</td>
                <td>{$account}</td>
                <td>{$number}</td>
                <td>{$total}</td>
                <td>{$statusText}</td>
                <td>
                    <div class='flex align-items-center list-user-action'>
                        <a href='#' class='edit-customer-link bg-primary' onclick='openEditModal({$maKH})' data-toggle='tooltip' data-placement='top' title='Chỉnh sửa'>
                            <i class='ri-pencil-line'></i>
                        </a>
                        <a href='#' class='bg-primary' onclick='confirmLockUser({$maKH}, \"{$customerName}\")' data-toggle='tooltip' data-placement='top' title='Khóa'>
                            <i class='ri-delete-bin-line'></i>
                        </a>
                        <a href='#' class='bg-primary' onclick='confirmunLockUser({$maKH}, \"{$customerName}\")' data-toggle='tooltip' data-placement='top' title='Mở khóa'>
                            <i class='ri-lock-line'></i>
                        </a>
                    </div>
                </td>
            </tr>
        ";
    }
} else {
    echo "Đã có lỗi xảy ra trong quá trình truy vấn thông tin khách hàng.";
}
}
else{
   
   
   require_once 'db/dbhelper.php';
   
   // Kết nối đến CSDL
   $conn = openDatabaseConnection();
   
   // Truy vấn UPDATE để cập nhật tổng tiền và số lượng đơn vào bảng khach_hang
   $query_update = "
       UPDATE khach_hang kh
       JOIN (
           SELECT 
               kh.Ma_KH,
               COUNT(hd.Ma_HD) AS Tong_SoLuong,
               SUM(hd.Tong_Tien) AS Tong_HD
           FROM 
               khach_hang kh
           LEFT JOIN 
               hoa_don hd ON kh.Ma_KH = hd.Ma_KH
           WHERE 
               hd.Tinh_Trang = 'Đã giao'
           GROUP BY 
               kh.Ma_KH
       ) AS temp ON kh.Ma_KH = temp.Ma_KH
       SET kh.Tong_SoLuong = temp.Tong_SoLuong,
           kh.Tong_HD = temp.Tong_HD;
   ";
   
   // Thực hiện truy vấn UPDATE
   $update_result = mysqli_query($conn, $query_update);
   
   if (!$update_result) {
       echo "Đã có lỗi xảy ra trong quá trình cập nhật thông tin khách hàng.";
       mysqli_close($conn);
       exit; // Thoát khỏi mã nếu có lỗi cập nhật
   }
   
   // Bây giờ thực hiện truy vấn SELECT để lấy thông tin khách hàng sau khi cập nhật
   $query_select = "
       SELECT 
           Ma_KH,
           Ten_KH,
           Tai_Khoan,
           Mat_Khau,
           Tong_SoLuong,
           Tong_HD,
           Trang_Thai
       FROM 
           khach_hang
       ORDER BY 
           Ma_KH;
   ";
   
   $result = mysqli_query($conn, $query_select);
   
   if ($result) {
       // Duyệt qua kết quả từ truy vấn SELECT để hiển thị thông tin
       while ($row = mysqli_fetch_assoc($result)) {
           $maKH = $row['Ma_KH'];
           $customerName = $row['Ten_KH'];
           $account = $row['Tai_Khoan'];
           $number = $row['Tong_SoLuong'];
           $total = number_format(floatval($row['Tong_HD']), 0, ',', '.');
 
     
           $status = $row['Trang_Thai'];
   
           // Hiển thị thông tin khách hàng
           echo "
               <tr>
                   <td>{$maKH}</td>
                   <td>{$customerName}</td>
                   <td>{$account}</td>
                   <td>{$number}</td>
                   <td>{$total}</td>
                   <td>{$status}</td>
                   <td>
                       <div class='flex align-items-center list-user-action'>
                           <a href='#' class='edit-customer-link bg-primary' onclick='openEditModal({$maKH})' data-toggle='tooltip' data-placement='top' title='Chỉnh sửa'>
                               <i class='ri-pencil-line'></i>
                           </a>
                           <a href='#' class='bg-primary' onclick='confirmLockUser({$maKH}, \"{$customerName}\")' data-toggle='tooltip' data-placement='top' title='Khóa'>
                               <i class='ri-delete-bin-line'></i>
                           </a>
                           <a href='#' class='bg-primary' onclick='confirmunLockUser({$maKH}, \"{$customerName}\")' data-toggle='tooltip' data-placement='top' title='Mở khóa'>
                               <i class='ri-lock-line'></i>
                           </a>
                       </div>
                   </td>
               </tr>
           ";
       }
   } else {
       echo "Đã có lỗi xảy ra trong quá trình truy vấn thông tin khách hàng.";
   }
   


}
// Đóng kết nối
mysqli_close($conn);
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
