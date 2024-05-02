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

    // Truy vấn để lấy thông tin người dùng từ tên đăng nhập và trạng thái = 1
    $sql = "SELECT * FROM khach_hang WHERE Tai_Khoan = ? AND Trang_Thai = 1";
    $params = ['s', $username];
    $user = executeSingleResult($sql, $params);

    if ($user) {
        // Tìm thấy người dùng với tên đăng nhập tương ứng và trạng thái = 1
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
        // Kiểm tra nếu tài khoản tồn tại nhưng bị chặn (Trang_Thai = 0)
        $sqlBlocked = "SELECT * FROM khach_hang WHERE Tai_Khoan = ? AND Trang_Thai = 0";
        $paramsBlocked = ['s', $username];
        $blockedUser = executeSingleResult($sqlBlocked, $paramsBlocked);

        if ($blockedUser) {
            // Tài khoản bị chặn
            echo "Tài khoản đã bị chặn. Vui lòng liên hệ quản trị viên để biết thêm thông tin.";
        } else {
            // Người dùng không tồn tại trong cơ sở dữ liệu
            echo "Tên đăng nhập không chính xác.";
        }
    }
}
?>
