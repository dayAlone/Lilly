bind = false

String.prototype.capitalize = ()->
    return this.charAt(0).toUpperCase() + this.slice(1)

size = ()-> 
	$(".landing .frame").width $('.landing .frame').width()
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
                console.log $(data).filter('.frame')
                $('body .frame').html($(data).filter('.frame').html())
                anim($('body .frame'),'fadeIn')
                document.title = $(data).filter('title').text()

                if $(data).filter('.frame').hasClass('index')
                    $('.frame').addClass('index')
                else
                    $('.frame').removeClass('index')

                if $(data).filter('.frame').hasClass('doctor')
                    $('.frame').addClass('doctor').removeClass('user')
                else
                    $('.frame').addClass('user').removeClass('doctor')


                $.scrollTo(0, 500)
                init()

strstr = ( haystack, needle, bool )->
    pos = 0;
    pos = haystack.indexOf( needle );
    if( pos == -1 )
        return false;
    else
        if( bool )
            return haystack.substr( 0, pos );
        else
            return haystack.slice( pos );

validateEmail =  (email)->
    re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i
    return re.test(email)

init = ()->

    $("#fullwidth-list .landing, .enter2.index, #article .fix").scrollToFixed
        marginTop: 20
        limit: ()->
            limit = $('#footer').offset().top - $(this).outerHeight(true) + 30
            return limit;

    if $('#test-woman').length > 0 
        $.getScript "/test_women/js/script.js"
    
    if $('#test-man').length > 0 
        $.getScript "/test_man/js/script.js"

    $('a').off('click').on 'click', (e)->
        if $(this).parents('#panel, .bx-component-opener').length==0 && $(this).attr('target') != "_blank"
            History = window.History;
            url = $(this).attr('href')
            if(strstr(url,'#'))
                return true
            e.preventDefault()
            if (History.enabled && url != '#')
                if(!$(this).hasClass('no-ajax') && !$(this).hasClass('prevent') && url.charAt(0) != '#' && url.indexOf('http')<0)
                    $('body .frame').removeClass('animated fadeIn')
                    History.pushState({'url':url}, $(this).text(), url);
                else if(url.indexOf('http')>=0 || $(this).attr('target')=="_blank")
                    window.open(url, '_blank');
                    if($(this).parents('#locator').length>0)
                        $('#locator').modal('hide')
                else if($(this).hasClass('no-ajax'))
                    window.open(url, '_blank')

    $('#question').off('shown.bs.modal').on 'shown.bs.modal', ()->
        $('#question form').show()
        $('#question .success').hide()

    $('#question input[name="email"], #question textarea').on 'keydown', ->
        if $(this).hasClass 'error'
            $(this).removeClass 'error'

    $('#question form').submit (e)->
        $('#question input[name="email"], #question textarea').each ->
            if $(this).val().length == 0
                $(this).addClass 'error'
        if !validateEmail $('#question input[name="email"]').val()
            $('#question input[name="email"]').addClass 'error'

        if $('#question .error').length == 0
            data = new FormData(this)
            $.ajax 
                type        : 'POST'
                url         : '/include/send.php'
                data        : data
                cache       : false
                contentType : false
                processData : false
                mimeType    : 'multipart/form-data'
                success     : (data) ->
                    data = $.parseJSON(data)
                    if data.status == "ok"
                        $('#question form').hide()
                        $('#question .success').show()
                    
            e.preventDefault()

        e.preventDefault()

    $('#search input[name="type"]').change ()->
        el = $('#search input[name="type"]:checked')
        $('#search').attr
            'action' : el.data('action')
            'target' : el.data('target')

        $('#search input[type="text"]').attr
            'name' : el.data('name')

    $('#doctor').off('shown.bs.modal').on 'shown.bs.modal', ()->
        if $('.frame').hasClass 'doctor'
            $('#doctor a.back').attr 'href', '/'
            $('#doctor a.enter').attr 'href', '#'
        else
            $('#doctor a.back').attr 'href', '#'
            $('#doctor a.enter').attr 'href', '/doctors/'

        if($.cookie('checkbox')=='true')
            $('#doctor .checkbox').addClass('checked')

    $('#toolbar .trigger').off('click').on 'click', (e)->
        $('#toolbar .nav').toggleClass('open')
        $('body').toggleClass('nav-open')
        e.preventDefault()

    $('#overlay').off('click scroll touchmove touchstart').on 'click scroll touchmove touchstart', (e)->
        $('#toolbar .nav').removeClass('open')
        $('body').removeClass('nav-open')
        e.preventDefault()

    symtpoms_select = (el, hide="true")->
        

        s_id  = el.parents('.section').data('id')
        id    = el.data('id')
        c     = el.data('count')
        label = el.find('h2').text().split('(')[0]
        skip  = false

        if !el.hasClass 'multy'
            inpt = el.find '.checked input'
            if inpt.hasClass 'skip'
                skip = true
            else
                answ = inpt.data("text").capitalize()
                answ = label + "<strong>" + answ + ".</strong>"
                a    = inpt.data('id')
            
        else
            answ = []
            a = []
            el.find('.checked input').each ()->
                if $(this).hasClass 'skip'
                    skip = true
                else
                    ###
                    if $(this).data('answer').indexOf("#tanswer#") >= 0 || $(this).data('answer').indexOf("#answer#") >= 0
                        text = $(this).data("text")
                    else
                    ###
                    text = $(this).data("text")
                    answ.push text
                    a.push $(this).data("id")
            ###
            if el.find('input').data('answer').length > 0
                if el.find('input').data('answer').indexOf("#tanswer#") >= 0
                    answ[0] = answ[0].capitalize()
                    answ = el.find('input').data('answer').replace(/#tanswer#/gi, answ.join(', ')) + '.'
                else if el.find('input').data('answer').indexOf("#answer#") >= 0
                    answ = el.find('input').data('answer').replace(/#answer#/gi, answ.join(', '))
                else
                    answ = answ.join(' ')
            ###
            if(!skip)            
                answ[0] = answ[0].capitalize()
                answ = label + "<strong>" + answ.join(', ') + '</strong>.'
            $("#result .ansver[data-id='#{id}']").remove()

        if(!skip)
            $("#result .r#{s_id}").append "<div data-id='#{id}' data-count='#{c}' data-answer='#{a}' class='ansver' id='a-#{id}'>#{answ}</div>"

        if hide || skip
            el.hide().removeClass 'done'

        el.parents('.section').hide() if el.parents('.section').find('.question:visible').length == 0

        if $('.question:visible').length == 0
            $('#buttons').removeClass('off')
            symptoms_collect()
        else
            $('#buttons').addClass('off') if !$('#buttons').hasClass('off') 

        symptoms_collect()

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
        
        id = $(this).parents('.question').data('id')
        index = id+1

        if $(this).parents('.question').hasClass 'multy'
            delay 200, ()->
                $("#symtpoms .question.done:not(.q-#{id})").each ()->
                    symtpoms_select($(this))
                $('#symtpoms .question.done').each ()->
                    symtpoms_select($(this), false)
                
        else
            delay 200, ()->
                $('#symtpoms .question.done').each ()->
                    symtpoms_select($(this))

        if $("#symtpoms .question:visible").length > 1
            while !$("#symtpoms .question[data-id='#{index}']").length
                index++
            $("#symtpoms .question[data-id='#{index}']").addClass 'on'

    $('#symtpoms input').iCheck()
    
    $('#symptoms-welcome').modal()

    $('#symtpoms .frame').perfectScrollbar
        suppressScrollX: true

    $('#symtpoms .question h2').click (e)->
        $(this).parents('.question').toggleClass('on')

        $('#symtpoms .question.done').each ()->
            symtpoms_select($(this))

        $('#symtpoms .frame').perfectScrollbar('update')
        e.preventDefault()

    if $.cookie('checkbox') == "true"
        $('.checkbox').addClass("checked")

    $('.checkbox').off('click').on 'click', ()->
        $(this).toggleClass('checked')
        if($(this).hasClass('checked'))
            $.cookie('checkbox', 'true', {path:"/"});
        else
            $.removeCookie('checkbox');
        $(this).parent().find('a').toggleClass('no-ajax')
    
    $('#enter a, a.enter, .landing .enter a, .landing .enter2 a').off('click').on 'click', ()->
        if(!$(this).parent().find('.checkbox').hasClass("checked"))
            anim($(this).parent().find('.checkbox'),'tada')
            return false
        else
            if($(this).parents('.modal-dialog').length>0)
                $('#doctor').modal('hide')
            _gaq.push(['_trackEvent', 'Doctors', 'PopupClick', 'Docs Click Popup']);
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

    $('#faq .block').click (ev)->
        if $(window).width() < 780
            if !$(this).hasClass('open')
                $('#faq .block').removeClass('open')
                $(this).toggleClass('open');
                offset = $(this).offset().top
                $('html, body').animate({'scrollTop' : offset - $('#toolbar').height()-14 },300)
        ev.preventDefault()

    ###
    $('#faq .block .text .panel').slimscroll
        height : ()->
            return $(this).parents('.text').height()
    ###
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
        while($('#article .container .col-md-8').height()<$('#article .container .col-md-4.side').height()&&$('#article .container .col-md-4.side .block:last').length>0)
            $('#article .container .col-md-4.side .block:last').remove()
            if($('#article .container .col-md-4.side .block:last').length==0)
                $('#article .container .col-md-4.side').remove()

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
            load(State.url)

    $('#modal-email a').off('click').on 'click', (e)->
        $('#modal-email input').removeClass 'error'
        email = $('#modal-email input').val()
        url = $(this).attr 'href'
        if(validateEmail(email))
            $.ajax 
                url : url
                data :
                    email: email
                success :
                    (data)-> 
                        if data == "success"
                            $('#modal-email').addClass 'done'
        else
            $('#modal-email input').addClass 'error'
        e.preventDefault()

$(document).ready ()->

    #$(document).ajaxStart ()-> Pace.restart()
    #$(document).ajaxStop ()-> Pace.stop()

    fixTimer = false

    $(window).on 'scroll', ()->
        $('.scroll-fix').addClass 'on'
        clearTimeout fixTimer
        fixTimer = delay 300, ()->
            $('.scroll-fix').removeClass 'on'
    init()

    $('#popup-test').on 'hidden.bs.modal', ()->
        $('#popup-test').removeClass 'done'

    
    $('body').imagesLoaded ()->
        $('.frame').css({opacity:1}).attr('css', '');
        
        

        
                

$(window).resize ->
	x = setTimeout(size, 300)