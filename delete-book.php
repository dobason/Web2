<?php
require_once('db/dbhelper.php');

// Lấy id sách từ tham số trên URL
if (isset($_GET['id'])) {
    $bookId = $_GET['id'];

    // Xóa sách từ cơ sở dữ liệu dựa trên id
    $sql = "DELETE FROM sach WHERE Ma_Sach = '$bookId'";
    execute($sql);

    // Chuyển hướng người dùng sau khi xóa thành công (về trang hiển thị danh sách sách)
    header('Location: admin-books.php');
    exit();
} else {
    echo 'Không tìm thấy ID sách để xóa.';
}
?>
