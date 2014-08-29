$(document).ready(function(){
	var portret = document.querySelector('.portret');
	var windowHeight = $(window).height();
	var origOffsetY = portret.offsetTop-windowHeight;

	function popMe () {
	  var size = $(window).height()/3;
	  if ($(window).scrollTop() > origOffsetY) {
		if($(".portret").width() < 1){
			$(".portret").animate({width: size, height:size}, {duration: 1000, easing: 'easeOutBounce'});
		}
	  }
	  else{
		if($(".portret").width() > 1){
			$(".portret").width(0);
			$(".portret").height(0);
		}
	  }
	}
	
	var menu = document.querySelector('header');
	var menuOffset = menu.offsetTop;

	function headerStick () {
	  if ($(window).scrollTop() > menuOffset) {
		$('header').addClass('sticky');
	  } else {
		$('header').removeClass('sticky');
	  }	  
	}
	
	var skillset = document.querySelector('#skillContainer');
	var skillsetOffset = skillset.offsetTop-windowHeight;
	
	function showSkills () {	  
	  if ($(window).scrollTop() > (skillsetOffset+$('.portret').height())) {
		$("#skillContainer").find(".skillIndicator").each(function(){
			var parentWidth = $(this).parent().width();
			var parentHeight = $(this).parent().height();
			var skill = Math.round(($(this).attr('data-skill')/100)* parentWidth);
			if ($(this).width() < skill){
				$(this).animate({width: skill},1500);
				$(this).height(Math.round(parentHeight/25));
			}
		});
	  } else {
		$("#skillContainer").find(".skillIndicator").each(function(){
			$(this).width(0);
		});
	  }	  
	}
	
	function scroll(){
		showSkills();
		popMe();
		headerStick();
	}
	document.onscroll = scroll;
});