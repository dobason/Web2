<?php
// Kết nối đến cơ sở dữ liệu
require_once('db/dbhelper.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Lấy bookId từ dữ liệu POST
    $bookId = $_POST['id'];

    // Truy vấn để lấy thông tin chi tiết của sách từ cơ sở dữ liệu
    $sql = "SELECT * FROM books WHERE book_id = $bookId";
    $book = executeSingleResult($sql); // Thực thi truy vấn và lấy một bản ghi

    if ($book) {
        // Trả về thông tin sách dưới dạng JSON
        echo json_encode($book);
    } else {
        // Trả về thông báo lỗi nếu không tìm thấy sách
        echo json_encode(['error' => 'Không tìm thấy thông tin sách.']);
    }
}
?>
