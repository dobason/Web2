<?php
// Kết nối đến cơ sở dữ liệu
require_once 'db/dbhelper.php';

// Kiểm tra xem có dữ liệu được gửi từ phía client không
if (isset($_POST['maHD'])) {
    // Lấy mã hóa đơn từ dữ liệu gửi đi
    $maHD = $_POST['maHD'];

    // Kết nối đến cơ sở dữ liệu
    $conn = openDatabaseConnection();

    if ($conn) {
        // Chuẩn bị truy vấn cập nhật giá trị của cột Tinh_Trang thành "Xác nhận"
        $sql = "UPDATE hoa_don SET Tinh_Trang = 'Xác nhận' WHERE Ma_HD = '$maHD'";

        // Thực thi truy vấn
        if (mysqli_query($conn, $sql)) {
            // Trả về phản hồi thành công
            echo 'success';
        } else {
            // Trả về phản hồi thất bại nếu có lỗi xảy ra
            echo 'error';
        }

        // Đóng kết nối CSDL
        mysqli_close($conn);
    } else {
        // Trả về phản hồi thất bại nếu không thể kết nối đến CSDL
        echo 'error';
    }
} else {
    // Trả về phản hồi thất bại nếu không có dữ liệu được gửi đi từ client
    echo 'error';
}
?>
