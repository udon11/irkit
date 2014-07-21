<?php
# require command define
require_once('define.php');

# set GET message
$cmd = 'on';
if ($_GET['cmd']) {
    $cmd = $_GET['cmd'];
}

# set POST message
if ($argv[1]) {
    $cmd = $argv[1];
}

switch ($cmd) {
	case 'on':
		$message = $light_on;
		break;
	case 'off':
		$message = $light_off;
		break;
	case 'up':
		$message = $light_up;
		break;
	case 'down':
		$message = $light_down;
		break;
	case 'mini':
		$message = $light_mini;
		break;
	case 'cool':
		$message = $light_cool;
		break;
	default:
		$message = $light_on;
}

require_once('execCurl.php');

//ページトップへ戻る
echo '
<script type="text/javascript" language="JavaScript">
<!--
document.location = "/homeControl/";
-->
</script>
';
