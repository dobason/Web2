<?php
// Kiểm tra xem yêu cầu xóa có chứa tham số id hay không
if (isset($_GET['book_id'])) {
    $bookId = $_GET['book_id'];
    
    require_once 'db/dbhelper.php'; // Import file dbhelper.php để sử dụng hàm execute()
    // Thực hiện xóa sản phẩm từ cơ sở dữ liệu
    $sql = "DELETE FROM sach WHERE id = " .$_GET['book_id']; 

    // Thực thi truy vấn xóa
    $result = execute($sql);

    // Kiểm tra kết quả
    if ($result) {
        // Nếu xóa thành công, chuyển hướng người dùng về trang danh sách sách
        header('Location: admin-books.php');
        exit();
    } else {
        // Nếu xóa không thành công, hiển thị thông báo lỗi
        echo 'Đã xảy ra lỗi trong quá trình xóa sản phẩm.';
    }
} else {
    // Nếu không tìm thấy id, hiển thị thông báo lỗi
    echo 'ID sản phẩm không hợp lệ.';
}
?>
