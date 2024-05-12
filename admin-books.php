

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
                   
                     <li><a href="admin-user.php
                     "><i class="ri-record-circle-line"></i>Khách Hàng</a></li>
                     <li><a href="admin-books.php
                     "><i class="ri-record-circle-line"></i>Sách</a></li>
                     <li><a href="admin-category.php
                     "><i class="ri-record-circle-line"></i>Thể Loại Sách</a></li>
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
                                       <a class="bg-primary iq-sign-btn" href="admin-login.php" role="button">Sign out<i class="ri-login-box-line ml-2"></i></a>
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
<?php
   require_once('db/dbhelper.php');

   // Truy vấn dữ liệu sách từ cơ sở dữ liệu
   $sql = "SELECT *, sach.Mo_Ta as Mo_Ta_Sach FROM sach JOIN loai_sach on sach.Ma_Loai = loai_sach.Ma_Loai";
   $sql_loai_sach = "SELECT * from loai_sach";
   
   $books = executeResult($sql);
   $categories = executeResult($sql_loai_sach);
?>


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
             <label for="bookTitle">Tên sách</label>
             <input type="text" class="form-control" id="bookTitle" name="bookTitle" required>
           </div>
           <div class="form-group">
             <label for="bookCategory">Thể loại sách</label>
             <select class="form-select form-control" aria-label="bookCategory" id="bookCategory" name="bookCategory" required>
               <?php
                  foreach ($categories as $index => $category) {
                     echo '<option value="'.$category['Ma_Loai'].'">'.$category['Ten_Loai'].'</option>';
                  }
               ?>
            </select>
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
            <div class="d-flex justify-content-center">
               <img id="previewImage" src="" style="display: none" />
             </div>
             <label for="bookImage">Hình ảnh</label>
             <input type="file" class="form-control-file" id="bookImage" name="bookImage">
           </div>
           <button type="submit" class="btn btn-primary">Thêm</button>
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
                                        <th style="width: 7%;">Trạng thái</th>
                                        <th style="width: 15%;">Hoạt động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
