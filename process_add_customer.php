<?php
require_once 'db/dbhelper.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Xử lý dữ liệu nhận được từ form
    $fullName = $_POST['name'];
    $username = $_POST['account'];
    $password = $_POST['pass'];

    // Thực hiện thêm khách hàng vào cơ sở dữ liệu
    $sql = "INSERT INTO khach_hang (Ten_KH, Tai_Khoan, Mat_Khau, Trang_Thai) VALUES ('$fullName', '$username', '$password',1)";

    // Gọi hàm execute từ dbhelper để thực thi truy vấn
    $result = execute($sql);

    if ($result) {
        // Nếu thêm thành công, chuyển hướng về trang admin-users.php
        header("Location: admin-user.php");
        exit();
    } else {
        // Nếu có lỗi, hiển thị thông báo lỗi
        echo "Có lỗi xảy ra khi thêm khách hàng.";
    }
}
?>
