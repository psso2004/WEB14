<div class="all_wrap f12" style="height:auto; line-height:40px;">
차량명을 검색해주세요.
</div>
<div class="all_wrap" style="background:#ddd; height:auto; line-height:50px; border:1px solid #ccc; text-align:center; margin:0 0 5px 0; ">
	<input type="text" id="search_key" style="width:70%; height:25px;" placeholder="검색어를 입력해주세요." onKeyUp="return key(this.value)" >
</div>
<div class="all_wrap">
	<table class="board">
    	<thead>
			<tr>
                <th class="board20">차량사진</th>
                <th class="board20">차량명</th>
                <th class="board20">차량색상</th>
                <th class="board20">사용연료</th>
                <th class="board20">차량번호</th>                                                
			</tr>
        </thead>
        <tbody>
        <?php
		$res = $db->mq("select * from obj_list limit 5 order by idx asc ");
		while($d = $db->mf($res)){
		?>
			<tr>
            	<td class="board20">
                	<img src="/data/image/objimg/<?php echo $d['image'];?>" alt="<?php echo $d['carnmae'];?>" title="<?php echo $d['carname'];?>" <?php echo imgsize("{$_SERVER['DOCUMENT_ROOT']}/data/image/objimg/{$d['image']}",110,110);?>>
                </td>
            	<td class="board20 carname">
                	<?php echo $d['carname'];?>
                </td>
            	<td class="board20">
                	<?php echo $d['color'];?>
                </td>
            	<td class="board20">
                	<?php echo $d['fuel'];?>
                </td>
            	<td class="board20">
                	<?php echo $d['carnumber'];?>
                </td>
            </tr>
		<?php
		}
		?>
        </tbody>
    </table>
</div>
<script>
function key(obj){
	localStorage.searchKey = obj;	
	$.post("/include/db/search.php",{"key":obj},function(data){
		$(".board > tbody").html(data);
//		localStorage.cnt = 0;
	});

}
function more(obj){
	var key = localStorage.searchKey;
	var num = $(".board > tbody > tr").size();
	$.post("/include/db/scroll.php",{"key":key,"num":num,"obj":obj},function(data){
		var dLen = $(data).size();
		if(dLen != 0){		
			$(".board > tbody").append(data);
		}else{
			alert("더이상 데이터가 없습니다.");
		}
	});	
}
window.onscroll = function(){
//	localStorage.scrollTop = $(window).scrollTop();
	if($(document).height() == ($(window).height() + $(window).scrollTop())){		
//		localStorage.cnt++;					
		more();				
	}
}

/*
if(typeof(localStorage.cnt) == "undefined"){
	localStorage.cnt = 0;
}
function key(obj){
	localStorage.searchKey = obj;	
	$.post("/include/db/search.php",{"key":obj},function(data){
		$(".board > tbody").html(data);
		localStorage.cnt = 0;
	});
}
function more(obj){
	var key = $("#search_key").val();
	var num = $(".board > tbody > tr").size();
	$.post("/include/db/scroll.php",{"key":key,"num":num,"obj":obj},function(data){
		var dLen = $(data).size();
		if(dLen != 0){		
			$(".board > tbody").append(data);
		}else{
			alert("더이상 데이터가 없습니다.");
		}
	});
}
window.onscroll = function(){
	localStorage.scrollTop = $(window).scrollTop();
	if($(document).height() == ($(window).height() + $(window).scrollTop())){		
		localStorage.cnt++;					
		more();				
	}
}
window.onload = function(){
	$(".board > tbody").html('');
	$("#search_key").val(localStorage.searchKey);

	more(localStorage.cnt * 5);
	
	setTimeout(function(){
		$(window).scrollTop(localStorage.scrollTop);
	},50);
}
*/
</script>