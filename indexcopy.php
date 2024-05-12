<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">

  <link rel="stylesheet" type="text/css" href="css1/style.css">

  <link rel="stylesheet" href="plugins/animate/animate.min.css">

  <link rel="stylesheet" href="plugins/fontawesome/all.css">

  <link href="plugins/webfonts/font.css"
    rel="stylesheet">
  <link rel="stylesheet" href="css1/owl.carousel.min.css" type="text/css">
  <link rel="stylesheet" href="css1/owl.theme.default.min.css" type="text/css">

  <!-- UIkit CSS -->
  <link rel="stylesheet" href="plugins/uikit/uikit.min.css" />

<!--------------------------------------------------------->
<style>
    .logo{
        font-size: 2.5rem;
    font-weight: bolder;
    color: var(--black);
    }
    a.logo {
    color: #0dd6b8; /* Đặt màu chữ là #0dd6b8 */
    text-decoration: none; /* Loại bỏ gạch chân */
}

    * {
    font-family: 'Poppins', sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    outline: none;
    border: none;
    text-decoration: none;
    text-transform: capitalize;
    transition: all .2s linear;
    transition: width none;
}

.slider-product-one-content-item a:hover> img{
   transform: translateY(-15px);
}
.slider-product-one-content-items {
   display: flex;
   flex-wrap: wrap; /* Cho phép các phần tử chuyển dòng khi không đủ không gian */
   justify-content: flex-start;

}

.slider-product-one-content-item {
   width: calc(20% - 20px); /* 20% chiều rộng cho mỗi phần tử, trừ đi margin-left và margin-right */
   margin: 0 10px 20px 0; /* Khoảng cách giữa các phần tử, 20px dưới cùng */
   background-color: white;
   padding: 30px 17px;
   border-radius: 2px;
   border: 1px solid rgb(206, 206, 206);
   box-sizing: border-box; /* Đảm bảo padding và border không tăng kích thước của phần tử */
   margin-left: 10px; 
}


.slider-product-one-content-item a> img{
   width: 100%;
   transition: all 0.5s ease;
}
/*------------------------*/
.slider-product-one-content-item li a{
   text-decoration: none;
 
}


.slider-product-one-content-item-text li:nth-child(2){
   color:rgb(192, 20, 28)
}
</style>
 

</head>

<body>

