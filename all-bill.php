<?php
session_start();
require_once 'db/dbhelper.php';

// Kiểm tra nếu có tham số maKH trong URL
if (isset($_GET['maKH'])) {
    // Lấy và xử lý giá trị maKH từ URL
    $maKH = htmlspecialchars($_GET['maKH']);
    $conn = openDatabaseConnection();

    if ($conn) {
        // Truy vấn để lấy danh sách các hóa đơn có cùng Ma_KH
        $sql = "SELECT Ma_HD, Ten_Nguoi_Nhan_Hang, Dia_Chi_Nhan_Hang, Thanh_Pho, Quan, Tong_Tien
                FROM hoa_don 
                WHERE Ma_KH = '$maKH'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                echo "<div class='container'>";
                echo "<h2>Danh sách hóa đơn</h2>";
                echo "<table>";
                echo "<tr>
                        <th>Mã hóa đơn</th>
                        <th>Tên người nhận</th>
                        <th>Địa chỉ</th>
                        <th>Tổng tiền</th>
                        <th>Xem chi tiết</th>
                    </tr>";

                // Lặp qua từng dòng kết quả để hiển thị thông tin hóa đơn trong bảng
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>{$row['Ma_HD']}</td>";
                    echo "<td>{$row['Ten_Nguoi_Nhan_Hang']}</td>";
                    echo "<td>{$row['Dia_Chi_Nhan_Hang']}, {$row['Quan']}, {$row['Thanh_Pho']}</td>";
                    echo "<td>" . number_format($row['Tong_Tien'], 0, ',', '.') . "</td>";
                    echo "<td><a href='detail-bill.php?maHD=" . urlencode($row['Ma_HD']) . "'>Chi tiết</a></td>";
                    echo "</tr>";
                }

                echo "</table>";
                echo "<a href='admin-user.php' class='back-btn'>Quay lại</a>";
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
} else {
    echo "Tham số maKH không hợp lệ.";
}
?>
<style>
    /* Thiết lập các lớp cho layout chính */
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        background-color: #f8f9fa; /* Màu nền */
    }

    a{
        text-decoration: none;
        color:#45a049;
    }
    .container {
        width: 80%;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 8px;
        background-color: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        overflow-x: auto; /* Tự động hiển thị thanh cuộn ngang khi bảng quá rộng */
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    /* Thiết lập style cho bảng */
    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
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

    /* Style cho nút quay lại */
    .back-btn {
        display: block;
        text-align: center;
        margin-top: 20px;
        padding: 10px 20px;
        background-color: #4CAF50;
        color: white;
        border-radius: 5px;
        text-decoration: none;
    }

    .back-btn:hover {
        background-color: #45a049;
    }

</style>
