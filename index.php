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
            margin-top: 10px;
            justify-content: center;
        }
        .select-container {
            display: flex;
            justify-content: space-around; /* Căn các phần tử theo chiều ngang, giữa container */
            align-items: center; /* Căn các phần tử theo chiều dọc, giữa container */
        }

        .select-container select {
            margin: 25px 130px; /* Khoảng cách giữa các dropdown */
        }

        /* Căn giữa các option trong dropdown */
        .select-container select option {
            text-align: center;
        }

    </style>



    <header>

        <!--Navbar-->
        <nav class="navbar navbar-expand-lg fixed-to">
            <div class="container">
                <a class="navbar-brand" href="#">GOODREADS</a>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <form class="d-flex" method="GET">
                        <input class="form-control me-2" type="search" placeholder="Tìm kiếm sản phẩm" aria-label="Search" name="Ten_Sach">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                        <div id="bookListContainer"></div>
                    </form>
                </div>
                <div class="top-right-item">
                    <a href="cart.php" id="gioHangLink"><i class="fa-solid fa-cart-shopping"></i></a>
                    <p id="cartItemCount">0</p>
                </div>
                <?php require_once 'header.php'; ?>
                <button class="navbar-toggler pe-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
       
        <!---Kết nối database-->
        <?php require('./php/classes/database.php'); ?>

    </header>


    <main>
        <!------------------------------------------------------------------>
     
        <div class="slider5">
            <div class="in-slider5">
                <section class="slider-product-one">
                    <div class="slider-product-one-content">
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
                     
                       
                        <div class="box">
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
                        <?php include './pagination.php'; ?>
                    </div>
                </section>
            </div>
        </div>

        <!------------------------------------------------------------------>
      
       
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