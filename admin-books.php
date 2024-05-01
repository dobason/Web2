

<!doctype html>
<html lang="en">
   <head>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

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
                  <li><a href="admin-dashboard.php">
                  <i class="las la-home iq-arrow-left"></i>Bảng Điều Khiển</a></li>
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
                        <a href="index.php" class="header-logo">
                           <img src="images/logo.png" class="img-fluid rounded-normal" alt="">
                           <div class="logo-title">
                              <span class="text-primary text-uppercase">goodreads</span>
                           </div>
                        </a>
                     </div>
                  </div>
                  <div class="navbar-breadcrumb">
                     <h5 class="mb-0">Sách</h5>
                     <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                           <li class="breadcrumb-item"><a href="index.php">Admin</a></li>
                           <li class="breadcrumb-item active" aria-current="page">Sách</li>
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



<!-- Modal for adding a new book -->
<div class="modal fade" id="addBookModal" tabindex="-1" role="dialog" aria-labelledby="addBookModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="addBookModalLabel">Thêm sách mới</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         <form id="addBookForm" action="process_add_book.php" method="post" enctype="multipart/form-data">
           <div class="form-group">
             <label for="bookImage">Hình ảnh</label>
             <input type="file" class="form-control-file" id="bookImage" name="bookImage">
           </div>
           <div class="form-group">
             <label for="bookTitle">Tên sách</label>
             <input type="text" class="form-control" id="bookTitle" name="bookTitle" required>
           </div>
           <div class="form-group">
             <label for="bookCategory">Thể loại sách</label>
             <input type="text" class="form-control" id="bookCategory" name="bookCategory" required>
           </div>
           <div class="form-group">
             <label for="bookAuthor">Tác giả sách</label>
             <input type="text" class="form-control" id="bookAuthor" name="bookAuthor" required>
           </div>
           <div class="form-group">
             <label for="bookDescription">Mô tả sách</label>
             <textarea class="form-control" id="bookDescription" name="bookDescription" rows="3" required></textarea>
           </div>
           <div class="form-group">
             <label for="bookPrice">Giá tiền</label>
             <input type="number" class="form-control" id="bookPrice" name="bookPrice" required>
           </div>
           <button type="submit" class="btn btn-primary">Thêm</button>
         </form>
       </div>
     </div>
   </div>
 </div>

 <!-- Script để xử lý AJAX -->
<script>
$(document).ready(function() {
    // Lắng nghe sự kiện click vào nút "Sửa"
    $('.edit-book').click(function(event) {
        event.preventDefault(); // Ngăn chặn hành vi mặc định của liên kết

        var bookId = $(this).data('book-id'); // Lấy bookId từ thuộc tính data-book-id của nút "Sửa"

        // Gửi yêu cầu AJAX để lấy thông tin sách từ máy chủ
        $.ajax({
            type: 'GET',
            url: 'get-book-info.php', // Đường dẫn tới file xử lý AJAX để lấy thông tin sách
            data: { book_id: bookId }, // Truyền bookId vào yêu cầu AJAX
            success: function(response) {
                // Điền thông tin sách vào modal
                $('#bookId').val(bookId); // Lưu bookId vào một hidden input để sử dụng sau này
                $('#bookTitle').val(response.Ten_Sach);
                $('#bookCategory').val(response.Ma_Loai);
                $('#bookAuthor').val(response.Ten_Tac_Gia);
                $('#bookDescription').val(response.Mo_Ta);
                $('#bookPrice').val(response.Don_Gia);
                $('#bookImage').val(response.Hinh_Anh); // Đường dẫn hình ảnh

                // Hiển thị modal
                $('#editBookModal').modal('show');
            },
            error: function() {
                alert('Đã xảy ra lỗi khi lấy thông tin sách.');
            }
        });
    });

    // Xử lý submit form trong modal để cập nhật thông tin sách
    $('#updateBookForm').submit(function(event) {
        event.preventDefault(); // Ngăn chặn hành vi mặc định của form

        // Lấy dữ liệu từ form
        var bookId = $('#bookId').val();
        var newBookTitle = $('#bookTitle').val();
        var newCategory = $('#bookCategory').val();
        var newAuthor = $('#bookAuthor').val();
        var newDescription = $('#bookDescription').val();
        var newPrice = $('#bookPrice').val();
        var newImage = $('#bookImage').val();

        // Gửi yêu cầu AJAX để cập nhật thông tin sách trong cơ sở dữ liệu
        $.ajax({
            type: 'POST',
            url: 'update-book.php', // Đường dẫn tới file xử lý AJAX để cập nhật thông tin sách
            data: {
                bookId: bookId,
                newBookTitle: newBookTitle,
                newCategory: newCategory,
                newAuthor: newAuthor,
                newDescription: newDescription,
                newPrice: newPrice,
                newImage: newImage
            },
            success: function(response) {
                alert(response); // Hiển thị thông báo kết quả từ server
                // Tùy chỉnh hành động sau khi cập nhật thành công (ví dụ: đóng modal)
                $('#editBookModal').modal('hide');
            },
            error: function() {
                alert('Đã xảy ra lỗi khi cập nhật thông tin sách.');
            }
        });
    });
});
</script>

