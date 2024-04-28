<?php
// Kiểm tra xem người dùng đã đăng nhập hay chưa
session_start();
require_once 'db/dbhelper.php';

if (isset($_SESSION['Ma_KH'])) {
    $ma_khach_hang = $_SESSION['Ma_KH'];

    // Truy vấn SQL để cập nhật gio_hang
    $sql = "UPDATE gio_hang SET Ma_KH = ? WHERE Ma_KH IS NULL";
    $params = ['i', $ma_khach_hang]; // i: integer (kiểu số nguyên)

    // Thực thi truy vấn SQL
    execute($sql, $params);

    // Kiểm tra và hiển thị thông báo sau khi cập nhật thành công
    $affectedRows = mysqli_affected_rows(openDatabaseConnection());
    if ($affectedRows > 0) {
        echo "Đăng nhập thành công và đã liên kết với giỏ hàng.";
    } else {
        echo "Không có bản ghi nào được cập nhật trong giỏ hàng.";
    }
} else {
    echo "Người dùng chưa đăng nhập.";
}
?>


<?php
if (isset($_SESSION['username'])) {
    $loggedInUsername = $_SESSION['username'];
?>
    <div class="top-right-item">
        <i class="fa fa-user"></i>
        <span class="text-tk">
            <p id="namelogin"><?php echo $loggedInUsername; ?><i class="fa fa-caret-down"></i></p>
            <div class="dropdown-content">
                <!-- Đây là dropdown chỉ hiển thị khi người dùng đã đăng nhập -->
                <a href="logout.php" class="dropdown-item"><i class="np fa fa-sign-out-alt"></i>Đăng xuất</a>
                <a href="giohang.php" class="dropdown-item"><i class="np fa fa-cart-plus"></i>Giỏ hàng</a>
            </div>
        </span>
    </div>
<?php
} else {
    // Người dùng chưa đăng nhập, hiển thị phần đăng nhập và đăng ký
?>
    <div class="top-right-item">
        <i class="fa fa-user"></i>
        <span class="text-tk">
            <p id="namelogin">Tài khoản<i class="fa fa-caret-down"></i></p>
            <div class="dropdown-content">
                <a href="dangnhap.php" class="dropdown-item"><i class="np fa fa-arrow-right"></i>Đăng nhập</a>
                <a href="dangki.php" class="dropdown-item"><i class="np fa fa-user-plus"></i>Đăng ký</a>
            </div>
        </span>
    </div>
<?php
}
?>

