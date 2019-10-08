<?php
include '../../session_start.php';
if (isset($_SESSION['tendangnhap'])) {
    header("Location: ../Profile");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./style.css" />
    <title>Đăng nhập</title>
</head>

<body>
    <p class="thanhcong">
        <?php
        if (isset($_SESSION['thanhcong'])) {
            echo $_SESSION['thanhcong'];
            unset($_SESSION['thanhcong']);
        }
        ?>
    </p>
    <div class="container">
        <form action="login.php" method="POST">
            <table>
                <tr>
                    <th>Tên đăng nhập</th>
                    <td>
                        <input type="text" name="tendangnhap" />
                    </td>
                </tr>
                <tr>
                    <th>Mật khẩu</th>
                    <td>
                        <input type="password" name="matkhau" />
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td>
                        <input type="submit" value="Đăng nhập" />
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <a href="../Register">Chưa có tài khoản?</a>
                    </td>
                </tr>
            </table>
            <p class="error">
                <?php
                if (isset($_SESSION['error'])) {
                    echo "* " . $_SESSION['error'];
                    unset($_SESSION['error']);
                }
                ?>
            </p>
        </form>
    </div>
</body>

</html>