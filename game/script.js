/**
 * Main JavaScript file
 *
 * @file script.js
 * @author 2012 (c) MAKO corp. http://www.mako.pro - <hello@mako.pro>
 * @hello Petr!
 */
(function() {

/**
 *
 */
var Game = function() {
  this.init(this.settings);
};

/**
 * Settings
 */
Game.prototype = {
    /**
     * Class settings
     */
    settings: {
      speed: 500, // Animation speed, ms
      answerDelay: 2000, // ms
      stepDelay: 1000, // ms
      keyCode: {
        ALT: 18,
        BACKSPACE: 8,
        CAPS_LOCK: 20,
        COMMA: 188,
        COMMAND: 91,
        COMMAND_LEFT: 91, // COMMAND
        COMMAND_RIGHT: 93,
        CONTROL: 17,
        DELETE: 46,
        DOWN: 40,
        END: 35,
        ENTER: 13,
        ESCAPE: 27,
        HOME: 36,
        INSERT: 45,
        LEFT: 37,
        MENU: 93, // COMMAND_RIGHT
        NUMPAD_ADD: 107,
        NUMPAD_DECIMAL: 110,
        NUMPAD_DIVIDE: 111,
        NUMPAD_ENTER: 108,
        NUMPAD_MULTIPLY: 106,
        NUMPAD_SUBTRACT: 109,
        PAGE_DOWN: 34,
        PAGE_UP: 33,
        PERIOD: 190,
        RIGHT: 39,
        SHIFT: 16,
        SPACE: 32,
        TAB: 9,
        UP: 38,
        WINDOWS: 91 // COMMAND
      }
    },

    /**
     * State markers
     */
    state: {
      current: 0, // int, current step marker
      correct: true, // bool, correct step flag
      showErrorHelp: false,
      
      answer: {
        countCorrect: 0,
        current: 0, // int, current answer marker
        correct: null, // bool, correct point answer
        disabled: false, // bool
        closing: null // timeout
      },

      point: {
        current: null // obj
      }
    },

    /**
     * Initialization
     *
     * @param settings
     */
    init: function(settings) {
      var object = this;

      // Binding UI handlers
      $('#button-start, #button-start-again').click(function(event) {
        object.start();
      });

      // Click to point
      $('.step-point').click(function(event) {
        object.state.answer.correct = $(this).hasClass('step-point-yes');
        object.state.point.current  = this;

        object.showAnswer($(this).text());
      });

      // Buttons
      $('#button-yes, #button-no').click(function(event) {
        object.checkAnswer($(this).hasClass('button-yes'));
      });
      $('#button-ok').click(function(event) {
        object.closeHelp();
      });

      // Keys
      $(document).bind('keydown.game', function(event) {
        switch (event.which || event.keyCode) {
          case object.settings.keyCode.ESCAPE:
            object.closeHelp(true);
            break;
          case object.settings.keyCode.ENTER:
          case object.settings.keyCode.SPACE:
          case object.settings.keyCode.NUMPAD_ENTER:
            if (object.state.current == 0 || object.state.current == 7) {
              object.start();
            } else {
              object.closeHelp();
            }
            break;
        };
      });
    },

    /**
     *
     * @param yesBtn
     * @returns {Game}
     */
    checkAnswer: function(response) {
       if (this.state.answer.disabled == false) {
          this.state.answer.disabled = true;
  		
          var correct   = (this.state.answer.correct == response);
          var className = correct ? 'success' : 'error';
          var pipkaIndex = $(this.state.point.current).data('pipka');
  
          //correct || (this.state.correct = false);
          
  		if (this.state.answer.correct == true) {
  		  $('#answer').addClass(correct ? 'yes-success' : 'no-error');
  		  $('#answer').addClass('disabled');
  		  
  		} else {
  		  $('#answer').addClass(correct ? 'no-success' : 'yes-error');
  		}
  		
  		var maxPipka = -1;
  		$('#questions-widjet span').each(function(){
  			if($(this).hasClass('success') || $(this).hasClass('error')){
  				maxPipka++;
  			} else {
  				
  			}
  		})
  		maxPipka++;
  		this.state.answer.current += 1;
  		
  		if(typeof pipkaIndex == 'undefined'){
  			pipkaIndex = maxPipka;
  			$(this.state.point.current).data('pipka', pipkaIndex);
  		}
  		
  		if(correct){
  			$(this.state.point.current).hide();
  			this.state.answer.countCorrect += 1;
  	        $('#questions-widjet span:eq(' + pipkaIndex + ')').removeClass('error');
  	        $('#questions-widjet span:eq(' + pipkaIndex + ')').addClass('success');
  		} else {
  	        $('#questions-widjet span:eq(' + pipkaIndex + ')').addClass('error');
  		}
  
          this.checkStep();
        }
  
        return this;
    },

    /**
     *
     * @param text
     * @returns {Game}
     */
    showAnswer: function(text) {
      if(typeof closeAnswerTimeout !== 'undefined'){
		clearInterval(closeAnswerTimeout);
      }
      this.resetAnswer().closeHelp(true);
      $('#answer-content').text(text);
      $('#answer').show();

      return this;
    },

    /**
     *
     * @returns {Game}
     */
    closeAnswer: function() {
      $('#answer-content').text('');
      $('#answer').fadeOut(this.settings.speed);

      return this;
    },

    /**
     *
     * @returns {Game}
     */
    resetAnswer: function() {
      clearTimeout(this.state.answer.closing);
      this.state.answer.disabled = false;
      $('#answer').removeClass('yes-success no-success yes-error no-error disabled');

      return this;
    },

    /**
     *
     * @returns {Game}
     */
    start: function() {
      var object = this;

      this.reset();
      this.step();

      $('#step-container-start').fadeOut(this.speed, function() {
        object.showHelp(true, 'help');
      });

      return this;
    },

    /**
     *
     * @returns {Game}
     */
    finish: function() {
      $('#step-container-game').fadeOut(this.speed);
      return this;
    },

    /**
     *
     * @returns {Game}
     */
    reset: function() {
      this.state.current = 0;
      this.resetStep();
      $('.step').show();
      $('#step-container-game').fadeIn(this.settings.speed);

      return this;
    },

    /**
     *
     * @returns {Game}
     */
    resetStep: function() {
      $('#step-' + this.state.current + ' .step-point').fadeIn(this.settings.speed);
      $('#questions-widjet span').removeClass('success error');
      $('#help').removeClass('state-error');

      this.resetAnswer().closeAnswer();

      this.state.correct = true;
      this.state.reset = false;
      this.state.answer.current = 0;
      this.state.answer.correct = null;
      this.state.answer.countCorrect = 0;
      this.state.showErrorHelp = false;
      this.state.point.current = null;
      

      return this;
    },

    /**
     *
     * @param step
     * @returns {Game}
     */
    step: function() {
     if (this.state.current == 9) {
        return this.finish();
      }

      this.state.current += 1;
      this.resetStep();

      $('#step-widjet span').removeClass('active');
      
      $('#step-' + this.state.current).css({
        'backgroundPosition':'-40px 40px',
        'opacity' : 0.5});
        
      
      $('#scene-2, #scene-1').fadeIn();
      
      for (var i = 1; this.state.current >= i; i++) {
        $step = $('#step-' + (i - 1)).fadeOut(this.settings.speed);
        $('#step-widjet-' + i).addClass('active');
      }
      
      $('#scene-2').stop().insertBefore('#step-' + this.state.current)
      $('#scene-1').stop().insertAfter('#step-' + this.state.current).fadeOut(1500);
      $('#step-' + this.state.current).animate({backgroundPosition : '(0px 0px)', opacity:1}, 800);

      $('#question-title').text('Шаг ' +  this.state.current);
      $('#question-content').text($('#step-' + this.state.current + ' .step-question').text());

      return this;
    },

    /**
     *
     * @returns {Game}
     */
    checkStep: function() {
      var self = this,
      	  counter = 0;
      
      $('#questions-widjet span').each(function(){
      	if($(this).hasClass('success') || $(this).hasClass('error')){
      		counter++;
      	} else {
      		
      	}
      })
      
      if (counter == 5) {
        if (this.state.answer.countCorrect == 5) {
          func = function() {self.step();};
        } else if (this.state.showErrorHelp == false) {
          this.state.showErrorHelp = true;
          func = function() {self.showHelp(false, 'error');};
        } else {
       	  func = function() {return;}
       	  closeAnswerTimeout = setInterval(function(){
       	  	clearInterval(closeAnswerTimeout);
       	  	$('#answer-content').text('');
       	  	$('#answer').fadeOut(500);
       	  }, 2000);
        }
        setTimeout(func, this.settings.stepDelay);
      } else {
		  closeAnswerTimeout = setInterval(function(){
		  	clearInterval(closeAnswerTimeout);
		  	$('#answer-content').text('');
		  	$('#answer').fadeOut(500);
		  }, 2000);
	  }
      return this;
    },

    /**
     *
     * @param force
     * @param state
     * @returns {Game}
     */
    showHelp: function(force, state) {
      this.closeAnswer();

      switch (state) {
        case 'help':
          $('#help').removeClass('state-error').addClass('state-help');
          break;
        case 'error':
          $('#help').removeClass('state-help').addClass('state-error');
          break;
      }

      $('#help').fadeIn(force ? 0 : this.settings.speed);

      return this;
    },

    /**
     *
     * @param force
     * @returns {Game}
     */
    closeHelp: function(force) {
      var self = this,
          $help = $('#help');
	  ////self.resetStep();
      $help.fadeOut((force ? 0 : this.settings.speed), ($help.hasClass('state-error') ? function() { } : null));

      return this;
    }
};

/**
 * Document ready
 */
$(window).load(function() {
  new Game();
  $('#overlay').fadeOut(100);
  clearTimeout(preloaderCloser);
  
  $('.step-point').hover(
  	function(){
  	  bgPosition = 0;
  	  animationPoint = function(){
  	  	this.point = arguments[0] || this.point;
  	  	if (bgPosition > 77){
  	  		bgPosition = 0;	  		
  	  	}
  	  	$(this.point).css('backgroundPosition', '0 -' + bgPosition + 'px');
  	  	bgPosition += 26;
  		animationTimer = setTimeout(animationPoint, 100);
  	  }
  	  animationPoint(this);
  	},
  	function(){
  		clearTimeout(animationTimer);
  		$(this).css('backgroundPosition', '0px 0px');
  	}
  );
  
});

}());

var preloaderPosition = 0;
var preloaderCloser = null;

var preloader = function() {
  if (preloaderPosition > 79) {
    preloaderPosition = 0;
  }
  $('#preloader').css('backgroundPosition', '0 -' + preloaderPosition + 'px');
  preloaderPosition += 16;
  preloaderCloser = setTimeout(preloader, 200);
};
preloader();

