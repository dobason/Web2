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
    <div class="wrapper">
        <form id="formDangKy">
            <h1>Đăng ký</h1>
            <div class="input-box">
                <input type="text" id="fullname" placeholder="Họ và tên" required />
            </div>
            <div class="input-box">
                <input type="email" id="email" placeholder="Email" required />
                <i class="bx bxs-user"></i>
            </div>

            <div class="input-box">
                <input type="password" id="password" placeholder="Mật khẩu" required />
                <span class="show-password" onclick="togglePassword('password')"><i class="bx bx-show"></i></span>
            </div>
            <div class="input-box">
                <input type="password" id="confirmPassword" placeholder="Nhập lại mật khẩu" required />
                <span class="show-password" onclick="togglePassword('confirmPassword')"><i
                        class="bx bx-show"></i></span>
            </div>

            <button type="button" class="register" onclick="dangKy()">
                Đăng ký
            </button>

            <div class="login">
                <p>Đã có tài khoản? <a href="dangnhap.php">Đăng nhập</a></p>
                <p><a href="index.php"><i class="fa-solid fa-house"></i></a></p>
            </div>
        </form>
    </div>
    <script src="js/p.js"></script>
</body>

</html>