<?php
include "{$_SERVER['DOCUMENT_ROOT']}/include/php/db.php";
include "{$_SERVER['DOCUMENT_ROOT']}/include/php/lib.php";
	if($_POST['action'] == 'login'){
		$_POST['pw'] = md5($_POST['pw']);
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
?>
<div class="all_wrap">
	<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    <fieldset>
	<input type="hidden" name="action" value="login">
	<table style="float:left; width:100%; height:auto; font-size:.75em;">
    	<tbody  style="float:left; width:100%; height:auto; border-top:2px solid #c40c42;">
        	<tr style=" float:left; width:100%; height:auto; line-height:30px; border-bottom:1px solid #999;">
            	<th style=" float:left; width:29%; padding:0 2% 0 0; background:#ccc; color:#000;" ><label for="id">아이디</label></th>
                <td><input type="text" name="id" id="id" title="아이디" required></td>
            </tr>
        	<tr style=" float:left; width:100%; height:auto; line-height:30px; border-bottom:1px solid #999;">
            	<th style=" float:left; width:29%; padding:0 2% 0 0; background:#ccc; color:#000;"><label for="pw">비밀번호</label></th>
                <td><input type="password" name="pw" id="pw" title="비밀번호" required></td>
            </tr>
        </tbody>
        <tfoot>
        	<tr>
            	<td class="bt">
                	<button class="bt1">로그인</button>
                </td>
            </tr>
        </tfoot>
    </table>
    </fieldset>
    </form>
</div>