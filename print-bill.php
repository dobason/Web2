<?php
session_start();
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
                hd.Tong_Tien, hd.Ngay_DH, DATE_FORMAT(hd.Ngay_GH, '%Y-%m-%d') AS Ngay_GH,
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
                        <h2>Hóa đơn thanh toán</h2>
                        <p>Mã HĐ: <?php echo $row['Ma_HD']; ?></p>
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
                                echo "<td>{$rowChiTiet['Don_Gia']}</td>";
                                echo "</tr>";
                            }
                            
                            echo "</table>";
                            
                            ?>
                      
                        <p>Tổng Tiền: <?php echo $row['Tong_Tien']; ?></p>
                        <p>Phương thức thanh toán: <?php echo $row['Thanh_Toan']; ?></p>
                        <p>Ngày Đặt Hàng: <?php echo $row['Ngay_DH']; ?></p>
                        <p>Ngày Giao Hàng: <?php echo $row['Ngay_GH']; ?></p>
                           <a href="index.php"><button type="button">Quay lại trang chủ</button></a>
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
<style>
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
    text-align: left;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #e3f2fd; /* Màu xanh dương nhạt */
    max-width: 600px;
    width: 90%;
    box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1); /* Hiệu ứng bóng mờ */
}


    .back-btn {
        margin-top: 20px;
        text-align: center;
    }
</style>
