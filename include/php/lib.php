<?php
error_reporting(0);
session_start();
header("Content-Type:text/html; charset=utf-8");
date_timezone_set("Asia/Seoul");

$var = explode("/",$_SERVER['REQUEST_URI']);
$parent = $var[3];
$idx = $var[4];
$action = $var[5];
$value = $var[6];
$page_num = $var[7];
$search_key = urldecode($var[8]);
$search_type = $var[9];

function move($url){
	echo "<script>";
		echo $url ? "location.href='".$url."';" : "history.back();";
	echo "</script>";
}
function alert($msg){
	echo "<script>";
		echo $msg ? "alert('".$msg."');" : "";
	echo "</script>";
}

function get_column($arr,$cancel,$html=true){
	$cancel = explode("/",$cancel);
	foreach($arr as $key=>$val){
		if(!in_array($key,$cancel)){
			if($html == true) $val = strip_tags($val);
			$column .= ", {$key}='{$val}'";
		}
	}
	return $column = substr($column,2);
}


function imgsize($src,$w,$h){
	$size = getimagesize($src);
	if($size[0] > $size[1]){
		$st = $size[0]/$w;
	}else if($size[1] > $size[0]){
		$st = $size[1]/$h;
	}else{
		$st = $size[0]/$w;
	}
	$width = $size[0]/$st;
	$height = $size[1]/$st;
	return " width='".$width."'  height='".$height."'";
}

function file_uploade($file,$img = 'img'){
	$ex = pathinfo($file['name']);
	$ex_name = strtolower($ex['extension']);
	$ex_file = array('jpg','jpeg','png','gif');
	if(!in_array($ex_name,$ex_file)){ alert("이미지 파일이 아닙니다."); move(); exit; }
	$uploade_file = date("Y-m-d")."-".rand().".".$ex_name;
	move_uploaded_file($file['tmp_name'],"{$_SERVER['DOCUMENT_ROOT']}/data/uploade_file/{$uploade_file}");
	return $uploade_file;
}

function rep($str,$key){
	$str = str_ireplace($key,"<b style='background:#ff0; color:#f00;'>".$key."</b>",$str);
	return $str;
}

