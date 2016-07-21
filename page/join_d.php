<?php
include "{$_SERVER['DOCUMENT_ROOT']}/include/php/db.php";
include "{$_SERVER['DOCUMENT_ROOT']}/include/php/lib.php";

if($_POST['action']){
	$_POST['pw'] = md5($_POST['pw']);
	include "{$_SERVER['DOCUMENT_ROOT']}/include/db/join_ok.php";
}
?>
<div class="all_wrap">
	<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    <fieldset>
	<input type="hidden" name="action" value="insert">
    <input type="hidden" name="table" value="member">
    <input type="hidden" name="add_sql" value="">
    <input type="hidden" name="url" value="/">
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
        	<tr style=" float:left; width:100%; height:auto; line-height:30px; border-bottom:1px solid #999;">
            	<th style=" float:left; width:29%; padding:0 2% 0 0; background:#ccc; color:#000;"><label for="phone">전화번호</label></th>
                <td><input type="text" name="phone" id="phone" title="전화번호" required></td>
            </tr>
        	<tr style=" float:left; width:100%; height:auto; line-height:30px; border-bottom:1px solid #999;">
            	<th style=" float:left; width:29%; padding:0 2% 0 0; background:#ccc; color:#000;"><label for="email">이메일</label></th>
                <td><input type="text" name="email" id="email" title="이메일" required></td>
            </tr>
        </tbody>
        <tfoot>
        	<tr>
            	<td class="bt">
                	<button class="bt1">회원가입</button>
                </td>
            </tr>
        </tfoot>
    </table>
    </fieldset>
    </form>
</div>