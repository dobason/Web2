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
  
        <?php require_once 'header.php'; ?>
    </div>
</div>



<!---Kết nối database-->
<?php require('php/classes/database.php'); ?>

</header>

<?php
// Đoạn mã PHP hiện tại
require_once 'db/dbhelper.php';

// Kiểm tra xem Ma_KH đã được lưu trong session hay chưa
if (isset($_SESSION['Ma_KH'])) {
    $maKH = $_SESSION['Ma_KH'];

    // Mở kết nối đến CSDL
    $conn = openDatabaseConnection();

    // Nếu kết nối thành công
    if ($conn) {
        // Truy vấn thông tin hóa đơn mới nhất của khách hàng dựa trên Ma_KH
        $sql = "SELECT hd.Ma_HD, hd.Ten_Nguoi_Nhan_Hang, hd.SDT, hd.Dia_Chi_Nhan_Hang, 
                hd.Tong_Tien, hd.Ngay_DH, hd.Ngay_GH,
                cthd.Ten_Sach, cthd.So_Luong, cthd.Don_Gia, hd.Thanh_Toan, hd.Thanh_Pho, hd.Quan, hd.Phuong
                FROM hoa_don hd
                JOIN chi_tiet_hoa_don cthd ON hd.Ma_HD = cthd.Ma_HD
                WHERE hd.Ma_KH = '$maKH'
                ORDER BY hd.Ma_HD DESC
                LIMIT 1"; // Lấy thông tin của đơn hàng mới nhất

        $result = mysqli_query($conn, $sql);

        if ($result) {
            // Kiểm tra xem có dòng kết quả trả về không
            if (mysqli_num_rows($result) > 0) {
                // In thông tin hóa đơn mới nhất
                $row = mysqli_fetch_assoc($result);
                ?>
                <div style="display: flex; justify-content: center;  ">
                
                    <div class=bill-info>
                    <h2 style="text-align: center;">Hóa đơn thanh toán</h2>
                        <p>Mã hóa đơn: <?php echo $row['Ma_HD']; ?></p>
                        <p>Tên Người Nhận: <?php echo $row['Ten_Nguoi_Nhan_Hang']; ?></p>
                        <p>Số Điện Thoại: <?php echo $row['SDT']; ?></p>
                        <p>Địa Chỉ: <?php echo $row['Dia_Chi_Nhan_Hang'],", ",$row['Phuong'] ,", ",$row['Quan'],", ",$row['Thanh_Pho']; ?></p>
                        <!-- Hiển thị chi tiết hóa đơn -->
                       
                          
                            <?php
                            $maHD = $row['Ma_HD'];
                            $sqlChiTiet = "SELECT Ten_Sach, So_Luong, Don_Gia FROM chi_tiet_hoa_don WHERE Ma_HD = '$maHD'";
                            $resultChiTiet = mysqli_query($conn, $sqlChiTiet);
                            echo "<table>";
                            echo "<tr><th>Tên Sách</th><th>Số Lượng</th><th>Đơn Giá</th></tr>";
                            
                            while ($rowChiTiet = mysqli_fetch_assoc($resultChiTiet)) {
                                echo "<tr>";
                                echo "<td>{$rowChiTiet['Ten_Sach']}</td>";
                                echo "<td>{$rowChiTiet['So_Luong']}</td>";
                                $donGia = number_format($rowChiTiet['Don_Gia'], 0, ',', '.');
                                echo "<td>{$donGia}đ</td>";

                                echo "</tr>";
                            }
                            
                            echo "</table>";
                            
                            ?>
                      
                        <p>Tổng Tiền: <?php echo $row['Tong_Tien'] . 'đ'; ?></p>
                        <p>Phương thức thanh toán: <?php echo $row['Thanh_Toan']; ?></p>
                        <p>Ngày Đặt Hàng: <?php echo $row['Ngay_DH']; ?></p>
                        <p>Ngày Giao Hàng: <?php echo $row['Ngay_GH']; ?></p>
                        <div style="display: flex; justify-content: center;">
                            <a href="index.php"><button type="button" style="height: 50px;border-radius: 4px;background-color: var(--swiper-theme-color);">Trang chủ</button></a>
                        </div>

                    </div>
                    <div>
                        <!-- Nút quay lại trang index.php -->
                     
                    </div>
                </div>
                <?php
            } else {
                echo "Không có hóa đơn nào cho khách hàng này.";
            }
        } else {
            echo "Lỗi truy vấn CSDL: " . mysqli_error($conn);
        }

        // Đóng kết nối CSDL
        mysqli_close($conn);
    } else {
        echo "Không thể kết nối đến CSDL.";
    }
} else {
    echo "Không tìm thấy mã khách hàng trong session.";
}
?>
</body>
</html>




<style>
    p{
        font-size: large;
    }
   .h2{
    text-align: center;
   }
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

table, th, td {
    border: 1px solid black; /* Đường viền của bảng */
    padding: 8px;
}

th {

}

tr:nth-child(even) {
}

tr:hover {
    background-color: #f1f1f1; /* Màu nền khi di chuột qua các hàng */
}


    .centered {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 80vh; /* chiều cao tương đối cho div */
    }
    .bill-info {
    text-align: left; /* căn lề văn bản sang trái */
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #e3f2fd; /* Màu nền */
    max-width: 800px;
    width: 90%;
    box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1); /* Hiệu ứng bóng mờ */
    position: absolute; /* Vị trí tuyệt đối */
    top: 50%; /* Đặt phần tử ở giữa theo chiều dọc */
    left: 50%; /* Đặt phần tử ở giữa theo chiều ngang */
    transform: translate(-50%, -50%); /* Dịch chuyển phần tử 50% theo chiều ngang và dọc */
    }

    .back-btn {
        margin-top: 20px;
        text-align: center;
    }
</style>