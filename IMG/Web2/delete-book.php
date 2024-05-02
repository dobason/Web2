<?php
// Kiểm tra xem yêu cầu xóa có chứa tham số book_id hay không và kiểm tra tính hợp lệ của book_id
$bookId = filter_input(INPUT_GET, 'book_id', FILTER_VALIDATE_INT);
if ($bookId === false || $bookId === null) {
    echo 'ID sản phẩm không hợp lệ.';
    exit();
}

require_once 'db/dbhelper.php'; // Import file dbhelper.php để sử dụng hàm execute()

// Sử dụng prepared statement để xóa sách
$sql = "DELETE FROM sach WHERE Ma_Sach = ?";
$conn = openDatabaseConnection();
$stmt = mysqli_prepare($conn, $sql);

// Bắt lỗi nếu không thể chuẩn bị truy vấn
if (!$stmt) {
    echo 'Đã xảy ra lỗi trong quá trình chuẩn bị truy vấn.';
    exit();
}

// Gán giá trị cho tham số và thực thi truy vấn
mysqli_stmt_bind_param($stmt, 'i', $bookId);
$result = mysqli_stmt_execute($stmt);

// Kiểm tra kết quả và xử lý sau đó
if ($result) {
    // Nếu xóa thành công, chuyển hướng người dùng về trang danh sách sách
    header('Location: admin-books.php');
    exit();
} else {
    // Nếu xóa không thành công, hiển thị thông báo lỗi
    echo 'Đã xảy ra lỗi trong quá trình xóa sản phẩm.';
}

// Đóng câu lệnh và kết nối đến cơ sở dữ liệu
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
