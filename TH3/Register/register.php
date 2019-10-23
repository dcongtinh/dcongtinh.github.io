<?php
include '../../session_start.php';
include '../../database.php';

$error_cnt = 0;
$tendangnhap = $_POST['tendangnhap'];
if (!$tendangnhap) {
    ++$error_cnt;
    $_SESSION['error_tendangnhap'] = 'Vui lòng nhập Tên đăng nhập!';
}

$matkhau = $_POST['matkhau'];
if (!$matkhau) {
    ++$error_cnt;
    $_SESSION['error_matkhau'] = 'Vui lòng nhập Mật khẩu!';
}
$matkhau2 = $_POST['matkhau2'];
if ($matkhau && $matkhau != $matkhau2) {
    ++$error_cnt;
    $_SESSION['error_matkhau2'] = 'Mật khẩu không khớp!';
}

$file = '';
$uploadOk = 1;
$target_file = '';
if (isset($_FILES['hinhanh'])) {
    $file = $_FILES['hinhanh'];
    $target_dir = "../../assets/avatar/";
    $target_file = $target_dir . basename($file["name"]);

    $check = getimagesize($file["tmp_name"]);
    if ($check) $uploadOk = 1;
    else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
$gioitinh = $_POST['gioitinh'];
$nghenghiep = $_POST['nghenghiep'];

$sothich_array = $_POST['sothich'];
if (isset($sothich_array)) {
    $sothich = $sothich_array[0];
    foreach ($sothich_array as $key => $value) {
        if ($key) $sothich .= ', ' . $value;
    }
}

$conn = db_connect();
$sql = "SELECT * FROM thanhvien where tendangnhap='$tendangnhap'";
if ($conn->query($sql)->num_rows == 1) {
    ++$error_cnt;
    $_SESSION['error_tendangnhap'] = 'Tên tài khoản đã tồn tại';
}
if ($error_cnt) {
    header('Location: ./index.php');
    exit();
}
$conn = db_connect();

$sql = "INSERT INTO thanhvien (tendangnhap, matkhau, hinhanh, gioitinh, nghenghiep, sothich)
VALUES ('$tendangnhap', '" . md5($matkhau) . "', '$target_file', '$gioitinh', '$nghenghiep', '" . $sothich . "')";

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
    }
    $sql = "INSERT INTO thanhvien (tendangnhap, matkhau, hinhanh, gioitinh, nghenghiep, sothich)
    VALUES ('$tendangnhap', '" . md5($matkhau) . "', '$target_file', '$gioitinh', '$nghenghiep', '" . $sothich . "')";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['thanhcong'] = "Chúc mừng bạn đăng ký tài khoản thành công!";
        header('Location: ../Login');
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();

// echo $tendangnhap;
// echo md5($matkhau);
// echo $file['name'];
// echo $gioitinh;
// echo $nghenghiep;
// echo $sothich;
