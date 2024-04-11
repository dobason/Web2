<!-- Nội dung của trang edit-book.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa sách</title>
</head>
<body>

<!-- Modal chỉnh sửa sách -->
<div class="modal fade" id="editBookModal" tabindex="-1" role="dialog" aria-labelledby="editBookModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editBookModalLabel">Chỉnh sửa sách</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editBookForm" action="process_edit_book.php" method="post" enctype="multipart/form-data">
                    <!-- Các trường để điền thông tin sách -->
                    <div class="form-group">
                        <label for="bookTitle">Tên sách</label>
                        <input type="text" class="form-control" id="bookTitle" name="bookTitle" required>
                    </div>
                    <!-- Các trường khác (thể loại, tác giả, mô tả, giá, hình ảnh) -->

                    <!-- Nút Lưu để cập nhật thông tin sách -->
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Script JavaScript để gọi và điền dữ liệu vào modal -->
<script>
    // Khi modal được hiển thị
    $('#editBookModal').on('shown.bs.modal', function () {
        // Gọi mã PHP để lấy thông tin sách từ cơ sở dữ liệu
        <?php
        require_once('db/dbhelper.php'); // Import file dbhelper.php

        if (isset($_GET['id'])) {
            $bookId = $_GET['id'];
            $sql = "SELECT * FROM books WHERE book_id = $bookId";
            $book = executeSingleResult($sql);

            if ($book) {
                // Điền thông tin sách vào các trường trong modal
                echo 'document.getElementById("bookTitle").value = "' . $book['book_name'] . '";';
                // Điền các trường khác tương tự
            }
        }
        ?>
    });
</script>

</body>
</html>
