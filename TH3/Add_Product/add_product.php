<?php
include '../../session_start.php';
include '../../database.php';

$error_cnt = 0;
$tensp = $_POST['tensp'];
if (!$tensp) {
    ++$error_cnt;
    $_SESSION['error_tensp'] = 'Vui lòng nhập Tên sản phẩm!';
}

$chitietsp = $_POST['chitietsp'];
$giasp = $_POST['giasp'];

$file = $_FILES['hinhanhsp'];
$target_dir = "../../assets/product/";
$target_file = $target_dir . basename($file["name"]);

if ($error_cnt) {
    header('Location: ./index.php');
    exit();
}
$conn = db_connect();
$idtv = $_SESSION['id'];

if (move_uploaded_file($file["tmp_name"], $target_file)) {
    // echo "<br>The file " . basename($file["name"]) . " has been uploaded.";
} else {
    echo "Sorry, there was an error uploading your file.";
    exit();
}

$sql = "INSERT INTO sanpham (tensp, chitietsp, giasp, hinhanhsp, idtv)
    VALUES ('$tensp', '$chitietsp', '$giasp', '$target_file', '$idtv')";
if ($conn->query($sql) === TRUE) {
    $_SESSION['thanhcong'] = "Thêm sản phẩm thành công!";
    header('Location: ../List_Product');
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
