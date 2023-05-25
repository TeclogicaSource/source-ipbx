<?php













































function diag_ipbx_Snippet1(&$params)
{
    $file = fopen('/proc/uptime', 'r');
    if (!$file) return 'Opening of /proc/uptime failed!';
    $data = fread($file, 128);
    if ($data === false) return 'fread() failed on /proc/uptime!';
    $upsecs = (int)substr($data, 0, strpos($data, ' '));
    $uptime = Array (
        'days' => floor($data/60/60/24),
        'hours' => $data/60/60%24,
        'minutes' => $data/60%60,
        'seconds' => $data%60
    );

    echo $uptime['days'] . ' dias e ' .
    $uptime['hours'] . ' horas e ' .
    $uptime['minutes'] . ' minutos';
;
}














































function diag_ipbx_Snippet11(&$params)
{
$uptime = trim( shell_exec( 'sudo /usr/sbin/asterisk -rx "core show uptime"' ) );

if(!preg_match('/Unable to connect/', $uptime)) {
$uptime = preg_split('/\n/', $uptime);

$uptime = explode(':', $uptime[0]);

$uptime[1] = str_replace(
	array('minutes', 'seconds', 'days', 'hours'), 
	array('minutos', 'segundos', 'dias', 'horas'), 
	$uptime[1]);

$uptime = str_replace(',', ' e', $uptime[1]);

echo trim($uptime);
} else {
	echo 'Offline';
}
;
}














































function diag_ipbx_Snippet12(&$params)
{
$df = trim( shell_exec( 'df | grep -v "tmpfs"' ) );
$df = preg_split('/\n/', $df);
unset($df[0]);

$df = preg_replace('/( )+/', ' ', $df);

$all_df = array();
foreach($df as $row) {
	$all_df[] = explode(' ', $row);	
}
/*
$last = count($all_df) - 1;
foreach($all_df as $row) {
*/
$last = count($all_df) - 1;
$lastDiskUsed="";
$isWrong=false;
foreach($all_df as $row) {

	if($isWrong){
	 $row[0] = $lastDiskUsed;
	 $isWrong = false;
	}

	$lastDiskUsed = $row[0];

	if(count($row) < 2){
	 $isWrong=true;
	 continue;
	}

	$row[1] /= 1024;
	$row[2] /= 1024;
	$row[3] /= 1024;
	$row[4] = preg_replace('/%/', '', $row[4]) * 2;

	echo 'Nome do disco: ' . $row[0] . '<br />';
	echo 'Espaço Total: ' . number_format($row[1], 0, '', '') . ' MB' . '<br />';
	echo 'Espaço Usado: ' . number_format($row[2], 0, '', '') . ' MB' . '<br />';
	echo '<p style="margin: 0;">';
	echo "<img src='images/red.gif' width=". $row[4] . " height=10 />";
	echo "<img src='images/blue.gif' width=". (200 - $row[4])." height=10 />";
	echo '</p>';
	echo 'Espaço Disponível: ' . number_format($row[3], 0, '', '') . ' MB' . '<br />';

	if($all_df[$last][5] != $row[5]) {
		echo 'Montado em: ' . $row[5] . '<br />' . '<br />';
	} else {
		echo 'Montado em: '. $row[5];
	}
}


;
}














































function diag_ipbx_Snippet13(&$params)
{
$processors = shell_exec('cat /proc/cpuinfo | grep -i "processor" | wc -l');



$uptime = trim( shell_exec( 'uptime' ) );

$uptime = preg_match('/average.*/', $uptime, $matches);

$uptime = explode(',', $matches[0]);

$uptime = preg_replace('/[a-z:]/', '', $uptime[0]);

$uptime = trim($uptime);



if($uptime > $processors) {

	echo '<font color="red">' . $uptime . '</font>';

} elseif(($processors * 0.75) < $uptime) {

	echo '<font color="orange">' . $uptime . '</font>';

} else {

	echo '<font color="green">' . $uptime . '</font>';

}
;
}














































