<?php
// Đảm bảo rằng đã bao gồm tệp dbhelper.php để sử dụng các hàm kết nối cơ sở dữ liệu
require_once('db/dbhelper.php');

// Xử lý yêu cầu Ajax để lấy thông tin sách từ cơ sở dữ liệu
if (isset($_GET['book_id'])) {
    $bookId = $_GET['book_id'];

    // Truy vấn dữ liệu sách từ cơ sở dữ liệu theo Ma_Sach
    $sql = "SELECT * FROM sach WHERE Ma_Sach = $bookId";
    $book = executeSingleResult($sql);

    // Kiểm tra nếu có dữ liệu sách được trả về từ cơ sở dữ liệu
    if ($book) {
        // Trả về dữ liệu sách dưới dạng JSON
        header('Content-Type: application/json');
        echo json_encode($book);
    } else {
        echo 'Không tìm thấy thông tin sách.';
    }
} else {
    echo 'Thiếu thông tin book_id.';
}
?>
