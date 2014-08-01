<?php
# require command define
require_once('/var/www/define.php');

# get Date
$date = '['.date('Ymd H:i:s', time()).']';

# set GET message
# 複数のコマンド
$cmds = array();
if (isset($_GET['cmds'])) {    
    foreach ($_GET['cmds'] as $cmd) {
        $cmds[] = $cmd;
    }
}
# 単独のコマンド
if (isset($_GET['cmd'])) { 
    $cmds[] = $_GET['cmd'];
}

# set POST message
if (isset($argv[1])) {
    $cmds[] = $argv[1];
}

# 実行コマンドのログを吐く
error_log($date.' : commands = '.print_r($cmds,true)."\n",3,'/var/log/homeControl/homeControl.log');

# exec Commands
foreach($cmds as $cmd){
	$message = getMessage($cmd,$define);
	if ($message) {
		execCurl($clientkey, $deviceid, $message);
	}
	sleep(2);
}

//ページトップへ戻る(JavaScript)
echo '
<script type="text/javascript" language="JavaScript">
<!--
document.location = "/homeControl/";
-->
</script>
';

function getMessage($cmd,$define){
	$message = null;
	switch ($cmd) {
		# for Light
		case 'light_on':
			$message = $define['light_on'];
			break;
		case 'light_off':
			$message = $define['light_off'];
			break;
		case 'light_up':
			$message = $define['light_up'];
			break;
		case 'light_down':
			$message = $define['light_down'];
			break;
		case 'light_mini':
			$message = $define['light_mini'];
			break;
		case 'light_cool':
			$message = $define['light_cool'];
			break;
		# for AirControl
		case 'air_on':
			$message = $define['airControl_on'];
			break;
		case 'air_off':
			$message = $define['airControl_off'];
			break;
		case 'air_up':
			$message = $define['airControl_up'];
			break;
		case 'air_down':
			$message = $define['airControl_down'];
			break;
		# for Greenfan
		case 'fan_power':
			$message = $define['greenfan_power'];
			break;
		case 'fan_up':
			$message = $define['greenfan_up'];
			break;
		case 'fan_down':
			$message = $define['greenfan_down'];
			break;
		case 'fan_timer':
			$message = $define['greenfan_timer'];
			break;
		case 'fan_light':
			$message = $define['greenfan_light'];
			break;
	}
	return $message;
}

function execCurl($clientkey, $deviceid, $message){
	$postFields = array('clientkey' => $clientkey,
			    'deviceid'  => $deviceid,
		            'message'   => $message);

	# exec curl
	$cc = curl_init('https://api.getirkit.com/1/messages/'); 
		curl_setopt($cc, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($cc, CURLOPT_HEADER, true);
	curl_setopt($cc, CURLOPT_POST, true);
	curl_setOpt($cc, CURLOPT_POSTFIELDS, $postFields);

	var_export(curl_exec($cc));
	curl_close($cc);
}