function diag_ipbx_Snippet14(&$params)
{
$df = trim( shell_exec( 'df -i | grep -v "tmpfs"' ) );
$df = preg_split('/\n/', $df);
unset($df[0]);

$df = preg_replace('/( )+/', ' ', $df);

$all_df = array();
foreach($df as $row) {
	$all_df[] = explode(' ', $row);	
}
/*
$last = count($all_df) - 1;
foreach($all_df as $row) {
*/

$last = count($all_df) - 1;
$lastDiskUsed="";
$isWrong=false;
foreach($all_df as $row) {

	if($isWrong){
	 $row[0] = $lastDiskUsed;
	 $isWrong = false;
	}

	$lastDiskUsed = $row[0];

	if(count($row) < 2){
	 $isWrong=true;
	 continue;
	}

	$row[1] /= 1024;
	$row[2] /= 1024;
	$row[3] /= 1024;

	echo 'Nome do disco: ' . $row[0] . '<br />';
	echo 'Espaço Total: ' . number_format($row[1], 0, '', '') . ' MB' . '<br />';
	echo 'Espaço Usado: ' . number_format($row[2], 0, '', '') . ' MB' . '<br />';
	echo '<p style="margin: 0;">';
	echo "<img src='images/red.gif' width=". $row[4] . " height=10 />";
	echo "<img src='images/blue.gif' width=". (200 - $row[4])." height=10 />";
	echo '</p>';
	echo 'Espaço Disponível: ' . number_format($row[3], 0, '', '') . ' MB' . '<br />';

	if($all_df[$last][5] != $row[5]) {
		echo 'Montado em: ' . $row[5] . '<br />' . '<br />';
	} else {
		echo 'Montado em: '. $row[5];
	}
}


;
}














































function diag_ipbx_Snippet15(&$params)
{
$memory = preg_split('/\n/', file_get_contents( '/proc/meminfo' ));

$memory = str_replace('kB', 'MB', $memory);

$memoryArray = array();

foreach ($memory as $line) {

	if($line)

	list($key, $val) = explode(":", $line);

	$val = substr_replace($val, '', -2, 2);

	$memoryArray[$key] = trim($val);

}

$memoryArray['MemTotal'] /= 1024;

$memoryArray['MemFree'] /= 1024;

$memoryArray['Buffers'] /= 1024;

$memoryArray['Cached'] /= 1024;

$memoryArray['SwapTotal'] /= 1024;

$memoryArray['SwapFree'] /= 1024;

$total = $memoryArray['MemTotal'];

$partial = ($memoryArray['MemFree'] + $memoryArray['Cached']) * 100;

$percent = $partial / $total;

echo 'Total de Memória RAM: ' . number_format($memoryArray['MemTotal'], 0, '', '') . ' MB' . '<br />';

echo 'Memória RAM disponível: ' . number_format($memoryArray['MemFree'], 0, '', '') . ' MB'. '<br />';

echo 'Cache: ' . number_format($memoryArray['Cached'], 0, '', '') . ' MB';

echo '<p style="margin: 0;">';

echo "<img src='images/red.gif' width=". ($percent * 1.3) . " height=10 />";

echo "<img src='images/blue.gif' width=". (130 - $percent) ." height=10 />";

echo '</p>';

echo '<p style="margin: 0;">';

echo 'Buffers: ' . number_format($memoryArray['Buffers'], 0, '', '') . ' MB'. '<br /><br />';

echo 'Total de memória SWAP: ' . number_format($memoryArray['SwapTotal'], 0, '', '') . ' MB' . '<br />';

echo "<img src='images/red.gif' width=". ( ($memoryArray['SwapTotal'] - $memoryArray['SwapFree'] ) / 12 ) . " height=10 />";

echo "<img src='images/blue.gif' width=". ($memoryArray['SwapFree'] / 12 ) ." height=10 />";

echo '</p>';

echo 'Memória SWAP Disponível ' . number_format($memoryArray['SwapFree'], 0, '', '') . ' MB' . '<br />';
;
}














































function diag_ipbx_Snippet16(&$params)
{
$users = shell_exec('cat /etc/passwd | grep -i ":x:0"');
$users = preg_split('/\n/', $users);

foreach ($users as $user) {
	$pos = strpos($user, ':x:0');
	echo substr($user, 0, $pos) . '<br />';
}
;
}














































function diag_ipbx_Snippet17(&$params)
{
$system = shell_exec( 'cat /etc/redhat-release' );

echo $system;
;
}














































function diag_ipbx_Snippet18(&$params)
{
$asterisk = shell_exec( 'sudo /usr/sbin/asterisk -rx "core show version"' );

if (!preg_match('/Unable to connect/', $asterisk)) {
	$pos = strpos($asterisk, 'built');
	echo trim(substr($asterisk, 0, $pos));
} else {
	echo 'Offline';
}

;
}














































