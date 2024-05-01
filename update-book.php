<?php
require_once 'db/dbhelper.php'; // Import file dbhelper.php để sử dụng các hàm kết nối và thực thi truy vấn

// Lấy dữ liệu từ yêu cầu AJAX
$bookId = $_POST['bookId'];
$newBookTitle = $_POST['newBookTitle'];
$newCategory = $_POST['newCategory'];
$newAuthor = $_POST['newAuthor'];
$newDescription = $_POST['newDescription'];
$newPrice = $_POST['newPrice'];
$newImage = $_POST['newImage'];

// Chuẩn bị truy vấn SQL để cập nhật thông tin sách
$sql = "UPDATE sach
        SET Ten_Sach = '$newBookTitle',
            Ma_Loai = '$newCategory',
            Ten_Tac_Gia = '$newAuthor',
            Mo_Ta = '$newDescription',
            Don_Gia = '$newPrice',
            Hinh_Anh = '$newImage'
        WHERE Ma_Sach = $bookId";

// Thực thi truy vấn
$result = execute($sql);

if ($result) {
    echo "Cập nhật thông tin sách thành công.";
} else {
    echo "Đã xảy ra lỗi khi cập nhật thông tin sách.";
}
?>
