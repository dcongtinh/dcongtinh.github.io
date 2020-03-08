<?php
include '../../session_start.php';
include '../../database.php';

$idsp = $_POST['idsp'];

$conn = db_connect();

$sql = "SELECT * FROM sanpham WHERE idsp=$idsp";
$result = $conn->query($sql);
if ($result) {
    $row = $result->fetch_assoc();
    echo $row['hinhanhsp'];
    // echo "<img src=".$row['hinhanhsp']."/>";
    exit();
}
echo "Error: " . $sql . "<br>" . $conn->error;

$conn->close();
