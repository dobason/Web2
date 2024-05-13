<?php
// Đảm bảo file dbhelper.php đã được include hoặc require trước đó để sử dụng hàm openDatabaseConnection()
require_once 'db/dbhelper.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra xem dữ liệu bookId có tồn tại không
    if (isset($_POST['bookId'])) {
        $bookId = $_POST['bookId'];
        $newBookTitle = $_POST['bookTitleEdit'];
        $newCategory = $_POST['bookCategoryEdit'];
        $newAuthor = $_POST['bookAuthorEdit'];
        $newDescription = $_POST['bookDescriptionEdit'];
        $newPrice = isset($_POST['bookPriceEdit']) ? $_POST['bookPriceEdit'] : '';
        $newStatus = isset($_POST['bookStatusEdit']) ? $_POST['bookStatusEdit'] : '';

        // Xử lý hình ảnh nếu được tải lên
        if (isset($_FILES['bookImageEdit']) && $_FILES['bookImageEdit']['error'] == UPLOAD_ERR_OK) {
            $newImageName = $_FILES['bookImageEdit']['name'];
            $uploadDir = 'img/';
            $uploadPath = $uploadDir . $newImageName;

            if (copy($_FILES['bookImageEdit']['tmp_name'], $uploadPath)) {
                $newImagePath = $uploadPath;

                // Câu lệnh SQL cho việc cập nhật thông tin sách với hình ảnh
                $sql = "UPDATE sach
                        SET Ten_Sach = ?,
                            Ma_Loai = ?,
                            Ten_Tac_Gia = ?,
                            Mo_Ta = ?,
                            Don_Gia = ?,
                            Trang_Thai = ?,
                            Hinh_Anh = ?
                        WHERE Ma_Sach = ?";

                $conn = openDatabaseConnection();
                $stmt = mysqli_prepare($conn, $sql);

                if ($stmt) {
                    mysqli_stmt_bind_param($stmt, "ssssdisi", $newBookTitle, $newCategory, $newAuthor, $newDescription, $newPrice, $newStatus, $newImagePath, $bookId);

                    if (mysqli_stmt_execute($stmt)) {
                        header('Location: admin-books.php');
                        exit; // Dừng script sau khi chuyển hướng
                    } else {
                        echo "Đã xảy ra lỗi khi cập nhật thông tin sách: " . mysqli_error($conn);
                    }

                    mysqli_stmt_close($stmt);
                    mysqli_close($conn);
                } else {
                    echo "Lỗi trong quá trình chuẩn bị câu lệnh SQL: " . mysqli_error($conn);
                }
            } else {
                echo "Không thể tải lên tệp hình ảnh.";
            }
        } else {
            // Trường hợp không có hình ảnh được tải lên
            $sql = "UPDATE sach
                    SET Ten_Sach = ?,
                        Ma_Loai = ?,
                        Ten_Tac_Gia = ?,
                        Mo_Ta = ?,
                        Don_Gia = ?,
                        Trang_Thai = ?
                    WHERE Ma_Sach = ?";

            $conn = openDatabaseConnection();
            $stmt = mysqli_prepare($conn, $sql);

            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "ssssdi", $newBookTitle, $newCategory, $newAuthor, $newDescription, $newPrice, $newStatus, $bookId);

                if (mysqli_stmt_execute($stmt)) {
                    header('Location: admin-books.php');
                    exit; // Dừng script sau khi chuyển hướng
                } else {
                    echo "Đã xảy ra lỗi khi cập nhật thông tin sách: " . mysqli_error($conn);
                }

                mysqli_stmt_close($stmt);
                mysqli_close($conn);
            } else {
                echo "Lỗi trong quá trình chuẩn bị câu lệnh SQL: " . mysqli_error($conn);
            }
        }
    } else {
        echo "Thiếu thông tin bookId.";
    }
} else {
    echo "Yêu cầu không hợp lệ.";
}
?>
