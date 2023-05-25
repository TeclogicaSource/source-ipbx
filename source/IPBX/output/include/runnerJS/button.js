
Runner.namespace('Runner.form');Runner.form.Button=Runner.extend(Runner.Event,{id:"",messContId:"",messageCont:null,elem:null,disableHandler:null,tagName:"",constructor:function(cfg){Runner.apply(this,cfg);Runner.form.Button.superclass.constructor.call(this,cfg);this.elem=$('#'+this.id);if(!this.elem.length){this.elem=document.createElement('INPUT');this.elem=$(this.elem).attr('type','button');}
this.elemsForEvent=[this.elem.get(0)];this.tagName=this.elem[0].tagName;},setDisabled:function(){switch(this.tagName)
{case'INPUT':this.elem.get(0).disabled=true;break;default:this.suspendEvent(['click']);break;}},setEnabled:function(){switch(this.tagName)
{case'INPUT':this.elem.get(0).disabled=false;break;default:this.resumeEvent(['click']);break;}},setMessage:function(txt){this.initMessCont();this.setMessage=function(txt){this.messageCont.html(txt);}
this.setMessage(txt);},removeMessage:function(){this.initMessCont();this.removeMessage=function(){this.messageCont.empty();}
this.removeMessage();},initMessCont:function(){if(this.messageCont){return;}
var messCont=document.createElement('DIV');this.messContId=this.id+"_messCont";messCont.id=this.messContId;this.messageCont=$(messCont);this.messageCont.insertAfter(this.elem);}});