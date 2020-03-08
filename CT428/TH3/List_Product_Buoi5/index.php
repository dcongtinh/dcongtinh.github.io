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
            <input id="data-input" placeholder="Nhap ten sp" onkeyup="search(this.value)" list="data-list" />
            <datalist id="data-list">
                <!-- <option value="Internet Explorer">
                <option value="Firefox">
                <option value="Chrome">
                <option value="Opera">
                <option value="Safari"> -->
            </datalist>
            <table id="table_product" border="1">
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
                        <td>
                            <div class="tooltip" onmouseover="loadImage(<?php echo $row['idsp'] ?>, 'tooltip_img_<?php echo $row['idsp'] ?>')">
                                <?php echo $row['tensp']; ?>
                                <div id="tooltip_img_<?php echo $row['idsp'] ?>" class="tooltiptext"></div>
                            </div>
                        </td>
                        <td><?php echo number_format($row['giasp']); ?></td>
                        <td class="center">
                            <div id="show_img" onclick="loadProduct(<?php echo $row['idsp'] ?>)">Xem</div>
                        </td>
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
    <div id="show">
        <!-- <img src="#" alt="img"/> -->
    </div>
    <script>
        function loadImage(idsp, element) {
            var xmlhttp;
            if (window.XMLHttpRequest) xmlhttp = new XMLHttpRequest();
            else xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    var responseText = xmlhttp.responseText;
                    document.getElementById(element).innerHTML = "<img src=" + responseText + " />"
                }
            }
            xmlhttp.open("POST", "load_image.php", true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send("idsp=" + idsp);
        }

        function loadProduct(idsp) {
            var xmlhttp;
            if (window.XMLHttpRequest) xmlhttp = new XMLHttpRequest();
            else xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    var responseText = xmlhttp.responseText;
                    document.getElementById('show').innerHTML = responseText;
                }
            }
            xmlhttp.open("GET", "../Product?idsp=" + idsp, true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send("idsp=" + idsp);
        }

        function search(tensp) {
            console.log(tensp);
            var xmlhttp;
            if (window.XMLHttpRequest) xmlhttp = new XMLHttpRequest();
            else xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    var responseText = xmlhttp.responseText;
                    document.getElementById('data-list').innerHTML = responseText;
                }
            }
            xmlhttp.open("POST", "search.php", true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send("tensp=" + tensp);
        }
    </script>
</body>

</html>