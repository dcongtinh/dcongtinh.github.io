<?php
include '../../session_start.php';
if (!isset($_SESSION['tendangnhap'])) {
    header("Location: ../Login");
}

function set_error($param)
{
    $error = $_SESSION['error_' . $param];
    if (isset($_SESSION['error_' . $param])) {
        echo "<p class='error'>$error</p>";
        unset($_SESSION['error_' . $param]);
        return;
    }
    echo '';
    return;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="./style.css" />
    <title>Đăng ký</title>
</head>

<body>
    <div class="container">
        <h3>Thêm sản phẩm mới</h3>
        <p>
            Vui lòng điền đầy đủ thông tin bên dưới để thêm sản phẩm mới
        </p>
        <form class="form-wrapper" enctype="multipart/form-data" method="POST" action="add_product.php">
            <table>
                <tr>
                    <th>Tên sản phẩm</th>
                    <td>
                        <input type="text" name="tensp" />
                        <?php set_error('tensp') ?>
                    </td>
                </tr>
                <tr>
                    <th>Chi tiết sản phẩm</th>
                    <td>
                        <textarea name="chitietsp" cols="40" rows="5"></textarea>
                        <?php set_error('chitietsp') ?>
                    </td>
                </tr>
                <tr>
                    <th>Giá sản phẩm</th>
                    <td>
                        <input type="number" name="giasp" /> (VND)
                        <?php set_error('giasp') ?>
                    </td>
                </tr>
                <tr>
                    <th>Hình đại diện</th>
                    <td>
                        <input id="file" type="file" name="hinhanhsp" />
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td>
                        <input type="submit" value="Lưu sản phẩm" />
                        <input type="reset" value="Làm lại" />
                    </td>
                </tr>
            </table>
        </form>
        <p class="error">
            <?php
            if (isset($_SESSION['error'])) {
                echo "* " . $_SESSION['error'];
                unset($_SESSION['error']);
            }
            ?>
        </p>
    </div>
</body>

</html>