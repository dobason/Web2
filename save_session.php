<?php
session_start();

if (isset($_POST['maHD'])) {
    $maHD = $_POST['maHD'];
    $_SESSION['maHD'] = $maHD;
    echo 'Session saved'; // Trả về thông báo thành công cho AJAX
} else {
    echo 'Failed to save session'; // Trả về thông báo lỗi cho AJAX
}
?>