function diag_ipbx_Snippet19(&$params)
{
$data = shell_exec('ifconfig');

	exec('sudo chown apache.apache -R /etc/sysconfig/network-scripts');

	$interfaces = array();

	$counter = 0;

	echo '<style>strong:first-child { margin-left: 0px; } strong { margin-left:15px; } input[type=text] { text-align: left; width: 100px; margin: 0 !important; height: 20px; float: none;}</style>';

	foreach (preg_split("/\n\n/", $data) as $int) {

		$int2 = $int;

		preg_match("/^([A-z]*\d.*?)\s+Link\s+encap:([A-z]*)\s+HWaddr\s+([A-z0-9:]*).*" .

			"inet addr:([0-9.]+).*Bcast:([0-9.]+).*Mask:([0-9.]+).*" .

			"MTU:([0-9.]+).*Metric:([0-9.]+).*" .

			"RX packets:([0-9]+).*errors:([0-9.]+).*dropped:([0-9.]+).*overruns:([0-9.]+).*frame:([0-9.]+).*" .

			"TX packets:([0-9.]+).*errors:([0-9.]+).*dropped:([0-9.]+).*overruns:([0-9.]+).*carrier:([0-9.]+).*collisions:([0-9.]+).*" .

			"RX bytes:([0-9.]+).*\((.*)\).*TX bytes:([0-9.]+).*\((.*)\)" .

			"/ims", $int, $regex);

		preg_match("/^([A-z]*\d[:]\d)\s+Link\s+encap:([A-z]*)\s+HWaddr\s+([A-z0-9:]*).*" .

			"inet addr:([0-9.]+).*Bcast:([0-9.]+).*Mask:([0-9.]+).*" .

			"MTU:([0-9.]+).*Metric:([0-9.]+).*" .

			"/ims", $int2, $regex2); 

		if(isset($regex2)) {

			$regex = array_merge($regex, $regex2);

		}

		if (!empty($regex)) {

			$counter++;

			$submit = 'submit'.$counter;

			$interface = array();

			$interface['name'] = $regex[1];

			$ini = parse_ini_file('/etc/sysconfig/network-scripts/ifcfg-'.$interface['name']);

			$interface['type'] = $regex[2];

			$interface['ip'] = $regex[4];

			$interface['broadcast'] = $regex[5];

			$interface['netmask'] = $regex[6];

			$interface['mtu'] = $regex[7];

			$interface['metric'] = $regex[8];

			echo '<style>strong:first-child { margin-left: 0px; } strong { margin-left:15px; } input[type=text] { text-align: left; width: 100px; margin: 0 !important; height: 20px; float: none;}</style>';

			echo '<div class="net" style="width: 100%; border: 2px solid #D1DCEF; float: left; margin-top: 10px;">';

			echo '<form method="post" action="" class="network" style="padding: 5px; float: left;">';

			echo '<p style="font-size: 14px; margin: 0 0 0;"> <strong>&rarr; Nome: </strong>' . $interface['name'] . " ({$interface['type']})";

			echo '<strong>Endereço IP: </strong>'. "<input type='text' value={$interface['ip']} name='ip' />";

			echo '<strong>Máscara de rede: </strong>'. "<input type='text' value={$interface['netmask']} name='netmask' />";

			echo '<strong>Gateway: </strong>' . "<input type='text' value='{$ini['GATEWAY']}' name=gateway />";

			if(isset($regex[9])) {

				$interface['rx']['packets'] = (int) $regex[9];

				$interface['rx']['errors'] = (int) $regex[10];

				$interface['rx']['dropped'] = (int) $regex[11];

				$interface['rx']['overruns'] = (int) $regex[12];

				$interface['rx']['frame'] = (int) $regex[13];

				$interface['rx']['bytes'] = (int) $regex[19];

				$interface['rx']['hbytes'] = (int) $regex[20];

				$interface['tx']['packets'] = (int) $regex[14];

				$interface['tx']['errors'] = (int) $regex[15];

				$interface['tx']['dropped'] = (int) $regex[16];

				$interface['tx']['overruns'] = (int) $regex[17];

				$interface['tx']['carrier'] = (int) $regex[18];

				$interface['tx']['collisions'] = (int) $regex[19];

				$interface['tx']['bytes'] = (int) $regex[21];

				$interface['tx']['hbytes'] = (int) $regex[22];  

				if(($interface['rx']['errors'] + $interface['rx']['dropped'] + $interface['rx']['overruns'] + $interface['rx']['collisions']) == 0) {

					echo '<font color="green">';

				} else {

					echo '<font color="red">';

				}

				echo '<div class="info" style="float: left; text-align: left; padding-left: 5px;">';

				echo '<strong>Informações Recebidas:</strong>';

				echo ' Erros: ' . $interface['rx']['errors'];

				echo ' Dropped: ' . $interface['rx']['dropped'];

				echo ' Overruns: ' .$interface['rx']['overruns'] . '<br />';

				echo '<strong style="margin-left: 0;">Informações Transimitidas: </strong>';

				echo ' Erros: ' . $interface['tx']['errors'];

				echo ' Dropped: ' . $interface['tx']['dropped'];

				echo ' Overruns: ' .$interface['tx']['overruns'];

				echo ' Collisions: ' .$interface['tx']['collisions'].'<br /><br />'; 

				echo '</font>';

				if (strpos($interface['name'], '.')) {

					echo '<input type="submit" name="submit'.$counter.'" value="Alterar" />';

					echo '<input type="submit" name="submit'.$counter.'" value="Remover" />';

				} else {

					echo '<input type=hidden name="interface" value="'.$interface['name'].'" />';

					echo '<input  style="margin-left: 15px;" type="submit" name="submit'.$counter.'" value="Alterar" />';

					

					echo '<input type="button" name="vlan_submit" value="Incluir VLAN" class="vlan-include" />';

					echo '<input type="button" name="virtual_submit" value="Incluir IP Virtual" class="virtual-include" />';

					echo '<input type="button" name="virtual_submit" value="Incluir Rota" class="add-route" />';

					echo '<input type="button" value="Mostrar Rotas" class="show-routes" id="'. $interface['name'] . '"/>';

					$url = '/etc/sysconfig/network-scripts/route-'.$interface['name'];

					if (file_exists($url)) {

						$ini = parse_ini_file($url);

						echo '<br />';

						$inichunk = array_chunk($ini, 3, true);

						echo '<div class="routes-block" id="'.$interface['name'].'" style="margin-left: 15px; display: none;">';

						foreach ($inichunk as $key => $value) {

							foreach ($value as $k => $v) {

								$id = preg_replace('/[^\d]/', '', $k);

								switch ($k) {

									case strpos($k, 'GATEWAY'):

									echo '</form></br><form method="post" action=""><b>Gateway:</b> '.$v.'<br />';

									continue;

									default;

									case strpos($k, 'NETMASK'):

									echo '<b>Netmask:</b> '.$v.'<br />';

									continue;

									case strpos($k, 'ADDRESS'):

									echo '<input type=hidden name="selected-route" value="'.$id.'"/>';

									echo '<input type=hidden name="interface" value="'.$interface['name'].'"/>';

									echo '<b>Endereço:</b> '.$v.'<br /><input type="submit" name="delete-route" value="Excluir" /></form><br /><br/>';

								}

							}

						}

						echo '</div>';

					}

				}

				echo '</div>';

			} else {

				echo '<br />';

				echo '<input type="hidden" name="interface" value="'.$interface['name'].'" />';

				echo '<input style="margin-left: 15px;" type="submit" name="submit'.$counter.'" value="Alterar" />';

				echo '<input type="submit" name="submit'.$counter.'" value="Remover" />';

			}		

			$submit = 'submit'.$counter;

			if(isset($_POST[$submit])) {

				$ini = parse_ini_file('/etc/sysconfig/network-scripts/ifcfg-'.$_POST['interface']);

				$action = $_POST[$submit];

				if ($action == 'Alterar') {

					$ini['IPADDR'] = $_POST['ip'];

					$ini['NETMASK'] = $_POST['netmask'];

					if($_POST['gateway']) {

						$ini['GATEWAY'] = $_POST['gateway'];		

					} else {

						unset($ini['GATEWAY']);

					}

					if($ini['VLAN']) {

						$ini['VLAN'] = 'yes';

					}

					$iniString = "";

					foreach ($ini as $key => $value) {

						$iniString .= "$key=$value".PHP_EOL;

					}

					file_put_contents('/etc/sysconfig/network-scripts/ifcfg-'.$_POST['interface'], $iniString);

					exec('sudo /etc/init.d/network restart');

					unset($_POST[$submit]);

					echo '<script type="text/javascript">window.history.back(-1);</script>';

				} elseif ($action == 'Remover') {

					exec('sudo ifdown '.$interface['name']);

					exec('sudo rm -f /etc/sysconfig/network-scripts/ifcfg-'.$interface['name']);

					exec('sudo /etc/init.d/network restart');

					unset($_POST[$submit]);

					echo '<script type="text/javascript">window.history.back(-1);</script>';

				}

			}

			if (isset($_POST['vlan_submit'])) {

				if (intval($_POST['vlan-id']) > 4096 || intval($_POST['vlan-id']) == 0) {

					echo '<font color=red style="float: left; width: 100%; margin-left: 15px;"><br />Por favor, escolha um id entre 0 e 4096.</font>';

					unset($_POST['vlan_submit']);

				} else {

					$ini = parse_ini_file('/etc/sysconfig/network-scripts/ifcfg-'.$_POST['interface']);

					exec('sudo cp /etc/sysconfig/network-scripts/ifcfg-'.$_POST['interface']. ' /etc/sysconfig/network-scripts/ifcfg-'.$_POST['interface'].'.'.$_POST['vlan-id']);

					$ini['DEVICE'] = $_POST['interface'] . '.' . $_POST['vlan-id'];

					$ini['GATEWAY'] = '';

					$ini['VLAN'] = 'yes';

					$ini['IPADDR'] = $_POST['vlan-ip'];

					$iniString = "";

					foreach ($ini as $key => $value) {

						$iniString .= "$key=$value".PHP_EOL;

					}

					exec('sudo chown apache.apache /etc/sysconfig/network-scripts/ifcfg-'.$_POST['interface'].'.'.$_POST['vlan-id']);

					file_put_contents('/etc/sysconfig/network-scripts/ifcfg-'.$_POST['interface'].'.'.$_POST['vlan-id'], $iniString);

					exec('sudo /etc/init.d/network restart');

					unset($_POST['vlan_submit']);

					echo '<script type="text/javascript">window.history.back(-1);</script>';

				}

			}

			if (isset($_POST['virtual_submit'])) {

				$ini = parse_ini_file('/etc/sysconfig/network-scripts/ifcfg-'.$_POST['interface']);

				$alias = shell_exec('ls /etc/sysconfig/network-scripts/ | grep "ifcfg-" | grep ":"');

				$array = explode(PHP_EOL, trim($alias));

				foreach ($array as $key => $value) {

					$position = strpos($value, ':');

					$array[$key] = substr($value, $position + 1, strlen($value));

				}

				$output = array_diff(range(1, max($array)), $array);

				if ($output[0] == '0' || !$output) {

					$alias =  max($array) + 1;

				} else {

					$alias =  min($output);	

				}

				$ini['DEVICE'] = $_POST['interface'] . ':' . $alias;

				$ini['GATEWAY'] = '';

				$ini['IPADDR'] = $_POST['virtual-ip'];

				$iniString = "";

				foreach ($ini as $key => $value) {

					$iniString .= "$key=$value".PHP_EOL;

				}

				file_put_contents('/etc/sysconfig/network-scripts/ifcfg-'.$_POST['interface'].':'.$alias, $iniString);

				exec('sudo chown apache.apache /etc/sysconfig/network-scripts/ifcfg-'.$$_POST['interface'] .':'.$alias);

				exec('sudo /etc/init.d/network restart');

				unset($_POST['virtual_submit']);

				echo '<script type="text/javascript">window.history.back(-1);</script>';

			}

			if (isset($_POST['route-submit'])) {

				$url = '/etc/sysconfig/network-scripts/route-'.$_POST['interface'];

				if (!file_exists($url)) {

					$file = fopen($url, 'x+');

					$content  = 'GATEWAY0=' . $_POST['route-gateway'] . PHP_EOL;

					$content .= 'NETMASK0=' . $_POST['route-netmask'] . PHP_EOL;

					$content .= 'ADDRESS0=' . $_POST['route-ip'] . PHP_EOL;

					fwrite($file, $content);

					exec('sudo /etc/init.d/network restart');

					unset($_POST['route-submit']);

					echo '<script type="text/javascript">window.history.back(-1);</script>';

				} else {

					$array = parse_ini_file('/etc/sysconfig/network-scripts/route-'.$_POST['interface']);

					$array = array_chunk($array, 3, false);

					$content = "";

					foreach ($array as $key => $value) {

						$content .= "GATEWAY$key=".$value[0] . PHP_EOL;

						$content .= "NETMASK$key=".$value[1] . PHP_EOL;

						$content .= "ADDRESS$key=".$value[2] . PHP_EOL.PHP_EOL;

					}

					$id = count($array);

					if (isset($_POST['route-comment'])) {

						$content .= "#---- {$_POST['route-comment']} ----" . PHP_EOL;	

					}

					$content .= "GATEWAY$id=" . $_POST['route-gateway'] . PHP_EOL;

					$content .= "NETMASK$id=" . $_POST['route-netmask'] . PHP_EOL;

					$content .= "ADDRESS$id=" . $_POST['route-ip'] . PHP_EOL . PHP_EOL;

					file_put_contents($url, $content);

					exec('sudo /etc/init.d/network restart');

					unset($_POST['route-submit']);

					echo '<script type="text/javascript">window.history.back(-1);</script>';

				}

			}

			if (isset($_POST['delete-route'])) {

				$url = '/etc/sysconfig/network-scripts/route-'.$_POST['interface'];

				$ini = parse_ini_file('/etc/sysconfig/network-scripts/route-'.$_POST['interface']);

				$id = $_POST['selected-route'];		

				$ini = array_chunk(array_values($ini), 3);

				unset($ini[$id]);

				sort($ini);

				if (!$ini) {

					unlink($url);

				} else {

					$iniString = "";

					foreach ($ini as $key => $value) {

						$iniString .= 'GATEWAY'.$key . '=' . $value[0] . PHP_EOL;

						$iniString .= 'NETMASK'.$key . '=' . $value[1] . PHP_EOL;

						$iniString .= 'ADDRESS'.$key . '=' . $value[2] . PHP_EOL.PHP_EOL;

					}

					file_put_contents($url, $iniString);	

				}

				exec('sudo /etc/init.d/network restart');

				unset($_POST['delete-route']);

				echo '<script type="text/javascript">window.history.back(-1);</script>';

			}



			echo '</form>';

			echo '</div>';

			$interfaces[] = $interface;

		}

	}

	echo '

	<script type="text/javascript">

	$(document).ready(function() {

		$(".network").submit(function() {

			alert("Por favor, faça o logon novamente no endereço atualizado");

		});



$(".vlan-include").one(\'click\', function() {

	var form = $(this).parents(".net").find(".info");
	
	var html = "<div class=\'vlan\' method=\'post\' style=\'width: 250px;\'>";

	html += "<p> Endereço IP: <input type=text name=\'vlan-ip\' style=\'float: right;\' /></p><p>ID VLAN: <input type=text name=\'vlan-id\' style=\'float: right;\' /></p>";

	html += "<input type=\'submit\' name=\'vlan_submit\' value=\'Cadastrar VLAN\' /></div>";
	$(html).appendTo(form);

});



$(".virtual-include").one(\'click\', function() {

	var form = $(this).parents(".net").find(".info");

	var html = "<div class=\'virtual\' method=\'post\' style=\'margin: 15px 15px 15px 0; width: 250px;\'>";

	html += "<p> Endereço IP: <input type=text name=\'virtual-ip\' style=\'float: right;\' /></p>";

	html += "<input type=\'submit\' id=\'virtual-include\' name=\'virtual_submit\' value=\'Cadastrar IP Virtual\' /></div>";

	$(html).appendTo(form);

});



$(".add-route").one(\'click\', function() {

	var form = $(this).parents("form").find(".info");

	html = "<div class=\'route\' style=\'width: 250px; \'>";

	html += "<p>Endereço IP: <input type=text name=\'route-ip\' style=\'float: right;\' /></p>";

	html += "<p>Máscara de rede: <input type=text name=\'route-netmask\' style=\'float: right;\' /></p>";	

	html += "<p> Gateway: <input type=text name=\'route-gateway\' style=\'float: right;\' /></p>";

	html += "<p> Comentário: <input type=text name=\'route-comment\' style=\'float: right;\' /></p>";

	html += "<input type=\'submit\' name=\'route-submit\' value=\'Cadastrar Rota\' /></div>";

	$(html).appendTo(form);

});

