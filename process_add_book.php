<?php
require_once 'db/dbhelper.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Xử lý dữ liệu nhận được từ form
    $bookTitle = $_POST['bookTitle'];
    $bookCategory = $_POST['bookCategory'];
    $bookAuthor = $_POST['bookAuthor'];
    $bookDescription = $_POST['bookDescription'];
    $bookPrice = $_POST['bookPrice'];

    // Xử lý hình ảnh được tải lên
    $targetDir = "IMG/";
    $targetFile = $targetDir . basename($_FILES["bookImage"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Kiểm tra và xử lý hình ảnh
    if (!empty($_FILES["bookImage"]["tmp_name"]) && file_exists($_FILES["bookImage"]["tmp_name"])) {
        $check = getimagesize($_FILES["bookImage"]["tmp_name"]);
        if ($check === false) {
            echo "Xin lỗi, tệp của bạn không phải là hình ảnh.";
            $uploadOk = 0;
        }

        if ($_FILES["bookImage"]["size"] > 500000) {
            echo "Xin lỗi, tệp của bạn quá lớn.";
            $uploadOk = 0;
        }

        if (!in_array($imageFileType, ["jpg", "png", "jpeg", "gif"])) {
            echo "Xin lỗi, chỉ cho phép tải lên các tệp JPG, JPEG, PNG và GIF.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Xin lỗi, tệp của bạn không được tải lên.";
        } else {
            if (move_uploaded_file($_FILES["bookImage"]["tmp_name"], $targetFile)) {
                // Đường dẫn hình ảnh trong cơ sở dữ liệu
                $imagePath = $targetDir . basename($_FILES["bookImage"]["name"]);

                // Thêm thông tin sách vào cơ sở dữ liệu
                $sql = "INSERT INTO sach (Ten_Sach, Ma_Loai, Ten_Tac_Gia, Mo_Ta, Don_Gia, Hinh_Anh)
                        VALUES ('$bookTitle', '$bookCategory', '$bookAuthor', '$bookDescription', '$bookPrice', '$imagePath')";
                execute($sql);

                // Chuyển hướng về trang danh sách sách sau khi thêm thành công
                header("Location: admin-books.php");
                exit();
            } else {
                echo "Xin lỗi, có lỗi xảy ra khi tải tệp của bạn lên.";
            }
        }
    } else {
        echo "Xin lỗi, không tìm thấy tệp hình ảnh tạm thời.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Sách Mới</title>
</head>

<body>
    <h2>Thêm Sách Mới</h2>
    <form method="post" enctype="multipart/form-data">
        <label for="bookTitle">Tên Sách:</label><br>
        <input type="text" id="bookTitle" name="bookTitle" required><br><br>

        <label for="bookCategory">Thể Loại:</label><br>
        <input type="text" id="bookCategory" name="bookCategory" required><br><br>

        <label for="bookAuthor">Tên Tác Giả:</label><br>
        <input type="text" id="bookAuthor" name="bookAuthor" required><br><br>

        <label for="bookDescription">Mô Tả:</label><br>
        <textarea id="bookDescription" name="bookDescription" required></textarea><br><br>

        <label for="bookPrice">Đơn Giá:</label><br>
        <input type="number" id="bookPrice" name="bookPrice" required><br><br>

        <label for="bookImage">Hình Ảnh:</label><br>
        <input type="file" id="bookImage" name="bookImage" accept="image/*" required><br><br>

        <button type="submit">Thêm Sách</button>
    </form>
</body>

</html>
