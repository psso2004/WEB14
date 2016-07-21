<?php
include "{$_SERVER['DOCUMENT_ROOT']}/include/php/db.php";
include "{$_SERVER['DOCUMENT_ROOT']}/include/php/lib.php";

$d = $db->mfs("select * from obj_list where carname = '".$_POST['carname']."' && color = '".$_POST['color']."' && fuel = '".$_POST['fuel']."'");
echo $d['carnumber'];
?>