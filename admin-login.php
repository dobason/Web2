<?php 
    session_start();
    $_SESSION['use'] = [];
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
      
        <input type="submit" name="dangnhap" value="Đăng nhập">
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