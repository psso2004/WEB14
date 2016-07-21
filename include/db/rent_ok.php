<?php
include "{$_SERVER['DOCUMENT_ROOT']}/include/php/db.php";
include "{$_SERVER['DOCUMENT_ROOT']}/include/php/lib.php";

$chk = 'ok';
$psTime = new DateTime($_POST['dStart']);
$peTime = new DateTime($_POST['dEnd']); 
$val = date_diff($psTime,$peTime);
$arr = array();
for($i = 0; $i<=$val->days; $i++){
	$arr[] = date("Y-m-d",strtotime("+{$i} day",strtotime($_POST['dStart'])));
}

$len = count($arr);
$res = $db->mq("select * from rent_list where pidx = '".$_POST['pidx']."' && color = '".$_POST['color']."' && carname = '".$_POST['carname']."' && carnumber = '".$_POST['carnumber']."' && fuel = '".$_POST['fuel']."'");
while($d = $db->mf($res)){
	if(in_array($d['dStart'],$arr)){ echo 'false-'.$d['id']; $chk = 'no'; exit;}
	if(in_array($d['dEnd'],$arr)){ echo 'false-'.$d['id']; $chk = 'no'; exit;}	
}
if($chk == 'no'){
	exit;
}else{
	$cancel = "/action/table/add_sql/url";
	$html = true;
	$column = get_column($_POST,$cancel,$html);
	$db->query("insert","rent_list",$column);
}