<?php

	$info		= get_app_info($arpost);
	$trxid		= $info["trxid"];
	$sql		= "UPDATE s_android_log SET par1='$par1' WHERE id='$trxid'";
	mysqli_query($dbhandle, $sql);
	$sql		= "UPDATE s_android_log SET action='$list_unit' WHERE id='$trxid'";
	mysqli_query($dbhandle, $sql);

	$tmp		= json_encode(array(	'trxid'		=> $info["trxid"],
							'valid'		=> $valid,
							'mode'		=> $mode,
							'appid'		=> $info["id"],
							'appver'	=> $info["cversion"],
							'appdt'		=> $info["lastupdate"],
							'nresult'	=> count($ar),
							'result'	=> $ar,
							'result2'	=> $ar2,
							'chart'		=> $archart,
							'appinfo'	=> $info,
							));
	$tmp	= str_replace(":null", ":\"\"", $tmp);
	echo $tmp;
	mysqli_close($dbhandle);
	send_alert(array("tlg_msg"=>$userid . ", $mode \n(" . $devid. ")\n $tlg_par"));
	
?>