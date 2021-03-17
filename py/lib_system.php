<?

function get_records($sql) {
	include('connection.php');
	$recs				= array();
	$rs					= mysqli_query($dbhandle, $sql) or die(mysqli_error());
	$row_rs 			= mysqli_fetch_assoc($rs);
	$nrow	 			= mysqli_num_rows($rs);
	if ($nrow > 0) {
		do {
			array_push($recs, $row_rs);
		} while ($row_rs = mysqli_fetch_assoc($rs)); 
	}
	return $recs;
}


function array_col2row($ar, $preffix) {
	$arkeys		= array_keys($ar);
	$ar2		= array();
	$nlen		= strlen($preffix);
	for ($i=0; $i<count($arkeys); $i++) {
		$key	= $arkeys[$i];
		$val	= $ar["$key"];
		if ($preffix <> "") {
			$label	= substr($key, 0, $nlen);
			if ($label == $preffix) {
				$tmp	= array("label"=>substr($key, $nlen, strlen($key)-$nlen), "value"=>"$val");
				//print_r($tmp); echo nl2br("\n");
				array_push($ar2, $tmp);
			}
		} else {
			$tmp	= array("label"=>$key, "value"=>"$val");
			print_r($tmp); echo nl2br("\n");
			array_push($ar2, $tmp);
		}
	}
	return $ar2;
}

function dmy_ymd($cdate, $delim) {
	if ($cdate == "") {return $cdate; }
	if ($delim == "") {$delim = $date_delimiter;}
	list($dd, $mm, $yy) =  split($delim, $cdate, 3);
	$dd					= str_pad($dd, 2, "0", STR_PAD_LEFT);
	$mm					= str_pad($mm, 2, "0", STR_PAD_LEFT);
	$ret				= $yy . $delim . $mm . $delim . $dd;
	return $ret;
}

function ymd_dmy($cdate, $delim) {
	$cdate				= trim($cdate);
	$ctime				= "";
	if ($cdate == "undefined") {return ""; }
	if ($cdate == "") {return $cdate; }
	if (strpos($cdate, ":")>=10) {
		$artemp			= explode(" ", $cdate);
		$ctime			= trim($artemp[1]);
		$cdate			= trim($artemp[0]);
	}

	if ($delim == "") {$delim = $date_delimiter;}
	list($yy, $mm, $dd) =  split($delim, $cdate, 3);
	$dd					= str_pad($dd, 2, "0", STR_PAD_LEFT);
	$mm					= str_pad($mm, 2, "0", STR_PAD_LEFT);
	$ret				= $dd . $delim . $mm . $delim . $yy;
	if ($ctime <> "") {
		$ret			= $ret . " " . $ctime;
	}
	return $ret;
}
function log_update($group1, $table_name, $mode, $recid, $spnotes, $str_log, $userid) {
	include('connection.php');
	$sql			= "INSERT INTO sys_logupdate (php, table_name, mode, recid, spnotes, str_log, userid) 
									VALUE ('$group1', '$table_name', '$mode', '$recid', '$spnotes', '$str_log', '$userid');";
	
	//txt_debug("tmp/debug.txt", $sql);
	mysqli_query($dbhandle, $sql);
	$rowid			= mysqli_insert_id($dbhandle);
	return $rowid;
}


function get_param($grpno) {
	include "connection.php";
	$kw			= array();
	$_sql 		= sprintf("SELECT kode_detail, detail_desc, detail_desc2 
									FROM sys_general_detail WHERE kode_master='%s';", $grpno);
	$rs 		= mysqli_query($dbhandle, $_sql) or die(mysql_error());
	$row_rs 	= mysqli_fetch_assoc($rs);
	$varname 	= "kode_detail";
	do {
		$l_desc			= trim($row_rs["kode_detail"]);
		$kw[$l_desc] 	= trim($row_rs["detail_desc"]);
	} while ( $row_rs = mysqli_fetch_assoc($rs) );
	return $kw;
}

function txt_diff_records($ar1, $ar2) {
	$arkey		= array_keys($ar1);
	$txt		= "";
	for ($i=0; $i<count($arkey);$i++) {
		$key	= $arkey[$i];
		if (($ar1[$key] <> $ar2[$key]) and ($key <> "lastupdate")) {
			$txt	.= "$key = [ " . $ar1[$key] . " ] => [ " . $ar2[$key] . " ] \n";
		}
	}
	return $txt;
}

function get_rpt($rptid) {
	include "connection.php";
	$tmp				= get_records("SELECT * FROM s_report WHERE rptid='$rptid' AND rptgrp='APK';");
	$ar_rpt				= array();
	$ar_rpt["debug"]	= "hidden";
	$sql				= "";
	$txt_err			= "";
	if (count($tmp) < 1) {
		$txt_err	= "Data SQL Report ($rptid) tidak ditemukan di system...";
	} else {
		$txt_file	= $tmp[0]["sql_file"];
		if (file_exists($txt_file)) {
			$handle 		= fopen($txt_file, "r");
			$rpt_setup 		= fread($handle, filesize($txt_file));
			fclose($handle);
			$tmp_str		= explode("[sql]", $rpt_setup);
			$sql			= $tmp_str[1];
			$sql			= str_replace("[end_sql]", "", $sql);
			
			$ar_tmp			= explode("\n", $tmp_str[0]);
			for ($i=0; $i<count($ar_tmp); $i++) {
				if ($ar_tmp[$i] <> '') {
					$par			= explode("=", trim($ar_tmp[$i]));
					$key			= trim($par[0]);
					$ar_rpt[$key]	= trim($par[1]);
				}
			}
		} else {
			$txt_err	= "File Source data $txt_file, tidak ditemukan di system... ($txt_file)";
		}
	}
	//if ($txt_err <> "") { echo $txt_err; }
	$ar_rpt["sql"]		= $sql;
	$ar_rpt["err"]		= $txt_err;
	return $ar_rpt;
}

function txt_debug($filename, $txt) {
	if (file_exists($filename)) {unlink($filename);}
	if (!$handle = fopen($filename, "a")) {
		echo "Cannot open file ($filename)";
		exit;
	}
	fwrite($handle, "$txt \n");
	fclose($handle);
}

$par1		= "";
$par2		= "";
$par3		= "";
$par4		= "";
$errorstr	= "";
?>