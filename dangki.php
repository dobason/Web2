<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel=" stylesheet" href="stylefont.css" />
    <link rel=" stylesheet" href="css/dangki.css" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <script src="vendor/fontawesome/js/all.min.js"></script>
    <script src="information.js"></script>
    <title>Register</title>
</head>

<body>
<?php
require_once 'db/dbhelper.php';

// Xử lý việc đăng ký khi nhấn nút Đăng ký
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ form
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    // Kiểm tra mật khẩu và xác nhận mật khẩu
    if ($password !== $confirmPassword) {
        echo '<script>alert("Mật khẩu không khớp!");</script>';
    } else {
        // Thực hiện đăng ký
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO khach_hang (Ten_KH, Tai_Khoan, Mat_Khau, Trang_Thai) VALUES ('$fullname', '$username', '$hashedPassword', 1)";

        // Thực thi truy vấn
        execute($sql);

        echo '<script>alert("Đăng ký thành công!");</script>';
    }
}
?>

<div class="wrapper">
    <form id="formDangKy" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <h1>Đăng ký</h1>
        <div class="input-box">
            <input type="text" id="fullname" name="fullname" placeholder="Họ và tên" required />
        </div>
        <div class="input-box">
            <input type="text" id="username" name="username" placeholder="Tên đăng nhập" required />
        </div>
        <div class="input-box">
            <input type="password" id="password" name="password" placeholder="Mật khẩu" required />
            <span class="show-password" onclick="togglePassword('password')"><i class="bx bx-show"></i></span>
        </div>
        <div class="input-box">
            <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Nhập lại mật khẩu" required />
            <span class="show-password" onclick="togglePassword('confirmPassword')"><i class="bx bx-show"></i></span>
        </div>
        <button type="submit" class="register">Đăng ký</button>
        <div class="login">
            <p>Đã có tài khoản? <a href="dangnhap.php">Đăng nhập</a></p>
            <p><a href="index.php"><i class="fa-solid fa-house"></i></a></p>
        </div>
    </form>
</div>
<script src="js/dangky.js"></script>

    
</body>

</html>