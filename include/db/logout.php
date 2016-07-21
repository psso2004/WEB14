<?php
include "{$_SERVER['DOCUMENT_ROOT']}/include/php/lib.php";
session_destroy();
alert("로그아웃되었습니다. 메인페이지로 이동합니다.");
move("/");
exit;
?>

