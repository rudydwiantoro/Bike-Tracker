<?php 
$secure_key		= "Tuhan_beserta_kita";
$sys_delimiter	= "|";


function get_app_info($arpost) {
	include('connection.php');
	$userid			= $arpost['userid'];
	$devid			= $arpost['devid'];
	$mode			= $arpost['mode'];
	$ver			= $arpost['ver'];
	$url_par		= print_r($arpost, TRUE);
	$php			= $arpost["url"];
	$sql			= "INSERT INTO s_android_log (devid, ver, userid, mode, url, url_par) VALUE ('$devid', '$ver', '$userid', '$mode', '$php', '$url_par');";
	//txt_debug("tmp/debug.txt", $sql);
	mysqli_query($dbhandle, $sql);
	$rowid			= mysqli_insert_id($dbhandle);
	$ar				= get_records("SELECT  * FROM s_android ORDER BY id DESC LIMIT 1");
	$ar				= $ar[0];
	$ar["trxid"]	= $rowid;
	$ar["dbname"]	= $dbname;
	$ar["errorstr"]	= "";
	return $ar;
}


?>