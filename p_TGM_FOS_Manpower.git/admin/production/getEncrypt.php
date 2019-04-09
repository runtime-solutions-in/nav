<?php
	ob_start();
		
	require 'include/functions.php';
	
	$val = trim($_POST['val']);
	if ($val != '') {
		echo MyEncoder($val); exit();
	} else {
		echo '';
	}
?>	
	
	