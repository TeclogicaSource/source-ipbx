DT_TECNO.centro_custo

   //Verifica Se tem OS ou Descricao dos registros ja existentes
   for (i=0;i<field.length;i++) {
      if (field[i].id == "OS") {
         field[i+1].value = JStrim(field[i+1].value);
         if ((field[i].value == "") & !(field[i-3].checked)) {
            if (field[i+1].value == "") {
               alert("GEP-00007 A Ordem De Servico ou a Descricao Devem Ser Preenchidas.");
               field[i].focus();
               return false;
            }
         }
         if ((field[i+2].value == "3") & isNaN(field[i+1].value) & !(field[i-3].checked)) {
            alert("A Descricao para o Tipo de Hora Eventual deve conter somente numeros.");
            field[i+1].focus();
            return false;
         }
      }
   }

   TheForm.P_DSC_ATIVDDE.value = JStrim(TheForm.P_DSC_ATIVDDE.value);

   //Verifica Se tem Hora Inicial e Final na insercao
   if (TheForm.P_DSC_ATIVDDE.value || TheForm.P_ORDEM_SERV.value) {
      if ((TheForm.P_HA_HOR_INI.value == "") || (TheForm.P_HA_HOR_FIM.value == "")) {
         alert("GEP-00004  Campo Hora Inicial/Final No Pode Ser Nulo.");
         return false;
      }
   }

   //Verifica Se tem OS ou Descricao na insercao
   if (TheForm.P_HA_HOR_INI.value && TheForm.P_HA_HOR_FIM.value) {
      if ((TheForm.P_DSC_ATIVDDE.value == "") && (TheForm.P_ORDEM_SERV.value == "")) {
         alert("GEP-00007 A Ordem De Servico ou a Descricao Devem Ser Preenchidas.");
         TheForm.P_ORDEM_SERV.focus();
         return false;
      }
      if ((TheForm.P_COD_TIPO_HORA.value == "3") & isNaN(TheForm.P_DSC_ATIVDDE.value)) {
         alert("A Descricao para o Tipo de Hora Eventual deve conter somente numeros.");
         TheForm.P_DSC_ATIVDDE.focus();
         return false;
      }
   }

   return true;=================================================================*/

   var TheForm = document.GEP102HM;
   var i;
   var checkExcluir;
   // Valida os lançamentos já cadastrados
   for (i=0;i<document.GEP102HM.OS.length-1;i++) {
     if (document.GEP102HM.OS.length <= 2) {
       checkExcluir = document.GEP102HM.INI;
     } else {
       checkExcluir = document.GEP102HM.INI[i];
     }
     if ((document.GEP102HM.OS[i].value == "") &
         (document.GEP102HM.dscAtiv[i].value == "") &
            !(checkExcluir.checked)) {
       if ((document.GEP102HM.dscAtiv[i].value == "")) {
         alert("GEP-00007 A Ordem De Servico ou a Descricao Devem Ser Preenchidas.");
         if (document.GEP102HM.OS[i].value == "") document.GEP102HM.OS[i].focus();
         if (document.GEP102HM.dscAtiv[i].value == "") document.GEP102HM.dscAtiv[i].focus();
         return false;
       }
       if ((document.GEP102HM.cmbTipoHora[i].value == "3") &
              isNaN(document.GEP102HM.dscAtiv[i].value) &
              !(checkExcluir.checked)) {
         alert("A Descricao para o Tipo de Hora Eventual deve conter somente numeros.");
         document.GEP102HM.dscAtiv[i].focus();
         return false;
       }
     }

     // Inicio 22/05/2009
     if ((document.GEP102HM.codGerente[i].value == "") &
         (document.GEP102HM.chkTipoOs[i].value == "1")) {
        alert("Campo Gerente deve ser preenchido.");
        document.GEP102HM.codGerente[i].focus();
        return false;
     }
     // Fim 22/05/2009

   }

   TheForm.P_DSC_ATIVDDE.value = JStrim(TheForm.P_DSC_ATIVDDE.value);

   //Verifica Se tem Hora Inicial e Final na insercao
   if (TheForm.P_DSC_ATIVDDE.value || TheForm.P_ORDEM_SERV.value) {
      if ((TheForm.P_HA_HOR_INI.value == "") || (TheForm.P_HA_HOR_FIM.value == "")) {
         alert("GEP-00004  Campo Hora Inicial/Final No Pode Ser Nulo.");
         return false;
      }
   }

   //Verifica Se tem OS ou Descricao na insercao
   if (TheForm.P_HA_HOR_INI.value && TheForm.P_HA_HOR_FIM.value) {
      if ((TheForm.P_DSC_ATIVDDE.value == "") && (TheForm.P_ORDEM_SERV.value == "")) {
         alert("GEP-00007 A Ordem De Servico ou a Descricao Devem Ser Preenchidas.");
         TheForm.P_ORDEM_SERV.focus();
         return false;
      }
      if ((TheForm.P_COD_TIPO_HORA.value == "3") & isNaN(TheForm.P_DSC_ATIVDDE.value)) {
         alert("A Descricao para o Tipo de Hora Eventual deve conter somente numeros.");
         TheForm.P_DSC_ATIVDDE.focus();
         return false;
      }
   }

   // Inicio 22/05/2009
   if ((TheForm.P_GERENTE_RESP.value == "") &
       (TheForm.P_TIPO_OS.value == "1")) {
       alert("Campo Gerente deve ser preenchido.");
       TheForm.P_GERENTE_RESP.focus();
       return false;
   }
   // Fim 22/05/2009

   return true;
}

