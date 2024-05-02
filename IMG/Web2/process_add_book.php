<?php
require_once 'db/dbhelper.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Xử lý các dữ liệu nhận được từ form
    $bookTitle = $_POST['bookTitle'];
    $bookCategory = $_POST['bookCategory'];
    $bookAuthor = $_POST['bookAuthor'];
    $bookDescription = $_POST['bookDescription'];
    $bookPrice = $_POST['bookPrice'];

    $targetDir = "img/";
    $targetFile = $targetDir . basename($_FILES["bookImage"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Kiểm tra và xử lý hình ảnh
    $check = getimagesize($_FILES["bookImage"]["tmp_name"]);
    if ($check === false) {
        echo "Sorry, your file is not an image.";
        $uploadOk = 0;
    }

    if ($_FILES["bookImage"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["bookImage"]["tmp_name"], $targetFile)) {
            // Thêm thông tin sách vào cơ sở dữ liệu
            $sql = "INSERT INTO sach (Ten_Sach, Ma_Loai, Ten_Tac_Gia, Mo_Ta, Don_Gia, Hinh_Anh)
                    VALUES ('$bookTitle', '$bookCategory', '$bookAuthor', '$bookDescription', '$bookPrice', '$targetFile')";
            execute($sql);

            // Chuyển hướng về trang danh sách sách sau khi thêm thành công
            header("Location: admin-books.php");
            exit();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>
