#!/bin/bash

# Descricao:
# Autor:
# Data:

ORIGEM=$1
DESTINO=$2


echo "========= Processando Rechamada ================"
echo "Ramal de origem: $ORIGEM"
echo "Ramal de destino $DESTINO"
echo "================================================"


LOOP=true


while (${LOOP})
do
	/usr/sbin/asterisk -rx "core show channels" | grep -i $ORIGEM 1> /dev/null 2> /dev/null
	
	if [ $? -eq 0 ]; then		
		echo "chamada em execucao"		
		sleep 1
	else
		LOOP=false
		echo "Chamada encerrada, realizar ligacao para $DESTINO"
		/usr/bin/php /etc/asterisk/modulo/dial.php $ORIGEM $DESTINO
	fi
done