function LimpaHiddens() {
  var TheForm = document.GEP102HM

  TheForm.P_EXCLUI_ESFRCO.value = "";
  TheForm.P_ALTERA_TIPO_OS.value = 0;
  TheForm.P_ALTERA_GERENTE_RESP.value = "";
  TheForm.P_ALTERA_HOR_INI.value = "";
  TheForm.P_ALTERA_HOR_FIM.value = "";
  TheForm.P_ALTERA_ORDEM_SERV.value = "";
  TheForm.P_ALTERA_DSC_ESFRCO.value = "";
  TheForm.P_ALTERA_COD_TIPO_HORA.value = 1;
}

function PopulaHiddens() {
  var TheForm = document.GEP102HM
  var field = document.GEP102HM.elements
  var wrk_nro_os = "";

  for (i=0;i<field.length;i++) {
    if (field[i].id == "INI") {
      if (field[i].checked) {
        TheForm.P_EXCLUI_ESFRCO.value += field[i].rowid + "*";
        continue;
      }
      if (!field[i+1].options[field[i+1].selectedIndex].defaultSelected) {
        TheForm.P_ALTERA_TIPO_OS.value += field[i].rowid + "*" + field[i+1].value + "*";
      }
      if (field[i+2].value != field[i+2].defaultValue) {
          TheForm.P_ALTERA_GERENTE_RESP.value += field[i].rowid + "*" + field[i+2].value + "*";
      }
      if (field[i+3].value != field[i+3].defaultValue) {
        TheForm.P_ALTERA_HOR_INI.value += field[i].rowid + "*" + field[i+3].value + "*";
      }
      if (field[i+4].value != field[i+4].defaultValue) {
        TheForm.P_ALTERA_HOR_FIM.value += field[i].rowid + "*" + field[i+4].value + "*";
      }
      if (field[i+5].value != field[i+5].defaultValue) {
        wrk_nro_os = (field[i+5].value != "")? field[i+5].value : "-1";
        TheForm.P_ALTERA_ORDEM_SERV.value += field[i].rowid + "*" + wrk_nro_os + "*";
      }
      if (field[i+6].value != field[i+6].defaultValue) {
        TheForm.P_ALTERA_DSC_ESFRCO.value += field[i].rowid + "*" + JStrim(field[i+6].value) + "*";
      }
      if (!field[i+7].options[field[i+7].selectedIndex].defaultSelected) {
        TheForm.P_ALTERA_COD_TIPO_HORA.value += field[i].rowid + "*" + field[i+7].value + "*";
      }
    }
  }
  return;
}

