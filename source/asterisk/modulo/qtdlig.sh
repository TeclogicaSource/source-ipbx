LIGACAO=`/usr/sbin/asterisk -rx "show channels" | grep -i "@icavi" | wc -l`
/usr/sbin/asterisk -rx "database put LIG_VOIP GVT ${LIGACAO}"
