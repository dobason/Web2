<?php
require_once 'db/dbhelper.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['customerId']) && isset($_POST['editName']) && isset($_POST['editAccount']) && isset($_POST['editPassword'])) {
    $customerId = $_POST['customerId'];
    $editName = $_POST['editName'];
    $editAccount = $_POST['editAccount'];
    $editPassword = $_POST['editPassword'];

    // Tiến hành truy vấn để cập nhật thông tin khách hàng
    $sql = "UPDATE khach_hang SET Ten_KH = '$editName', Tai_Khoan = '$editAccount', Mat_Khau = '$editPassword' WHERE Ma_KH = '$customerId'";
    $result = execute($sql);

    if ($result) {
        echo "Cập nhật thông tin khách hàng thành công.";
    } else {
        echo "Đã xảy ra lỗi khi cập nhật thông tin khách hàng.";
    }
} else {
    echo "Dữ liệu không hợp lệ.";
}
?>
