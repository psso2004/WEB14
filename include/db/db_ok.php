<?php
	$cancel .= "/action/table/add_sql/url";
	$html = true;
	$add_sql = " ".$_POST['add_sql'];
	$column = get_column($_POST,$cancel,$html);
	$db->query($_POST['action'],$_POST['table'],$column.$add_sql);
	move($_POST['url']);
?>