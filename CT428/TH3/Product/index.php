<?php
include '../../session_start.php';
include '../../database.php';
if (!isset($_SESSION['tendangnhap'])) {
    header("Location: ../Login");
}
$conn = db_connect();
$idsp = $_GET['idsp'];

if (!isset($idsp)) {
    header("Location: ../List_Product");
}
$sql = "SELECT * FROM sanpham where idsp='$idsp'";
$result = $conn->query($sql);
$conn->close();
if (!$result) {
    echo "Error: " . $sql . "<br>" . $conn->error;
    exit();
}
$data = $result->fetch_assoc();
function set_error($param)
{
    if (isset($_SESSION['error_' . $param])) {
        $error = $_SESSION['error_' . $param];
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./style.css" />
    <title>Danh sach san pham</title>
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
        <div class="hello">
            Chào bạn, <a href="../Profile"><?php echo $_SESSION['tendangnhap'] ?></a>!
        </div>
        <?php
        if (isset($_GET['edit'])) {
            ?>
            <form class="form-wrapper" enctype="multipart/form-data" method="POST" action="edit_product.php">
                <input type="hidden" name="idsp" value="<?php echo $idsp; ?>" />
                <table>
                    <tr>
                        <th>Tên sản phẩm</th>
                        <td>
                            <input type="text" name="tensp" value="<?php echo $data['tensp']; ?>" required />
                            <?php set_error('tensp') ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Chi tiết sản phẩm</th>
                        <td>
                            <textarea rows="8" name="chitietsp" style="width: 268px"><?php echo $data['chitietsp']; ?></textarea>
                            <?php set_error('matkhau') ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Giá sản phẩm</th>
                        <td>
                            <input type="number" name="giasp" value="<?php echo $data['giasp']; ?>" required /> (VND)
                            <?php set_error('giasp') ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Hình đại diện</th>
                        <td>
                            <label for="hinhanhsp" style="cursor: pointer;">
                                <img src="<?php echo $data['hinhanhsp']; ?>" width="300" height="300" />
                            </label>
                            <input type="hidden" name="hinhanhsp" value="<?php echo $data['hinhanhsp']; ?>" />
                            <input id="hinhanhsp" type="file" name="hinhanhsp" value="<?php echo $data['hinhanhsp']; ?>" />
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
        <?php
        } else {
            ?>
            <div style="padding: 16px;">
                <table>
                    <tr>
                        <th colspan="2" class="center"><img src=<?php echo $data['hinhanhsp']; ?> alt="" width="300" height="300"></th>
                    </tr>
                    <tr>
                        <th>Tên sản phẩm</th>
                        <td><?php echo $data['tensp'] ?></td>
                    </tr>
                    <tr>
                        <th>Mô tả sản phẩm</th>
                        <td><textarea readonly rows="8"><?php echo $data['chitietsp'] ?></textarea></td>
                    </tr>
                    <tr>
                        <th>Giá sản phẩm</th>
                        <td><?php echo number_format($data['giasp']) ?>(VND)</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="center">
                            <a href="../Product?idsp=<?php echo $idsp; ?>&edit=1"><img src=" ../../assets/icon/edit.png" alt="edit_icon"></a>
                            <a href="../List_Product/delete.php?idsp=<?php echo $idsp ?>"><img src="../../assets/icon/delete.png" alt="delete_icon"></a>
                        </td>
                    </tr>
                </table>
            </div>
        <?php
        }
        ?>
    </div>
</body>

</html>