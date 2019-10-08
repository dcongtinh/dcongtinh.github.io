<?php
include '../../session_start.php';
include '../../database.php';

$idsp = $_GET['idsp'];

$conn = db_connect();

$sql = "DELETE FROM sanpham WHERE idsp=$idsp";

if ($conn->query($sql)) {
    $_SESSION['thanhcong'] = "Xoá sản phẩm thành công!";
    header("Location: index.php");
}
echo "Error: " . $sql . "<br>" . $conn->error;

$conn->close();
