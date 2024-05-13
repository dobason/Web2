<?php
require_once 'db/dbhelper.php'; // Đảm bảo đã import đúng file để kết nối cơ sở dữ liệu

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ form
    $fullname = $_POST['name'];
    $username = $_POST['account'];
    $cityId = $_POST['city'];
    $districtId = $_POST['district'];
    $wardId = $_POST['ward'];
    $phone = $_POST['phone'];
    $password = $_POST['pass'];

    // Hash mật khẩu trước khi lưu vào cơ sở dữ liệu
    $hashedPassword = md5($password);

    // Lấy tên thành phố, quận/huyện, phường/xã dựa trên Id
    $thanhPho = getCityNameById($cityId);
    $quan = getDistrictNameById($districtId);
    $phuong = getWardNameById($wardId);

    // Thực hiện thêm người dùng vào cơ sở dữ liệu
    $sql = "INSERT INTO khach_hang (Ten_KH, Tai_Khoan, Mat_Khau, SDT, Trang_Thai, Thanh_Pho, Quan, Phuong) 
            VALUES ('$fullname', '$username', '$hashedPassword', '$phone' , 1, '$thanhPho', '$quan', '$phuong')";

    // Thực thi câu lệnh SQL
    execute($sql);

    // Chuyển hướng người dùng về trang chính sau khi thêm thành công
    header('Location: admin-user.php');
    exit; // Kết thúc quá trình xử lý
}

// Hàm lấy tên thành phố từ Id
function getCityNameById($cityId)
{
    $data = getDataFromJson(); // Lấy dữ liệu từ JSON (hoặc cơ sở dữ liệu)
    foreach ($data as $city) {
        if ($city['Id'] === $cityId) {
            return $city['Name'];
        }
    }
    return ''; // Trả về chuỗi rỗng nếu không tìm thấy
}

// Hàm lấy tên quận/huyện từ Id
function getDistrictNameById($districtId)
{
    $data = getDataFromJson(); // Lấy dữ liệu từ JSON (hoặc cơ sở dữ liệu)
    foreach ($data as $city) {
        foreach ($city['Districts'] as $district) {
            if ($district['Id'] === $districtId) {
                return $district['Name'];
            }
        }
    }
    return ''; // Trả về chuỗi rỗng nếu không tìm thấy
}

// Hàm lấy tên phường/xã từ Id
function getWardNameById($wardId)
{
    $data = getDataFromJson(); // Lấy dữ liệu từ JSON (hoặc cơ sở dữ liệu)
    foreach ($data as $city) {
        foreach ($city['Districts'] as $district) {
            foreach ($district['Wards'] as $ward) {
                if ($ward['Id'] === $wardId) {
                    return $ward['Name'];
                }
            }
        }
    }
    return ''; // Trả về chuỗi rỗng nếu không tìm thấy
}

// Hàm lấy dữ liệu từ file JSON (hoặc cơ sở dữ liệu)
function getDataFromJson()
{
    $jsonData = file_get_contents('js/locations.json'); // Đọc file JSON
    return json_decode($jsonData, true); // Giải mã JSON thành mảng PHP
}
?>
