
$(function(){
	$(".content1").find("img").attr('src','/attachment/img.jpg');
	$("#diagram").html("<canvas class='mycanvas'></canvas>");
	$(".content4").find("video").find("source:nth-child(1)").attr('src','/attachment/video.ogg');
	$(".content4").find("video").find("source:nth-child(2)").attr('src','/attachment/video.mp4');	
	$(".content2 > p").find("button").attr("class",'bt2');
	$(".content2 > p").find("button").on("click",function(){
		
		location.href='/page/sub.php/3/9/apply';
		
	});

	draw(1);

});
var color = ["","#c40c42","#666","#000","#444"];
function draw(h){
var c = $(".mycanvas")[0];
var ctx = c.getContext("2d"); 
	if(140 == h) return;
	var tr = $(".content3 > table > tbody > tr");	
	tr.each(function(index){
		var self = $(this);
		self.find("td").each(function(index2){
			var tdSelf = $(this);
			var tVal = parseInt(tdSelf.text());
			var td0 = parseInt($(self.find("td")[0]).text());
			var td5 = parseInt($(self.find("td")[5]).text());
			var tdY = Math.floor(((180 - tVal)/140) * 100);
			var a = 140-h;
			if(tVal < td0 && tVal < td5){
				if(a <= tdY) return;
				ctx.beginPath();
				ctx.moveTo(((index*40+30)+(index2*5))+(index*5),140);
				ctx.lineTo(((index*40+30)+(index2*5))+(index*5),a);
				ctx.lineWidth = 2;
				ctx.strokeStyle = color[index2];
				ctx.stroke();
				ctx.closePath();
			}
		});
	});
	time = setTimeout("draw("+(h+1)+")",1);
}
