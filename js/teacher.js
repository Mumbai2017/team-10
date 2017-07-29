$(function(){
	$('.side_bar_btn').on('click', function(){
		$('.side_bar').css({"left":"0px"});
	});

	$('.hide_side_bar').on('click', function(){
		$('.side_bar').css({"left":"-300px"});
	});
});