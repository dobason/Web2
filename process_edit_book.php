<?php
require_once('db/dbhelper.php');

// Lấy bookId từ dữ liệu POST
if (isset($_POST['bookId'])) {
    $bookId = $_POST['bookId'];

    // Truy vấn cơ sở dữ liệu để lấy thông tin chi tiết của sách dựa trên bookId
    $sql = "SELECT * FROM sach WHERE Ma_Sach = '$bookId'";
    $book = executeSingleResult($sql);

    if ($book) {
        // Hiển thị form sửa thông tin sách trong modal
        echo '<form id="editBookForm" action="process_update_book.php" method="post">';
        echo '<input type="hidden" name="bookId" value="' . $bookId . '">';
        echo '<div class="form-group">';
        echo '<label for="editBookTitle">Tên sách</label>';
        echo '<input type="text" class="form-control" id="editBookTitle" name="editBookTitle" value="' . $book['Ten_Sach'] . '" required>';
        echo '</div>';
        echo '<div class="form-group">';
        echo '<label for="editBookCategory">Thể loại sách</label>';
        echo '<input type="text" class="form-control" id="editBookCategory" name="editBookCategory" value="' . $book['The_Loai'] . '" required>';
        echo '</div>';
        echo '<div class="form-group">';
        echo '<label for="editBookAuthor">Tác giả sách</label>';
        echo '<input type="text" class="form-control" id="editBookAuthor" name="editBookAuthor" value="' . $book['Ten_Tac_Gia'] . '" required>';
        echo '</div>';
        echo '<div class="form-group">';
        echo '<label for="editBookDescription">Mô tả sách</label>';
        echo '<textarea class="form-control" id="editBookDescription" name="editBookDescription" rows="3" required>' . $book['Mo_Ta'] . '</textarea>';
        echo '</div>';
        echo '<div class="form-group">';
        echo '<label for="editBookPrice">Giá tiền</label>';
        echo '<input type="number" class="form-control" id="editBookPrice" name="editBookPrice" value="' . $book['Don_Gia'] . '" required>';
        echo '</div>';
        echo '<button type="submit" class="btn btn-primary">Lưu</button>';
        echo '</form>';
    } else {
        echo 'Không tìm thấy sách để sửa.';
    }
} else {
    echo 'Không tìm thấy bookId để sửa.';
}
?>
