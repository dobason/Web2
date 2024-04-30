<?php
session_start();

// Hàm kiểm tra xem người dùng đã đăng nhập hay chưa
function checkLoggedIn() {
    if (isset($_SESSION['Ma_KH'])) {
        return true;
    } else {
        return false;
    }
}
?>
