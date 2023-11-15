<?php
session_start();
//Loại bỏ trường mình muốn và xoá trên sever chứ không phải xoá ở trình duyệt người dùng
unset($_SESSION['id_user']);
unset($_SESSION['avatar_user']);
unset($_SESSION['name_user']);

setcookie('remember', null, -1);
header('Location:index.php');
//Loại bỏ hết
// session_destroy();
