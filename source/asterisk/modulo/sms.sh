# Rotina de envio de sms
# Descricao: Modulo sms da central ipbx

. /etc/profile
EXECUTANDO="FALSE"
while [ ${EXECUTANDO} = "FALSE" ]
do
  if [ -f /tmp/sms.lock ]; then
    echo "Processo ja em execucao aguadando " 
    /usr/bin/mysql asteriskcdrdb -e "update sms_noticias set dt_enviado = NULL where id_noticia = $2"
    /usr/bin/mysql asteriskcdrdb -e "update sms_noticias set status = 'Aguardando em fila <br> <IMG alt=\'*\' src=\'images/sending.gif\' border=0>' where id_noticia = $2"
    sleep 10

  else

    echo "executando" > /tmp/sms.lock
    EXECUTANDO="TRUE"
    /usr/bin/mysql asteriskcdrdb -e "select concat(sc.dsc_nome,':', sc.telefone,':', sn.dsc_noticia) from sms_celulares sc, sms_noticias sn where sc.id_grupo = sn.id_grupo and sc.id_grupo = $1 and sn.id_noticia = $2" | grep -v "dsc_nome" > /tmp/sms_1.txt
    /usr/bin/mysql asteriskcdrdb -e "update sms_noticias set status = '<IMG alt=\'*\' src=\'images/sending.gif\' border=0>' where id_noticia = $2"
    while read MinhaLinha
    do
      # Nome do usuario do telefone
      USUARIO=`echo $MinhaLinha | cut -d":" -f1`
      # Numero do telefone
      TELEFONE=`echo $MinhaLinha | cut -d":" -f2`
      # Noticia
      NOTICIA=`echo $MinhaLinha | cut -d":" -f3`
      NOTICIA=`echo ${NOTICIA} | sed "s/<nome>/${USUARIO}/g"`
      # Envio de mensagem SMS
      /usr/sbin/asterisk -rx "khomp sms b1c0 ${TELEFONE} ${NOTICIA}" 
    done < /tmp/sms_1.txt
    /usr/bin/mysql asteriskcdrdb -e "update sms_noticias set status = '<IMG alt=\'*\' src=\'images/done.png\' border=0>' where id_noticia = $2"
    /usr/bin/mysql asteriskcdrdb -e "update sms_noticias set dt_enviado = now() where id_noticia = $2"
    rm -f /tmp/sms.lock
  fi
done

