<?php
session_start();
require_once 'db/dbhelper.php';

// Kiểm tra xem Ma_KH đã được lưu trong session hay không
    // Mở kết nối đến CSDL
    $conn = openDatabaseConnection();

    // Kiểm tra kết nối CSDL
    if ($conn) {
        // Lấy Ma_KH từ database nếu bên trang admin thì lấy $_GET['Ma_KH] còn bên trang user lấy $_SESSION['Ma_KH']    
        $maKH = !isset($_GET['Ma_KH']) ? $_SESSION['Ma_KH'] : $_GET['Ma_KH'];
    
        // Truy vấn để lấy danh sách các hóa đơn có cùng Ma_KH
        $sql = "SELECT Ma_HD, Ten_Nguoi_Nhan_Hang, SDT, Dia_Chi_Nhan_Hang, Phuong, Quan, Thanh_Pho, Tong_Tien, Thanh_Toan, Ngay_DH, Ngay_GH, Thanh_Toan, Tinh_Trang
        FROM hoa_don 
        WHERE Ma_KH = '$maKH'";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            // Kiểm tra xem có hóa đơn nào trả về không
            if (mysqli_num_rows($result) > 0) {
                echo "<div class='container'>";

                // Lặp qua từng dòng kết quả để hiển thị thông tin hóa đơn
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='bill-info'>"; // Áp dụng CSS cho mỗi hóa đơn nhỏ
                    echo "<div style='text-align: center;'>";
                    echo "<h2>Hóa đơn thanh toán</h2>";
                    echo "</div>";
                    echo "<p>Mã HĐ: " . $row['Ma_HD'] . "</p>";
                    echo "<p>Tên Người Nhận: " . $row['Ten_Nguoi_Nhan_Hang'] . "</p>";
                    echo "<p>Số Điện Thoại: " . $row['SDT'] . "</p>";
                    echo "<p>Địa Chỉ: " . $row['Dia_Chi_Nhan_Hang'] . ", " . $row['Phuong'] . ", " . $row['Quan'] . ", " . $row['Thanh_Pho'] . "</p>";
                
                    // Truy vấn chi tiết hóa đơn dựa trên Ma_HD
                    $maHD = $row['Ma_HD'];
                    $sql_detail = "SELECT Ten_Sach, So_Luong, Don_Gia FROM chi_tiet_hoa_don WHERE Ma_HD = '$maHD'";
                    $result_detail = mysqli_query($conn, $sql_detail);
                
                    if ($result_detail && mysqli_num_rows($result_detail) > 0) {
                        echo "<table border='1'>";
                        echo "<tr><th>Tên Sách</th><th>Số Lượng</th><th>Đơn Giá</th><th>Tổng</th></tr>";
                
                        // Hiển thị chi tiết từng hóa đơn
                        while ($row_detail = mysqli_fetch_assoc($result_detail)) {
                            echo "<tr>";
                            echo "<td>" . $row_detail['Ten_Sach'] . "</td>";
                            echo "<td>" . $row_detail['So_Luong'] . "</td>";
                            echo "<td>" . number_format($row_detail['Don_Gia'], 0, ',', '.') . "</td>";
                
                            // Tính toán tổng
                            $tong = $row_detail['So_Luong'] * $row_detail['Don_Gia'];
                            echo "<td>" . number_format($tong, 0, ',', '.') . "</td>";
                
                            echo "</tr>";
                        }
                
                        echo "</table>";
                    } else {
                        echo "Không có chi tiết hóa đơn nào cho mã hóa đơn $maHD.";
                    }
                
                    echo "<p>Tổng Tiền: " . number_format($row['Tong_Tien'], 0, ',', '.') . "</p>";
                    echo "<p>Phương thức thanh toán: " . $row['Thanh_Toan'] . "</p>";
                    echo "<p>Ngày Đặt Hàng: " . $row['Ngay_DH'] . "</p>";
                
                    // Kiểm tra và hiển thị ngày giao hàng nếu tình trạng không phải là 'đã hủy' hoặc 'xác nhận'
                    if ($row['Tinh_Trang'] !== 'Đã hủy' && $row['Tinh_Trang'] !== 'Xác nhận' && $row['Tinh_Trang'] !== '0') {
                        echo "<p>Ngày Giao Hàng: " . $row['Ngay_GH'] . "</p>";
                    }
                
                    echo "<p>Tình trạng: " . $row['Tinh_Trang'] . "</p>";
                
                    echo "</div>"; // Đóng bill-info div
                }
                

                echo "<a href='index.php' class='back-btn'>Quay lại</a>";
                echo "</div>"; // Đóng container div
            } else {
                echo "Không có hóa đơn nào cho mã khách hàng $maKH.";
            }
        } else {
            echo "Lỗi truy vấn: " . mysqli_error($conn);
        }

        // Đóng kết nối CSDL
        mysqli_close($conn);
    } else {
        echo "Không thể kết nối đến CSDL.";
    }
?>
<style>
    /* CSS cho phần tử container chứa tất cả hóa đơn */
    .container {
        max-width: 700px;
        margin: 0 auto;
        padding: 20px;
    
  
   
        box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
    }

    /* CSS cho mỗi hóa đơn nhỏ */
    .bill-info {
        margin-top: 20px;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #ffffff;
    }

    /* CSS cho bảng hiển thị chi tiết hóa đơn */
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    /* CSS cho các cell và header của bảng */
    table, th, td {
        border: 1px solid black;
        padding: 8px;
    }

    /* CSS cho header của bảng */
    th {
        background-color: #f2f2f2;
    }

    /* CSS cho dòng của bảng khi là dòng chẵn */
    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    /* CSS cho dòng của bảng khi hover */
    tr:hover {
        background-color: #f1f1f1;
    }

    /* CSS cho nút quay lại */
    .back-btn {
        display: block;
        text-align: center;
        margin-top: 20px;
        text-decoration: none;
        padding: 10px 20px;
        background-color: #4CAF50;
        color: white;
        border-radius: 5px;
    }

    /* CSS cho nút quay lại khi hover */
    .back-btn:hover {
        background-color: #45a049;
    }
</style>
