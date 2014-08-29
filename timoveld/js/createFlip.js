 function create(){
		  $(".intro").show();
		  var items = ["Create","Develop","Animate","Debug","Render","Visualize","Program","Browse","Tween","Learn"];
		  var item = items[Math.floor(Math.random()*items.length)];
		  
			$(".intro").hide();
			$(".intro").html(item);
			$(".intro").fadeIn("slow");
			$(".intro").flipping_text({
			  tickerTime: 15, 
			  customRandomChar: false, 
			  tickerCount: 10, 
			  opacityEffect: true, 
			  resetOnChange: false,
			  callback:function(){				
				setTimeout( fadethis, 3000 );
				function fadethis(){
					$(".intro").animate({width: 'toggle'}).promise().done(function(){
						create();
					});					
				}
			  }
			});
		  }
		  create();
		  