$(".show-routes").click(function() {

	var div = $(this).parent(".info").find(".routes-block");

	div.toggle("fast");

});

});

</script>';
;
}














































function diag_ipbx_Snippet110(&$params)
{
$routes = shell_exec( 'route -n' );
$routes = preg_split('/\n/', trim($routes));

unset($routes[0], $routes[1]);

$all_routes = array();
foreach($routes as $route) {
	$all_routes[] = preg_split('/( )+/', $route);
}

$last = count($all_routes) - 1;
foreach($all_routes as $route) {
	echo 'Destino: ' . $route[0] . ', ';
	echo 'Gateway: ' . $route[1] . ', ';
	echo 'Genmask: ' . $route[2] . ', ';
	echo 'Flags: ' . $route[3] . ', ';

	if($all_routes[$last] == $route) {
	echo 'Face: ' . $route[7];
	} else {
	echo 'Face: ' . $route [7] . ', ' . '<br />';
}
}
;
}














































function diag_ipbx_Snippet111(&$params)
{
$on = '<img src="../images/on.png" />';

$off = '<img src="../images/off.png" />';

$apache = shell_exec('sudo /etc/init.d/httpd status');

if(strpos($apache, 'running')) {

	echo $on . '&nbsp;Apache ';

} else {

	echo $off . '&nbsp;Apache ';

}
;
}














































