(function($){
	
    $(document).ready(function(){
    	
    	if(!$('html').hasClass('lt-ie9')){
	    	$('#content_3 .main').fadeIn(500,function(){
				$('#research').delay(500).fadeIn(500,function(){
					$('#research h2').delay(250).fadeIn(350);
					$('#research #counter_research').delay(500).fadeIn(250,function(){
						$('#research p').fadeIn(250);	
						var object = $('#counter_research span');
						researchInterval = setInterval(function(){
							counter(object,researchInterval)
						},10);
						$('#counter_research').animate({
							opacity: 1
						},{
							quque: false,
							duration: 2000,
							complete: function(){
								$('#groups .eq_sign').fadeIn(250,function(){
									$('#groups .group_1').delay(250).fadeIn(500);
									counterInterval = setInterval(function(){
										counter($('#groups .group_1 .counter'),counterInterval)
									},10);

									$('#groups .plus_sign').delay(500).fadeIn(500);

									$('#groups .group_2').delay(1000).fadeIn(500);
									counter2Interval = setInterval(function(){
										counter($('#groups .group_2 .counter'),counter2Interval)
									},10);
									
									$('#groups .arrow').delay(1500).slideDown(350);
									$('#after_year').delay(1500).slideDown(350,function(){
										$('#stats_better .group_1').fadeIn(500);
										counter3Interval = setInterval(function(){
											counter($('#stats_better .group_1 .percents span'),counter3Interval)
										},10);
										$('#stats_better .group_2').delay(500).fadeIn(500);
										
										$('#stats_worse .group_1').delay(1000).fadeIn(500);
										$('#stats_worse .group_2').delay(1500).fadeIn(500,function(){
												
											$('#warning h2').fadeIn(500,function(){
												$('#warning p:eq(0)').delay(150).fadeIn(500);
												
												$('#warning #percent_warning').delay(550).fadeIn(500);
												counter4Interval = setInterval(function(){
													counter($('#percent_warning strong span'),counter4Interval)
												},10);

												$('#warning p:eq(1)').delay(750).fadeIn(500);
												$('#source').delay(1500).fadeIn(500);
											});
											
											
										});
									});
								});
							}
						})
					})
				})
	    	})
	    } else {
	   		$('#content_3').html(' ');
	    }
    	    	
    })
    
    counter = function(object, interval){
    	var counter = $(object).text(),
    		max		= parseInt($(object).data('counter'),10);
    	if(counter < max){
    		counter++;
    		$(object).html(counter);
    	} else {
    		clearInterval(interval);							
    	}
    }
    
})(jQuery)