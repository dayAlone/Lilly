(function(){var t,e,n,o,a,i,r,s,c,l,d;n=!1,String.prototype.capitalize=function(){return this.charAt(0).toUpperCase()+this.slice(1)},r=function(){var t;return $(".landing .frame").width($(".landing .frame").width()),t=$(window).height(),imagesLoaded($("body"),function(){})},t={TOUCH_DOWN_EVENT_NAME:"mousedown touchstart",TOUCH_UP_EVENT_NAME:"mouseup touchend",TOUCH_MOVE_EVENT_NAME:"mousemove touchmove",TOUCH_DOUBLE_TAB_EVENT_NAME:"dblclick dbltap",isAndroid:function(){return navigator.userAgent.match(/Android/i)},isBlackBerry:function(){return navigator.userAgent.match(/BlackBerry/i)},isIOS:function(){return navigator.userAgent.match(/iPhone|iPad|iPod/i)},isOpera:function(){return navigator.userAgent.match(/Opera Mini/i)},isWindows:function(){return navigator.userAgent.match(/IEMobile/i)},isMobile:function(){return t.isAndroid()||t.isBlackBerry()||t.isIOS()||t.isOpera()||t.isWindows()}},o=function(t,e){return setTimeout(e,t)},l=function(t){var e;return e=/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,e.test(t)},d=function(t){var e;return e=/^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/,e.test(t)},e=function(t,e,n){return null==n&&(n=function(){return!0}),$(t).addClass(e+" animated").one("webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend",function(){return t.removeClass(e+" animated"),n()})},s=0,i=function(t){return $.ajax({url:t,success:function(t){return $("body .frame").html($(t).filter(".frame").html()),e($("body .frame"),"fadeIn"),document.title=$(t).filter("title").text(),$(t).filter(".frame").hasClass("index")?$(".frame").addClass("index"):$(".frame").removeClass("index"),$(t).filter(".frame").hasClass("doctor")?$(".frame").addClass("doctor").removeClass("user"):$(".frame").addClass("user").removeClass("doctor"),$.scrollTo(0,500),a()}})},c=function(t,e,n){var o;return o=0,o=t.indexOf(e),-1===o?!1:n?t.substr(0,o):t.slice(o)},a=function(){var t,a;if($("#test-woman").length>0&&$.getScript("/test_women/js/script.js"),$("#test-man").length>0&&$.getScript("/test_man/js/script.js"),$("a").off("click").on("click",function(t){var e,n;if(0===$(this).parents("#panel, .bx-component-opener").length&&0===$(this).attr("target").length){if(e=window.History,n=$(this).attr("href"),console.log(c(n,"#")),c(n,"#"))return!0;if(t.preventDefault(),e.enabled&&"#"!==n){if(!$(this).hasClass("no-ajax")&&!$(this).hasClass("prevent")&&"#"!==n.charAt(0)&&n.indexOf("http")<0)return $("body .frame").removeClass("animated fadeIn"),e.pushState({url:n},$(this).text(),n);if(n.indexOf("http")>=0||"_blank"===$(this).attr("target")){if(window.open(n,"_blank"),$(this).parents("#locator").length>0)return $("#locator").modal("hide")}else if($(this).hasClass("no-ajax"))return window.open(n,"_blank")}}}),$("#doctor").off("shown.bs.modal").on("shown.bs.modal",function(){return $(".frame").hasClass("doctor")?($("#doctor a.back").attr("href","/"),$("#doctor a.enter").attr("href","#")):($("#doctor a.back").attr("href","#"),$("#doctor a.enter").attr("href","/doctors/")),console.log($(".frame").hasClass("doctor")),"true"===$.cookie("checkbox")?$("#doctor .checkbox").addClass("checked"):void 0}),$("#toolbar .trigger").off("click").on("click",function(t){return $("#toolbar .nav").toggleClass("open"),$("body").toggleClass("nav-open"),t.preventDefault()}),$("#overlay").off("click scroll touchmove touchstart").on("click scroll touchmove touchstart",function(t){return $("#toolbar .nav").removeClass("open"),$("body").removeClass("nav-open"),t.preventDefault()}),a=function(e,n){var o,a,i,r,s,c,l,d;return null==n&&(n="true"),l=e.parents(".section").data("id"),r=e.data("id"),i=e.data("count"),c=e.find("h2").text().split("(")[0],d=!1,e.hasClass("multy")?(a=[],o=[],e.find(".checked input").each(function(){var t;return $(this).hasClass("skip")?d=!0:(t=$(this).data("text"),a.push(t),o.push($(this).data("id")))}),d||(a[0]=a[0].capitalize(),a=c+"<strong>"+a.join(", ")+"</strong>."),$("#result .ansver[data-id='"+r+"']").remove()):(s=e.find(".checked input"),s.hasClass("skip")?d=!0:(a=s.data("text").capitalize(),a=c+"<strong>"+a+".</strong>",o=s.data("id"))),d||$("#result .r"+l).append("<div data-id='"+r+"' data-count='"+i+"' data-answer='"+o+"' class='ansver' id='a-"+r+"'>"+a+"</div>"),(n||d)&&e.hide().removeClass("done"),0===e.parents(".section").find(".question:visible").length&&e.parents(".section").hide(),0===$(".question:visible").length?($("#buttons").removeClass("off"),t()):$("#buttons").hasClass("off")||$("#buttons").addClass("off"),t(),$("#result .ansver[data-id='"+r+"']").one("click",function(t){return r=$(this).data("id"),$(".question[data-id='"+r+"']").parents(".section").is(":hidden")&&$(".question[data-id='"+r+"']").parents(".section").show(),$(".question[data-id='"+r+"']").show(),$(this).remove(),t.preventDefault()})},t=function(){var t,e;return e={},t=0,$("#result .section").each(function(){var n,o;return o={},n=0,$(this).find(".ansver").each(function(){return o[$(this).data("count")]=$(this).data("answer"),n++}),e[t]={name:$(this).find("h3").text(),questions:o},t++}),$.removeCookie("test_result"),$.cookie("test_result",JSON.stringify(e))},$("#symtpoms input").on("ifChecked",function(){var t,e;if($(this).parents(".question").addClass("done"),t=$(this).parents(".question").data("id"),e=t+1,$(this).parents(".question").hasClass("multy")?o(200,function(){return console.log(e),$("#symtpoms .question.done:not(.q-"+t+")").each(function(){return a($(this))}),$("#symtpoms .question.done").each(function(){return a($(this),!1)})}):o(200,function(){return $("#symtpoms .question.done").each(function(){return a($(this))})}),$("#symtpoms .question:visible").length>1){for(;!$("#symtpoms .question[data-id='"+e+"']").length;)e++;return $("#symtpoms .question[data-id='"+e+"']").addClass("on")}}),$("#symtpoms input").iCheck(),$("#symptoms-welcome").modal(),$("#symtpoms .frame").perfectScrollbar({suppressScrollX:!0}),$("#symtpoms .question h2").click(function(t){return $(this).parents(".question").toggleClass("on"),$("#symtpoms .question.done").each(function(){return a($(this))}),$("#symtpoms .frame").perfectScrollbar("update"),t.preventDefault()}),"true"===$.cookie("checkbox")&&$(".checkbox").addClass("checked"),$(".checkbox").off("click").on("click",function(){return $(this).toggleClass("checked"),$(this).hasClass("checked")?$.cookie("checkbox","true"):$.removeCookie("checkbox"),$(this).parent().find("a").toggleClass("no-ajax")}),$("#enter a, a.enter, .landing .enter a, .landing .enter2 a").off("click").on("click",function(){return $(this).parent().find(".checkbox").hasClass("checked")?($(this).parents(".modal-dialog").length>0&&$("#doctor").modal("hide"),_gaq.push(["_trackEvent","Doctors","PopupClick","Docs Click Popup"]),!0):(e($(this).parent().find(".checkbox"),"tada"),!1)}),$("#toolbar .enter").click(function(t){return $("#doctor").modal(),t.preventDefault()}),$("#enter.short a").hoverIntent({over:function(){return $("#enter.short").removeClass("short")},out:function(){}}),$("#enter").hoverIntent({over:function(){return"true"===$.cookie("checkbox")?$("#enter .checkbox").addClass("checked"):void 0},out:function(){return $("#enter").hasClass("dont-hide")?void 0:$("#enter").addClass("short")}}),$("#faq .block").click(function(t){var e;return $(window).width()<780&&($(this).hasClass("open")||($("#faq .block").removeClass("open"),$(this).toggleClass("open"),e=$(this).offset().top,$("html, body").animate({scrollTop:e-$("#toolbar").height()-14},300))),t.preventDefault()}),$("#faq .block .text .panel").slimscroll({height:function(){return $(this).parents(".text").height()}}),$("#map").click(function(){return _gaq.push(["_trackEvent","DoctorLocator","BannerClick","DL BannerMain Click"]),$("#locator").modal()}),$("#article.video .icon-play").click(function(){var t,e;return $("#article.video iframe").css("opacity",1),$("#article.video .icon-play, .top-title .text").css("opacity",0),t=$("#article.video iframe")[0],e=$f(t),e.api("play")}),$("#article .container .col-md-8").height()<$("#article .container .col-md-4.side").height())for(;$("#article .container .col-md-8").height()<$("#article .container .col-md-4.side").height()&&$("#article .container .col-md-4.side .block:last").length>0;)$("#article .container .col-md-4.side .block:last").remove(),0===$("#article .container .col-md-4.side .block:last").length&&$("#article .container .col-md-4.side").remove();return $("#video .icon").click(function(){var t,e;return $("#video iframe").css("opacity",1),$("#video .icon").css("opacity",0),t=$("#video iframe")[0],e=$f(t),e.api("play")}),$("[data-toggle=tooltip]").tooltip(),n||(n=!0,History.Adapter.bind(window,"statechange",function(){var t;return t=History.getState(),console.log(t),i(t.url)})),$("#modal-email a").off("click").on("click",function(t){var e,n;return $("#modal-email input").removeClass("error"),e=$("#modal-email input").val(),n=$(this).attr("href"),console.log(l(e)),l(e)?$.ajax({url:n,data:{email:e},success:function(t){return console.log(t),"success"===t?$("#modal-email").addClass("done"):void 0}}):$("#modal-email input").addClass("error"),t.preventDefault()})},$(document).ready(function(){var t;return t=!1,$(window).on("scroll",function(){return $(".scroll-fix").addClass("on"),clearTimeout(t),t=o(300,function(){return $(".scroll-fix").removeClass("on")})}),a(),$("#popup-test").on("hidden.bs.modal",function(){return $("#popup-test").removeClass("done")}),$("body").imagesLoaded(function(){return $(".frame").css({opacity:1}).attr("css",""),$("#fullwidth-list .landing, .enter2.index, #article .fix").scrollToFixed({marginTop:20,preAbsolute:function(){return console.log(0),$(this).css("left",0)},limit:function(){var t;return t=$("#footer").offset().top-$(this).outerHeight(!0)+30}})})}),$(window).resize(function(){var t;return t=setTimeout(r,300)})}).call(this);