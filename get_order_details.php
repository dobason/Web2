<?php
// get_order_details.php

// Thực hiện kết nối đến cơ sở dữ liệu
require_once 'db/dbhelper.php';

// Lấy mã hóa đơn từ yêu cầu AJAX
$maHD = $_GET['maHD'];

// Truy vấn cơ sở dữ liệu để lấy chi tiết đơn hàng
$sql = "SELECT Ten_Sach, Don_Gia FROM chi_tiet_hoa_don WHERE Ma_HD = '$maHD'";
$orderDetails = executeResult($sql);

// Trả về dữ liệu dưới dạng JSON
header('Content-Type: application/json');
echo json_encode($orderDetails);
?>
