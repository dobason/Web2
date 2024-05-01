<?php
// Import file dbhelper.php để sử dụng các hàm kết nối và thực thi truy vấn
require_once 'db/dbhelper.php';

// Kiểm tra xem có book_id được gửi từ yêu cầu AJAX hay không
if (isset($_GET['book_id'])) {
    $bookId = $_GET['book_id'];

    // Sử dụng prepared statement để tránh SQL injection
    $sql = "SELECT * FROM sach WHERE Ma_Sach = ?";
    $book = executeSingleResult($sql, 'i', $bookId); // Sử dụng 'i' cho integer (kiểu int) nếu Ma_Sach là kiểu số nguyên

    if ($book) {
        // Trả về dữ liệu của sách dưới dạng JSON
        http_response_code(200); // Trả về mã status 200 (OK)
        echo json_encode($book);
    } else {
        // Trường hợp không tìm thấy thông tin của sách
        http_response_code(404); // Trả về mã status 404 (Not Found)
        echo json_encode(['error' => 'Không tìm thấy sách']);
    }
} else {
    // Trường hợp không có book_id trong yêu cầu AJAX
    http_response_code(400); // Trả về mã status 400 (Bad Request)
    echo json_encode(['error' => 'Thiếu thông tin book_id']);
}
?>
