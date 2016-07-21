<?php
if(!$_SESSION['id']){
	alert("로그인을 해주세요.");
	move("/");
	exit;
}
?>
<div class="f12" style="line-height:30px;">
선택한 예약기간이 다른회원들이 배정받은 차량번호에 예약기간이 포함되 있으면 경고창이 뜹니다.
</div>
<div class="all_wrap">
	<div id="objWrap">
    <?php
	$arr = array('에쿠스/Equss','제네시스/Genesis','그랜져/Grandeur','소나타/Sonata','싼타페/Santafe','그랜드 스타렉스/Grand Starex');
	$len = count($arr);
	for($i = 0 ; $i < 5; $i++){
		$d = $db->mfs("select * from obj_list where carname = '".$arr[$i]."'");
	?>
    	<div data-idx="<?php echo $d['idx'];?>" data-carname="<?php echo $d['carname'];?>" data-carnumber="<?php echo $d['carnumber'];?>" > 
        	<figure>
        	<img src="/data/image/objimg/<?php echo $d['image'];?>" alt="<?php echo $d['image'];?>" title="<?php echo $d['image'];?>" <?php echo imgsize("{$_SERVER['DOCUMENT_ROOT']}/data/image/objimg/{$d['image']}",190,120);?>>
            	<figcaption>
                	<h4>
                	<?php echo $d['carname'];?>
                    </h4>
                </figcaption>
            </figure>
        </div>
    <?php
	}
	?>
    </div>
    <div id="dropWrap">
    	<div>
        </div>
        <input type="hidden" id="session_id" value="<?php echo $_SESSION['id'];?>">
        <form action="/" method="post" onSubmit="return rentAdd()">
        <fieldset>
		<input type="hidden" name="pidx" id="pidx">
        <input type="hidden" name="carname" id="carname">
        <input type="hidden" name="carnumber" id="carnumber">
        <ul>
            <li>
            	<span class="carnumberView f12">차량옵션을선택해주세요.</span>
            </li>
            <li>
            	<b class="f12 fL"><label for="color">차량색상</label></b>
				<select name="color" id="color" title="차량색상">
					<option value="">선택하세요.</option>
                	<option value="검정">검정</option>
                	<option value="흰색">흰색</option>
                	<option value="회색">회색</option>
                	<option value="빨강">빨강</option>                                                            
                </select>
            </li>
            <li>
            	<b class="f12 fL"><label for="fuel">사용연료</label></b>            
            	<select name="fuel" id="fuel" title="사용연료">
                	<option value="">선택하세요.</option>
                	<option value="휘발유">휘발유</option>
                	<option value="경유">경유</option>
                	<option value="하이브리드">하이브리드</option>                                        
                </select>
            </li>
            <li>
            	<b class="f12 fL"><label for="dStart">예약시작일</label></b>
            	<input type="text" name="dStart" id="dStart" title="예약시작일" required  pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" style="width:90px;" placeholder="예약시작일">
            </li>
            <li>
            	<b class="f12 fL"><label for="dEnd">예약종료일</label></b>
            	<input type="text" name="dEnd" id="dEnd" title="예약종료일" required  pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" style="width:90px;" placeholder="예약종료일">
            </li>
            <li>
               	<button class="bt2" onClick="return frmChk('color','fuel','dStart','dEnd')">예약하기</button>
                <input type="button" class="bt2" value="취소" onClick="return dropDel()">
            </li>
        </ul>
		</fieldset>
        </form>
    </div>
</div>
<script>
$(function(){
	$("#color").on("change",function(){
		carnumber();
	});
	$("#fuel").on("change",function(){
		carnumber();
	});
	$("#objWrap > div").draggable({
		helper:"clone",
		revert:"invalid"
	});
	$("#dropWrap > div").droppable({
		accept:function(d){
			var self = $(this);
			if(self.attr('data-chk') == 'false'){
				return false;
			}else{
				return true;
			}
		},
		drop:function(event,ui){
			var drag = ui.draggable;
			var drop = $(this);
			var html = drag.html();
			drop.append(html);
			$("#dropWrap ul").slideDown();
			drop.attr('data-chk','false');
			$("#carname").val(drag.attr('data-carname'));
			$("#pidx").val(drag.attr('data-idx'));			
		}
	});
	$("#dStart").datepicker({
		minDate:0,
		dateFormat:"yy-mm-dd",
		onSelect:function(){
			$("#dEnd").datepicker("option","minDate",$(this).val());
		}
	});
	$("#dEnd").datepicker({
		minDate:0,
		dateFormat:"yy-mm-dd",
		onSelect:function(){
			$("#dStart").datepicker("option","maxDate",$(this).val());
		}

	});
});
function dropDel(){
	var drop = $("#dropWrap > div");
	drop.removeAttr('data-chk');
	drop.html('');
	$("#color").val('');
	$("#fuel").val('');
	$("#dStart").val('');		
	$("#dEnd").val('');	
	$("#carname").val('');
	$("#carnumber").val('');
	$("#pidx").val('');
	$(".carnumberView").text('차량옵션을선택해주세요.');
	$("#dropWrap ul").slideUp();
}

function frmChk(obj){
	var arg = arguments.length;
	for(var i = 0; i < arg; i++){
		var d = $("#"+arguments[i]);
		if(!d.val()){
			alert(d.attr('title')+"을(를) 다시한번더 확인해주세요.");
			d.focus();
			return false;
		}
		
	}
}
function carnumber(){
	var color = $("#color").val();
	var fuel = $("#fuel").val();
	var carname = $("#carname").val();
	if(color && fuel && carname){		
		$.post("/include/db/carnumber.php",{"color":color,"fuel":fuel,"carname":carname},function(data){
			alert(data+" 차를 배정받았습니다.");
			$(".carnumberView").text(data);
			$("#carnumber").val(data);
		});
	}
}

function rentAdd(){
	var pidx = $("#pidx").val();
	var color = $("#color").val();
	var fuel = $("#fuel").val();	
	var carname = $("#carname").val();	
	var carnumber = $("#carnumber").val();	
	var dStart = $("#dStart").val();
	var dEnd = $("#dEnd").val();	
	var id = $("#session_id").val();
	if(pidx && color && fuel && carname && carnumber && dStart && dEnd && id ){
		$.post("/include/db/rent_ok.php",{
			"color":color,
			"fuel":fuel,
			"carname":carname,
			"carnumber":carnumber,
			"dStart":dStart,
			"dEnd":dEnd,
			"pidx":pidx,
			"id":id
		},function(data){
			var dval = data.split("-");
			if(dval[0] == 'false'){
				console.log(data);
				alert(dval[1]+"님이 이미 예약하신 기간이 포함되 있거나 기간입니다.");
				return false;
			}
			alert(dStart+"~"+dEnd+" 기간에 예약이되었습니다.");
			dropDel( );
			$("#dropWrap").find("ul").slideUp(); 
		});
	}
	return false;
}

</script>