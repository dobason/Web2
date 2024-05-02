<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cửa hàng sách</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="vendor/fontawesome/js/all.min.js"></script>
    <script src="js/main.js"> </script>
    <script src="js/search.js"></script>
    <script src="js/dangky"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/StylesBT.css">
    <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
</head>

<body>
    <!--Index CSS-->
    <style>
        .container {
            width: 1200px;
            margin: 0 auto;
        }

        .product-items {
            border: 1px solid #ccc;
            padding: 30px;
        }

        .clear-both {
            clear: both;
        }

        a {
            text-decoration: none;
        }

        #pagination {
            text-align: right;
            margin-bottom: 10px;
            margin-right: 5px;
        }

        .page-item {
            border: 1px solid #ccc;
            padding: 5px 9px;
            color: #000;
        }

        .current-page {
            background: #000;
            color: #FFF;
        }

        .slider-product-one-content-items {
            margin-top: 50px;
        }        
    </style>



    <header>
        
          <!--Navbar-->
          <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container">
                <a class="navbar-brand" href="#"><img src="IMG/logo.jpg"></a>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <form class="d-flex" method="GET">
                        <input class="form-control me-2" type="search" placeholder="Tìm kiếm sản phẩm" aria-label="Search" name="Ten_Sach">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>         
                </div>
                <div class="top-right-item">
                    <a href="cart.php" id="gioHangLink"><i class="fa-solid fa-cart-shopping"></i></a>
                    <p id="cartItemCount">0</p>
                </div>
                <?php require_once 'header.php';?>
                <button class="navbar-toggler pe-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
        <div class="slider1">
            <img src="IMG/0e882cb6cd424a1a43bf572912a86425.jpg" style="width:100%">
            
            <div class="in-slider1">
                <div class="slidebody">
                    <div class="in-slidebody-left">
                        <a href="#"><img src="IMG/left-top.jpg"></a>
                        <a href="#"><img src="IMG/slide2.jpg"></a>
                    </div>
                    
                    <div class="in-slidebody-right">
                        <div class="in-slidebody-left">
                            <a href="#"><img src="IMG/left-top.jpg"></a>
                            <a href="#"><img src="IMG/slide2.jpg"></a>
                        </div>
                        
                        <div id="slideshow">
                            <div class="slide-wrapper">
                                <div class="slide">
                                    <a href="#"><img src="IMG/slide1.jpg"></a>
                                </div>
                                <div class="slide">
                                    <a href="#"><img src="IMG/slide2.jpg"></a>
                                </div>
                                <div class="slide">
                                    <a href="#"><img src="IMG/slide5.jpg"></a>
                                </div>
                                <div class="slide">
                                    <a href="#"><img src="IMG/slide1.jpg"></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            
        </div>
        
       
       <!---Kết nối database-->
       <?php require('./php/classes/database.php');?>
                  
    </header>
    

    <main>
        <!------------------------------------------------------------------>
        
        <div class="slider5">
            <div class="in-slider5">
                <section class="slider-product-one">
                    <div class="slider-product-one-content">
                    <h1>Danh Mục Sản Phẩm</h1>
                    <?php 
                              require_once 'db/dbhelper.php';

                              $param = "";
                              $sortParam = "";
                              $orderCondition = "";

                              // Tìm kiếm tên sách
                              $search = isset($_GET['Ten_Sach']) ? $_GET['Ten_Sach'] : "";
                              $theme = isset($_GET['Ten_Loai']) ? $_GET['Ten_Loai'] : ""; // Thêm dòng này để lấy giá trị của chủ đề
                              if ($search) {
                                  $where = "WHERE `Ten_Sach` LIKE '%" . $search . "%'";
                                  $param .= "Ten_Sach=" . $search . "&";
                                  $sortParam = "Ten_Sach=" . $search . "&";
                              }
                              //Tìm kiếm theo chủ đề
                              if ($theme) { 
                                if ($where !== "") {
                                    $where .= " AND ";
                                } else {
                                    $where = "WHERE ";
                                }
                                $where .= "`Chu_De` = '" . $theme . "'";
                            }

                              // Sắp xếp
                              $orderField = isset($_GET['field']) ? $_GET['field'] : "";
                              $orderSort = isset($_GET['sort']) ? $_GET['sort'] : "";
                              if (!empty($orderField) && !empty($orderSort)) {
                                  $orderCondition = "ORDER BY `sach`.`" . $orderField . "` " . $orderSort;
                                  $param .= "field=" . $orderField . "&sort=" . $orderSort . "&";
                              }

                              include 'connect_db.php';

                              $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 4;
                              $current_page = !empty($_GET['page']) ? $_GET['page'] : 1;
                              $offset = ($current_page - 1) * $item_per_page;

                              // Thực hiện truy vấn sử dụng executeResult
                              $sql = "SELECT * FROM `sach`";
                              if ($search) {
                                  $sql .= " WHERE `Ten_Sach` LIKE '%" . $search . "%'";
                              }
                              $sql .= " " . $orderCondition . " LIMIT " . $item_per_page . " OFFSET " . $offset;

                              $sach = executeResult($sql); // Thực hiện truy vấn và lấy dữ liệu

                              // Đếm tổng số bản ghi
                              $countSql = "SELECT COUNT(*) as total FROM `sach`";
                              if ($search) {
                                  $countSql .= " WHERE `Ten_Sach` LIKE '%" . $search . "%'";
                              }

                              $totalRecords = executeResult($countSql);
                              $totalRecords = $totalRecords[0]['total'];
                              $totalPages = ceil($totalRecords / $item_per_page);
                              ?>
                             <select id="sort-box" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                                    <option value="">Sắp xếp giá</option>
                                    <option <?php if (isset($_GET['sort']) && $_GET['sort'] == "desc") { ?> selected <?php } ?> value="?<?= $sortParam ?>field=Don_Gia&sort=desc">Cao đến thấp</option>
                                    <option <?php if (isset($_GET['sort']) && $_GET['sort'] == "asc") { ?> selected <?php } ?> value="?<?= $sortParam ?>field=Don_Gia&sort=asc">Thấp đến cao</option>
                                </select>
                                <select id="sort-box" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                                    <option value="">Chọn chủ đề</option>
                                    <option <?php if (isset($_GET['theme']) && $_GET['theme'] == "1") { ?> selected <?php } ?> value="?<?= $sortParam ?>theme= 1">Chung</option>
                                    <option <?php if (isset($_GET['theme']) && $_GET['theme'] == "2") { ?> selected <?php } ?> value="?<?= $sortParam ?>theme= 2">Lịch Sử</option>
                                    <option <?php if (isset($_GET['theme']) && $_GET['theme'] == "3") { ?> selected <?php } ?> value="?<?= $sortParam ?>theme= 3">Truyện tranh & Mangas</option>
                                    <option <?php if (isset($_GET['theme']) && $_GET['theme'] == "4") { ?> selected <?php } ?> value="?<?= $sortParam ?>theme= 4">Phim & Nhiếp Ảnh</option>
                                    <option <?php if (isset($_GET['theme']) && $_GET['theme'] == "5") { ?> selected <?php } ?> value="?<?= $sortParam ?>theme= 5">Kinh dị</option>
                                    <option <?php if (isset($_GET['theme']) && $_GET['theme'] == "6") { ?> selected <?php } ?> value="?<?= $sortParam ?>theme= 6">Máy tính & Internet</option>
                                    <option <?php if (isset($_GET['theme']) && $_GET['theme'] == "7") { ?> selected <?php } ?> value="?<?= $sortParam ?>theme= 7">Thể thao</option>
                                    <option <?php if (isset($_GET['theme']) && $_GET['theme'] == "8") { ?> selected <?php } ?> value="?<?= $sortParam ?>theme= 8">Du lịch lữ hành</option>
                                    <option <?php if (isset($_GET['theme']) && $_GET['theme'] == "9") { ?> selected <?php } ?> value="?<?= $sortParam ?>theme= 9">Kinh doanh & Kinh tế</option>
                                    <option <?php if (isset($_GET['theme']) && $_GET['theme'] == "10") { ?> selected <?php } ?> value="?<?= $sortParam ?>theme= 10">Nghệ thuật</option>
                                </select>
                        <div class="slider-product-one-content-items" id="bookListContainer">
                            <div class="box">
                            

      
                          </div>                          
                    <?php
                      // Kiểm tra nếu có sản phẩm trong danh sách
                      if ($sach) {
                      foreach ($sach as $index => $book) {
                      $bookName = $book['Ten_Sach'];
                      $Tac_Gia = $book['Ten_Tac_Gia'];
                      $price = number_format($book['Don_Gia'], 0, ',', '.');
                      $imagePath = $book['Hinh_Anh'];

                      // Hiển thị sản phẩm
                      echo '<div class="slider-product-one-content-item">';
                      echo '<a href="product.php?id=' . $book['Ma_Sach'] . '"><img src="' . $imagePath . '" alt="Book Image" width="500"></a>';
                      echo '<div class="slider-product-one-content-item-text">';
                      echo '<div class="slider-text1">';
                      echo '<li><a href="product.php?id=' . $book['Ma_Sach'] . '"><p>' . $bookName . '</p></a></li>';
                      echo '</div>';
                      echo '<div class="slider-text2">';
                      echo '<li><a href="#">' . $Tac_Gia . '</a></li>';
                      echo '</div>';
                      echo '<li>' . $price . '<sup><u>đ</u></sup></li>';
                      echo '</div>';
                      echo '</div>';

                      // Chỉnh sửa CSS trực tiếp tại đây
                      echo '<style>';
                      echo '.slider-product-one-content-items { display: flex; flex-wrap: wrap; justify-content: flex-start; }';
                      echo '.slider-product-one-content-item { width: calc(20% - 20px); margin: 0 10px 20px 0; background-color: white; padding: 30px 17px; border-radius: 2px; border: 1px solid rgb(206, 206, 206); box-sizing: border-box; margin-left: 10px; }';
                      echo '</style>';
                  }
              } else {
                  echo '<p>Không tìm thấy sách nào.</p>';
              }
              ?>
                      
                        </div>
                        <?php include './pagination.php';?>  
                    </div>
                </section>
            </div>
        </div>






    </main>

    <!---Footer----->
    <footer>
        <div class="footer">
            <div class="in-footer-body">

                <div class="in-footer-body-mid">
                    <p>Tài khoản của bạn</p>
                    <li><a href="">Cập nhật tài khoản</a></li>
                    <li><a href="">Giỏ hàng</a></li>
                    <li><a href="">Lịch sử giao dịch</a></li>
                    <li><a href="">Sản phẩm yêu thích</a></li>
                    <li><a href="">Kiểm tra đơn hàng</a></li>
                </div>

                <div class="in-footer-body-mid">
                    <p>GOODREADS</a>
                        <li><a href="gioi_thieu.html">Giới thiệu GOODREADS</a></li>
                        <li><a href="">GOODREADS trên Facebook</a></li>
                        <li><a href="">Liên hệ GOODREADS</a></li>
                        <li><a href="">Đặt hàng theo yêu cầu</a< /li>
                </div>
                <div class="in-footer-body-right">
                    <p>Kết nối với chúng tôi</p>
                    <li><a href="#">Liên hệ hợp tác kinh doanh</a></li>
                    <li><a href="#">Tuyển dụng</a></li><br>
                    <li><a href="#">Chính sách đổi - trả</a></li>
                    <li><a href="#">Chính sách bồi hoàn</a></li>
                    <li><a href="#">Câu hỏi thường gặp (FAQs)</a></li>



                </div>
            </div>


        </div>
        <div class="footer-bottom">
            <p>&copy; 2023 sachtore</p>
        </div>


    </footer>
    

</body>

</html>