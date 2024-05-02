<?php
require_once 'db/dbhelper.php';

// Kiểm tra nếu có dữ liệu POST gửi từ form chỉnh sửa sách
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $bookId = $_POST['editBookId'];
    $bookTitle = $_POST['editBookTitle'];
    $bookCategory = $_POST['editBookCategory'];
    $bookAuthor = $_POST['editBookAuthor'];
    $bookDescription = $_POST['editBookDescription'];
    $bookPrice = $_POST['editBookPrice'];

    // Xử lý tệp hình ảnh (nếu được tải lên)
    if (isset($_FILES['editBookImage']) && $_FILES['editBookImage']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/'; // Thư mục lưu trữ hình ảnh
        $uploadFile = $uploadDir . basename($_FILES['editBookImage']['name']);

        // Di chuyển tệp tải lên vào thư mục lưu trữ
        if (move_uploaded_file($_FILES['editBookImage']['tmp_name'], $uploadFile)) {
            // Cập nhật đường dẫn hình ảnh trong cơ sở dữ liệu
            $sql = "UPDATE sach SET Hinh_Anh = '$uploadFile' WHERE Ma_Sach = '$bookId'";
            execute($sql);
        }
    }

    // Cập nhật thông tin sách trong cơ sở dữ liệu
    $sql = "UPDATE sach 
            SET Ten_Sach = '$bookTitle', Ma_Loai = '$bookCategory', Ten_Tac_Gia = '$bookAuthor', 
                Mo_Ta = '$bookDescription', Don_Gia = '$bookPrice'
            WHERE Ma_Sach = '$bookId'";
    $result = execute($sql);

    if ($result) {
        // Chuyển hướng người dùng về trang hiển thị danh sách sách sau khi chỉnh sửa thành công
        header('Location: admin-books.php');
        exit();
    } else {
        echo 'Đã xảy ra lỗi khi cập nhật thông tin sách.';
    }
} else {
    echo 'Phương thức không hợp lệ.';
}
?>
