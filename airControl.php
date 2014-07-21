<?php
# require command define
require_once('define.php');

# set GET message
$cmd = 'off';
if ($_GET['cmd']) {
    $cmd = $_GET['cmd'];
}

# set POST message
if ($argv[1]) {
    $cmd = $argv[1];
}

switch ($cmd) {
	case 'up':
		$message = $airControl_up;
		break;
	case 'down':
		$message = $airControl_down;
		break;
	case 'on':
		$message = $airControl_on;
		break;
	case 'off':
		$message = $airControl_off;
		break;
	default:
		$message = $airControl_off;
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
