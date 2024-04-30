<?php
require_once('config.php');

// Khởi tạo kết nối CSDL
function openDatabaseConnection() {
    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    if (!$conn) {
        die("Không thể kết nối đến cơ sở dữ liệu: " . mysqli_connect_error());
    }
    return $conn;
}


// Hàm thực thi truy vấn và trả về ID của bản ghi vừa chèn (INSERT)
// Hàm thực thi truy vấn và trả về ID của bản ghi vừa chèn (INSERT)
function execute($sql, $params = []) {
    $conn = openDatabaseConnection();

    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt === false) {
        die("Lỗi truy vấn SQL: " . mysqli_error($conn));
    }

    if (!empty($params)) {
        // Xử lý truyền tham số vào bind_param
        $types = $params[0]; // Loại dữ liệu của từng tham số
        $values = array_slice($params, 1); // Các giá trị tham số từ vị trí thứ 2 trở đi

        array_unshift($values, $stmt, $types); // Thêm $stmt và $types vào đầu mảng $values

        // Gọi bind_param với số lượng tham số đúng đắn
        call_user_func_array('mysqli_stmt_bind_param', $values);
    }

    $result = mysqli_stmt_execute($stmt);

    // Lấy ID của bản ghi vừa chèn
    $lastInsertedId = mysqli_insert_id($conn);

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    return $lastInsertedId; // Trả về ID của bản ghi vừa chèn
}






// Hàm thực thi truy vấn và trả về mảng kết quả (SELECT)
function executeResult($sql, $params = []) {
    $conn = openDatabaseConnection();

    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt === false) {
        die("Lỗi truy vấn SQL: " . mysqli_error($conn));
    }

    if (!empty($params)) {
        mysqli_stmt_bind_param($stmt, ...$params);
    }

    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    return $data;
}

// Hàm thực thi truy vấn và trả về một dòng kết quả duy nhất (SELECT)
function executeSingleResult($sql, $params = []) {
    $conn = openDatabaseConnection();

    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt === false) {
        die("Lỗi truy vấn SQL: " . mysqli_error($conn));
    }

    if (!empty($params)) {
        mysqli_stmt_bind_param($stmt, ...$params);
    }

    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    return $row;
}

// Hàm để lấy thông tin sản phẩm từ CSDL dựa trên id
function getProductById($productId)
{
    $sql = "SELECT * FROM `product` WHERE `id` = ?";
    $params = ['i', $productId]; // i là kiểu integer

    $product = executeSingleResult($sql, $params);
    return $product;
}

// Hàm lấy thông tin tất cả các sản phẩm trong giỏ hàng
function getAllCartItems() {
    $conn = openDatabaseConnection();

    $sql = "SELECT * FROM gio_hang";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    $cartItems = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_close($conn); // Đóng kết nối sau khi sử dụng

    return $cartItems;
}

// Hàm kiểm tra xem người dùng đã đăng nhập hay chưa
function isLoggedIn() {
    return isset($_SESSION['Ma_KH']);
}

?>