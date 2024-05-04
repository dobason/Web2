<?php
require_once('db/dbhelper.php');

if (isset($_POST['maHD'])) {
    $maHD = $_POST['maHD'];

    // Query to fetch invoice details
    $sql = "SELECT * FROM chi_tiet_hoa_don WHERE Ma_HD = $maHD";
    $books = executeResult($sql);

    // Prepare HTML content for modal body
    $html = '<table class="table">';
    $html .= '<thead><tr><th>Tên Sách</th><th>Số Lượng</th><th>Đơn Giá</th></tr></thead>';
    $html .= '<tbody>';
    foreach ($books as $book) {
        $bookName = $book['Ten_Sach'];
        $count = $book['So_Luong'];
        $price = number_format($book['Don_Gia'], 0, ',', '.');
        $html .= '<tr>';
        $html .= '<td>' . $bookName . '</td>';
        $html .= '<td>' . $count . '</td>';
        $html .= '<td>' . $price . '</td>';
        $html .= '</tr>';
    }
    $html .= '</tbody></table>';

    echo $html; // Return HTML content
}
?>
