
Runner.pages.PageSettings.addPageEvent("ipbx_sincronismo",Runner.pages.constants.PAGE_LIST,"afterPageReady",function(pageObj,proxy,pageid){pageObj.buttonNames[pageObj.buttonNames.length]='New_Button10';if(!pageObj.buttonEventBefore['New_Button10']){pageObj.buttonEventBefore['New_Button10']=function(params,ctrl,pageObj,proxy,pageid,rowData){var ok=confirm('Aplicar configurações no servidor S/N ?');if(ok){ctrl.setMessage("Sincronizando... Aguarde !!!");}else{return;}}}
if(!pageObj.buttonEventAfter['New_Button10']){pageObj.buttonEventAfter['New_Button10']=function(result,ctrl,pageObj,proxy,pageid,rowData){var message=result["txt"]+" !!!";ctrl.setMessage(message);}}
$('a[id=New_Button10]').each(function(){if($(this).closest('tr.gridRowAdd').length){return;}
this.id="New_Button10"+"_"+Runner.genId();var button_New_Button10=new Runner.form.Button({id:this.id,btnName:"New_Button10"});button_New_Button10.init({args:[pageObj,proxy,pageid]});});});