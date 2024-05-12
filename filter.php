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
                        $minPrice = isset($_GET['min_price']) ? $_GET['min_price'] : "";
                        $maxPrice = isset($_GET['max_price']) ? $_GET['max_price'] : "";

                        if (!empty($minPrice) && !empty($maxPrice)) {
                            $minPrice = intval($minPrice);
                            $maxPrice = intval($maxPrice);

                            if (empty($where)) {
                                $where = " WHERE `Don_Gia` >= $minPrice AND `Don_Gia` <= $maxPrice";
                            } else {
                                $where .= " AND `Don_Gia` >= $minPrice AND `Don_Gia` <= $maxPrice";
                            }

                            $param['min_price'] = $minPrice;
                            $param['max_price'] = $maxPrice;
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

<div class="slider5">
    <div class="in-slider5">
    <div class="box">
    <form action="filter.php" method="post">
        <!-- Category selection -->
        <div class="select-container">
            <label for="theme-box">Chọn chủ đề:</label>
            <select id="theme-box" name="theme">
                <option value="">Chọn chủ đề</option>
                <option value="1" <?= ($theme == "1") ? 'selected' : '' ?>>Chung</option>
                <option value="2" <?= ($theme == "2") ? 'selected' : '' ?>>Lịch sử</option>
                <option value="3" <?= ($theme == "3") ? 'selected' : '' ?>>Truyện tranh & Mangas</option>
                <option value="4" <?= ($theme == "4") ? 'selected' : '' ?>>Phim & Nhiếp ảnh</option>
                <option value="5" <?= ($theme == "5") ? 'selected' : '' ?>>Kinh dị</option>
                <option value="6" <?= ($theme == "6") ? 'selected' : '' ?>>Máy tính & Internet</option>
                <option value="7" <?= ($theme == "7") ? 'selected' : '' ?>>Thể Thao</option>
                <option value="8" <?= ($theme == "8") ? 'selected' : '' ?>>Du lịch lữ hành</option>
                <option value="9" <?= ($theme == "9") ? 'selected' : '' ?>>Kinh doanh & Kinh tế</option>
                <option value="10" <?= ($theme == "10") ? 'selected' : '' ?>>Nghệ thuật</option>
            </select>
        </div>

        <!-- Price range selection -->
        <div class="select-container">
            <label for="min-price">Giá từ:</label>
            <input type="number" id="min-price" name="min_price" value="<?= isset($_POST['min_price']) ? $_POST['min_price'] : '' ?>" placeholder="Nhập giá tối thiểu">
            <label for="max-price">đến:</label>
            <input type="number" id="max-price" name="max_price" value="<?= isset($_POST['max_price']) ? $_POST['max_price'] : '' ?>" placeholder="Nhập giá tối đa">
         
        </div>

        <!-- Sorting options -->
        <div class="select-container">
            <label for="sort-box">Sắp xếp giá:</label>
            <select id="sort-box" name="sort">
                <option value="">Sắp xếp giá</option>
                <option value="desc" <?= ($orderField == "Don_Gia" && $orderSort == "desc") ? 'selected' : '' ?>>Cao đến thấp</option>
                <option value="asc" <?= ($orderField == "Don_Gia" && $orderSort == "asc") ? 'selected' : '' ?>>Thấp đến cao</option>
            </select>
        </div>
        <button type="submit">Lọc</button>
    </form>
</div>

    </div>
</div>

<script>
function applyFilter() {
    var formData = $('#filterForm').serialize();
    $.ajax({
        type: 'POST',
        url: 'filter.php',
        data: formData,
        success: function(response) {
            $('#filteredProducts').html(response);
        }
    });
}
</script>




        
        <div class="slider5">
            <div class="in-slider5">
                
                <section class="slider-product-one">
                    <div class="slider-product-one-content">
                        
                  

                        


                        <div class="slider-product-one-content-items" id="bookListContainer" style="justify-content:left">
                        <?php
// Lấy thông tin lọc từ phương thức POST
$theme = $_POST['theme'] ?? '';
$minPrice = $_POST['min_price'] ?? '';
$maxPrice = $_POST['max_price'] ?? '';

// Xây dựng câu truy vấn SQL dựa trên các thông tin lọc
$sql = "SELECT * FROM sach WHERE 1 = 1";

if (!empty($theme)) {
    $sql .= " AND Ma_Loai = '" . $theme . "'";
}

if (!empty($minPrice) && !empty($maxPrice)) {
    $sql .= " AND Don_Gia BETWEEN " . $minPrice . " AND " . $maxPrice;
}

// Thực thi truy vấn SQL để lấy danh sách sách lọc
$sach = executeResult($sql);

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