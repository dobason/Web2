5454545454
<?php
session_start();

if (isset($_SESSION['maHD'])) {
    $maHD = $_SESSION['maHD'];

    // Truy vấn chi tiết hóa đơn từ cơ sở dữ liệu
    $sql = "SELECT * FROM chi_tiet_hoa_don WHERE Ma_HD = $maHD";
    $books = executeResult($sql);

    // Hiển thị thông tin chi tiết hóa đơn trong modal
    foreach ($books as $book) {
        $bookName = $book['Ten_Sach'];
        $count = $book['So_Luong'];
        $price = number_format($book['Don_Gia'], 0, ',', '.'); // Định dạng giá tiền thành 15.000

        echo '<tr>';
        echo '<td>' . $bookName . '</td>'; // Tên Sách
        echo '<td>' . $count . '</td>'; // Số Lượng
        echo '<td>' . $price . '</td>'; // Đơn Giá
        echo '</tr>';
    }
} else {
    echo '<tr><td colspan="3">Không có chi tiết hóa đơn.</td></tr>';
}
?>
