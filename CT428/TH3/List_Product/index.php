<?php
include '../../session_start.php';
include '../../database.php';
if (!isset($_SESSION['tendangnhap'])) {
    header("Location: ../Login");
}
$conn = db_connect();
$idtv = $_SESSION['id'];

$sql = "SELECT * FROM sanpham where idtv='$idtv'";
$result = $conn->query($sql);
$conn->close();
if (!$result) {
    echo "Error: " . $sql . "<br>" . $conn->error;
    exit();
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
            <div class="add"><a href="../Add_Product">+</a></div>
        </div>
        <form method="POST" action="../Profile/signout.php">
            <p class="title">Danh sách sản phẩm của bạn là:</p>
            <table border="1">
                <tr>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá sản phẩm</th>
                    <th colspan="3">Lựa chọn</th>
                </tr>
                <?php
                $i = 0;
                while ($row = $result->fetch_assoc()) {

                    ?>
                    <tr>
                        <td class="center"><?php echo ++$i; ?></td>
                        <td><?php echo $row['tensp']; ?></td>
                        <td><?php echo number_format($row['giasp']); ?></td>
                        <td class="center"><a href="../Product?idsp=<?php echo $row['idsp'] ?>">Xem</a></td>
                        <td class="center"><a href="../Product?idsp=<?php echo $row['idsp'] ?>&edit=1"><img src="../../assets/icon/edit.png" alt="edit_icon"></a></td>
                        <td class="center"><a href="delete.php?idsp=<?php echo $row['idsp'] ?>"><img src="../../assets/icon/delete.png" alt="delete_icon"></a></td>
                    </tr>
                <?php
                }
                ?>
            </table>
            <div class="signout"><input type="submit" value="Đăng xuất"></div>
        </form>
    </div>
</body>

</html>