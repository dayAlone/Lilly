// Generated by CoffeeScript 1.6.2
(function() {
  var Environment, anim, delay, init, size, validateEmail, validatePhone;

  size = function() {
    var h;

    h = $(window).height();
    return imagesLoaded($('body'), function() {});
  };

  Environment = {
    TOUCH_DOWN_EVENT_NAME: 'mousedown touchstart',
    TOUCH_UP_EVENT_NAME: 'mouseup touchend',
    TOUCH_MOVE_EVENT_NAME: 'mousemove touchmove',
    TOUCH_DOUBLE_TAB_EVENT_NAME: 'dblclick dbltap',
    isAndroid: function() {
      return navigator.userAgent.match(/Android/i);
    },
    isBlackBerry: function() {
      return navigator.userAgent.match(/BlackBerry/i);
    },
    isIOS: function() {
      return navigator.userAgent.match(/iPhone|iPad|iPod/i);
    },
    isOpera: function() {
      return navigator.userAgent.match(/Opera Mini/i);
    },
    isWindows: function() {
      return navigator.userAgent.match(/IEMobile/i);
    },
    isMobile: function() {
      return Environment.isAndroid() || Environment.isBlackBerry() || Environment.isIOS() || Environment.isOpera() || Environment.isWindows();
    }
  };

  delay = function(ms, func) {
    return setTimeout(func, ms);
  };

  validateEmail = function(email) {
    var re;

    re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
  };

  validatePhone = function(phone) {
    var re;

    re = /^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/;
    return re.test(phone);
  };

  anim = function(el, ef, z) {
    if (z == null) {
      z = function() {
        return true;
      };
    }
    return $(el).addClass(ef + ' animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
      el.removeClass(ef + ' animated');
      return z();
    });
  };

  init = function() {
    $('a').on('click', function(e) {
      var url;

      url = $(this).attr('href');
      if (!$(this).hasClass('no-ajax') && !$(this).hasClass('prevent') && url.charAt(0) !== '#' && $(this).parents('#panel,.bx-component-opener').length === 0) {
        e.preventDefault();
        $('body .frame').removeClass('animated fadeIn');
        return $.ajax({
          url: url,
          success: function(data) {
            $('body .frame').html($(data).filter('.frame').html());
            anim($('body .frame'), 'fadeIn');
            if (window.history.replaceState) {
              window.history.replaceState({}, $(data).filter('title').text(), url);
            }
            document.title = $(data).filter('title').text();
            return init();
          }
        });
      }
    });
    $('.checkbox').off('click').on('click', function() {
      $(this).toggleClass('checked');
      return $(this).parent().find('a').toggleClass('no-ajax');
    });
    $('#enter a, a.enter').off('click').on('click', function() {
      if (!$(this).parent().find('.checkbox').hasClass("checked")) {
        anim($(this).parent().find('.checkbox'), 'tada');
        return false;
      } else {
        if ($(this).parents('.modal-dialog').length > 0) {
          $('#doctor').modal('hide');
        }
        return true;
      }
    });
    $('#enter.short a').hoverIntent({
      over: function() {
        return $('#enter.short').removeClass('short');
      },
      out: function() {}
    });
    $('#enter').hoverIntent({
      over: function() {},
      out: function() {
        return $('#enter').addClass('short');
      }
    });
    $('#faq .block .text .panel').slimscroll({
      height: function() {
        return $(this).parents('.text').height();
      }
    });
    return $('#map').click(function() {
      return $('#locator').modal();
    });
  };

  $(document).ready(function() {
    $(document).ajaxStart(function() {
      return Pace.restart();
    });
    $(document).ajaxStop(function() {
      return Pace.stop();
    });
    anim($('.frame'), 'fadeIn', function() {
      return $('.frame').css({
        opacity: 1
      });
    });
    init();
    return $('body').imagesLoaded(function() {
      return $.lockfixed("#article .fix", {
        offset: {
          top: 0,
          bottom: $('#footer').height() + 30
        }
      });
    });
  });

  $(window).resize(function() {
    var x;

    return x = setTimeout(size, 300);
  });

}).call(this);
