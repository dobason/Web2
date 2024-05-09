<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</style>
<?php
session_start();
// Kiểm tra xem người dùng đã đăng nhập hay chưa
if (isset($_SESSION['Ma_KH'])) {
    require_once 'db/dbhelper.php'; // Import file dbhelper.php nếu cần

    // Lấy mã khách hàng từ session
    $ma_khach_hang = $_SESSION['Ma_KH'];

    // Truy vấn SQL để lấy thông tin tài khoản của người dùng từ Ma_KH
    $sql = "SELECT Tai_Khoan FROM khach_hang WHERE Ma_KH = $ma_khach_hang";
    $user = executeSingleResult($sql);

    if ($user) {
        $tai_khoan = $user['Tai_Khoan']; // Lấy tên tài khoản từ kết quả truy vấn
?>
    <div class="top-right-item">
        <i class="fa fa-user"></i>
        <span class="text-tk">
            <p id="namelogin"><?php echo $tai_khoan; ?><i class="fa fa-caret-down"></i></p>
            <div class="dropdown-content">
                <!-- Hiển thị các liên kết cho người dùng đã đăng nhập -->
                <a href="logout.php" class="dropdown-item"><i class="np fa fa-sign-out-alt"></i>Đăng xuất</a>
                <a href="cart.php" class="dropdown-item"><i class="np fa fa-cart-plus"></i>Giỏ hàng</a>
                <a href="bill-customer.php" class="dropdown-item"><i class="fas fa-truck"style="margin-right:7px"></i></i> Đơn hàng</a>

            </div>
        </span>
    </div>
    
<?php
    }
} else {
    // Người dùng chưa đăng nhập, hiển thị nội dung đăng nhập và đăng ký
?>
    <div class="top-right-item">
        <i class="fa fa-user"></i>
        <span class="text-tk">
            <p id="namelogin">Tài khoản<i class="fa fa-caret-down"></i></p>
            <div class="dropdown-content">
                <!-- Hiển thị các liên kết cho người dùng chưa đăng nhập -->
                <a href="dangnhap.php" class="dropdown-item"><i class="np fa fa-arrow-right"></i>Đăng nhập</a>
                <a href="dangki.php" class="dropdown-item"><i class="np fa fa-user-plus"></i>Đăng ký</a>
            </div>
        </span>
    </div>
<?php
}
?>



