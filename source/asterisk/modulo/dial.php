<?php

include '/var/www/html/include/teclogica/funcoes_gerais.php';

echo "Origem: ${argv[1]} Destino: ${argv[2]}\n";

$ORIGEM=$argv[1];
$DESTINO=$argv[2];

// Discagem para rechamada
dial($ORIGEM,$DESTINO, "P1P2P3P4P5P6");

?>
