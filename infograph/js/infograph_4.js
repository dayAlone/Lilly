(function($){
	
    $(document).ready(function(){
    	
    	var changeInterval = setInterval(changeSlides, 7000);
    	
    	$('#menu a').live('click',function(){
    		var parent = $(this).parent(),
    			active  = $('#menu li').index(parent);
    		
    		$('#menu .active').removeClass('active');
    		$('#menu li:eq('+active+') a').addClass('active');
    		
    		clearInterval(changeInterval);
    		$('#infograph_4 .activeExcuse').stop().fadeOut(550,function(){
    			$(this).removeClass('activeExcuse');
    			$('#infograph_4 .excuseBox:eq('+active+')').fadeIn(550,function(){
    				$(this).addClass('activeExcuse');
    				changeInterval = setInterval(changeSlides, 7000);
    			})
    		})
    	})
    	
    })
    
    changeSlides = function(){
    	var active = $('#infograph_4 .excuseBox').index($('#infograph_4 .activeExcuse'));
    	active++;
    	
    	if(active == 7){
    		active = 0;
    	}
    	
    	$('#infograph_4 .activeExcuse').fadeOut(550,function(){
    		$(this).removeClass('activeExcuse');
    		$('#infograph_4 .excuseBox:eq('+active+')').fadeIn(550,function(){
    			$(this).addClass('activeExcuse');
    		})
    	})
    	
    	$('#menu .active').removeClass('active');
    	$('#menu li:eq('+active+') a').addClass('active');
    	
    }
    
})(jQuery);