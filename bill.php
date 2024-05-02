<?php
session_start();

require_once 'db/dbhelper.php';

if (isset($_SESSION['Ma_KH'])) {
    $maKH = $_SESSION['Ma_KH']; // Lấy Ma_KH từ session
    $totalAmount = $_SESSION['totalAmount'];
    $conn = openDatabaseConnection(); // Mở kết nối đến cơ sở dữ liệu

    // Truy vấn cơ sở dữ liệu để lấy thông tin đơn hàng dựa trên Ma_KH
    $sql = "SELECT hd.*, kh.Ten_KH
            FROM hoa_don hd
            LEFT JOIN khach_hang kh ON hd.Ma_KH = kh.Ma_KH
            WHERE hd.Ma_KH = '$maKH'";


    $conn = openDatabaseConnection(); // Mở kết nối đến cơ sở dữ liệu

    // Thực thi truy vấn
    $result = executeResult($sql);

    // Hiển thị thông tin đơn hàng trong trang bill.php
    if (!empty($result)) {
        $order = $result[0]; // Lấy thông tin đơn hàng đầu tiên
       
        echo '<div class="order-info">';
        echo "<h2>Thông tin đơn hàng</h2>";
        echo "<p><strong>Mã đơn hàng:</strong> " . $order['MaHD'] . "</p>";
        echo "<p><strong>Mã khách hàng:</strong> " . $order['Ma_KH'] . "</p>";
        echo "<p><strong>Tên khách hàng:</strong> " . $order['Ten_KH'] . "</p>";
        echo "<p><strong>Tên người nhận hàng:</strong> " . $order['Ten_Nguoi_Nhan_Hang'] . "</p>";
        echo "<p><strong>Số điện thoại:</strong> " . $order['SDT'] . "</p>";
        echo "<p><strong>Địa chỉ nhận hàng:</strong> " . $order['Dia_Chi_Nhan_Hang'] . "</p>";
        echo "<p><strong>Thành phố:</strong> " . $order['Thanh_Pho'] . "</p>";
        echo "<p><strong>Quận:</strong> " . $order['Quan'] . "</p>";
        echo "<p><strong>Phường:</strong> " . $order['Phuong'] . "</p>";
        echo "<p><strong>Tổng tiền:</strong> " .   number_format($totalAmount) . " VNĐ</p>";
        echo "<p><strong>Ngày đặt hàng:</strong> " .  $ngayDH = date('Y-m-d') . "</p>"; // Hiển thị ngày đặt hàng
        echo '<button class="back-btn" onclick="window.location.href=\'index.php\'">Quay về trang chủ</button>';
        echo '</div>';

        // Thêm thông tin đơn hàng vào bảng hoa_don
        $maKH = $order['Ma_KH'];
        $tenNguoiNhan = $order['Ten_Nguoi_Nhan_Hang'];
        $soDienThoai = $order['SDT'];
        $diaChiNhanHang = $order['Dia_Chi_Nhan_Hang'];
        $thanhPho = $order['Thanh_Pho'];
        $quan = $order['Quan'];
        $phuong = $order['Phuong'];
        $tongTien = number_format($totalAmount);
        $tinhTrang = $order['Tinh_Trang'];
        $ngayDH = date('Y-m-d'); // Lấy ngày hiện tại

        $sqlInsertHoaDon = "INSERT INTO hoa_don (Ma_KH, Ten_Nguoi_Nhan_Hang, SDT, Dia_Chi_Nhan_Hang, Thanh_Pho, Quan, Phuong, Tong_Tien, Tinh_Trang, Ngay_DH) 
                            VALUES ('$maKH', '$tenNguoiNhan', '$soDienThoai', '$diaChiNhanHang', '$thanhPho', '$quan', '$phuong', '$tongTien', '$tinhTrang', '$ngayDH')";

        // Thực thi truy vấn
        $resultInsertHoaDon = execute($sqlInsertHoaDon);

        // Kiểm tra kết quả thực hiện truy vấn
        if ($resultInsertHoaDon) {
            // Xử lý thành công, tiếp tục xóa các mục trong bảng gio_hang
            $sqlDeleteGioHang = "DELETE FROM gio_hang WHERE Ma_KH = '$maKH'";

            // Thực thi truy vấn xóa trong bảng gio_hang
            $resultDeleteGioHang = execute($sqlDeleteGioHang);

            if ($resultDeleteGioHang) {
                echo "Đã xử lý thành công đơn hàng và xóa sản phẩm trong giỏ hàng.";
            } else {
                echo "Xảy ra lỗi khi xóa sản phẩm trong giỏ hàng.";
            }
        } else {
            echo "Xảy ra lỗi khi thêm đơn hàng mới.";
        }
    } else {
        echo "Không tìm thấy thông tin đơn hàng.";
    }

    // Đóng kết nối đến cơ sở dữ liệu
    mysqli_close($conn);
} else {
    echo "Không tìm thấy mã đơn hàng.";
}
?>

<style>
    .order-info {
        width: 60%;
        margin: 50px auto;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        background-color: #f9f9f9;
        text-align: center;
    }

    .order-info h2 {
        color: #333;
    }

    .order-info p {
        margin-bottom: 10px;
        text-align: left;
    }

    .back-btn {
        margin-top: 20px;
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .back-btn:hover {
        background-color: #0056b3;
    }
</style>
