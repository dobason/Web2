<?php
require_once 'db/dbhelper.php';

// Kiểm tra nếu có dữ liệu POST gửi từ form chỉnh sửa thông tin khách hàng
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $customerId = $_POST['customerId'];
    $customerName = $_POST['editName'];
    $customerAccount = $_POST['editAccount'];
    $customerPassword = $_POST['editPassword'];

    // Cập nhật thông tin khách hàng trong cơ sở dữ liệu
    $sql = "UPDATE khach_hang 
            SET Ten_KH = '$customerName', Tai_Khoan = '$customerAccount', Mat_Khau = '$customerPassword'
            WHERE Ma_KH = '$customerId'";
    $result = execute($sql);


        // Chuyển hướng người dùng về trang hiển thị danh sách khách hàng sau khi chỉnh sửa thành công
        header('Location: admin-user.php');
        exit();

} else {
    echo 'Phương thức không hợp lệ.';
}
?>
