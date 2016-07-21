<?php
if($_POST['action'] == 'login'){
	$mb = $db->mns("select * from member where id = '".$_POST['id']."' && pw = '".$_POST['pw']."'");
	if($mb == 0){
		alert("아이디나 비밀번호가 틀렸습니다.");
		move();
		exit;
	}else{
		$_SESSION['id'] = $_POST['id'];
		alert("로그인되었습니다. 메인페이지로 이동합니다.");
		move("/");
		exit;
	}
}