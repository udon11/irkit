<?php
# require command define
require_once('define.php');

# set GET message
$cmd = 'power';
if ($_GET['cmd']) {
    $cmd = $_GET['cmd'];
}

# set POST message
if ($argv[1]) {
    $cmd = $argv[1];
}

switch ($cmd) {
	case 'up':
		$message = $greenfan_up;
		break;
	case 'down':
		$message = $greenfan_down;
		break;
	case 'timer':
		$message = $greenfan_timer;
		break;
	case 'light':
		$message = $greenfan_lignt;
		break;
	default:
		$message = $greenfan_power;
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
