<?php
// Kết nối đến cơ sở dữ liệu
require_once('db/dbhelper.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Lấy dữ liệu từ biểu mẫu chỉnh sửa
    $bookId = $_POST['bookId'];
    $bookTitle = $_POST['bookTitle'];
    $bookCategory = $_POST['bookCategory'];
    $bookAuthor = $_POST['bookAuthor'];
    $bookDescription = $_POST['bookDescription'];
    $bookPrice = $_POST['bookPrice'];

    // Cập nhật thông tin sách trong cơ sở dữ liệu
    $sql = "UPDATE books SET 
            book_name = '$bookTitle',
            category = '$bookCategory',
            author = '$bookAuthor',
            description = '$bookDescription',
            price = '$bookPrice'
            WHERE book_id = $bookId";

    $result = execute($sql); // Thực thi truy vấn

    if ($result) {
        // Trả về phản hồi thành công (có thể là JSON, thông báo, ...)
        echo json_encode(['status' => 'success']);
    } else {
        // Trả về phản hồi lỗi (có thể là JSON, thông báo, ...)
        echo json_encode(['status' => 'error']);
    }
}
?>
