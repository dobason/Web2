<?php
require_once 'db/dbhelper.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM books WHERE id = $id";
    $book = executeSingleResult($sql);

    if ($book) {
        // Hiển thị biểu mẫu sửa đổi sách
        echo '<form action="process_edit_book.php" method="post" enctype="multipart/form-data">';
        echo '<input type="hidden" name="id" value="' . $book['id'] . '">';
        echo '<div class="form-group">';
        echo '<label for="bookTitle">Tên sách</label>';
        echo '<input type="text" class="form-control" id="bookTitle" name="bookTitle" value="' . $book['bookTitle'] . '" required>';
        echo '</div>';
        // Thêm các trường thông tin khác của sách tại đây
        echo '<button type="submit" class="btn btn-primary">Lưu</button>';
        echo '</form>';
    } else {
        echo "Không tìm thấy sách!";
    }
}
?>
