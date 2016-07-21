$(function(){
	/*메뉴드롭다운*/
	$("#menu > ul > li").on("mouseover",function(){
		var self = $(this);
		var menu = $("#menu > ul > li");
		menu.each(function(index){
			if($(this).attr('data-idx') == self.attr('data-idx')){
				$(this).find("ul").slideDown();
				$(this).find("a").css({"color":"#c40c42"});
			}else{
				$(this).find("ul").slideUp();
				$(this).find("a").css({"color":"#fff"});

			}
		});
	});
	$("#join_d").on("click",function(){
		$("<div title='회원가입을 해주세요.'></div>").dialog({
			modal:true,
			width:500,
			height:"auto"
		}).load("/page/join_d.php",function(){
			noncatche : new Date.getTime();
		})
	});
	$("#login_d").on("click",function(){
		$("<div title='로그인을 해주세요.'></div>").dialog({
			modal:true,
			width:500,
			height:"auto"
		}).load("/page/login.php",function(){
			noncatche : new Date.getTime();
		});
	});

});
/*폰트사이즈조절*/
var fs = 2;
function fsize(s,obj){
	var fArr = ['x-small','smaller','medium','large','x-large'];
	if(obj == 'false'){
		fs = s;
	}else{
		fs += s;
	}
	if(fs > 4 ){ fs = 4; alert("최대사이즈입니다."); }
	if(fs < 0){ fs = 0; alert("최소사이즈입니다.");}
	$("body").css({"font-size":fArr[fs]});
}

var chk = 'no';
var num = 0;
function Slide(obj){
	var slide = $("#visual > ul > li");
	var Max = slide.length - 1;
	var bt = $("#slideBt > .btWrap > ul > li");
	if(chk == 'no'){
		num = obj;
		chk = 'ok';
	}else{
		num += obj;
	}
	if(num > Max) num = 0;
	if(num < 0) num = Max;
	slide.each(function(index){
		if(index == num){
			$(this).fadeIn();
		}else{
			$(this).fadeOut();
		}
	});
	bt.each(function(index){
		if(num == index){
			$(this).css("background","#c40c42");
		}else{
			$(this).css("background","#fff");
		}
	});
	
}
var time = setInterval("Slide(1)",4000);

function nextBt(obj){
	clearInterval(time);
	chk = 'ok';
	Slide(obj);
	chk = 'ok'
	time = setInterval("Slide("+(+1)+")",4000);
}
function slideBt(obj){
	clearInterval(time);
	chk = 'no';
	Slide(obj);
	chk = 'ok'
	time = setInterval("Slide("+(+1)+")",4000);
}

