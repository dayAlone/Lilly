bind = false

size = ()-> 
	
	h = $(window).height()
	imagesLoaded $('body'), ()->
		
Environment =
    TOUCH_DOWN_EVENT_NAME: 'mousedown touchstart'
    TOUCH_UP_EVENT_NAME: 'mouseup touchend'
    TOUCH_MOVE_EVENT_NAME: 'mousemove touchmove'
    TOUCH_DOUBLE_TAB_EVENT_NAME: 'dblclick dbltap'

    isAndroid: ()->
        return navigator.userAgent.match(/Android/i);
    isBlackBerry: ()->
        return navigator.userAgent.match(/BlackBerry/i);
    isIOS: ()->
        return navigator.userAgent.match(/iPhone|iPad|iPod/i);
    isOpera: ()->
        return navigator.userAgent.match(/Opera Mini/i);
    isWindows: ()->
        return navigator.userAgent.match(/IEMobile/i);
    isMobile: ()->
        return (Environment.isAndroid() || Environment.isBlackBerry() || Environment.isIOS() || Environment.isOpera() || Environment.isWindows());
    

delay = (ms, func) -> setTimeout func, ms		

validateEmail = (email)->
	re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
	return re.test(email)

validatePhone = (phone)-> 
	re = /^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/
	return re.test(phone)

anim = (el, ef, z=()->return true)->
    $(el)
        .addClass(ef + ' animated')
        .one 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', ()->
            el.removeClass(ef + ' animated');
            z()
state = 0

load = (url)->
    $.ajax 
        url : url
        success :
            (data)-> 
                $('body .frame').html($(data).filter('.frame').html())
                anim($('body .frame'),'fadeIn')
                document.title = $(data).filter('title').text()
                init()


init = ()->
    $(window).on "navigate", (event, data)->
        alert()
  

    $('a').on 'click', (e)->
        History = window.History;
        url = $(this).attr('href')
        e.preventDefault()
        if (History.enabled)
            if(!$(this).hasClass('no-ajax') && !$(this).hasClass('prevent') && url.charAt(0) != '#' && url.indexOf('http')<0 && $(this).parents('#panel,.bx-component-opener').length==0)
                $('body .frame').removeClass('animated fadeIn')
                History.pushState({'url':url}, $(this).text(), url);
            else if(url.indexOf('http')>=0)
                window.open(url, '_blank');


    $('#doctor').on 'shown.bs.modal', ()->
        if($.cookie('checkbox')=='true')
            $('#doctor .checkbox').addClass('checked')

     

    $('.checkbox').off('click').on 'click', ()->
        $(this).toggleClass('checked')
        if($(this).hasClass('checked'))
            $.cookie('checkbox', 'true', { expires: .5 });
        else
            $.removeCookie('checkbox');
        $(this).parent().find('a').toggleClass('no-ajax')
    
    $('#enter a, a.enter').off('click').on 'click', ()->
        if(!$(this).parent().find('.checkbox').hasClass("checked"))
            anim($(this).parent().find('.checkbox'),'tada')
            return false
        else
            if($(this).parents('.modal-dialog').length>0)
                $('#doctor').modal('hide')
            return true

    $('#enter.short a').hoverIntent
        over: ()->
            $('#enter.short').removeClass('short')
        out: ()->

    

    $('#enter').hoverIntent
        over: ()->
            if($.cookie('checkbox')=='true')
                $('#enter .checkbox').addClass('checked')

        out: ()->
            $('#enter').addClass('short')

    $('#faq .block .text .panel').slimscroll
        height : ()->
            return $(this).parents('.text').height()

    $('#map').click ()->
        $('#locator').modal()

    $('#article.video .icon-play').click ()->
        $('#article.video iframe').css('opacity',1)
        $('#article.video .icon-play, .top-title .text').css('opacity',0)
        iframe = $('#article.video iframe')[0]
        player = $f(iframe)
        player.api('play')

    if($('#article .container .col-md-8').height()<$('#article .container .col-md-4.side').height())
        while($('#article .container .col-md-8').height()<$('#article .container .col-md-4.side').height())
            $('#article .container .col-md-4.side .block:last').remove()

    $('#video .icon'). click ()->
        $('#video iframe').css('opacity',1)
        $('#video .icon').css('opacity',0)
        iframe = $('#video iframe')[0]
        player = $f(iframe)
        player.api('play')

    $('[data-toggle=tooltip]').tooltip()
    if (!bind)
        bind = true
        History.Adapter.bind window,'statechange',()->
            State = History.getState();
            console.log(State)
            load(State.url)


$(document).ready ()->

    

    $(document).ajaxStart ()-> Pace.restart()
    $(document).ajaxStop ()-> Pace.stop()

    anim($('.frame'), 'fadeIn', ()-> $('.frame').css({opacity:1}))
    init()

    $('body').imagesLoaded ()->
        $.lockfixed "#article .fix",
            offset: 
                top: 0
                bottom: $('#footer').height() + 30

    

                

$(window).resize ->
	x = setTimeout(size, 300)