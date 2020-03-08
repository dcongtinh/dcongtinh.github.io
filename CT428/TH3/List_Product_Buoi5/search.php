<?php
include '../../session_start.php';
include '../../database.php';

$tensp = $_POST['tensp'];
$idtv = $_SESSION['id'];
$conn = db_connect();

$sql = "SELECT * FROM sanpham WHERE idtv='$idtv' and tensp like '%$tensp%' limit 10";
$result = $conn->query($sql);
if ($result) {
    while ($row = $result->fetch_assoc()) {
        echo "<option value='" . $row['tensp'] . "'>";
    }
    exit();
}
echo "Error: " . $sql . "<br>" . $conn->error;

$conn->close();
