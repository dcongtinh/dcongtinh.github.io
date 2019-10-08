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

$file = '';
$uploadOk = 1;
$target_file = '';
if (isset($_FILES['hinhanhsp'])) {
    $file = $_FILES['hinhanhsp'];
    $target_dir = "/assets/avatar/";
    // $target_file = $target_dir . basename($file["name"]);

    // $check = getimagesize($file["tmp_name"]);
    // if ($check) $uploadOk = 1;
    // else {
    //     echo "File is not an image.";
    //     $uploadOk = 0;
    // }
}

if ($error_cnt) {
    header('Location: ./index.php');
    exit();
}
$conn = db_connect();
$idtv = $_SESSION['id'];

$sql = "INSERT INTO sanpham (tensp, chitietsp, giasp, hinhanhsp, idtv)
VALUES ('$tensp', '$chitietsp', '$giasp', '', '$idtv')";

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
} else {
    if ($file['name']) {
        echo $file["tmp_name"];
        if (move_uploaded_file($file["tmp_name"], "./" . $file['name'])) {
            echo "<br>The file " . basename($file["name"]) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    if ($conn->query($sql) === TRUE) {
        $_SESSION['thanhcong'] = "Thêm sản phẩm thành công!";
        header('Location: ../List_Product');
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
