<?php
include '../../session_start.php';
include '../../database.php';

$error_cnt = 0;
$tensp = $_POST['tensp'];
$idsp = $_POST['idsp'];
if (!$tensp) {
    ++$error_cnt;
    $_SESSION['error_tensp'] = 'Vui lòng nhập Tên sản phẩm!';
}

$chitietsp = $_POST['chitietsp'];
$giasp = $_POST['giasp'];

$file = '';
$uploadOk = 1;
$target_file = '';
if (isset($_FILES['hinhanhsp'])) {
    $file = $_FILES['hinhanhsp'];
    $target_dir = "../../assets/product/";
    $target_file = $target_dir . basename($file["name"]);
}

if ($error_cnt) {
    header('Location: ./index.php?idsp=' . $idsp . '&edit=1');
    exit();
}
$conn = db_connect();
$idtv = $_SESSION['id'];

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
} else {
    if ($file['name']) {
        if (move_uploaded_file($file["tmp_name"], $target_file)) {
            // echo "<br>The file " . basename($file["name"]) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
            exit();
        }
    } else $target_file = $_POST['hinhanhsp'];
    $sql = "UPDATE sanpham SET tensp='$tensp', chitietsp='$chitietsp', giasp=$giasp, hinhanhsp='$target_file' WHERE idsp='$idsp'";
    if ($conn->query($sql) === TRUE) {
        $_SESSION['thanhcong'] = "Cập nhật sản phẩm thành công!";
        header('Location: ../Product?idsp=' . $idsp);
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
