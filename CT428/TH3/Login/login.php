<?php
include '../../session_start.php';
include '../../database.php';

$tendangnhap = $_POST['tendangnhap'];
$matkhau = $_POST['matkhau'];

$conn = db_connect();
$sql = "SELECT * FROM thanhvien where tendangnhap='$tendangnhap' and matkhau='" . md5($matkhau) . "'";
$result = $conn->query($sql);
$conn->close();

if ($result->num_rows == 1) {
    foreach ($result->fetch_assoc() as $key => $value) {
        $_SESSION[$key] = $value;
    }
    header("Location: ../Profile");
    exit();
}
$_SESSION['error'] = 'Sai tên đăng nhập hoặc mật khẩu!';
header("Location: index.php");
