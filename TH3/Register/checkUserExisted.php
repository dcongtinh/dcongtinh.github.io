<?php
include '../../session_start.php';
include '../../database.php';

$tendangnhap = $_POST['tendangnhap'];
$conn = db_connect();
$sql = "SELECT * FROM thanhvien where tendangnhap='$tendangnhap'";
if ($conn->query($sql)->num_rows == 1) {
    echo "Tên tài khoản đã tồn tại";
    exit();
}
echo "";
$conn->close();