function diag_ipbx_Snippet112(&$params)
{
	$routes = shell_exec( 'route -n' );
	$routes = preg_split('/\n/', trim($routes));

	unset($routes[0], $routes[1]);

	$all_routes = array();
	foreach($routes as $route) {

		$all_routes[] = preg_split('/( )+/', $route);

	}

	$last = count($all_routes) - 1;
	foreach($all_routes as $route) {

		echo '<tr valign="top">';

		echo '<td valign="middle" align="center">' . $route[0] . '</td>';
		echo '<td valign="middle" align="center">' . $route[2] . '</td>';
		echo '<td valign="middle" align="center">' . $route[1] . '</td>';
		echo '<td valign="middle" align="center">' . $route[4] . '</td>';

		if($all_routes[$last] == $route) {

			echo '<td valign="middle" align="center">' . $route[7] . '</td>';

		} else {

			echo '<td valign="middle" align="center">' . $route[7] . '</td></tr>';

		}
	}
;
}














































function diag_ipbx_Snippet113(&$params)
{
$khomp = shell_exec('sudo asterisk -rx "khomp links errors show"');

if(!preg_match('/No such command/', $khomp)) {

	echo '<pre style="box-shadow: 1px 1px 3px 0px #000; width: auto;">';

	echo $khomp;

	echo '</pre>';	

} else {

	echo 'Driver da Khomp não foi detectado';

}


;
}














































