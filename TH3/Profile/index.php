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
        <p class="hello">Chào bạn, <?php echo $_SESSION['tendangnhap'] ?>!</p>
        <form method="POST" action="signout.php">
            <table>
                <tr>
                    <td rowspan="5"><img src="../../img/avatar.jpg" alt="" width="150" height="150"></td>
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
                    <td><input type="submit" value="Đăng xuất"></td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>