
Runner.pages.PageSettings.addPageEvent("conf_sala_convidado",Runner.pages.constants.PAGE_ADD,"afterPageReady",function(pageObj,proxy,pageid,inlineRow,inlineObject){var ctrlnm_convidado_interno=Runner.getControl(pageid,'nm_convidado_interno');var ctrlnm_convidado=Runner.getControl(pageid,'nm_convidado');var ctrlemail=Runner.getControl(pageid,'e-mail');ctrlnm_convidado_interno.on('change',function(e){if(this.getValue()==''){ctrlnm_convidado.show();ctrlemail.show();}else{ctrlnm_convidado.hide();ctrlemail.hide();}});;});