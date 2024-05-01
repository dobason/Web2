<?php
require_once 'db/dbhelper.php';

// Kiểm tra nếu tồn tại dữ liệu POST và bookId
if (isset($_POST['bookId'])) {
    $bookId = $_POST['bookId'];
    $newBookTitle = $_POST['bookTitle'];
    $newCategory = $_POST['bookCategory'];
    $newAuthor = $_POST['bookAuthor'];
    $newDescription = $_POST['bookDescription'];
    $newPrice = isset($_POST['bookPrice']) ? $_POST['bookPrice'] : '';

    // Xử lý tệp hình ảnh mới nếu được tải lên
    if (isset($_FILES['bookImage']) && $_FILES['bookImage']['error'] == UPLOAD_ERR_OK) {
        $newImageName = $_FILES['bookImage']['name']; // Tên tệp hình ảnh mới

        // Đường dẫn lưu trữ tệp hình ảnh trên máy chủ
        $uploadDir = 'img/';
        $uploadPath = $uploadDir . $newImageName;

        // Di chuyển tệp hình ảnh tải lên vào thư mục img/
        if (move_uploaded_file($_FILES['bookImage']['tmp_name'], $uploadPath)) {
            // Cập nhật đường dẫn hình ảnh trong cơ sở dữ liệu
            $newImagePath = $uploadPath;

            // Chuẩn bị câu lệnh SQL để cập nhật thông tin sách với hình ảnh
            $sql = "UPDATE sach
                    SET Ten_Sach = ?,
                        Ma_Loai = ?,
                        Ten_Tac_Gia = ?,
                        Mo_Ta = ?,
                        Don_Gia = ?,
                        Hinh_Anh = ?
                    WHERE Ma_Sach = ?";

            // Mở kết nối đến CSDL
            $conn = openDatabaseConnection();

            // Sử dụng Prepared Statements để thực thi câu lệnh SQL
            $stmt = mysqli_prepare($conn, $sql);
            if ($stmt === false) {
                die("Lỗi truy vấn SQL: " . mysqli_error($conn));
            }

            // Gán các giá trị vào Prepared Statements
            mysqli_stmt_bind_param($stmt, "ssssdsi", $newBookTitle, $newCategory, $newAuthor, $newDescription, $newPrice, $newImagePath, $bookId);

            // Thực thi câu lệnh SQL
            if (mysqli_stmt_execute($stmt)) {
                header('Location: admin-books.php');
            } else {
                echo "Đã xảy ra lỗi khi cập nhật thông tin sách: " . mysqli_error($conn);
            }

            // Đóng Prepared Statements và kết nối
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
        } else {
            echo "Không thể tải lên tệp hình ảnh.";
        }
    } else {
        // Trường hợp không có hình ảnh mới được tải lên
        echo "Vui lòng chọn hình ảnh mới để cập nhật sách.";
    }
} else {
    echo "Thiếu thông tin bookId.";
}
?>
