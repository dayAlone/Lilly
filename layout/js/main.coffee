
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

anim = (el, ef)->
    $(el)
        .addClass(ef + ' animated')
        .one 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', ()->
            el.removeClass(ef + ' animated');


init = ()->
    $('a').on 'click', (e)->
        url = $(this).attr('href')
        if(!$(this).hasClass('no-ajax') && !$(this).hasClass('prevent') && url != '#')
            e.preventDefault()
            
            $('body .frame').removeClass('animated fadeIn')
            $.ajax 
                url : url
                success :
                    (data)-> 
                        $('body .frame').html($(data).filter('.frame').html())
                        anim($('body .frame'),'fadeIn')
                        if (window.history.replaceState)
                            window.history.replaceState({}, $(data).filter('head').find('title').text(), url);

                        init()
    
    $('#enter .checkbox').click ()->
        $(this).toggleClass('checked')
        $('#enter a').toggleClass('no-ajax')
    
    $('#enter a').click (e)->
        if(!$('#enter .checkbox').hasClass("checked"))
            anim($('#enter .checkbox'),'tada')
            return false
        else
            return true

    $('#enter.short a').hoverIntent
        over: ()->
            $('#enter.short').removeClass('short')
        out: ()->


    $('#enter').hoverIntent
        over: ()->

        out: ()->
            $('#enter').addClass('short')

    $('#faq .block .text .panel').slimscroll
        height : ()->
            return $(this).parents('.text').height()

$(document).ready ()->

    $(document).ajaxStart ()-> Pace.restart()
    $(document).ajaxStop ()-> Pace.stop()

    init()

    $('body').imagesLoaded ()->
        $.lockfixed "#article .fix",
            offset: 
                top: 0
                bottom: $('#footer').height() + 30

    

                

$(window).resize ->
	x = setTimeout(size, 300)