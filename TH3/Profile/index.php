<?php
include '../../session_start.php';
if (!isset($_SESSION['tendangnhap'])) {
    header("Location: ../Login");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./profile.css" />
    <title>Thông tin cá nhân</title>
</head>

<body>
    <div class="profile">
        <p class="hello">Chào bạn, <b><?php echo $_SESSION['tendangnhap'] ?></b>!</p>
        <form method="POST" action="signout.php">
            <table>
                <tr>
                    <td rowspan="6"><img src=<?php echo $_SESSION['hinhanh'] ?> alt="" width="150" height="150"></td>
                    <td>Nickname: <?php echo $_SESSION['tendangnhap'] ?></td>
                </tr>
                <tr>
                    <td>Giới tính: <?php echo $_SESSION['gioitinh'] ?></td>
                </tr>
                <tr>
                    <td>Nghề nghiệp: <?php echo $_SESSION['nghenghiep'] ?></td>
                </tr>
                <tr>
                    <td>Sở thích: <?php echo $_SESSION['sothich'] ?></td>
                </tr>
                <tr>
                    <td>
                        <ul>
                            <li><a href="../List_Product">Danh sách sản phẩm</a></li>
                            <li><a href="../List_Product_Buoi4">Buổi 4 - Bài 4</a></li>
                            <li><a href="../Add_Product">Thêm sản phẩm</a></li>
                        </ul>

                    </td>
                </tr>
                <tr>
                    <td><input type="submit" value="Đăng xuất"></td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>