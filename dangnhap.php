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
    <form id="formDangNhap" method="post" action="process_login.php">
        <h1>Đăng Nhập</h1>
        <div class="input-box">
            <input type="text" id="username" name="username" placeholder="Tên đăng nhập" required
                <?php if (isset($_POST['username'])) echo 'value="' . htmlspecialchars($_POST['username']) . '"'; ?> />
        </div>
        <div class="input-box">
            <input type="password" id="password" name="password" placeholder="Mật khẩu" required />
            <span class="show-password" onclick="togglePassword('password')"><i class="bx bx-show"></i></span>
        </div>
        <div class="forgot">
            <label><input type="checkbox" id="remember" name="remember" /> Lưu đăng nhập</label>
        </div>
        <button type="submit" class="log">Đăng nhập</button>
        <div class="register">
            <p>Không có tài khoản? <a href="dangki.php">Đăng ký</a></p><br>
            <p><a href="index.php"><i class="fa-solid fa-house"></i></a></p>
        </div>
    </form>
</div>

<script src="js/dangky.js"></script>
        </form>
    </div>
    <script src="js/p.js"></script>
</body>

</html>