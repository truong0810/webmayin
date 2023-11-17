<?php
require_once("../../config/config.php");
$order_id = $_GET['id'];
$status = $_GET['status'];
$sql = "UPDATE orders SET status = $status WHERE id = '$order_id'";
mysqli_query($mysqli, $sql);
header('Location:../../index.php?action=quanlydonhang');
