<?php
session_start();
require_once 'db/dbhelper.php';

// Hàm để lấy thông báo lỗi từ cơ sở dữ liệu
function getDbError() {
    global $conn; // Biến kết nối cơ sở dữ liệu của bạn

    if ($conn) {
        return mysqli_error($conn);
    } else {
        return "Không thể kết nối đến cơ sở dữ liệu.";
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Truy vấn để lấy thông tin người dùng từ tên đăng nhập
    $sql = "SELECT * FROM khach_hang WHERE Tai_Khoan = ?";
    $params = ['s', $username];
    $user = executeSingleResult($sql, $params);

    if ($user) {
        // Tìm thấy người dùng với tên đăng nhập tương ứng
        $stored_password = $user['Mat_Khau'];

        // Kiểm tra mật khẩu
        if ($password === $stored_password) {
            // Mật khẩu hợp lệ, đăng nhập thành công
            $_SESSION['Ma_KH'] = $user['Ma_KH']; // Lưu Ma_KH vào session

            header('Location: index.php');
            exit();
        } else {
            // Mật khẩu không đúng
            echo "Mật khẩu không chính xác.";
        }
    } else {
        // Người dùng không tồn tại trong cơ sở dữ liệu
        echo "Tên đăng nhập không chính xác.";
    }
}
?>
