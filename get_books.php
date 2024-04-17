<?php
require_once 'db/dbhelper.php'; // Đảm bảo rằng bạn đã định nghĩa hàm executeResult trong dbhelper.php

// Truy vấn danh sách sách từ cơ sở dữ liệu
$sql = "SELECT * FROM sach";
$books = executeResult($sql);

// Trả về danh sách sách dưới dạng JSON
echo json_encode($books);
?>