foreach ($books as $index => $book) {
    $stt = $index + 1; // Số thứ tự
    $bookName = $book['Ten_Sach'];
    $category = $book['Ten_Loai'];
    $author = $book['Ten_Tac_Gia'];
    $description = $book['Mo_Ta_Sach'];
    $price = number_format($book['Don_Gia'], 0, ',', '.'); // Định dạng giá tiền thành 15.000
    $image = $book['Hinh_Anh'];
    $bookId = $book['Ma_Sach']; // ID của sách
    $status = $book['Trang_Thai'] && $book['Trang_Thai'] === 1 ? 'Đang bán' : 'Ẩn';
    

    echo '<tr>';
    echo '<td>' . $stt . '</td>'; // STT
    echo '<td><img src="' . $image . '" alt="Book Image" style="width: 100px;"></td>'; // Hình ảnh
    echo '<td>' . $bookName . '</td>'; // Tên sách
    echo '<td>' . $category . '</td>'; // Thể loại sách
    echo '<td>' . $author . '</td>'; // Tác giả sách
    echo '<td>' . $description . '</td>'; // Mô tả sách
    echo '<td>' . $price . '</td>'; // Giá đã định dạng
    echo '<td>' . $status . '</td>'; // Trạng thái
    echo '<td>';

    echo '<a href="#" class="edit-book" data-book-id="' . $bookId . '">Sửa</a>';
    echo ' | ';

    // Liên kết xóa với xác nhận trước khi thực hiện
    if ($book['Trang_Thai'] === 1) {
      // Hiển thị nút ẩn sách khi sách đang active
      echo '<a href="hide-book.php?book_id=' . $bookId . '" onclick="return confirm(\'Bạn có chắc chắn muốn ẩn sách?\')">Ẩn</a>';
    } else {
      // Hiển thị nút xoá sách khi sách đã bị ẩn
      echo '<a href="delete-book.php?book_id=' . $bookId . '" onclick="return confirm(\'Bạn có chắc chắn muốn xoá sách?\')">Xoá</a>';
    }

    echo '</td>';
    echo '</tr>';
}
?>
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
         <form id="updateBookForm" action="update-book.php" method="post" enctype="multipart/form-data">
           <input type="hidden" id="bookId" name="bookId">
           
           <div class="form-group">
             <label for="bookTitleEdit">Tên sách</label>
             <input type="text" class="form-control" id="bookTitleEdit" name="bookTitleEdit" required>
           </div>
           <div class="form-group">
             <label for="bookCategoryEdit">Thể loại sách</label>
             <select class="form-select form-control" aria-label="bookCategoryEdit" id="bookCategoryEdit" name="bookCategoryEdit" required>
               <?php
                  foreach ($categories as $index => $category) {
                     echo '<option value="'.$category['Ma_Loai'].'">'.$category['Ten_Loai'].'</option>';
                  }
               ?>
            </select>
           </div>
           <div class="form-group">
             <label for="bookAuthorEdit">Tác giả sách</label>
             <input type="text" class="form-control" id="bookAuthorEdit" name="bookAuthorEdit" required>
           </div>
           <div class="form-group">
             <label for="bookDescriptionEdit">Mô tả sách</label>
             <textarea class="form-control" id="bookDescriptionEdit" name="bookDescriptionEdit" rows="3" required></textarea>
           </div>
           <div class="form-group">
             <label for="bookPriceEdit">Giá tiền</label>
             <input type="number" class="form-control" id="bookPriceEdit" name="bookPriceEdit" required>
           </div>
           <div class="form-group">
            <label for="bookStatusEdit">Trạng thái</label>
            <select class="form-select form-control" aria-label="bookStatusEdit" id="bookStatusEdit" name="bookStatusEdit" required>
               <option value="1">Đang bán</option>
               <option value="0">Ẩn</option>
            </select>
           </div>
           <div class="form-group">
             <label for="bookImage">Hình ảnh</label>
             <div class="d-flex justify-content-center">
               <img id="previewImageEdit" src="" style="display: none" />
             </div>
             <div class="custom-file">
               <input type="file" class="custom-file-input" id="bookImageEdit" name="bookImageEdit">
               <label class="custom-file-label" for="bookImageEdit">Chọn hình ảnh mới</label>
             </div>
             <small class="form-text text-muted">Vui lòng chọn hình ảnh từ thư mục img/</small>
           </div>
           <button type="submit" class="btn btn-primary">Lưu</button>
         </form>
       </div>
     </div>
   </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const editButtons = document.querySelectorAll('.edit-book');

    editButtons.forEach(button => {
        button.addEventListener('click', function() {
            const bookId = button.getAttribute('data-book-id');

            // Hiển thị modal "Sửa thông tin sách"
            $('#editBookModal').modal('show');

            // Gửi yêu cầu Ajax để lấy thông tin sách từ cơ sở dữ liệu
            $.ajax({
                url: 'get_book.php',
                type: 'GET',
                header: { 'Content-Type': 'application/json' },
                data: {
                    book_id: bookId
                },
               success: function(response) {
                  const formatResponse = $.parseJSON(response);
                  $('input#bookTitleEdit').val(formatResponse.Ten_Sach);
                  $('select#bookCategoryEdit').val(formatResponse.Ma_Loai);
                  $('input#bookAuthorEdit').val(formatResponse.Ten_Tac_Gia);
                  $('textarea#bookDescriptionEdit').val(formatResponse.Mo_Ta);
                  $('input#bookPriceEdit').val(formatResponse.Don_Gia);
                  $('select#bookStatusEdit').val(formatResponse.Trang_Thai);
                  document.getElementById('previewImageEdit').src = formatResponse.Hinh_Anh;
                  document.getElementById('previewImageEdit').style.display = 'block';
               },
                error: function(xhr, status, error) {
                  console.error('Lỗi khi truy vấn dữ liệu sách:', error);
               }
            });
        });
    });
   
   // Preview image cho trường hợp sửa
   $('input#bookImageEdit').change(function(){
      var input = this;
      var url = $(this).val();
      var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
      if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) 
      {
         var reader = new FileReader();

         reader.onload = function (e) {
            $('#previewImageEdit').attr('src', e.target.result);
         }
         reader.readAsDataURL(input.files[0]);
      }
   });
   
   // Preview image cho trường hợp thêm mới
   $('input#bookImage').change(function(){
      var input = this;
      var url = $(this).val();
      var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
      if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) 
      {
         var reader = new FileReader();

         reader.onload = function (e) {
            $('#previewImage').attr('style', 'display:block');
            $('#previewImage').attr('src', e.target.result);
         }
         reader.readAsDataURL(input.files[0]);
      }
   });
});
</script>





<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

                                    
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



       
   </body>
</html>
