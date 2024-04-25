<?php
require_once 'db/dbhelper.php';

if (isset($_POST['product_id'])) {
    $productId = $_POST['product_id'];
    $sql = "DELETE FROM gio_hang WHERE Ma_Sach = '$productId'";
    $result = execute($sql);
    if ($result) {
        http_response_code(200); // Xóa thành công
    } else {
        http_response_code(500); // Lỗi khi xóa
    }
} else {
    http_response_code(400); // Yêu cầu không hợp lệ
}
?>
