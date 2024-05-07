<?php 
    session_start();

    // Xóa session 'use' hoặc session 'admin', tùy thuộc vào cách bạn lưu trữ thông tin đăng nhập
    unset($_SESSION['use']);

    // Hoặc nếu bạn muốn xóa tất cả các session, bạn có thể sử dụng session_destroy()
    // session_destroy();

    // Sau khi xóa session, chuyển hướng người dùng về trang đăng nhập
    header("Location: dangnhap.php");
    exit();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel=" stylesheet" href="css/dangnhap.css" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
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
      
        <a class="bg-primary iq-sign-btn" href="admin-dashboard.php" role="button">Đăng xuất<i class="ri-login-box-line ml-2"></i></a>

</form>
<?php 
        if(isset($_POST['dangnhap']) && ($_POST['dangnhap'])){
            //input
            $admin=$_POST['admin'];
            $pass=$_POST['password'];
            //ví dụ đã đúng admin/admin
            $_SESSION['use'][0] = $admin;
            $_SESSION['use'][1] = $pass;

            echo "<script>window.location.href = 'admin-dashboard.php';</script>";

        }
    ?>
 

</div>

<script src="js/dangky.js"></script>
        </form>
    </div>
    <script src="js/p.js"></script>
</body>

</html>