function Exec(evento) {

    var TheForm = document.GEP102HM

    PopulaHiddens();

    for (i=0;i<TheForm.P_DAT_LANCTO1.length;i++) {
       if (TheForm.P_DAT_LANCTO1.options[i].defaultSelected) {
          break;
       }
    }


    if (evento == "Consultar") {
       if (TheForm.P_EXCLUI_ESFRCO.value ||
           TheForm.P_ALTERA_TIPO_OS.value ||
           //TheForm.P_ALTERA_GERENTE_RESP.value ||
           TheForm.P_ALTERA_HOR_INI.value ||
           TheForm.P_ALTERA_HOR_FIM.value ||
           TheForm.P_ALTERA_ORDEM_SERV.value ||
           TheForm.P_ALTERA_DSC_ESFRCO.value ||
           TheForm.P_ALTERA_COD_TIPO_HORA.value ||
           TheForm.P_HA_HOR_FIM.value ||
           TheForm.P_ORDEM_SERV.value ||
           TheForm.P_DSC_ATIVDDE.value) {
           //Houve alguma alteracao
            if (confirm("Existem dados do dia " + TheForm.P_DAT_LANCTO1.options[i].value + " que nao foram salvos!\nDeseja salvar?")) {
               TheForm.elements[0].value = TheForm.P_DAT_LANCTO1.options[i].dsc;
               TheForm.P_DAT_LANCTO1.value = TheForm.P_DAT_LANCTO1.options[i].value;
               TheForm.P_ACAO1.value = "salvar";
            } else {
               TheForm.P_ACAO1.value = "consulta";
            }
       } else {
            TheForm.P_ACAO1.value = "consulta";
       }
    } else {
       TheForm.elements[0].value = TheForm.P_DAT_LANCTO1.options[i].dsc;
       TheForm.P_DAT_LANCTO1.value = TheForm.P_DAT_LANCTO1.options[i].value;
       TheForm.P_ACAO1.value = "salvar";
    }

    if (TheForm.P_ACAO1.value == "salvar") {
       if (!ValidaSalvar()) {
          LimpaHiddens();
          return;
       }
    }

    TheForm.submit();
}

function ValidaHoras(strHoras) {

   var TheForm = document.GEP102HM
   if ((strHoras.length != 4) & (strHoras.length != 5)) {
     alert("GEP-00006 Digite uma Hora Valida.")
      return false
   } else if (strHoras.length == 4) {
      strHoras = "0" + strHoras
   }

   var strVar = strHoras
   var strHora = strVar.substr(0,2)
   var strMin = strVar.substr(3,2)

   if ((strVar.charAt(2) == ":") || (strVar.charAt(2) == ".")) {
      if (isPosInteger(strHora) & isPosInteger(strMin)) {
         if ((strHora >= 0) & (strHora < 24)) {
            if ((strMin >= 0) & (strMin <= 59)) {
              return true
            }
         }
      }
   }

   alert("GEP-00006 Digite uma Hora Valida.")
   return false

}

function Atualiza(objeto) {
  //chamada: OnBlur="javascript:Atualiza(this)"

   if (objeto.value == "") {
     return
   }

    if (objeto.name == "P_GERENTE_RESP") {
      if (!isPosInteger(objeto.value)) {
         alert("GEP-00005  Digite um Valor Numerico.")
        objeto.focus()
      }
      return
    }


    if (objeto.name == "P_ORDEM_SERV") {
      if (!isPosInteger(objeto.value)) {
         alert("GEP-00005  Digite um Valor Numerico.")
        objeto.focus()
      }
      return
    }

    if (objeto.name == "P_HA_HOR_INI") {
      if (!ValidaHoras(objeto.value)) {
        objeto.focus()
        return
      }
    }

    if (objeto.name == "P_HA_HOR_FIM") {
      if (!ValidaHoras(objeto.value)) {
       objeto.focus()
        return
      }
    }
   if (objeto.value.length == 4) {
       objeto.value = "0" + objeto.value
   }
   objeto.value = objeto.value.replace(".",":")
}

function ValidaCampo(Seq, objeto) {
  //chamada: OnBlur="javascript:ValidaCampo(Seq, this)

   var TheForm = document.GEP102HM

   if (Seq == 1) {
      if (objeto.value != "") {
         if (!ValidaHoras(objeto.value)) {
            objeto.focus()
            return
         }
         if (objeto.value.length == 4) {
            objeto.value = "0" + objeto.value
         }
         objeto.value = objeto.value.replace(".",":")
      } else {
          alert("GEP-00004 Campo Hora Inicial/Final No Pode Ser Nulo.")
          objeto.focus()
          return
     