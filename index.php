<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sachtore</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="vendor/fontawesome/js/all.min.js"></script>
    <script src="js/main.js"> </script>
    <script src="js/search.js"></script>

    <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
    <!-- Đường dẫn tới tệp CSS bạn đã chỉnh sửa -->

</head>

<body>
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
        }

        
    </style>
    <header>
        <?php
        require('./php/classes/database.php');
        ?>
        <div class="big-menu">


            <div class="in-big-menu">
                <div class="logo">
                    <a href="index.html" onclick="momodal()"><img src="IMG/logo.jpg"></a>
                </div>
                <?php
                require_once 'db/dbhelper.php';

                $param = "";
                $sortParam = "";
                $orderCondition = "";

                // Tìm kiếm
                $search = isset($_GET['Ten_Sach']) ? $_GET['Ten_Sach'] : "";
                if ($search) {
                    $where = "WHERE `Ten_Sach` LIKE '%" . $search . "%'";
                    $param .= "Ten_Sach=" . $search . "&";
                    $sortParam = "Ten_Sach=" . $search . "&";
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



                <div class="box">
                    <form class="container-1" method="GET">
                        <button type="submit"><span class="icon"><i class="fa fa-search"></i></span></button>
                        <input type="text" id="search" value="<?= isset($_GET['Ten_Sach']) ? ($_GET['Ten_Sach']) : "" ?>" name="Ten_Sach" placeholder="Tìm kiếm...">
                    </form>
                    <select id="sort-box" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                        <option value="">Sắp xếp giá</option>
                        <option <?php if (isset($_GET['sort']) && $_GET['sort'] == "desc") { ?> selected <?php } ?> value="?<?= $sortParam ?>field=Don_Gia&sort=desc">Cao đến thấp</option>
                        <option <?php if (isset($_GET['sort']) && $_GET['sort'] == "asc") { ?> selected <?php } ?> value="?<?= $sortParam ?>field=Don_Gia&sort=asc">Thấp đến cao</option>
                    </select>
                </div>
            </div>



            <div class="top-right-item">

                <i class="fa fa-user"></i>
                <span class="text-tk">
                    <p id="namelogin">Tài khoản<i class="fa fa-caret-down"></i></p>
                    <div class="dropdown-content">
                        <a href="dangnhap.html" class="dropdown-item"><i class="np fa fa-arrow-right"></i>Đăng
                            nhập</a>
                        <a href="dangki.html" class="dropdown-item"><i class="np fa fa-user-plus"></i>Đăng ký</a>
                    </div>
                </span>

            </div>

            <div class="top-right-item">
                <a href="cart.html" id="gioHangLink"><i class="fa fa-shopping-basket" aria-hidden="true"></i></a>
                <p id="cartItemCount">0</p>
            </div>

        </div>
        </div>
        <div class="menu-bar">
            <div class="menu-bar-content">
                <ul>
                    <li><a href="web1.html"><i class="fa-solid fa-book"></i> Văn học trong nước <span class="menu-bar-content-icon"> <i class="fa-solid fa-caret-down"></i></span></a>
                        <div class="sub-menu">
                            <ul>
                                <div class="in-sub-menu">
                                    <div class="sub-menu1">
                                        <li> <a href="web1.html">Tiểu thuyết</a></li>
                                        <li> <a href="web1.html">Truyện ngắn</a></li>
                                        <li> <a href="web1.html">Light Novel</a></li>
                                        <li> <a href="web1.html">Trinh thám</a></li>


                                    </div>
                                    <div class="sub-menu3">
                                        <li> <a href="web1.html">Ngôn Tình
                                            </a></li>
                                        <li> <a href="web1.html">Thơ Ca
                                            </a></li>
                                        <li> <a href="web1.html">Huyền bí
                                            </a></li>
                                        <li> <a href="web1.html">Combo Văn Học
                                            </a></li>
                                        <li> <a href="web1.html"> Tất cả sách ></a></li>
                                    </div>

                                    <div class="sub-menu-pic">
                                        <li> <a href="#"><img src="IMG/menu1.jpg"></a></li>

                                    </div>
                                </div>
                            </ul>
                        </div>
                    </li>
                    <li><a href="#"><i class="fa-solid fa-paintbrush"></i> Sách theo chủ đề <i class="fa-solid fa-caret-down"></i></a>
                        <div class="sub-menu">
                            <ul>
                                <div class="in-sub-menu">
                                    <div class="sub-menu2">
                                        <div class="in-sub-menu2">
                                            <li> <a href="#">Trí tuệ Do Thái</a></li>
                                            <li> <a href="#">Ngoại ngữ</a></li>
                                            <li> <a href="#">Triết học Phương Đông</a></li>
                                            <li> <a href="#">Triết học Phương Tây</a></li>


                                        </div>

                                    </div>
                                    <div class="sub-menu3">
                                        <li> <a href="#">Chính trị </a></li>
                                        <li> <a href="#">Lịch sử thế giới</a></li>
                                        <li> <a href="#">Tôn giáo</a></li>
                                        <li> <a href="#">Kỹ năng sống</a></li>
                                        <li> <a href="web1.html">Tất cả sách ></a></li>

                                    </div>



                                    <div class="sub-menu-pic">
                                        <li> <a href="#"><img src="IMG/menu1.jpg"></a></li>

                                    </div>
                                </div>
                            </ul>
                        </div>
                    </li>
                    <li><a href="#"><i class="fa-solid fa-tablet"></i> Truyện tranh - Thiếu nhi <i class="fa-solid fa-caret-down"></i></a>
                        <div class="sub-menu">
                            <ul>
                                <div class="in-sub-menu">
                                    <div class="sub-menu1">
                                        <li> <a href="#">Sách truyện thiếu nhi</a></li>
                                        <li> <a href="#">Sách teen</a></li>
                                        <li> <a href="#">Doraemon</a></li>
                                        <li> <a href="#">Conan</a></li>
                                        <li> <a href="#">Tặng kèm poster</a></li>
                                    </div>


                                    <div class="sub-menu3">
                                        <li> <a href="#">Sách ảnh</a></li>
                                        <li> <a href="#">Triết học cho trẻ</a></li>
                                        <li> <a href="#">Nhập môn lập trình</a></li>
                                        <li> <a href="#">Tư tưởng Hồ Chí Minh</a></li>
                                        <li> <a href="#">Triết học Mác - Lênin</a></li>
                                        <li> <a href="web1.html">Tất cả sách ></a></li>
                                    </div>

                                    <div class="sub-menu-pic">
                                        <li> <a href="#"><img src="IMG/menu1.jpg"></a></li>

                                    </div>
                                </div>
                            </ul>
                        </div>
                    </li>

                    <li><a href="#"><i class="fa-solid fa-gift"></i> Sách giáo khoa <i class="fa-solid fa-caret-down"></i></a>
                        <div class="sub-menu">
                            <ul>
                                <div class="in-sub-menu">
                                    <div class="sub-menu2">
                                        <div class="in-sub-menu2">
                                            <li> <a href="#">Sách giáo khoa cấp 1</a></li>
                                            <li> <a href="#">Sách giáo khoa cấp 2</a></li>
                                            <li> <a href="#">Sách giáo khoa cấp 3</a></li>
                                            <li> <a href="#">Sách giáo khoa nâng cao</a></li>
                                        </div>

                                    </div>
                                    <div class="sub-menu3">
                                        <li> <a href="#">Bộ đề thi các năm</a></li>
                                        <li> <a href="#">Luyện đề Ielts</a></li>
                                        <li> <a href="#">Sách bài tập nâng cao</a></li>
                                        <li> <a href="#">Sách Mai Lan Hương</a></li>
                                        <li> <a href="web1.html">Tất cả sách ></a></li>
                                    </div>

                                    <div class="sub-menu-pic">
                                        <li> <a href="#"><img src="IMG/menu1.jpg"></a></li>

                                    </div>
                                </div>
                            </ul>
                        </div>
                    </li>


                </ul>
            </div>
        </div>

        <div id="backtop">
            <i class="fa-solid fa-arrow-up"></i>

        </div>
    </header>

    <main>


        <!----------------------------------slider1--------------------------->
        <div class="slider1">
            <div class="in-slider1">
                <div class="slidebody">
                    <div class="in-slidebody-left">
                        <a href="#"><img src="IMG/left-top.jpg"></a>
                        <a href="#"><img src="IMG/slide2.jpg"></a>
                    </div>
                    <div class="in-slidebody-right">
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

        <!------------------------------------------------------------------>
        <div class="slider5">
            <div class="in-slider5">
                <section class="slider-product-one">
                    <div class="slider-product-one-content">

                        <div class="slider-product-one-content-items" id="bookListContainer">
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
                        <?php include './pagination.php'; // Hiển thị phân trang 
                        ?>

                    </div>

                </section>

            </div>

        </div>








    </main>
    <footer>
        <div class="footer">


            <div class="in-footer-body">
                <div class="in-footer-body-left">
                    <p>Phương thức thanh toán</p>
                    <li><img src="IMG/pay1.png"></li>
                    <li><img src="IMG/pay2.png"></li>
                    <li><img src="IMG/pay3.png"></li>
                    <li><img src="IMG/pay4.png"></li>
                    <li><img src="IMG/pay5.webp"></li>
                </div>

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
                    <li><a href="#"><img src="IMG/contact1.webp"></a></li>
                    <li><a href="https://www.facebook.com/profile.php?id=100066245906401"><img src="IMG/contact2.webp"></a></li>
                    <li><a href="#"><img src="IMG/contact3.webp"></a></li>
                    <li><a href="#"><img src="IMG/contact4.webp"></a></li>
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
    <script src="js/p.js"></script>
</body>

</html>