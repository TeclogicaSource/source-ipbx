
var pType=Runner.pages.constants.PAGE_LIST;Runner.pages.PageSettings.addPageEvent("Restore",pType,"afterPageReady",function(pageObj,proxy,pageid){pageObj.buttonNames[pageObj.buttonNames.length]='Restaurar_Backup';if(!pageObj.buttonEventBefore['Restaurar_Backup']){pageObj.buttonEventBefore['Restaurar_Backup']=function(params,ctrl,pageObj,proxy,pageid,rowData){var ok=confirm('Executar Restauração S/N ?');if(ok){params["txt"]="Recuperação do backup do dia ";ctrl.setMessage("Realizando o restore ... Aguarde !!!");}else{params["txt"]="CANCELA";}}}
if(!pageObj.buttonEventAfter['Restaurar_Backup']){pageObj.buttonEventAfter['Restaurar_Backup']=function(result,ctrl,pageObj,proxy,pageid,rowData){var message=result["txt"];ctrl.setMessage(result["txt"]);}}
$('a[id=Restaurar_Backup]').each(function(){if(!$(this).closest('tr.gridRowAdd').length){var newId="Restaurar_Backup"+"_"+Runner.genId();this.id=newId;var button_Restaurar_Backup=new Runner.form.Button({id:newId,btnName:"Restaurar_Backup"});button_Restaurar_Backup.init({args:[pageObj,proxy,pageid]});}});});