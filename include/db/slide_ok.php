<?php
include "{$_SERVER['DOCUMENT_ROOT']}/include/php/db.php";
include "{$_SERVER['DOCUMENT_ROOT']}/include/php/lib.php";

$db->mq("update slide set chk = ''");
$db->mq("update slide set chk = '".$_POST['chk']."'  where idx in (".$_POST['idx'].")");
move("/page/sub.php/14/14/admin");