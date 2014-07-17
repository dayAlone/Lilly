bind = false

String.prototype.capitalize = ()->
    return this.charAt(0).toUpperCase() + this.slice(1)

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
                #console.log($(data).filter('.frame'));
                $('body .frame').html($(data).filter('.frame').html())
                anim($('body .frame'),'fadeIn')
                document.title = $(data).filter('title').text()

                if $(data).filter('.frame').hasClass('index')
                    $('.frame').addClass('index')
                else
                    $('.frame').removeClass('index')
                $.scrollTo(0, 500)
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
            else if(url.indexOf('http')>=0 || $(this).attr('target')=="_blank")
                window.open(url, '_blank');
                if($(this).parents('#locator').length>0)
                    $('#locator').modal('hide')
            else if($(this).hasClass('no-ajax'))
                window.open(url, '_blank')


    $('#doctor').on 'shown.bs.modal', ()->
        if($.cookie('checkbox')=='true')
            $('#doctor .checkbox').addClass('checked')

    $('#symtpoms input').iCheck()
    
    $('#symptoms-welcome').modal()
    
    $('#toolbar .trigger').click (e)->
        $('#toolbar .nav').toggleClass('open')
        $('body').toggleClass('nav-open')
        e.preventDefault()

    $('#overlay').on 'click scroll touchmove touchstart', (e)->
        $('#toolbar .nav').removeClass('open')
        $('body').removeClass('nav-open')
        e.preventDefault()

    symtpoms_select = (el)->

        s_id = el.parents('.section').data('id')
        id   = el.data('id')
        c    = el.data('count')
        
        skip = false

        if !el.hasClass 'multy'
            inpt = el.find '.checked input'
            answ = inpt.data("answer")
            a    = inpt.data('id')
            if inpt.hasClass 'skip'
                skip = true
        else
            answ = []
            a = []
            el.find('.checked input').each ()->
                if $(this).hasClass 'skip'
                    skip = true
                text = $(this).data("text")
                answ.push text
                a.push $(this).data("id")
            if el.find('input').data('answer').indexOf("#tanswer#") >= 0
                answ[0] = answ[0].capitalize()
                answ = el.find('input').data('answer').replace(/#tanswer#/gi, answ.join(', ')) + '.'
            else
                answ = el.find('input').data('answer').replace(/#answer#/gi, answ.join(', '))

        if(!skip)
            $("#result .r#{s_id}").append "<div data-id='#{id}' data-count='#{c}' data-answer='#{a}' class='ansver' id='a-#{id}'>#{answ}</div>"

        el.hide().removeClass 'done'

        el.parents('.section').hide() if el.parents('.section').find('.question:visible').length == 0

        if $('.question:visible').length == 0
            $('#buttons').removeClass('off')
            symptoms_collect()
        else
            $('#buttons').addClass('off') if !$('#buttons').hasClass('off') 

        $("#result .ansver[data-id='#{id}']").one 'click', (e)->
                id = $(this).data('id')
                $(".question[data-id='#{id}']").parents('.section').show() if $(".question[data-id='#{id}']").parents('.section').is(':hidden')
                $(".question[data-id='#{id}']").show()
                $(this).remove()
            e.preventDefault()
        

    symptoms_collect = ()->
        test_result = {}
        q = 0
        $("#result .section").each ()->
            questions = {}
            a = 0
            $(this).find(".ansver").each ()->
                questions[$(this).data('count')] = $(this).data('answer')
                a++
            test_result[q] =
                name: $(this).find('h3').text()
                questions: questions
            q++
        $.removeCookie 'test_result'
        $.cookie 'test_result', JSON.stringify(test_result) 

    #$('#symtpoms .question li:first-child() input').iCheck('check');
    

    $('#symtpoms input').on 'ifChecked', (event, a)->
        $(this).parents('.question').addClass 'done'
        if $('.question:visible').length == 0
            symtpoms_select($(this).parents('.question'))


    $('#symtpoms .frame').perfectScrollbar
        suppressScrollX: true

    $('#symtpoms .question h2').click (e)->
        $(this).parents('.question').toggleClass('on')

        $('#symtpoms .question.done').each ()->
            symtpoms_select($(this))

        $('#symtpoms .frame').perfectScrollbar('update')
        e.preventDefault()

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

    $('#toolbar .enter').click (e)->
        $('#doctor').modal()
        e.preventDefault()

    $('#enter.short a').hoverIntent
        over: ()->
            $('#enter.short').removeClass('short')
        out: ()->

    

    $('#enter').hoverIntent
        over: ()->
            if($.cookie('checkbox')=='true')
                $('#enter .checkbox').addClass('checked')

        out: ()->
            if !$('#enter').hasClass('dont-hide')
                $('#enter').addClass('short')

    $('#faq .block').click (e)->
        if $(window).width() < 780
            if !$(this).hasClass('open')
                $('#faq .block').removeClass('open')
                $(this).toggleClass('open');
                offset = $(this).offset().top
                $('html, body').animate({'scrollTop' : offset - $('#toolbar').height()-14 },300)
        e.preventDefault()

    $('#faq .block .text .panel').slimscroll
        height : ()->
            return $(this).parents('.text').height()

    $('#map').click ()->
        _gaq.push(['_trackEvent', 'DoctorLocator', 'BannerClick', 'DL BannerMain Click']); 
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

    init()

    $('body').imagesLoaded ()->
        $('.frame').css({opacity:1}).attr('css', '');
        $.lockfixed "#article .fix",
            offset: 
                top: 0
                bottom: $('#footer').height() + 30

    

                

$(window).resize ->
	x = setTimeout(size, 300)