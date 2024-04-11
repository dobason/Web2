<?php
// process_edit_book.php

require_once 'db/dbhelper.php';

// Lấy thông tin sách từ POST request
$bookId = $_POST['bookId'];
$bookTitle = $_POST['bookTitle'];
$bookCategory = $_POST['bookCategory'];
$bookAuthor = $_POST['bookAuthor'];
$bookDescription = $_POST['bookDescription'];
$bookPrice = $_POST['bookPrice'];

// Xử lý hình ảnh mới (nếu được tải lên)
if ($_FILES['newBookImage']['name']) {
    $file_name = $_FILES['newBookImage']['name'];
    $file_tmp = $_FILES['newBookImage']['tmp_name'];
    $file_path = 'uploads/' . $file_name;

    // Di chuyển file tạm vào thư mục uploads
    move_uploaded_file($file_tmp, $file_path);

    // Cập nhật đường dẫn hình ảnh mới vào cơ sở dữ liệu
    $sql = "UPDATE books SET bookTitle = '$bookTitle', bookCategory = '$bookCategory', author = '$bookAuthor', description = '$bookDescription', price = '$bookPrice', imagePath = '$file_path' WHERE id = $bookId";
} else {
    // Không có hình ảnh mới, chỉ cập nhật thông tin sách
    $sql = "UPDATE books SET bookTitle = '$bookTitle', bookCategory = '$bookCategory', author = '$bookAuthor', description = '$bookDescription', price = '$bookPrice' WHERE id = $bookId";
}

// Thực thi truy vấn cập nhật vào cơ sở dữ liệu
execute($sql);

// Trả về kết quả (có thể xử lý theo yêu cầu của bạn)
echo json_encode(['success' => true]);
?>
