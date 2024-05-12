<?php 
    session_start();

    // Kiểm tra nếu người dùng đã đăng nhập
    if(isset($_SESSION['admin'])) {
        // Nếu đã đăng nhập, chuyển hướng người dùng đến trang admin-dashboard.php
        header('Location: admin-dashboard.php');
        exit;
    }

    // Xử lý đăng xuất
    if(isset($_POST['logout'])) {
        // Hủy bỏ session của quản trị viên
        unset($_SESSION['admin']);
        // Chuyển hướng người dùng đến trang index.php sau khi đăng xuất
        header('Location: index.php');
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel=" stylesheet" href="css/dangnhap.css" />

    <script src="vendor/fontawesome/js/all.min.js"></script>
    <title>Login</title>
</head>

<body>
<div class="wrapper">
    <form id="formDangNhap" method="post" action="">
        <h1>Xin chào quản lý</h1>
        <div class="input-box">
            <input type="text" id="" name="admin" placeholder="Tên đăng nhập" required
                <?php if (isset($_POST['username'])) echo 'value="' . htmlspecialchars($_POST['username']) . '"'; ?> />
        </div>
        <div class="input-box">
            <input type="password" id="password" name="password" placeholder="Mật khẩu" required />
            <span class="show-password" onclick="togglePassword('password')"><i class="bx bx-show"></i></span>
        </div>
      
        <a class="bg-primary iq-sign-btn" href="admin-dashboard.php" role="button" ><i class="ri-login-box-line ml-2" style="display: block; margin: 0 auto; width: fit-content;">Đăng Nhập</i></a>



</div>

<script src="js/dangky.js"></script>
        </form>
    </div>
    <script src="js/p.js"></script>
</body>

</html>
