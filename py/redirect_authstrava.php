<?

include('connection.php');

	$arpost			= $_GET;
	$url_par		= print_r($arpost, TRUE);
	$php			= $arpost["url"];
	$session_id		= session_id();
	$url_referer	=  $_SERVER['REQUEST_URI'];
	$action			= print_r($_SERVER, TRUE);
	$sql			= "INSERT INTO s_android_log (devid, ver, userid, sessid, url, url_par, action) VALUE ('$devid', '$ver', '$userid', '$session_id', '$url_referer', '$url_par', '$action');";
	$ret			= mysqli_query($dbhandle, $sql);
	echo $ret;

?>