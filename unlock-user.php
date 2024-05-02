<?php
// Bao gồm tệp dbhelper.php hoặc kết nối CSDL tại đây
require_once('db/dbhelper.php');

// Kiểm tra xem đã nhận được customer_id từ yêu cầu POST không
if (isset($_POST['customer_id'])) {
    // Lấy customer_id từ yêu cầu POST
    $customerId = $_POST['customer_id'];

    // Cập nhật trạng thái của khách hàng thành 0 (đã bị khóa) trong cơ sở dữ liệu
    $sql = "UPDATE khach_hang SET Trang_Thai = 1 WHERE Ma_KH = $customerId";

    // Thực thi truy vấn cập nhật
    $result = execute($sql);

    // Kiểm tra kết quả của truy vấn
    if ($result) {
        // Trả về kết quả thành công nếu cập nhật thành công
        echo json_encode(array('status' => 'success', 'message' => 'Khóa người dùng thành công'));
    } else {
        // Trả về thông báo lỗi nếu cập nhật không thành công
        echo json_encode(array('status' => 'error', 'message' => 'Có lỗi xảy ra khi khóa người dùng'));
    }
} else {
    // Trả về thông báo lỗi nếu không nhận được customer_id từ yêu cầu POST
    echo json_encode(array('status' => 'error', 'message' => 'Không tìm thấy mã khách hàng để khóa'));
}
?>
