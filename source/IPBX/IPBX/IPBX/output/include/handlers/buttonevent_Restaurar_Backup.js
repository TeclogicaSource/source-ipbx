
var button_Restaurar_Backup=new Runner.form.Button({id:'Restaurar_Backup'});button_Restaurar_Backup.on("click",function(e){var ctrl=this;var params={buttId:this.id,rndVal:(new Date().getTime())};this.setDisabled();var isButtEnabled=false;var ok=confirm('Executar Restauração S/N ?');if(ok){params["txt"]="Recuperação do backup do dia ";ctrl.setMessage("Realizando o restore ... Aguarde !!!");}else{params["txt"]="CANCELA";}
isButtEnabled=true;var afterHandler=function(result){var message=result["txt"];ctrl.setMessage(result["txt"]);};var keyObject={};var isManyKeys=0;if($('input[@type=checkbox][@name^=selection]').length){var keysElems=$('input[@type=checkbox][@checked][@name^=selection]');isManyKeys=1;for(var i=0;i<keysElems.length;i++){keyObject[i]=encodeURIComponent(keysElems[i].value);}}else if($('input[@type=hidden][@name^=editid]').length){var keysElems=$('input[@type=hidden][@name^=editid]');for(var i=0;i<keysElems.length;i++){keyObject[i]=encodeURIComponent(keysElems[i].value);}}else if(window.recKeysObj){var i=0;for(var key in window.recKeysObj){keyObject[i]=encodeURIComponent(window.recKeysObj[key]);i++;}}
var reqParams={params:JSON.stringify(params),keys:JSON.stringify(keyObject),isManyKeys:isManyKeys};$.get("buttonhandler.php",reqParams,function(result){result=JSON.parse(result);afterHandler.call(ctrl,result);ctrl.setEnabled();});if(!isButtEnabled){this.setEnabled();}});