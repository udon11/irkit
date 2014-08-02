<?php
/**
 *  IRKitへコマンドを実行するためのスクリプト
 *  $clientkey, $deviceid, $messageは'define.php'で定義します
 *
 *      $clientKey  string 
 *      $deviceId   string
 *      $message    array
 */

# APIを投げるために必要な$clientKey, $deviceId, $messageを読み込む
require_once dirname(__FILE__).'/../../define.php';

# GETで受け取ったコマンドをセット
$cmds = array();
if (isset($_GET['cmds'])) {  # 複数のコマンド
    foreach ($_GET['cmds'] as $cmd) {
        $cmds[] = $cmd;
    }
}

# TODO; 削除予定
if (isset($_GET['cmd'])) {  # 単独のコマンド
    $cmds[] = $_GET['cmd'];
}

# POSTで受け取ったコマンドをセット
# TODO: 複数対応
if (isset($argv[1])) {
    $cmds[] = $argv[1];
}

# 実行コマンドのログを吐く
$date = '['.date('Ymd H:i:s', time()).']';
error_log($date.' : commands = '.print_r($cmds,true)."\n",3,'/var/log/homeControl/homeControl.log');

# exec Commands
foreach($cmds as $cmd){
	$message = getMessage($cmd,$define);
	if ($message) {
		execCurl($clientkey, $deviceid, $message);
	}
}
# トップページへ遷移
moveTop();

/**
 * 受け取ったコマンドをマッピング
 *
 */
function getMessage($cmd, $define) {
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

function execCurl($clientkey, $deviceid, $message) {
	$postFields = array('clientkey' => $clientkey,
			    'deviceid'  => $deviceid,
		            'message'   => $message);

	# exec curl
	$cc = curl_init('https://api.getirkit.com/1/messages/'); 
    curl_setopt($cc, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($cc, CURLOPT_HEADER, true);
	curl_setopt($cc, CURLOPT_POST, true);
	curl_setOpt($cc, CURLOPT_POSTFIELDS, $postFields);

	curl_exec($cc);
	curl_close($cc);
}

/** 
 * ページトップへ戻る(JavaScript)
 *
 */
function moveTop() {
    echo '
<script type="text/javascript" language="JavaScript">
<!--
document.location = "/homeControl/";
-->
</script>
';
}
