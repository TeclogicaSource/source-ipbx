
Runner.pages.PageSettings.addPageEvent("ipbx_ura_rev_msg",Runner.pages.constants.PAGE_LIST,"afterPageReady",function(pageObj,proxy,pageid){pageObj.buttonNames[pageObj.buttonNames.length]='___';if(!pageObj.buttonEventBefore['___']){pageObj.buttonEventBefore['___']=function(params,ctrl,pageObj,proxy,pageid,rowData){params["txt"]="Hello";ctrl.setMessage("Sending request to server...");}}
if(!pageObj.buttonEventAfter['___']){pageObj.buttonEventAfter['___']=function(result,ctrl,pageObj,proxy,pageid,rowData){var message=result["txt"]+" !!!";history.go(0);ctrl.setMessage(message);}}
$('a[id=___]').each(function(){if($(this).closest('tr.gridRowAdd').length){return;}
this.id="___"+"_"+Runner.genId();var button____=new Runner.form.Button({id:this.id,btnName:"___"});button____.init({args:[pageObj,proxy,pageid]});});});Runner.pages.PageSettings.addPageEvent("ipbx_ura_rev_msg",Runner.pages.constants.PAGE_LIST,"afterPageReady",function(pageObj,proxy,pageid){pageObj.buttonNames[pageObj.buttonNames.length]='_v_';if(!pageObj.buttonEventBefore['_v_']){pageObj.buttonEventBefore['_v_']=function(params,ctrl,pageObj,proxy,pageid,rowData){params["txt"]="Hello";ctrl.setMessage("Sending request to server...");}}
if(!pageObj.buttonEventAfter['_v_']){pageObj.buttonEventAfter['_v_']=function(result,ctrl,pageObj,proxy,pageid,rowData){var message=result["txt"]+" !!!";history.go(0);ctrl.setMessage(message);}}
$('a[id=_v_]').each(function(){if($(this).closest('tr.gridRowAdd').length){return;}
this.id="_v_"+"_"+Runner.genId();var button__v_=new Runner.form.Button({id:this.id,btnName:"_v_"});button__v_.init({args:[pageObj,proxy,pageid]});});});