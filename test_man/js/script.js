(function($){
	var answers = [],
		balls = 0;
		console.log('loaded')
		$( "#test_block input" ).change(function() {

			var parent   = $(this).parent(),
				parentOL = $(parent).parent(),
				index  	 = $(parentOL).find('li').index(parent) + 1,
				answer	 = parseInt(($(parentOL).parent().attr('id')).substr(2),10);

			answers[answer] = index;
			balls += index;

			$.cookie("balls", balls, {path: '/'});
			$.cookie("ansver"+answer, [answers[answer]], {path: '/'});
			$.cookie("ansvers", answer, {path: '/'});

			if($('#wrapper input:checked').length == 6){
				$('input[type="radio"]').attr('disabled','disabled');
				$('input[type="radio"]').parent().addClass('selected');

				$.ajax({
					url:'/test_man/test.php',
					type: 'post', 
					data: 'answers='+answers.toString()+'&balls='+balls,
					success:function(response){
						if(response.error == false){
							//_gaq.push(['_trackEvent', 'Test', 'Result_load', response.balls, 1, true]);
							$('#result_block').html(response.response);
							$('#sendButton').click(function(){
								$('#modal-email a').attr('href', $(this).data('url'))
							})
						} else {
							$('#result_block').html('<h3>Ошибка</h3>');
							alert(response.message);
						}
					}
				})
			} else {}
		});

		$( "#pretest_block input" ).change(function() {
			var parent   = $(this).parent(),
				parentOL = $(parent).parent(),
				index  	 = $(parentOL).find('li').index(parent) + 1;

				$('#test_block input[type="radio"]').removeAttr('disabled');
				$('#test_block input[type="radio"]').parent().removeClass('selected');
			if(index == 5){
				$('#test_block input[type="radio"]').attr('disabled','disabled');
				$('#test_block input[type="radio"]').parent().addClass('selected');
			} else {}
		});
})(jQuery)