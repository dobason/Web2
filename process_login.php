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

            // Lấy Ma_KH của người dùng
            $ma_khach_hang = $user['Ma_KH'];

            // Kiểm tra xem đã có giỏ hàng nào của người dùng này chưa
            $check_sql = "SELECT * FROM gio_hang WHERE Ma_KH = ?";
            $check_params = ['i', $ma_khach_hang];
            $existing_cart = executeSingleResult($check_sql, $check_params);

            if (!$existing_cart) {
                // Nếu chưa có giỏ hàng, thêm mới vào bảng gio_hang
                $insert_sql = "INSERT INTO gio_hang (Ma_KH) VALUES (?)";
                $insert_params = ['i', $ma_khach_hang];
                $result = execute($insert_sql, $insert_params);

                if ($result) {
                    // Chuyển hướng người dùng đến trang chính sau khi đăng nhập thành công
                    header('Location: index.php');
                    exit();
                } else {
                    echo "Có lỗi khi thêm giỏ hàng mới: " . getDbError();
                }
            } else {
                // Đã có giỏ hàng của người dùng này
                header('Location: index.php');
                exit();
            }
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
