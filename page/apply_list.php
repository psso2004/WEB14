<?php
if(!$_SESSION['id']){
	alert("로그인을 해주세요.");
	move();
	exit;
}
if($_SESSION['id'] == 'admin'){
	move("/page/sub.php/{$parent}/{$idx}/admin_list");
}
?>
<div class="all_wrap">
	<table class="board">
    	<thead>
        	<tr>
            	<th class="board20">차량사진</th>
            	<th class="board20">차량명</th>
            	<th class="board10">차량색상</th>
            	<th class="board10">사용연료</th>
            	<th class="board20">예약기간(시작~종료)</th>                                                                
                <th class="board10">차량번호</th>
                <th class="board10">반납여부</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    <input type="hidden" id="session_id" value="<?php echo $_SESSION['id'];?>">
</div>
<script>
$(function(){
	rentList();
});
function rentList(){
	var id = $("#session_id").val();
	$.post("/include/db/rent_list.php",{"id":id},function(data){
		$(".board > tbody").html(data);
	});
}
function rentDel(obj){
	$.post("/include/db/rent_del.php",{"idx":obj},function(data){
		alert("반납되었습니다.");
		rentList();
	});
}
</script>