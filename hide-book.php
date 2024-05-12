<?php
// Kiểm tra xem yêu cầu xóa có chứa tham số book_id hay không và kiểm tra tính hợp lệ của book_id
$bookId = filter_input(INPUT_GET, 'book_id', FILTER_VALIDATE_INT);
if ($bookId === false || $bookId === null) {
    echo 'ID sản phẩm không hợp lệ.';
    exit();
}

require_once 'db/dbhelper.php'; // Import file dbhelper.php để sử dụng hàm execute()

$sql = "UPDATE sach
SET Trang_Thai = 0
WHERE Ma_Sach = ?";

// Mở kết nối đến CSDL
$conn = openDatabaseConnection();

// Sử dụng Prepared Statements để thực thi câu lệnh SQL
$stmt = mysqli_prepare($conn, $sql);
if ($stmt === false) {
die("Lỗi truy vấn SQL: " . mysqli_error($conn));
}
// Gán các giá trị vào Prepared Statements
mysqli_stmt_bind_param($stmt, "i", $bookId);

// Thực thi câu lệnh SQL
if (mysqli_stmt_execute($stmt)) {
header('Location: admin-books.php');
} else {
echo "Đã xảy ra lỗi khi cập nhật thông tin sách: " . mysqli_error($conn);
}

// Đóng Prepared Statements và kết nối
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
