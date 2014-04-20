(function($){
	
    $(document).ready(function(){
    	
    	if(!$('html').hasClass('lt-ie9')){
	    	$('#content_2 h1').fadeIn(350,function(){
	    		$('#content_2 .main').delay(150).fadeIn(350);
	    		$('#scheme_2 h3').delay(500).fadeIn(250,function(){
	    			setTimeout(function(){
	    				$('#graySection').fadeIn(350);
	    				$('#percent_20').delay(350).animate({
	    					left: '13px'
	    				},{
	    					quque:false,
	    					duration: 450
	    				})
	    				
	    				$('#greenSection_1').delay(500).fadeIn(250);
	    				$('#greenSection_2').delay(850).fadeIn(250);
	    				$('#greenSection_3').delay(1200).fadeIn(250);
	    				$('#greenSection_4').delay(1550).fadeIn(250);
	    				
	    				$('#percent_80').delay(1000).animate({
	    					top: '197px'
	    				},{
	    					quque:false,
	    					duration: 450
	    				})
	    				
	    				$('#orangeSection').delay(2000).fadeIn(250);
	    				$('#percent_95').delay(2000).animate({
	    					right: '-45px'
	    				},{
	    					quque:false,
	    					duration: 450,
	    					complete:function(){
	    						$('#content_2 h2').fadeIn(350);
								$('#source').delay(350).fadeIn(500);
	    					}
	    				})
	    			},500);
	    		});
	    	});
			
	    } else {
	   		$('#content_2').html(' ');
	    }
    	    	
    })
    
})(jQuery)