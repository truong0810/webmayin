<?php
require_once("admin/config/config.php");
$search  = $_GET['term'];
$sql = "SELECT * FROM product WHERE title like '%$search%'";
$result = mysqli_query($mysqli, $sql);

$arr = [];

foreach ($result as $each) {
   $arr[] = [
      'name' => $each['title'],
      'id' => $each['id'],
      'price' => $each['price'],
      'discount' => $each['discount'],
      'image' => $each['thumbnail']
   ];
}
echo json_encode($arr);
