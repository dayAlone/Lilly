(function(){var t,e,n,o,i,r,a,c,s,d;n=!1,a=function(){var t;return t=$(window).height(),imagesLoaded($("body"),function(){})},t={TOUCH_DOWN_EVENT_NAME:"mousedown touchstart",TOUCH_UP_EVENT_NAME:"mouseup touchend",TOUCH_MOVE_EVENT_NAME:"mousemove touchmove",TOUCH_DOUBLE_TAB_EVENT_NAME:"dblclick dbltap",isAndroid:function(){return navigator.userAgent.match(/Android/i)},isBlackBerry:function(){return navigator.userAgent.match(/BlackBerry/i)},isIOS:function(){return navigator.userAgent.match(/iPhone|iPad|iPod/i)},isOpera:function(){return navigator.userAgent.match(/Opera Mini/i)},isWindows:function(){return navigator.userAgent.match(/IEMobile/i)},isMobile:function(){return t.isAndroid()||t.isBlackBerry()||t.isIOS()||t.isOpera()||t.isWindows()}},o=function(t,e){return setTimeout(e,t)},s=function(t){var e;return e=/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,e.test(t)},d=function(t){var e;return e=/^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/,e.test(t)},e=function(t,e,n){return null==n&&(n=function(){return!0}),$(t).addClass(e+" animated").one("webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend",function(){return t.removeClass(e+" animated"),n()})},c=0,r=function(t){return $.ajax({url:t,success:function(t){return $("body .frame").html($(t).filter(".frame").html()),e($("body .frame"),"fadeIn"),document.title=$(t).filter("title").text(),$(t).filter(".frame").hasClass("index")?$(".frame").addClass("index"):$(".frame").removeClass("index"),$.scrollTo(0,500),i()}})},i=function(){if($(window).on("navigate",function(t,e){return alert()}),$("a").on("click",function(t){var e,n;if(e=window.History,n=$(this).attr("href"),t.preventDefault(),e.enabled){if(!$(this).hasClass("no-ajax")&&!$(this).hasClass("prevent")&&"#"!==n.charAt(0)&&n.indexOf("http")<0&&0===$(this).parents("#panel,.bx-component-opener").length)return $("body .frame").removeClass("animated fadeIn"),e.pushState({url:n},$(this).text(),n);if(n.indexOf("http")>=0){if(window.open(n,"_blank"),$(this).parents("#locator").length>0)return $("#locator").modal("hide")}else if($(this).hasClass("no-ajax"))return window.open(n,"_blank")}}),$("#doctor").on("shown.bs.modal",function(){return"true"===$.cookie("checkbox")?$("#doctor .checkbox").addClass("checked"):void 0}),$(".checkbox").off("click").on("click",function(){return $(this).toggleClass("checked"),$(this).hasClass("checked")?$.cookie("checkbox","true",{expires:.5}):$.removeCookie("checkbox"),$(this).parent().find("a").toggleClass("no-ajax")}),$("#enter a, a.enter").off("click").on("click",function(){return $(this).parent().find(".checkbox").hasClass("checked")?($(this).parents(".modal-dialog").length>0&&$("#doctor").modal("hide"),!0):(e($(this).parent().find(".checkbox"),"tada"),!1)}),$("#enter.short a").hoverIntent({over:function(){return $("#enter.short").removeClass("short")},out:function(){}}),$("#enter").hoverIntent({over:function(){return"true"===$.cookie("checkbox")?$("#enter .checkbox").addClass("checked"):void 0},out:function(){return $("#enter").hasClass("dont-hide")?void 0:$("#enter").addClass("short")}}),$("#faq .block .text .panel").slimscroll({height:function(){return $(this).parents(".text").height()}}),$("#map").click(function(){return $("#locator").modal()}),$("#article.video .icon-play").click(function(){var t,e;return $("#article.video iframe").css("opacity",1),$("#article.video .icon-play, .top-title .text").css("opacity",0),t=$("#article.video iframe")[0],e=$f(t),e.api("play")}),$("#article .container .col-md-8").height()<$("#article .container .col-md-4.side").height())for(;$("#article .container .col-md-8").height()<$("#article .container .col-md-4.side").height();)$("#article .container .col-md-4.side .block:last").remove();return $("#video .icon").click(function(){var t,e;return $("#video iframe").css("opacity",1),$("#video .icon").css("opacity",0),t=$("#video iframe")[0],e=$f(t),e.api("play")}),$("[data-toggle=tooltip]").tooltip(),n?void 0:(n=!0,History.Adapter.bind(window,"statechange",function(){var t;return t=History.getState(),console.log(t),r(t.url)}))},$(document).ready(function(){return $(document).ajaxStart(function(){return Pace.restart()}),$(document).ajaxStop(function(){return Pace.stop()}),i(),$("body").imagesLoaded(function(){return $(".frame").css({opacity:1}).attr("css",""),$.lockfixed("#article .fix",{offset:{top:0,bottom:$("#footer").height()+30}})})}),$(window).resize(function(){var t;return t=setTimeout(a,300)})}).call(this);