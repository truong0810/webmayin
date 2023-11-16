<?php
// empty = isset($_SESSION['level_admin']) || $_SESSION['level_admin'] !== 1 Vì chỉ có 2 level là 0 hoặc 1 => lên thằng $_SESSION['level_admin'] trả về 0 thì cũng ko lọt đc vào true của empty
if (empty($_SESSION['level_admin'])) {
  header('Location:signin.php');
  exit;
}
