<?php
require_once 'db/dbhelper.php';

try {
    // Kiểm tra xem có yêu cầu POST gửi đến không
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['customerId'])) {
        // Lấy customerId từ yêu cầu POST
        $customerId = $_POST['customerId'];

        // Chuẩn bị truy vấn SQL để lấy thông tin khách hàng từ bảng khach_hang
        $sql = "SELECT Ten_KH, Tai_Khoan FROM khach_hang WHERE Ma_KH = ?";
        $params = [$customerId]; // Mảng chứa các tham số truy vấn

        // Thực thi truy vấn và lấy kết quả
        $customer = executeSingleResult($sql, $params);

        // Kiểm tra xem có thông tin khách hàng không
        if ($customer) {
            // Trả về thông tin khách hàng dưới dạng JSON cho client-side
            echo json_encode($customer);
        } else {
            // Nếu không tìm thấy khách hàng với ID tương ứng
            echo json_encode(['error' => 'Không tìm thấy thông tin khách hàng']);
        }
    } else {
        // Nếu không có yêu cầu POST hoặc thiếu dữ liệu customerId
        echo json_encode(['error' => 'Yêu cầu không hợp lệ']);
    }
} catch (Exception $e) {
    // Xử lý nếu có lỗi xảy ra trong quá trình thực thi truy vấn
    echo json_encode(['error' => 'Đã xảy ra lỗi: ' . $e->getMessage()]);
}
?>
