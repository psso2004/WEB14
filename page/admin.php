<?php 
if($_POST['action']){
	$_POST['image'] = file_uploade($_FILES['image'],'img');
	include "{$_SERVER['DOCUMENT_ROOT']}/include/db/db_ok.php";
}
?>
<div class="all_wrap">
	<table class="board">
    	<thead>
        	<tr>
            	<th class="board100">슬라이드 이미지 목록</th>
            </tr>
        </thead>
        <tbody>
		<?php
		$sArr = "";
		$res = $db->mq("select * from slide");
		$total = $db->mn($res);
		if($total == 0){
		?>
        	<tr><th class="board100">슬라이드이미지 목록이 없습니다.</th></tr>
        <?php
		}
		while($d = $db->mf($res)){
			if($d['chk'] == 'true'){
				$sArr .= ",".$d['idx'];
			}
		?>
        	<tr>
            	<td class="board30">
                	<input type="checkbox" class="chk" data-idx="<?php echo $d['idx'];?>" <?php if($d['chk'] == 'true'){?> checked <?php }?>>
                </td>
                <td class="board60">
                	<img src="/data/uploade_file/<?php echo $d['image'];?>" alt="비주얼이미지" title="비주얼이미지" width="60%" height="150px" style="margin:5px 0 0 0;">
                </td>
            </tr>
        <?php
		}
		$sArr = substr($sArr,1);
		?>
        </tbody>
        <tfoot>
        	<tr>
            	<td class="board100" style="text-align:right; line-height:40px;">
					<form action="/include/db/slide_ok.php" method="post">
                    <fieldset>
                    	<input type="hidden" name="idx" value="<?php echo $sArr;?>">
                        <input type="hidden" name="chk" value="true">
                        <button class="bt1">슬라이드이미지설정</button>
                    </fieldset>
                    </form>
                </td>
            </tr>
        	<tr>
            	<td class="baord100" style="text-align:center; line-height:40px;">
                	<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
                    <fieldset>
                    	<input type="hidden" name="action" value="insert">
                        <input type="hidden" name="table" value="slide">
                        <input type="hidden" name="add_sql" value="">
                        <input type="hidden" name="url" value="<?php echo $_SERVER['PHP_SELF'];?>">
                    	<input type="file" name="image" required>
                        <button class="bt2">슬라이드이미지업로드</button>
                    </fieldset>
                    </form>
                </td>
            </tr>
        </tfoot>
    </table>
</div>
<script>
$(function(){
	$(".chk").on("click",function(){
		var arr = new Array();
		var chk = $(".chk");
		chk.each(function(index){
			if($(this).is(":checked") == true){
				arr[arr.length] = $(this).attr('data-idx');
			}
		});
		$("input[name='idx']").val(arr);
	});
});
</script>