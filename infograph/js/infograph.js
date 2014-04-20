(function($){
	
    $(document).ready(function(){
    	
    	if(!$('html').hasClass('lt-ie9')){
    		$('#content h1').fadeIn(350,function(){
    			$('#content p').delay(150).fadeIn(350);
    			$('#aside h1').delay(500).animate({
    				right: 0
    			},{
    				duration:350,
    				quque: false,
    				complete:function(){
    					setTimeout(function(){
    						$('#iconRun').animate({
    							left:0
    						},{
    							duration:150,
    							quque: false
    						})
    						
    						$('#animateRun').animate({
    							right: 0
    						},{
    							duration:250,
    							quque: false
    						})
    					},350)
    					
    					setTimeout(function(){
    						$('.orLi:eq(0)').fadeIn(150);
    						$('#iconSwim').animate({
    							left: 0
    						},{
    							duration:150,
    							quque: false
    						})
    						$('#animateSwim').animate({
    							right: 0
    						},{
    							duration:250,
    							quque: false
    						})
    					},950)
    					
    					setTimeout(function(){
    						$('.orLi:eq(1)').fadeIn(150);
    						$('#iconWalk').animate({
    							left: 0
    						},{
    							duration:150,
    							quque: false
    						})
    						$('#animateWalk').animate({
    							right: 0
    						},{
    							duration:250,
    							quque: false,
    							complete:function(){
    								animateScheme();
    							}
    						})
    					},1550)
    				}
    			})    			
    		})
    	} else {
    		$('#content').html(' ');
    		$('#infograph #aside').remove();
    	}    	
    })
    
    animateScheme = function(){
    	$('#scheme').fadeIn(250,function(){
			$('.whiteTitle').animate({
				bottom:0
			},{
				duration: 350,
				quque: false,
				complete:function(){
					setTimeout(function(){
						$('#whiteLine_1_1').animate({
							height: '15px'
						},{
							duration:250,
							quque:false
						})
						$('#whiteLine_2_1').animate({
							height: '36px'
						},{
							duration:250,
							quque:false
						})
					},300)
					
					setTimeout(function(){
						$('#buble_2_1').addClass('animated');
						$('#buble_2_2').addClass('animated');
					},450);
					
					setTimeout(function(){
						$('#whiteLine_1_2').animate({
							height: '38px'
						},{
							duration:250,
							quque:false
						})
						$('#whiteLine_2_2').animate({
							height: '24px'
						},{
							duration:250,
							quque:false
						})
					},750)
					
					setTimeout(function(){
						$('#buble_1_1').addClass('animated');
						$('#buble_1_2').addClass('animated');
					},600);
					
					setTimeout(function(){
						$('#greenLine_1_1').animate({
							width: '99px'
						},{
							duration:250,
							quque:false
						})
						$('#greenLine_1_2').animate({
							width: '50px'
						},{
							duration:250,
							quque:false
						})
						$('#orangeLine_1_1').animate({
							width: '159px'
						},{
							duration:250,
							quque:false
						})
						$('#orangeLine_1_2').animate({
							width: '93px'
						},{
							duration:250,
							quque:false
						})
					},750)
					
					setTimeout(function(){
						$('.greenTitle').fadeIn(250);
						$('.orangeTitle').fadeIn(250);
					},1200)
				}
			})
    	})
    }

})(jQuery)