<?php
require_once('connection.php');
include('lib_system.php');
include('lib_android.php');
include('chart_summary.php');
include('bot_sendmsg.php');

	$arpost			= $_GET;
	if (count($arpost) == 0) {
		$arpost			= $_POST;
	}
	if (count($arpost) == 0) {
		echo "Parameter masih kosong..."; exit;
	}
	$yy				= date("Y");
	$userid			= strtolower($arpost['userid']);
	$devid			= $arpost['devid'];
	$mode			= $arpost['mode'];
	$tlg_par		= "";
	if (isset($arpost["par1"])) {
		$par1			= strtolower($arpost["par1"]); // userid
		$tlg_par	.= "par1='$par1', ";
	}
	if (isset($arpost["par2"])) {
		$par2			= strtolower($arpost["par2"]); // recid
		$tlg_par	.= "par2='$par2', ";
	}
	if (isset($arpost["par3"])) {
		$par3			= $arpost["par3"]; // userid
		$tlg_par	.= "par3='$par3', ";
	}
	if (isset($arpost["par4"])) {
		$par4			= $arpost["par4"]; // recid
		$tlg_par	.= "par4='$par4', ";
	}
	
	$arpost["url"]	= basename($_SERVER['SCRIPT_FILENAME']);
	$valid			= false;
	$aruser			= get_records("SELECT a.*, r.* FROM s_user a left join s_role r ON (a.role=r.role) WHERE a.isactive=1 and a.userid='" . $userid . "'");
	$aruser			= $aruser[0];
	$list_unit		= $aruser["list_unit"];
	$archart		= array();
	$ar				= array();
	$ar2			= array();
	
?>