<?php require('php/classes/database.php');
 require_once 'db/dbhelper.php'; ?>

 
  <!--Navbar-->
  <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">

    <div class="container">
    <a href="index.php" class="logo"> <i class="fas fa-book"></i> GoodReads </a>
      <div class="desk-menu collapse navbar-collapse justify-content-md-center" id="navbarNav">
        <!-- Tìm Kiếm -->
        <form class="form-inline search-form" method="GET">
            <input class="form-control me-2" type="search" placeholder="Tìm kiếm sản phẩm" aria-label="Search" name="Ten_Sach">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </div>
    

      <div id="offcanvas-flip1" uk-offcanvas="flip: true; overlay: true">
        <div class="uk-offcanvas-bar" style="background: white;
        width: 100%;">

          <button class="uk-offcanvas-close" style="color:#272727" type="button" uk-close></button>
          <h3 style="font-size: 14px;
          color: #272727;
          text-transform: uppercase;
          margin: 3px 0 30px 0;
          font-weight: 500; letter-spacing: 2px;">MENU</h3>
            <div class="justify-content-md-center">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="index.html">TRANG CHỦ</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="Product.html">BỘ SƯU TẬP</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle aaaa"  href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" >
                    <p>SẢN PHẨM</p>
                    <i class="fa fa-angle-double-right"></i>

                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="border:0;">
                    <a class="dropdown-item" href="detailproduct.html" title="Sản phẩm - Style 1">Sản phẩm - Style 1</a>
                    <a class="dropdown-item" href="detailproduct.html" title="Sản phẩm - Style 2">Sản phẩm - Style 2</a>
                    <a class="dropdown-item" href="detailproduct.html" title="Sản phẩm - Style 3">Sản phẩm - Style 3</a>
                  </div>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="introduce.html">GIỚI THIỆU</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="blog.html">BLOG</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="Contact.html">LIÊN HỆ</a>
                </li>
              </ul>
            </div>

        </div>
      </div>
      <div id="offcanvas-flip" uk-offcanvas="flip: true; overlay: true">
        <div class="uk-offcanvas-bar" style="    background: white;
            width: 350px;">

          <button class="uk-offcanvas-close" style="color:#272727" type="button" uk-close></button>

          <h3 style="font-size: 14px;
                color: #272727;
                text-transform: uppercase;
                margin: 3px 0 30px 0;
                font-weight: 500; letter-spacing: 2px;">Tìm kiếm</h3>
          <div class="search-box wpo-wrapper-search">
            <form action="search" class="searchform searchform-categoris ultimate-search">
              <div class="wpo-search-inner" style="display:inline">
                <input type="hidden" name="type" value="product">
                <input required="" id="inputSearchAuto" name="q" maxlength="40" autocomplete="off"
                  class="searchinput input-search search-input" type="text" size="20"
                  placeholder="Tìm kiếm sản phẩm...">
              </div>
              <button type="submit" class="btn-search btn" id="search-header-btn">
                <i style="font-weight:bold" class="fas fa-search"></i>
              </button>
            </form>
            <div id="ajaxSearchResults" class="smart-search-wrapper ajaxSearchResults" style="display: none">
              <div class="resultsContent"></div>
            </div>
          </div>
        </div>
      </div>
   

      <div class="icon-ol">
        <a style="color: #272727" href="">
          <i class="fas fa-user-alt"></i>
        </a>
      
        
        <a style="color: #272727" href="#" uk-toggle="target: #offcanvas-flip2">
          <i class="fas fa-shopping-cart"></i>
        </a>
        <button class="navbar-toggler" type="button" uk-toggle="target: #offcanvas-flip1" data-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </div>
    </div>

  </nav>
  <!--Banner-->
 
 
  <!--List Prodct-->
  <div class="container" >
    <div class="row">
      <div class="col-md-3 col-sm-12 col-xs-12 sidebar-fix" style="width: 20%;">
        <div class="wrap-filter">

          <form id="productSearchForm">

          <div class="box_sidebar">
            <div class="block left-module">
              <div class=" filter_xs">
                <div class="group-menu">
                  <div class="title_block d-block d-sm-none d-none d-sm-block d-md-none" data-toggle="collapse"
                  href="#collapseExample1" role="button" aria-expanded="false"
                  aria-controls="collapseExample1">
                    Danh mục sản phẩm
                    <span><i class="fa fa-angle-down" data-toggle="collapse"
                      href="#collapseExample1" role="button" aria-expanded="false"
                      aria-controls="collapseExample1"></i></span>
                  </div>
             
                </div>
                <div class="layered">
                  <p class="title_block d-block d-sm-none d-none d-sm-block d-md-none" data-toggle="collapse"
                  href="#collapseExample2" role="button" aria-expanded="false"
                  aria-controls="collapseExample2">
                    Bộ lọc sản phẩm
                    <span><i class="fa fa-angle-down" data-toggle="collapse"
                      href="#collapseExample2" role="button" aria-expanded="false"
                      aria-controls="collapseExample2"></i></span>
                  </p>
                  <div class="block_content collapse" id="collapseExample2">
                    <div class="group-filter card card-body" style="border:0;padding:0" aria-expanded="true">
                      <div class="layered_subtitle dropdown-filter"><span>Thương hiệu</span><span
                          class="icon-control"><i class="fa fa-minus"></i></span></div>
                      <div class="layered-content bl-filter filter-brand">
                        <ul class="check-box-list">
                          <li>
                            <input type="checkbox" id="data-brand-p1" value="Khác">
                            <label for="data-brand-p1">Khác</label>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="group-filter" aria-expanded="true">
                      <div class="layered_subtitle dropdown-filter"><span>Giá sản phẩm</span><span
                          class="icon-control"><i class="fa fa-minus"></i></span></div>
                          <style>
                            /* Định dạng các input và button */
                            .price-range {
                                display: flex;
                             
                                align-items: center;
                               
                            }
                    
                            input[type="number"] {
                                width: 120px;
                                padding: 8px;
                                font-size: 14px;
                                border: 1px solid #ccc;
                                border-radius: 4px;
                                margin-right: 10px;
                            }
                            .search-container button:hover {
            background-color: #0056b3;
        }
                        </style>
                      <div class="layered-content bl-filter filter-price">
                        <div class="price-range">
                          <input type="number" id="minPrice" placeholder="Giá thấp nhất" min="0">
                         
                          <input type="number" id="maxPrice" placeholder="Giá cao nhất" min="0">
                          
                      </div>
                      </div>
                    </div>

                    <div class="group-filter" aria-expanded="true">
                     
                 
                    </div>
             

                  </div>

                </div>
              </div>
            </div>
          </div>
          <button type="submit" onclick="searchProducts()">Tìm kiếm</button>
        </form>
        </div>
      </div>
      <div class="col-md-9 col-sm-12 col-xs-12">
   
      <section class="featured" id="featured">

