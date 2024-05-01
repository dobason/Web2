<?php
require_once('db/dbhelper.php');

// Xử lý yêu cầu Ajax để lấy thông tin sách từ cơ sở dữ liệu
if (isset($_GET['book_id'])) {
    $bookId = $_GET['book_id'];

    // Truy vấn dữ liệu sách từ cơ sở dữ liệu theo Ma_Sach
    $sql = "SELECT * FROM sach WHERE Ma_Sach = $bookId";
    $book = executeSingleResult($sql);

    // Trả về dữ liệu sách dưới dạng JSON
    header('Content-Type: application/json');
    echo json_encode($book);
} else {
    echo 'Thiếu thông tin book_id.';
}
?>
