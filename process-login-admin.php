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
    $sql = "SELECT * FROM quan_ly WHERE Tai_Khoan = ? ";
    $params = ['s', $username];
    $user = executeSingleResult($sql, $params);

    if ($user) {
        // Tìm thấy người dùng với tên đăng nhập tương ứng và trạng thái = 1
        $stored_password = $user['Mat_Khau'];

        // Kiểm tra mật khẩu
     
            // Mật khẩu hợp lệ, đăng nhập thành công
            $_SESSION['Ma_QL'] = $user['Ma_QL']; // Lưu Ma_KH vào session

            header('Location: admin-dashboard.php');
            exit();
        
    } else {
        // Kiểm tra nếu tài khoản tồn tại nhưng bị chặn (Trang_Thai = 0)
        $sqlBlocked = "SELECT * FROM quan_ly WHERE Tai_Khoan = ?";
        $paramsBlocked = ['s', $username];
        $blockedUser = executeSingleResult($sqlBlocked, $paramsBlocked);
    }
}
?>