<h1 class="heading"><span>Danh Mục </span></h1>
    <div class="swiper featured-slider">
                <?php
                        require_once 'db/dbhelper.php';

                        $param = [];
                        $sortParam = [];
                        $where = "";
                        $orderCondition = "";

                        // Tìm kiếm tên sách
                        $search = isset($_GET['Ten_Sach']) ? $_GET['Ten_Sach'] : "";
                        if ($search) {
                            $where = " WHERE `Ten_Sach` LIKE '%" . $search . "%'";
                            $param['Ten_Sach'] = $search;
                            $sortParam['Ten_Sach'] = $search;
                        }

                        // Sắp xếp
                        $orderField = isset($_GET['field']) ? $_GET['field'] : "";
                        $orderSort = isset($_GET['sort']) ? $_GET['sort'] : "";
                        if (!empty($orderField) && !empty($orderSort)) {
                            $orderCondition = " ORDER BY `sach`.`" . $orderField . "` " . $orderSort;
                            $param['field'] = $orderField;
                            $param['sort'] = $orderSort;
                        }

                        // Chủ đề
                        $theme = isset($_GET['theme']) ? $_GET['theme'] : "";
                        if (!empty($theme)) {
                            $themeWhere = " `Ma_Loai` = " . $theme;
                            $param['theme'] = $theme;
                            if (empty($where)) {
                                $where = " WHERE" . $themeWhere;
                            } else {
                                $where .= " AND" . $themeWhere;
                            }
                        }

                        // Khoảng giá
                        $priceRange = isset($_GET['price_range']) ? $_GET['price_range'] : "";
                        if (!empty($priceRange)) {
                            if ($priceRange === '89000-') {
                                // Lọc sách có giá từ 89000 đồng trở lên
                                $minPrice = 89000;
                                $where .= empty($where) ? " WHERE `Don_Gia` >= $minPrice" : " AND `Don_Gia` >= $minPrice";
                            } else {
                                // Xử lý các khoảng giá khác nếu cần
                                $priceLimits = explode('-', $priceRange);
                                $minPrice = isset($priceLimits[0]) ? $priceLimits[0] : 0;
                                $maxPrice = isset($priceLimits[1]) ? $priceLimits[1] : PHP_INT_MAX;

                                if (empty($where)) {
                                    $where = " WHERE `Don_Gia` >= " . $minPrice . " AND `Don_Gia` <= " . $maxPrice;
                                } else {
                                    $where .= " AND `Don_Gia` >= " . $minPrice . " AND `Don_Gia` <= " . $maxPrice;
                                }
                            }
                            $param['price_range'] = $priceRange;
                        }

                        include 'connect_db.php';

                        $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 5;
                        $current_page = !empty($_GET['page']) ? $_GET['page'] : 1;
                        $offset = ($current_page - 1) * $item_per_page;

                        // Tạo URL từ mảng tham số
                        $queryString = http_build_query($param);

                        // Thực hiện truy vấn sử dụng executeResult
                        $sql = "SELECT * FROM `sach`" . $where . $orderCondition . " LIMIT " . $item_per_page . " OFFSET " . $offset;

                        $sach = executeResult($sql); // Thực hiện truy vấn và lấy dữ liệu

                        // Đếm tổng số bản ghi
                        $countSql = "SELECT COUNT(*) as total FROM `sach`" . $where;

                        $totalRecords = executeResult($countSql);
                        $totalRecords = $totalRecords[0]['total'];
                        $totalPages = ceil($totalRecords / $item_per_page);
                    ?>

                        <div class="slider-product-one-content-items" id="bookListContainer" style="justify-content:center">
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
                                    echo '.slider-product-one-content-item { width: calc(20% - 20px); margin: 0 10px 20px 0; background-color: white; padding: 30px 17px; border-radius: 2px; border: 1px solid rgb(206, 206, 206); box-sizing: border-box; }';
                                    echo '</style>';
                                }
                            } else {
                                echo '<p>Không tìm thấy sách nào.</p>';
                            }
                            ?>
                </div>
                <div class="select-container">
                        
                        <!-- Category selection -->
                        <select id="theme-box" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="">Chọn chủ đề</option>
                            <option <?php if ($theme == "1") { ?> selected <?php } ?> value="?<?= $queryString ?>&theme=1">Chung</option>
                            <option <?php if ($theme == "2") { ?> selected <?php } ?> value="?<?= $queryString ?>&theme=2">Lịch sử</option>
                            <option <?php if ($theme == "3") { ?> selected <?php } ?> value="?<?= $queryString ?>&theme=2">Truyện tranh & Mangas</option>
                            <option <?php if ($theme == "4") { ?> selected <?php } ?> value="?<?= $queryString ?>&theme=2">Phim & Nhiếp ảnh</option>
                            <option <?php if ($theme == "5") { ?> selected <?php } ?> value="?<?= $queryString ?>&theme=2">Kinh dị</option>
                            <option <?php if ($theme == "6") { ?> selected <?php } ?> value="?<?= $queryString ?>&theme=2">Máy tính & Internet</option>
                            <option <?php if ($theme == "7") { ?> selected <?php } ?> value="?<?= $queryString ?>&theme=2">Thể Thao</option>
                            <option <?php if ($theme == "8") { ?> selected <?php } ?> value="?<?= $queryString ?>&theme=2">Du lịch lữ hành</option>
                            <option <?php if ($theme == "9") { ?> selected <?php } ?> value="?<?= $queryString ?>&theme=2">Kinh doanh & Kinh tế</option>
                            <option <?php if ($theme == "10") { ?> selected <?php } ?> value="?<?= $queryString ?>&theme=2">Nghệ thuật</option>
                            <!-- Thêm các option cho chủ đề khác tương tự -->
                        </select>

                        <!-- Sorting options -->
                        <select id="sort-box" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="">Sắp xếp giá</option>
                            <option <?php if ($orderField == "Don_Gia" && $orderSort == "desc") { ?> selected <?php } ?> value="?<?= $queryString ?>&field=Don_Gia&sort=desc">Cao đến thấp</option>
                            <option <?php if ($orderField == "Don_Gia" && $orderSort == "asc") { ?> selected <?php } ?> value="?<?= $queryString ?>&field=Don_Gia&sort=asc">Thấp đến cao</option>
                        </select>

                        <!-- Price range selection -->
                        <select id="price-box" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="">Chọn khoảng giá</option>
                            <option <?php if ($priceRange == "0-5") { ?> selected <?php } ?> value="?<?= $queryString ?>&price_range=0-5">Dưới 5 đồng</option>
                            <option <?php if ($priceRange == "5-50000") { ?> selected <?php } ?> value="?<?= $queryString ?>&price_range=5-50000">5 - 50.000 đồng</option>
                            <option <?php if ($priceRange == "50000-89000") { ?> selected <?php } ?> value="?<?= $queryString ?>&price_range=50000-89000">50.000 - 89.000 đồng</option>
                            <option <?php if ($priceRange == "89000-") { ?> selected <?php } ?> value="?<?= $queryString ?>&price_range=89000-">Trên 89.000 đồng</option>
                        </select>
                    </div>
            </div>
          
            <?php include './pagination.php'; ?>
        </section>
      </div>
    </div>
  </div>
  <!--gallery-->
  <section class="section section-gallery">
    <div class="">
      <div class="hot_sp" style="padding-top: 70px;padding-bottom: 50px;">
        <h2 style="text-align:center;padding-top: 10px">
          <a style="font-size: 28px;color: black;text-decoration: none" href="">Khách hàng và Runner Inn</a>
        </h2>
      </div>
      <div class="list-gallery clearfix">
        <ul class="shoes-gp">
          <li>
            <div class="gallery_item">
              <img class="img-resize" src="images/shoes/gallery_item_1.jpg" alt="">
            </div>
          </li>
          <li>
            <div class="gallery_item">
              <img class="img-resize" src="images/shoes/gallery_item_2.jpg" alt="">
            </div>
          </li>
          <li>
            <div class="gallery_item">
              <img class="img-resize" src="images/shoes/gallery_item_3.jpg" alt="">
            </div>
          </li>
          <li>
            <div class="gallery_item">
              <img class="img-resize" src="images/shoes/gallery_item_4.jpg" alt="">
            </div>
          </li>
          <li>
            <div class="gallery_item">
              <img class="img-resize" src="images/shoes/gallery_item_5.jpg" alt="">
            </div>
          </li>
          <li>
            <div class="gallery_item">
              <img class="img-resize" src="images/shoes/gallery_item_6.jpg" alt="">
            </div>
          </li>
        </ul>
      </div>
    </div>
  </section>
  <footer class="main-footer">
    <div class="container">
      <div class="">
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-3">
            <div class="footer-col footer-block">
              <h4 class="footer-title">
                Giới thiệu
              </h4>
              <div class="footer-content">
                <p>Runner Inn trang mua sắm trực tuyến của thương hiệu giày, thời trang nam, nữ, phụ kiện, giúp bạn
                  tiếp
                  cận xu hướng thời trang mới nhất.</p>
                <div class="logo-footer">
                  <img src="images/logo-bct.png" alt="Bộ Công Thương">
                </div>
                <div class="social-list">
                  <a href="#" class="fab fa-facebook"></a>
                  <a href="#" class="fab fa-google"></a>
                  <a href="#" class="fab fa-twitter"></a>
                  <a href="#" class="fab fa-youtube"></a>
                  <a href="#" class="fab fa-skype"></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-3">
            <div class="footer-col footer-link">
              <h4 class="footer-title">
                PHÁP LÝ &amp; CÂU HỎI
              </h4>
              <div class="footer-content toggle-footer">
                <ul>
                  <li class="item">
                    <a href="#" title="Tìm kiếm">Tìm kiếm</a>
                  </li>
                  <li class="item">
                    <a href="#" title="Giới thiệu">Giới thiệu</a>
                  </li>
                  <li class="item">
                    <a href="#" title="Chính sách đổi trả">Chính sách đổi trả</a>
                  </li>
                  <li class="item">
                    <a href="#" title="Chính sách bảo mật">Chính sách bảo mật</a>
                  </li>
                  <li class="item">
                    <a href="#" title="Điều khoản dịch vụ">Điều khoản dịch vụ</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-3">
            <div class="footer-col footer-block">
              <h4 class="footer-title">
                Thông tin liên hệ
              </h4>
              <div class="footer-content toggle-footer">
                <ul>
                  <li><span>Địa chỉ:</span> 117-119 Lý Chính Thắng, Phường 7, Quận 3, TP. Hồ Chí Minh, Vietnam</li>
                  <li><span>Điện thoại:</span> +84 (028) 38800659</li>
                  <li><span>Fax:</span> +84 (028) 38800659</li>
                  <li><span>Mail:</span> contact@aziworld.com</li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-3">
            <div class="footer-col footer-block">
              <h4 class="footer-title">
                FANPAGE
              </h4>
              <div class="footer-content">
                <div id="fb-root">
                  <div class="footer-static-content">
                    <div class="fb-page" data-href="https://www.facebook.com/AziWorld-Viet-Nam-908555669481794/"
                      data-tabs="timeline" data-width="" data-height="215" data-small-header="false"
                      data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                      <blockquote cite="https://www.facebook.com/AziWorld-Viet-Nam-908555669481794/"
                        class="fb-xfbml-parse-ignore"><a
                          href="https://www.facebook.com/AziWorld-Viet-Nam-908555669481794/">AziWorld Viet Nam</a>
                      </blockquote>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="main-footer--copyright">
      <div class="container">
        <hr>
        <div class="main-footer--border" style="text-align:center;padding-bottom: 15px;">
          <p>Copyright © 2019 <a href="https://runner-inn.myharavan.com"> Runner Inn</a>. <a target="_blank"
              href="https://www.facebook.com/henrynguyen202">Powered by HuniBlue</a></p>
        </div>
      </div>
    </div>
  </footer>
  <script async defer crossorigin="anonymous" src="plugins/sdk.js"></script>
  <script src="plugins/jquery-3.4.1/jquery-3.4.1.min.js"></script>
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
  <script src="plugins/bootstrap/popper.min.js"></script>
  <script src="plugins/bootstrap/bootstrap.min.js"></script>
  <script src="plugins/owl.carousel/owl.carousel.min.js"></script>
  <script src="plugins/uikit/uikit.min.js"></script>
  <script src="plugins/uikit/uikit-icons.min.js"></script>
</body>

</html>
