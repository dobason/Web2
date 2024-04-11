<?php
require_once('config.php');

// Hàm thực thi truy vấn không trả về kết quả (INSERT, UPDATE, DELETE)
function execute($sql, $params = []) {
    $con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    if (!$con) {
        die("Không thể kết nối đến cơ sở dữ liệu: " . mysqli_connect_error());
    }

    $stmt = mysqli_prepare($con, $sql);
    if ($stmt === false) {
        die("Lỗi truy vấn SQL: " . mysqli_error($con));
    }

    if (!empty($params)) {
        mysqli_stmt_bind_param($stmt, ...$params);
    }

    $result = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($con);

    return $result;
}

// Hàm thực thi truy vấn và trả về mảng kết quả (SELECT)
function executeResult($sql, $params = []) {
    $con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    if (!$con) {
        die("Không thể kết nối đến cơ sở dữ liệu: " . mysqli_connect_error());
    }

    $stmt = mysqli_prepare($con, $sql);
    if ($stmt === false) {
        die("Lỗi truy vấn SQL: " . mysqli_error($con));
    }

    if (!empty($params)) {
        mysqli_stmt_bind_param($stmt, ...$params);
    }

    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    mysqli_stmt_close($stmt);
    mysqli_close($con);

    return $data;
}

// Hàm thực thi truy vấn và trả về một dòng kết quả duy nhất (SELECT)
function executeSingleResult($sql, $params = []) {
    $con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    if (!$con) {
        die("Không thể kết nối đến cơ sở dữ liệu: " . mysqli_connect_error());
    }

    $stmt = mysqli_prepare($con, $sql);
    if ($stmt === false) {
        die("Lỗi truy vấn SQL: " . mysqli_error($con));
    }

    if (!empty($params)) {
        mysqli_stmt_bind_param($stmt, ...$params);
    }

    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    
    mysqli_stmt_close($stmt);
    mysqli_close($con);

    return $row;
}
?>
