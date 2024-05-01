<?php
session_start();

require_once 'db/dbhelper.php';

// Kiểm tra xem người dùng đã đăng nhập hay chưa
if (isset($_SESSION['Ma_KH'])) {
    $maKH = $_SESSION['Ma_KH']; // Lấy mã khách hàng từ session

    // Kiểm tra xem form đã được gửi đi chưa
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Nhận dữ liệu từ form payment.php
        $tenNguoiNhan = $_POST['name'];
        $sdt = $_POST['phoneNumber'];
        $diaChi = $_POST['deliveryAddress'];
        $thanhPho = $_POST['city'];
        $quanHuyen = $_POST['district'];
        $phuongXa = $_POST['ward'];
        $tongHoaDon = isset($_POST['totalAmount']) ? $_POST['totalAmount'] : 0; // Lấy tổng hóa đơn từ form (nếu có)
        $ngayDatHang = date('Y-m-d H:i:s'); // Lấy ngày hiện tại làm ngày đặt hàng

        // Thêm đơn hàng mới vào cơ sở dữ liệu
        $conn = openDatabaseConnection(); // Mở kết nối đến cơ sở dữ liệu
        $sqlInsert = "INSERT INTO hoa_don (Ma_KH, Ten_Nguoi_Nhan_Hang, SDT, Dia_Chi_Nhan_Hang, Thanh_Pho, Quan, Phuong, Tong_Tien, Ngay_DH, Tinh_Trang)
                      VALUES ('$maKH', '$tenNguoiNhan', '$sdt', '$diaChi', '$thanhPho', '$quanHuyen', '$phuongXa', '$tongHoaDon', '$ngayDatHang', '0')";

        $resultInsert = execute($sqlInsert);

        if ($resultInsert) {
            // Lưu MaHD vào session (nếu cơ sở dữ liệu tự động tạo MaHD)
            // Lấy MaHD được tự động tạo bởi cơ sở dữ liệu (với cách cấu hình cụ thể)

            // Chuyển hướng đến trang bill.php
            header('Location: bill.php');
            exit(); // Dừng luồng thực thi để chuyển hướng
        } else {
            echo "Lỗi khi tạo đơn hàng mới.";
        }

        // Đóng kết nối đến cơ sở dữ liệu
        mysqli_close($conn);
    } else {
        echo "Dữ liệu form không được gửi đi.";
    }
} else {
    // Nếu không có mã khách hàng trong session, yêu cầu người dùng đăng nhập
    echo "Vui lòng đăng nhập để thực hiện thanh toán.";
    header('Location: dangnhap.php');
    exit(); // Dừng luồng thực thi để chuyển hướng
}
?>
