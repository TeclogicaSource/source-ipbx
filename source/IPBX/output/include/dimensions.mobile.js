
(function(c){function d(b,a){return parseInt(c.curCSS(b.jquery?b[0]:b,a,true))||0}c.dimensions={version:"1.2"};c.each(["Height","Width"],function(b,a){c.fn["inner"+a]=function(){if(this[0]){var b=a=="Height"?"Top":"Left",c=a=="Height"?"Bottom":"Right";return this.is(":visible")?this[0]["client"+a]:d(this,a.toLowerCase())+d(this,"padding"+b)+d(this,"padding"+c)}};c.fn["outer"+a]=function(b){if(this[0]){var e=a=="Height"?"Top":"Left",f=a=="Height"?"Bottom":"Right",b=c.extend({margin:false},b||{});return(this.is(":visible")?this[0]["offset"+a]:d(this,a.toLowerCase())+d(this,"border"+e+"Width")+d(this,"border"+f+"Width")+d(this,"padding"+e)+d(this,"padding"+f))+(b.margin?d(this,"margin"+e)+d(this,"margin"+f):0)}}});c.each(["Left","Top"],function(b,a){c.fn["scroll"+a]=function(b){return!this[0]?void 0:b!=void 0?this.each(function(){this==window||this==document?window.scrollTo(a=="Left"?b:c(window).scrollLeft(),a=="Top"?b:c(window).scrollTop()):this["scroll"+a]=b}):this[0]==window||this[0]==document?self[a=="Left"?"pageXOffset":"pageYOffset"]||c.boxModel&&document.documentElement["scroll"+a]||document.body["scroll"+a]:this[0]["scroll"+a]}});c.fn.extend({position:function(){var b=this[0],a,c,e;if(b){e=this.offsetParent();if(!e.length)return a;a=this.offset();c=e.offset();a.top-=d(b,"marginTop");a.left-=d(b,"marginLeft");c.top+=d(e,"borderTopWidth");c.left+=d(e,"borderLeftWidth");a={top:a.top-c.top,left:a.left-c.left}}return a},offsetParent:function(){if(this.css("display")==null)return false;for(var b=this[0].offsetParent;b&&!/^body|html$/i.test(b.tagName)&&c.css(b,"position")=="static";)b=b.offsetParent;return c(b)}})})(jQuery);(function($){$.fn.inputHintBox=function(options){options=$.extend({},$.inputHintBoxer.defaults,options);this.each(function(){new $.inputHintBoxer(this,options);});return this;}
$.inputHintBoxer=function(input,options){var $guideObject=$(options.el||input),$input=$(input),box,boxMouseDown=false;if(($guideObject.attr('type')=='radio'||$guideObject.attr('type')=='checkbox')&&$guideObject.parent().is('label')){$guideObject=$($guideObject.parent());}
function init(){var boxHtml=options.html!=''?options.html:options.source=='attr'?$input.attr(options.attr):'';if(typeof boxHtml==="undefined")boxHtml='';box=options.div!=''?options.div.clone():$("<div/>").addClass(options.className);box=box.css('display','none').addClass('_hintBox').appendTo(options.attachTo);if(options.div_sub=='')box.html(boxHtml);else $(options.div_sub,box).html(boxHtml);if($input.is(":focus")){show();}
$input.focus(function(){$('body').mousedown(global_mousedown_listener);show();}).blur(function(){prepare_hide();}).bind('focusin',function(e){$('body').mousedown(global_mousedown_listener);show();}).bind('focusout',function(e){prepare_hide(true);});}
function align(){var guidePos=Runner.getPosition($guideObject[0]),offsets=$guideObject.position(),left=guidePos.left+$guideObject.width()+options.incrementLeft+5+($.browser.safari?5:($.browser.msie?10:($.browser.mozilla?6:0))),top=guidePos.top+options.incrementTop;if(options.pageObj&&options.pageObj.fly&&options.pageObj.win){box.css('z-index',options.pageObj.win.cfg.getProperty("zindex")+1);}
box.css({position:"absolute",top:top,left:left});}
function show(){$('div.shiny_box').hide();align();box.show();}
function prepare_hide(noTimeout){$('body').click(global_click_listener);if(boxMouseDown)return;if(noTimeout){hide(true);}else{$.inputHintBoxer.mostRecentHideTimer=setTimeout(function(){hide()},300);}}
var global_click_listener=function(e){var $e=$(e.target),c='._hintBox';clearTimeout($.inputHintBoxer.mostRecentHideTimer);if($e.parents(c).length==0&&$e.is(c)==false)hide();};var global_mousedown_listener=function(e){var $e=$(e.target),c='._hintBox';boxMouseDown=($e.parents(c).length!=0||$e.is(c)!=false);}
function hide(noTimeout){$('body').unbind('click',global_click_listener);$('body').unbind('mousedown',global_mousedown_listener);align();if(noTimeout){box.hide();}else{box.fadeOut('fast');}}
init();return{}};$.inputHintBoxer.mostRecentHideTimer=0;$.inputHintBoxer.defaults={div:'',className:'input_hint_box',source:'attr',div_sub:'',attr:'title',html:'',incrementLeft:5,incrementTop:0,attachTo:'body'}})(jQuery);