<?php
session_start();
require_once 'db/dbhelper.php';

// Kiểm tra xem Ma_KH đã được lưu trong session hay không
if (isset($_SESSION['Ma_KH'])) {
    // Mở kết nối đến CSDL
    $conn = openDatabaseConnection();

    // Kiểm tra kết nối CSDL
    if ($conn) {
        // Lấy Ma_KH từ session
        $maKH = $_SESSION['Ma_KH'];

        // Lấy mã hóa đơn từ URL (trong trường hợp này là biến GET 'maHD')
        if (isset($_GET['maHD'])) {
            $maHD = $_GET['maHD'];

            // Truy vấn để lấy thông tin của hóa đơn có mã hóa đơn mong muốn và có cùng Ma_KH
            $sql = "SELECT Ma_HD, Ten_Nguoi_Nhan_Hang, SDT, Dia_Chi_Nhan_Hang, Phuong, Quan, Thanh_Pho, Tong_Tien, Thanh_Toan, Ngay_DH, Ngay_GH, Thanh_Toan, Tinh_Trang
                    FROM hoa_don 
                    WHERE Ma_HD = '$maHD'";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                // Kiểm tra xem có hóa đơn nào trả về không
                if (mysqli_num_rows($result) > 0) {
                    echo "<div class='container'>";

                    // Lặp qua từng dòng kết quả để hiển thị thông tin hóa đơn
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<div class='bill-info'>";
                        echo "<h2>Hóa đơn thanh toán</h2>";
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
                        if ($row['Tinh_Trang'] !== 'Đã hủy' && $row['Tinh_Trang'] !== 'xác nhận '&& $row['Tinh_Trang'] !== '0') {
                            echo "<p>Ngày Giao Hàng: " . $row['Ngay_GH'] . "</p>";
                        }

                        echo "<p>Tình trạng: " . $row['Tinh_Trang'] . "</p>";

                        echo "</div>"; // Đóng bill-info div
                    }

                    echo "<a href='admin-bill.php' class='back-btn'>Quay lại</a>";
                    echo "</div>"; // Đóng container div
                } else {
                    echo "Không có hóa đơn nào có mã $maHD cho mã khách hàng $maKH.";
                }
            } else {
                echo "Lỗi truy vấn: " . mysqli_error($conn);
            }
        } else {
            echo "Không tìm thấy mã hóa đơn trong URL.";
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
    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #e3f2fd;
        box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
    }

    .bill-info {
        margin-top: 20px;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #ffffff;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    table, th, td {
        border: 1px solid black;
        padding: 8px;
    }

    th {
        background-color: #f2f2f2;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    tr:hover {
        background-color: #f1f1f1;
    }

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

    .back-btn:hover {
        background-color: #45a049;
    }
</style>
