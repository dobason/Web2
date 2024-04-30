<?php
// Kiểm tra xem yêu cầu xóa có chứa tham số id hay không
if (isset($_GET['id'])) {
    $bookId = $_GET['id'];

    // Thực hiện xóa sản phẩm từ cơ sở dữ liệu
    require_once('db/dbhelper.php'); // Import file dbhelper.php để sử dụng hàm execute()

    $sql = "DELETE FROM sach WHERE Ma_Sach = $bookId";

    // Thực thi truy vấn xóa
    $result = execute($sql);

    // Kiểm tra kết quả
    if ($result) {
        // Nếu xóa thành công, chuyển hướng người dùng về trang danh sách sách
        header('Location: admin-books.html');
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
