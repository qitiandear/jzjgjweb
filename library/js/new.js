$(function(){
	$('#m1').show();
	$('#al2').hide();
	$('#m3').show();
	$('#al4').hide();
	$('#m5').show();
	$('#al6').hide();
	$('#h1').mouseover(function(){
		$('#h1').addClass('bshow').removeClass('bhide');
		$('#h2').addClass('bhide').removeClass('bshow');
		$('#m1').show();
		$('#m2').hide();
		$('#al1').show();
		$('#al2').hide();
	})
	$('#h2').mouseover(function(){
		$('#h2').addClass('bshow').removeClass('bhide');
		$('#h1').addClass('bhide').removeClass('bshow');
		$('#m2').show();
		$('#m1').hide();
		$('#al2').show();
		$('#al1').hide();
	})
	$('#h3').mouseover(function(){
		$('#h3').addClass('bshow').removeClass('bhide');
		$('#h4').addClass('bhide').removeClass('bshow');
		$('#m3').show();
		$('#m4').hide();
		$('#al3').show();
		$('#al4').hide();
	})
	$('#h4').mouseover(function(){
		$('#h4').addClass('bshow').removeClass('bhide');
		$('#h3').addClass('bhide').removeClass('bshow');
		$('#m4').show();
		$('#m3').hide();
		$('#al4').show();
		$('#al3').hide();
	})
	$('#h5').mouseover(function(){
		$('#h5').addClass('bshow').removeClass('bhide');
		$('#h6').addClass('bhide').removeClass('bshow');
		$('#m5').show();
		$('#m6').hide();
		$('#al5').show();
		$('#al6').hide();
	})
	$('#h6').mouseover(function(){
		$('#h6').addClass('bshow').removeClass('bhide');
		$('#h5').addClass('bhide').removeClass('bshow');
		$('#m6').show();
		$('#m5').hide();
		$('#al6').show();
		$('#al5').hide();
	})
})
$(function () {
	var $uList = $(".mrxc");
	var timer = null;
	$uList.hover(function () {
		clearInterval(timer);
	},function () {
		timer = setInterval(function () {
		scrollList($uList);
	},1000);
}).trigger("mouseleave");
	function scrollList(obj) {
		var scrollHeight = $(".mrxc li:first").height();
		$uList.stop().animate({marginTOP:-scrollHeight},600,function () {
		$uList.css({marginTOP:0}).find("li:first").appendTo($uList);
		});
	}
});
$(function () {
	var $uList = $(".imgbox");
	var timer = null;
	$uList.hover(function () {
		clearInterval(timer);
	},function () {
		timer = setInterval(function () {
		scrollList($uList);
	},1500);
}).trigger("mouseleave");
	function scrollList(obj) {
		var scrollHeight = $(".imgbox li:first").width();
		$uList.stop().animate({marginLeft:-scrollHeight},1000,function () {
		$uList.css({marginLeft:0}).find("li:first").appendTo($uList);
		});
	}
});
var obj = document.getElementById('img1')
function chenges(){
	obj.className="tit1"
}
function chengesd(){
	obj.className="tit"
}
function s_click(obj) {
    var num = 0;
    for (var i = 0; i < obj.options.length; i++) {
        if (obj.options[i].selected == true) {
            num++;
        }
    }
    if (num == 1) {
        var url = obj.options[obj.selectedIndex].value;
        window.open(url);
    }
}
$('.img li:first').siblings().hide();
$('.title li:first').siblings().hide();
$('.rbox li:first').css('background','#FF4F01');
var t;
var index = 0;
t = setInterval(play,1000);
function play(){
	index++;
	if (index>5) {
		index = 0;
	}
	$('.img li').eq(index).show().siblings().hide();
	$('.title li').eq(index).show().siblings().hide();
	$('.rbox li').eq(index).css('background','#FF4F01').siblings().css('background','#fff');
}
$('.img li,.title li,.rbox li').mouseover(function(){
	clearInterval(t);
}).mouseout(function(){
	t = setInterval(play,1000);
})
$('.rbox li').mouseover(function(){
	clearInterval(t);
	$(this).css('background','#FF4F01').siblings().css('background','#fff');
	var index = $(this).index();
	$('.img li').eq(index).show().siblings().hide();
	$('.title li').eq(index).show().siblings().hide();
})