function diag_ipbx_Snippet114(&$params)
{
$khomp = shell_exec('sudo asterisk -rx "khomp channels show"');

if(!preg_match('/No such command/', $khomp)) {

	echo '<pre style="box-shadow: 1px 1px 3px 0px #000; width: auto;">';

	echo $khomp;

	echo '</pre>';	

} else {

	echo 'Driver da Khomp não foi detectado';

}
;
}














































function diag_ipbx_Snippet115(&$params)
{
$khomp = shell_exec('sudo asterisk -rx "khomp summary"');

if(!preg_match('/No such command/', $khomp)) {

	echo '<pre style="box-shadow: 1px 1px 3px 0px #000; width: auto;">';

	echo $khomp;

	echo '</pre>';	

} else {

	echo 'Driver da Khomp não foi detectado';

}


;
}














































function diag_ipbx_Snippet116(&$params)
{
$on = '<img src="../images/on.png" />';

$off = '<img src="../images/off.png" />';

$mysql = shell_exec('sudo /etc/init.d/mysqld status');

if(strpos($mysql, 'running')) {

	echo $on . '&nbsp;Mysql ';

} else {

	echo $off . '&nbsp;Mysql ';

}
;
}














































function diag_ipbx_Snippet117(&$params)
{
$on = '<img src="../images/on.png" />';

$off = '<img src="../images/off.png" />';

$asterisk = shell_exec('sudo /etc/init.d/asterisk status');

if(strpos($asterisk, 'running')) {

	echo $on . '&nbsp;Asterisk ';

} else {

	echo $off . '&nbsp;Asterisk ';

}
;
}














