<!-- Modal để sửa thông tin sách -->
<div class="modal fade" id="editBookModal" tabindex="-1" role="dialog" aria-labelledby="editBookModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="editBookModalLabel">Sửa thông tin sách</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         <form id="updateBookForm">
           <input type="hidden" id="bookId" name="bookId"> <!-- Hidden input để lưu bookId -->
           <div class="form-group">
             <label for="bookTitle">Tên sách</label>
             <input type="text" class="form-control" id="bookTitle" name="bookTitle" required>
           </div>
           <div class="form-group">
             <label for="bookCategory">Thể loại sách</label>
             <input type="text" class="form-control" id="bookCategory" name="bookCategory" required>
           </div>
           <div class="form-group">
             <label for="bookAuthor">Tác giả sách</label>
             <input type="text" class="form-control" id="bookAuthor" name="bookAuthor" required>
           </div>
           <div class="form-group">
             <label for="bookDescription">Mô tả sách</label>
             <textarea class="form-control" id="bookDescription" name="bookDescription" rows="3" required></textarea>
           </div>
           <div class="form-group">
             <label for="bookPrice">Giá tiền</label>
             <input type="number" class="form-control" id="bookPrice" name="bookPrice" required>
           </div>
           <div class="form-group">
             <label for="bookImage">Đường dẫn hình ảnh</label>
             <input type="text" class="form-control" id="bookImage" name="bookImage" required>
           </div>
           <button type="submit" class="btn btn-primary">Lưu</button>
         </form>
       </div>
     </div>
   </div>
 </div>


 

            <div class="container-fluid">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Danh sách sách</h4>
                           </div>
                           <div class="iq-card-header-toolbar d-flex align-items-center">
                              <a href="#" id="addBookButton" class="btn btn-primary">Thêm sách</a>


                           </div>
                        </div>
                        <div class="iq-card-body">
                           <div class="table-responsive">
                              <table class="data-tables table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 3%;">STT</th>
                                        <th style="width: 12%;">Hình ảnh</th>
                                        <th style="width: 15%;">Tên sách</th>
                                        <th style="width: 15%;">Thể loại sách</th>
                                        <th style="width: 15%;">Tác giả sách</th>
                                        <th style="width: 18%;">Mô tả sách</th>
                                        <th style="width: 7%;">Giá</th>
                                        <th style="width: 15%;">Hoạt động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
require_once('db/dbhelper.php');

// Truy vấn dữ liệu sách từ cơ sở dữ liệu
$sql = "SELECT * FROM sach";
$books = executeResult($sql);

foreach ($books as $index => $book) {
    $stt = $index + 1; // Số thứ tự
    $bookName = $book['Ten_Sach'];
    $category = $book['Ma_Loai'];
    $author = $book['Ten_Tac_Gia'];
    $description = $book['Mo_Ta'];
    $price = number_format($book['Don_Gia'], 0, ',', '.'); // Định dạng giá tiền thành 15.000
    $image = $book['Hinh_Anh'];
    $bookId = $book['Ma_Sach']; // ID của sách

    echo '<tr>';
    echo '<td>' . $stt . '</td>'; // STT
    echo '<td><img src="' . $image . '" alt="Book Image" style="width: 100px;"></td>'; // Hình ảnh
    echo '<td>' . $bookName . '</td>'; // Tên sách
    echo '<td>' . $category . '</td>'; // Thể loại sách
    echo '<td>' . $author . '</td>'; // Tác giả sách
    echo '<td>' . $description . '</td>'; // Mô tả sách
    echo '<td>' . $price . '</td>'; // Giá đã định dạng
    echo '<td>';

    echo '<a href="#" class="edit-book" data-book-id="' . $bookId . '">Sửa</a>|';

    // Liên kết xóa với xác nhận trước khi thực hiện
    echo '<a href="delete-book.php?book_id=' . $bookId . '" onclick="return confirm(\'Bạn có chắc chắn muốn xóa?\')">Xóa</a>';

    echo '</td>';
    echo '</tr>';
}
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
      $('#addBookModal').modal('show'); // Hiển thị modal để thêm sách
   });


});

       </script>
<script>
$(document).ready(function() {
    // Xử lý sự kiện khi nhấp vào liên kết "Chỉnh sửa"
    $('.edit-book').click(function(e) {
        e.preventDefault(); // Ngăn chặn hành động mặc định của liên kết

        // Lấy bookId từ thuộc tính data-book-id của liên kết
        var bookId = $(this).data('book-id');

        // Gửi yêu cầu AJAX để lấy thông tin sách từ server
        $.ajax({
            url: 'get_book_info.php', // Đường dẫn tới script xử lý AJAX để lấy thông tin sách
            method: 'POST',
            data: { id: bookId }, // Gửi bookId đến server
            success: function(response) {
                // Thành công: Hiển thị thông tin sách trong modal
                $('#bookId').val(response.id);
                $('#bookTitle').val(response.bookTitle);
                $('#bookCategory').val(response.bookCategory);
                $('#bookAuthor').val(response.author);
                $('#bookDescription').val(response.description);
                $('#bookPrice').val(response.price);
                $('#editBookModal').modal('show'); // Hiển thị modal chỉnh sửa
            },
            error: function() {
                // Xử lý lỗi nếu có
                alert('Đã xảy ra lỗi. Vui lòng thử lại sau.');
            }
        });
    });
});


</script>


       
   </body>
</html>