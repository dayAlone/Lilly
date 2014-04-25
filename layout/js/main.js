// Generated by CoffeeScript 1.6.2
(function() {
  var Environment, anim, bind, delay, init, load, size, state, validateEmail, validatePhone;

  bind = false;

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

  state = 0;

  load = function(url) {
    return $.ajax({
      url: url,
      success: function(data) {
        $('body .frame').html($(data).filter('.frame').html());
        anim($('body .frame'), 'fadeIn');
        document.title = $(data).filter('title').text();
        if ($(data).filter('.frame').hasClass('index')) {
          $('.frame').addClass('index');
        } else {
          $('.frame').removeClass('index');
        }
        $.scrollTo(0, 500);
        return init();
      }
    });
  };

  init = function() {
    $(window).on("navigate", function(event, data) {
      return alert();
    });
    $('a').on('click', function(e) {
      var History, url;

      History = window.History;
      url = $(this).attr('href');
      e.preventDefault();
      if (History.enabled) {
        if (!$(this).hasClass('no-ajax') && !$(this).hasClass('prevent') && url.charAt(0) !== '#' && url.indexOf('http') < 0 && $(this).parents('#panel,.bx-component-opener').length === 0) {
          $('body .frame').removeClass('animated fadeIn');
          return History.pushState({
            'url': url
          }, $(this).text(), url);
        } else if (url.indexOf('http') >= 0) {
          window.open(url, '_blank');
          if ($(this).parents('#locator').length > 0) {
            return $('#locator').modal('hide');
          }
        }
      }
    });
    $('#doctor').on('shown.bs.modal', function() {
      if ($.cookie('checkbox') === 'true') {
        return $('#doctor .checkbox').addClass('checked');
      }
    });
    $('.checkbox').off('click').on('click', function() {
      $(this).toggleClass('checked');
      if ($(this).hasClass('checked')) {
        $.cookie('checkbox', 'true', {
          expires: .5
        });
      } else {
        $.removeCookie('checkbox');
      }
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
      over: function() {
        if ($.cookie('checkbox') === 'true') {
          return $('#enter .checkbox').addClass('checked');
        }
      },
      out: function() {
        return $('#enter').addClass('short');
      }
    });
    $('#faq .block .text .panel').slimscroll({
      height: function() {
        return $(this).parents('.text').height();
      }
    });
    $('#map').click(function() {
      return $('#locator').modal();
    });
    $('#article.video .icon-play').click(function() {
      var iframe, player;

      $('#article.video iframe').css('opacity', 1);
      $('#article.video .icon-play, .top-title .text').css('opacity', 0);
      iframe = $('#article.video iframe')[0];
      player = $f(iframe);
      return player.api('play');
    });
    if ($('#article .container .col-md-8').height() < $('#article .container .col-md-4.side').height()) {
      while ($('#article .container .col-md-8').height() < $('#article .container .col-md-4.side').height()) {
        $('#article .container .col-md-4.side .block:last').remove();
      }
    }
    $('#video .icon').click(function() {
      var iframe, player;

      $('#video iframe').css('opacity', 1);
      $('#video .icon').css('opacity', 0);
      iframe = $('#video iframe')[0];
      player = $f(iframe);
      return player.api('play');
    });
    $('[data-toggle=tooltip]').tooltip();
    if (!bind) {
      bind = true;
      return History.Adapter.bind(window, 'statechange', function() {
        var State;

        State = History.getState();
        console.log(State);
        return load(State.url);
      });
    }
  };

  $(document).ready(function() {
    $(document).ajaxStart(function() {
      return Pace.restart();
    });
    $(document).ajaxStop(function() {
      return Pace.stop();
    });
    init();
    return $('body').imagesLoaded(function() {
      $('.frame').css({
        opacity: 1
      });
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
