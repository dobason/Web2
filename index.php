<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <!--Font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- Custom css file link -->
    <link rel="stylesheet" href="./css/Style2.css">
    <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
</head>
<body>
    <!-- Header section star -->

<header class="header">

<div class="header-1">
    <a href="index.php" class="logo"> <i class="fas fa-book"></i> GoodReads </a>

    <!-- Tìm Kiếm -->
    <form class="search-form" method="GET">
        <input class="form-control me-2" type="search" placeholder="Tìm kiếm sản phẩm" aria-label="Search" name="Ten_Sach">
        <button class="btn btn-outline-success" type="submit">Search</button>
        <div id="bookListContainer"></div>
    </form>

    <!-- Chỗ giỏ hàng và chỗ đăng nhập -->
    <div class="icons" style="display:flex;align-items:center">
        <a href="cart.php" class="fas fa-shopping-cart"></a>
        <?php require_once 'header.php'; ?>
    </div>
</div>

<div class="header-2">
    <nav class="navbar">
        <a href="#home">Trang chủ</a>
        <a href="#featured">Danh mục</a>
        <a href="#arrivals">Sách mới</a>
        <a href="#reviews">Khách hàng</a>
        <a href="#blogs">Bài viết</a>
    </nav>
</div>

<!---Kết nối database-->
<?php require('./php/classes/database.php'); ?>

</header>
    <!-- bottom navbar -->

    <nav class="bottom-navbar">
        <a href="#home" class="fas fa-home"></a>
        <a href="#featured" class="fas fa-list"></a>
        <a href="#arrivals" class="fas fa-tags"></a>
        <a href="#reviews" class="fas fa-comments"></a>
        <a href="#blogs" class="fas fa-blogs"></a>
    </nav>

    <!-- home section start -->

    <section class="home" id="home">

        <div class="row">

            <div class="content">
                <h3>Giảm đến 75%</h3>
                <p>Nhà sách Goodreads là điểm đến lý tưởng cho những người đam mê sách trên khắp thế giới. Với một bộ sưu tập đa dạng và phong phú bao gồm từ những cuốn sách kinh điển đến những tác phẩm hiện đại, Goodreads không chỉ là nơi để bạn khám phá những tác phẩm mới mẻ mà còn là cộng đồng đam mê với hàng triệu độc giả khác. Từ việc đánh giá và đánh dấu sách yêu thích đến thảo luận và chia sẻ những ý kiến, Goodreads là ngôi nhà ảo nơi mọi người có thể kết nối và tương tác với nhau qua chung niềm đam mê với văn học.</p>
                <a href="#" class="btn">Khám phá ngay</a>
            </div>
            </div>

        </div>

    </section>

     <!-- home section end -->

     <!-- icons section starts -->
    <section class="icons-container">

        <div class="icons">
            <i class="fas fa-plane" style="line-height:2;">
                <div class="content">
                    <h3>Miễn phí giao hàng</h3>
                    <p>Dành cho đơn chỉ từ 100.000đ</p>
                </div>
            </i>
        </div>

        <div class="icons">
            <i class="fas fa-lock" style="line-height:2;">
                <div class="content">
                    <h3>Thanh toán an toàn</h3>
                    <p>100 thanh toán bảo mật</p>
                </div>
            </i>
        </div>

        <div class="icons">
            <i class="fas fa-redo-alt" style="line-height:2;">
                <div class="content">
                    <h3>Dễ dàng trả hàng</h3>
                    <p>Chỉ từ 10 ngày</p>
                </div>
            </i>
        </div>

        <div class="icons">
            <i class="fas fa-headset" style="line-height:2;">
                <div class="content">
                    <h3>Hỗ trợ 24/7</h3>
                    <p>Gọi chúng tôi bất kì lúc nào</p>
                </div>
            </i>
        </div>

    </section>

     <!-- icons section ends -->

    <!-- Featured secion start -->

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
                        $sql_loai_sach = "SELECT * from loai_sach";

                        $sach = executeResult($sql); // Thực hiện truy vấn và lấy dữ liệu
                        $loai_sach = executeResult($sql_loai_sach); // Thực hiện truy vấn và lấy dữ liệu loại sách

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
                            <option value="./index.php">Chọn thể loại</option>
                            <?php
                                foreach ($loai_sach as $index => $category) {
                                    $selected = $theme == $category['Ma_Loai'] ? 'selected' : '';
                                    $current_params = array_merge( $_GET, array( 'theme' => $category['Ma_Loai'] ) );
                                    $new_query_string = http_build_query($current_params);
                                    echo '<option '.$selected.' value="?'.$new_query_string.'">'.$category['Ten_Loai'].'</option>';
                                }
                            ?>
                            <!-- Thêm các option cho chủ đề khác tương tự -->
                        </select>

                        <!-- Sorting options -->
                        <select id="sort-box" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="./index.php">Sắp xếp giá</option>
                            <option <?php if ($orderField == "Don_Gia" && $orderSort == "desc") { ?> selected <?php } ?> value="?<?= $queryString ?>&field=Don_Gia&sort=desc">Cao đến thấp</option>
                            <option <?php if ($orderField == "Don_Gia" && $orderSort == "asc") { ?> selected <?php } ?> value="?<?= $queryString ?>&field=Don_Gia&sort=asc">Thấp đến cao</option>
                        </select>

                        <!-- Price range selection -->
                        <select id="price-box" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="./index.php">Chọn khoảng giá</option>
                            <option <?php if ($priceRange == "0-5") { ?> selected <?php } ?> value="?<?= $queryString ?>&price_range=0-5">Dưới 5 đồng</option>
                            <option <?php if ($priceRange == "5-50000") { ?> selected <?php } ?> value="?<?= $queryString ?>&price_range=5-50000">5 - 50.000 đồng</option>
                            <option <?php if ($priceRange == "50000-89000") { ?> selected <?php } ?> value="?<?= $queryString ?>&price_range=50000-89000">50.000 - 89.000 đồng</option>
                            <option <?php if ($priceRange == "89000-") { ?> selected <?php } ?> value="?<?= $queryString ?>&price_range=89000-">Trên 89.000 đồng</option>
                        </select>
                    </div>
            </div>
          
            <?php include './pagination.php'; ?>
        </section>

<!-- footer section -->
    <footer>
        <div class="footer" style="background:var(--green);">
            <div class="in-footer-body" >

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
        <div class="footer-bottom" style="background:var(--dark-color);">
            <p>&copy; 2023 sachtore</p>
        </div>
    </footer>

    </section>

</section>

     <!-- Arrivals section end -->


    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Custom js file link -->
    <script src="./js/script2.js"></script>


</body>
</html>
