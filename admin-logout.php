<?php
// Khởi động phiên làm việc
session_start();

// Hủy phiên làm việc để đăng xuất người dùng
session_destroy();

// Chuyển hướng người dùng về trang index.php sau khi đăng xuất thành công
header('Location: admin-dashboard.php');
exit;
?>