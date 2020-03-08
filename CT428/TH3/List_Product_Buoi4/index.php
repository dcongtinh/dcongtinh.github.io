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
$PRODUCTS = [];
$i = 0;
while ($row = $result->fetch_assoc()) {
    $PRODUCTS[$i++] = $row;
}
$first_row = $PRODUCTS[0];
?>
<!DOCTYPE html>
<html>

<head>
    <title> Lập trình web (CT428) </title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" type="text/css" href="style.css" media="screen" />
    <?php
    echo "<script>
        var PRODUCTS = " . json_encode($PRODUCTS) . ";
        function changeSlide(pos) {
            var total = PRODUCTS.length;
            var indexSelected = parseInt(document.getElementsByName('sanphamSel')[0].value);
            indexSelected = (indexSelected + pos + total) % total;
            chooseSlide(indexSelected)
        }

        function chooseSlide(pos) {
            document.getElementById('sanpham').href = '../Product?idsp=' + PRODUCTS[pos]['idsp'];
            document.getElementById('tensp').innerHTML = PRODUCTS[pos]['tensp'];
            document.getElementById('giasp').innerHTML = PRODUCTS[pos]['giasp'].toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,') + ' VND'
            document.getElementById('chitietsp').innerHTML = PRODUCTS[pos]['chitietsp'];
            document.getElementById('sanphamSel').src = PRODUCTS[pos]['hinhanhsp'];

            document.getElementById('edit').href = '../Product?idsp=' + PRODUCTS[pos]['idsp'] + '&edit=1'
            document.getElementById('delete').href = 'delete.php?idsp=' + PRODUCTS[pos]['idsp']
            document.forms['fSanPham']['sanphamSel'].value = pos;
        }
    </script>";
    ?>
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
        <div class="body">
            <form name="fSanPham">
                <a href="../Product?idsp=<?php echo $first_row['idsp'] ?>" target="_blank" id="sanpham">
                    <img id="sanphamSel" src="<?php echo $first_row['hinhanhsp'] ?>" height="300" width="300" />
                </a>
                <br />
                <div id="tensp"><?php echo $first_row['tensp'] ?></div>
                <div id="giasp"><?php echo number_format($first_row['giasp']) ?> VND</div>
                <textarea readonly rows="8" id="chitietsp"><?php echo $first_row['chitietsp'] ?></textarea>
                <br />

                <div class="navigation"><input type="button" name="previous" value="Previous" onclick="changeSlide(-1)">
                    <input type="button" name="next" value="Next" onclick="changeSlide(1)"></div>
                <div class="select"><select name="sanphamSel" onchange="chooseSlide(value)">
                        <?php
                        $i = 0;
                        foreach ($PRODUCTS as $key => $product) {
                            ?>
                            <option value="<?php echo $i++ ?>"><?php echo $product['tensp'] ?></option>
                        <?php
                        }
                        ?>
                    </select></div>
                <div class="footer"><a id="edit" class="icon" href="../Product?idsp=<?php echo $first_row['idsp'] ?>&edit=1"><img src="../../assets/icon/edit.png" alt="edit_icon"></a>
                    <a id="delete" class="icon" href="delete.php?idsp=<?php echo $first_row['idsp'] ?>"><img src="../../assets/icon/delete.png" alt="delete_icon"></a></div>
            </form>
        </div>
    </div>

</html>