function diag_ipbx_Snippet118(&$params)
{
$on = '<img src="../images/on.png" />';

$off = '<img src="../images/off.png" />';

$fop2 = shell_exec('sudo /etc/init.d/fop2 status');

if(strpos($fop2, 'running')) {

	echo $on . '&nbsp;Fop2 ';

} else {

	echo $off . '&nbsp;Fop2 ';

}
;
}














































function diag_ipbx_Snippet119(&$params)
{
$on = '<img src="../images/on.png" />';

$off = '<img src="../images/off.png" />';

$iptables = shell_exec('sudo /etc/init.d/iptables status');

if(strpos($iptables, 'stopped')) {
	echo $off . '&nbsp;IpTables ';
} else {
	echo $on . '&nbsp;IpTables ';
}
;
}














































function diag_ipbx_Snippet120(&$params)
{
echo '<form method="post">';
if(isset($_POST['action'])) {
	if($_POST['action'] == 'restart') {
	exec('/etc/init.d/httpd restart');
	sleep(10);
	echo '<script type="text/javascript">window.history.back(-1);</script>';
}
}

echo '
<select name="action">
<option>Ação</option>
<option value="restart">Reiniciar</option>
</select>
<input type="submit" value="»" />
</form>';
;
}














































function diag_ipbx_Snippet121(&$params)
{
echo '<form method="post">';
if(isset($_POST['mysql_action'])) {
	if($_POST['mysql_action'] == 'restart') {
		exec('sudo /etc/init.d/mysqld restart');
		sleep(10);
	} elseif($_PSOT['mysql_action'] == 'start') {	
		exec('sudo /etc/init.d/mysqld start');
		sleep(10);
	}

	unset($_POST['action']);
}

echo '
<select name="action">
<option>Ação</option>
<option value="restart">Reiniciar</option>
<option value="start">Iniciar</option>
</select>
<input type="submit" value="»" />
</form>';
;
}














































function diag_ipbx_Snippet122(&$params)
{
echo '<form method="post">';
if(isset($_POST['ast_action'])) {
	if($_POST['ast_action'] == 'restart') {
		$handler = popen('sudo /etc/init.d/asterisk restart', 'r'); 
		$data = fgets($handler);

		if(strpos($data, 'OK')) {
			sleep(10);
			echo '<script type="text/javascript">window.history.back(-1);</script>';
		}
	} elseif($_POST['ast_action'] == 'stop') {
		exec('sudo /etc/init.d/asterisk stop');
		sleep(10);
		echo '<script type="text/javascript">window.history.back(-1);</script>';
	} elseif($_POST['ast_action'] == 'start') {	
		$handler = popen('sudo /etc/init.d/asterisk start', 'r'); 
		$data = fgets($handler);

		if(strpos($data, 'OK')) {
			sleep(5);
			echo '<script type="text/javascript">window.history.back(-1);</script>';
		}
	}

	unset($_POST['action']);
}

echo '
<select name="ast_action">
<option>Ação</option>
<option value="restart">Reiniciar</option>
<option value="stop">Parar</option>
<option value="start">Iniciar</option>
</select>
<input type="submit" value="»" />
</form>';
;
}














































function diag_ipbx_Snippet123(&$params)
{
echo '<form method="post">';
if(isset($_POST['fop_action'])) {
	if($_POST['fop_action'] == 'restart') {
		exec('sudo /etc/init.d/fop2 restart');
		sleep(10);
		echo '<script type="text/javascript">window.history.back(-1);</script>';
	} elseif($_POST['fop_action'] == 'stop') {
		exec('sudo /etc/init.d/fop2 stop');
		sleep(10);
		echo '<script type="text/javascript">window.history.back(-1);</script>';
	} elseif($_POST['fop_action'] == 'start') {	
		exec('sudo /etc/init.d/fop2 start');
		sleep(10);
		echo '<script type="text/javascript">window.history.back(-1);</script>';
	}
	unset($_POST['action']);
}

echo '
<select name="fop_action">
<option>Ação</option>
<option value="restart">Reiniciar</option>
<option value="stop">Parar</option>
<option value="start">Iniciar</option>
</select>
<input type="submit" value="»" />
</form>';
;
}














































function diag_ipbx_Snippet124(&$params)
{
echo '<form method="post">';
if(isset($_POST['ipt_action'])) {
	if($_POST['ipt_action'] == 'restart') {
		exec('sudo /etc/init.d/iptables restart');
		sleep(10);
		echo '<script type="text/javascript">window.history.back(-1);</script>';
	} elseif($_POST['ipt_action'] == 'stop') {
		exec('sudo /etc/init.d/iptables stop');
		sleep(10);
		echo '<script type="text/javascript">window.history.back(-1);</script>';
	} elseif($_POST['ipt_action'] == 'start') {	
		exec('sudo /etc/init.d/iptables start');
		sleep(10);
		echo '<script type="text/javascript">window.history.back(-1);</script>';
	}

	unset($_POST['action']);
}

echo '
<select name="ipt_action">
<option>Ação</option>
<option value="restart">Reiniciar</option>
<option value="stop">Parar</option>
<option value="start">Iniciar</option>
</select>
<input type="submit" value="»" />
</form>';
;
}














































function diag_ipbx_Snippet125(&$params)
{
$sip = shell_exec('sudo asterisk -rx "sip show registry"');

echo '<pre>';
echo $sip;
echo '</pre>';

;
}














































function diag_ipbx_Snippet126(&$params)
{
shell_exec('sudo chown apache.apache /etc/resolv.conf');
shell_exec('sudo chmod 600 /etc/resolv.conf');

$search = shell_exec('cat /etc/resolv.conf | grep search');
$a = substr($search, 7);
$size = (strlen($a) > 1) ? strlen($a) * 10 : 100;

echo "<input type='text' id='search-input' name='search' value='{$a}' style='width:500px' />";
;
}














































function diag_ipbx_Snippet127(&$params)
{
$nameserver  = shell_exec('cat /etc/resolv.conf | grep nameserver');
$nameserver = explode(PHP_EOL, trim($nameserver));
echo '<form id="dns-form" action="" method="POST">';
echo '<div id="dns-inputs">';
foreach ($nameserver as $n) {
	$n = trim(substr($n, 11));	
	echo "<input type='text' name='nameserver[]' value='{$n}' /> <br />";
}

echo '</div>';
echo '<button type="button" id="add-dns">+</button>';
echo '</tr><tr>';
echo '<td align=center><input type="submit" value="Alterar" name="dns_submit" /></td></tr>';
echo '</form>';

echo <<<SCRIPT
<script type="text/javascript">
	$(function() {
		var search = $('input[name=search]').clone();
		search.css({display: 'none'});
		search.appendTo($('#dns-inputs'));
		$('#add-dns').click(function() {
			$("<input type='text' name='nameserver[]'/></br>").insertBefore($(this));
		});

		$('#dns-form').submit(function() {
			search.attr('value', $('#search-input').val());
		});
	});
	
</script>
SCRIPT;

if (isset($_POST['dns_submit'])) {
	$content = 'search ' . $_POST['search'] . PHP_EOL;
	foreach ($_POST['nameserver'] as $n) {
		if (!empty($n)) {
			$content .= 'nameserver ' . $n . PHP_EOL;
		}
	} 

	file_put_contents('/etc/resolv.conf', $content);
	echo '<script type="text/javascript">window.history.back(-1);</script>';
}
;
}

?>