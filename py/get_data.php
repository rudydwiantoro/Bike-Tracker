<?php 
/*
update m_warga set msts='-' where msts='';
update m_warga set gender='-' where gender='';
update m_warga set darah='-' where darah='';
update m_warga set job='-' where job='';
update m_warga set edu='-' where edu='';
update m_warga set agama='-' where agama='';
update m_warga set relasi='-' where relasi='';

*/

include ("get_data_header.php");
	
	switch ($mode) {
		
		case "SUMM_PRK":
		
			$row_h					= 75;
			//$ar					= summ_paroki($arpost);
			$result					= summ_paroki($arpost);
			$ar_summ_prk			= array_col2row($result["ar"], "v_");
			$list_h					= $row_h * count($ar_summ_prk);
			$ar[0]["list1"]			= $ar_summ_prk;
			$ar[0]["list2"]			= $result["list2"];
			$ar[0]["list_hrow"] 	= $list_h;
			// chart edu
			$ar[0]["pie_num1"]		= $result["ar"]["pie_num1"];
			$ar[0]["pie_txt1"]		= $result["ar"]["pie_txt1"];
			$ar[0]["pie_notes1"]	= $result["ar"]["pie_notes1"];
			$ar[0]["pie_label1"] 	= "Pendidikan";
			// chart job
			$ar[0]["pie_num2"]		= $result["ar"]["pie_num2"];
			$ar[0]["pie_txt2"]		= $result["ar"]["pie_txt2"];
			$ar[0]["pie_notes2"]	= $result["ar"]["pie_notes2"];
			$ar[0]["pie_label2"] 	= "Pekerjaan";
			// chart umur
			$ar[0]["pie_num3"]		= $result["ar"]["pie_num3"];
			$ar[0]["pie_txt3"]		= $result["ar"]["pie_txt3"];
			$ar[0]["pie_notes3"]	= $result["ar"]["pie_notes3"];
			$ar[0]["pie_label3"] 	= "Umur";
			// chart darah
			$ar[0]["pie_num4"]		= $result["ar"]["pie_num4"];
			$ar[0]["pie_txt4"]		= $result["ar"]["pie_txt4"];
			$ar[0]["pie_notes4"]	= $result["ar"]["pie_notes4"];
			$ar[0]["pie_label4"] 	= "G.Darah";
			break;
			
		case "SUMM_LING":
		
			$row_h					= 75;
			$result					= summ_ling($arpost);
			
			$ar_summ_prk			= array_col2row($result["ar"], "v_");
			$list_h					= $row_h * count($ar_summ_prk);
			$ar[0]["list1"]			= $ar_summ_prk;
			$ar[0]["list2"]			= $result["list2"];
			$ar[0]["list_hrow"] 	= $list_h;
			// chart edu
			$ar[0]["pie_num1"]		= $result["ar"]["pie_num1"];
			$ar[0]["pie_txt1"]		= $result["ar"]["pie_txt1"];
			$ar[0]["pie_notes1"]	= $result["ar"]["pie_notes1"];
			$ar[0]["pie_label1"] 	= "Pendidikan";
			// chart job
			$ar[0]["pie_num2"]		= $result["ar"]["pie_num2"];
			$ar[0]["pie_txt2"]		= $result["ar"]["pie_txt2"];
			$ar[0]["pie_notes2"]	= $result["ar"]["pie_notes2"];
			$ar[0]["pie_label2"] 	= "Pekerjaan";
			// chart umur
			$ar[0]["pie_num3"]		= $result["ar"]["pie_num3"];
			$ar[0]["pie_txt3"]		= $result["ar"]["pie_txt3"];
			$ar[0]["pie_notes3"]	= $result["ar"]["pie_notes3"];
			$ar[0]["pie_label3"] 	= "Umur";
			// chart darah
			$ar[0]["pie_num4"]		= $result["ar"]["pie_num4"];
			$ar[0]["pie_txt4"]		= $result["ar"]["pie_txt4"];
			$ar[0]["pie_notes4"]	= $result["ar"]["pie_notes4"];
			$ar[0]["pie_label4"] 	= "G.Darah";
			
			break;
			
		case "SUMM_KBG":
		
			$row_h					= 75;
			$result					= summ_kbg($arpost);
			
			$ar_summ_prk			= array_col2row($result["ar"], "v_");
			$list_h					= $row_h * count($ar_summ_prk);
			$ar[0]["list1"]			= $ar_summ_prk;
			$ar[0]["list2"]			= $result["list2"];
			$ar[0]["list_hrow"] 	= $list_h;
			// chart edu
			$ar[0]["pie_num1"]		= $result["ar"]["pie_num1"];
			$ar[0]["pie_txt1"]		= $result["ar"]["pie_txt1"];
			$ar[0]["pie_notes1"]	= $result["ar"]["pie_notes1"];
			$ar[0]["pie_label1"] 	= "Pendidikan";
			// chart job
			$ar[0]["pie_num2"]		= $result["ar"]["pie_num2"];
			$ar[0]["pie_txt2"]		= $result["ar"]["pie_txt2"];
			$ar[0]["pie_notes2"]	= $result["ar"]["pie_notes2"];
			$ar[0]["pie_label2"] 	= "Pekerjaan";
			// chart umur
			$ar[0]["pie_num3"]		= $result["ar"]["pie_num3"];
			$ar[0]["pie_txt3"]		= $result["ar"]["pie_txt3"];
			$ar[0]["pie_notes3"]	= $result["ar"]["pie_notes3"];
			$ar[0]["pie_label3"] 	= "Umur";
			// chart darah
			$ar[0]["pie_num4"]		= $result["ar"]["pie_num4"];
			$ar[0]["pie_txt4"]		= $result["ar"]["pie_txt4"];
			$ar[0]["pie_notes4"]	= $result["ar"]["pie_notes4"];
			$ar[0]["pie_label4"] 	= "G.Darah";
			
			break;
			
		case "CARI_HUT":
			$ar		= list_hut($arpost);
			break;
		
		case "CARI_KBG":
			$ar		= kbg_summary($arpost);
			break;
			
		case "CARI_RKM":
			$ar		= rkk_summary($arpost);
			break;
			
		case "VIEW_NIK":
			$par1		= $arpost["par1"];
			$sql		= "SELECT r.*, DATE_FORMAT(r.trdt, '%d-%m-%Y')  as trdt, DATE_FORMAT(r.lastupdate, '%d-%m-%Y %H:%i')  as entrydt
						 		FROM t_rkm r WHERE r.nik='$par1' ORDER BY r.id DESC";
			$rkk		= get_records($sql); 
			$nrkk		= count($rkk);
			$isbayar 	= 0;
			$row_h		= 75;
			$list_h		= 0;
			$txt		= "\n";
			for ($i=0; $i<count($rkk);$i++) {
				$txt	.=  $rkk[$i]["yy"] 
							 . ", Rp." . $rkk[$i]["payment"]/1000 . "rb, "
							 . $rkk[$i]["trdt"]  ;
				if ($rkk[$i]["trnotes"] <> "") {
					$txt 	.= " (" . $rkk[$i]["trnotes"] . ")\n";
				} else {
					$txt	.= ", " . $rkk[$i]["lastuserid"] . "/" .  $rkk[$i]["entrydt"]  . "\n";
				}	
				if ($yy == $rkk[$i]["yy"]) {
					$isbayar = 1;
				}
			}
			$sql	= "SELECT 	
								w.nama		AS v_Nama,
								w.nicknm	AS v_Panggilan,
								k.alamat1	AS v_Alamat1,
								k.alamat2	AS v_Alamat2,
								CONCAT(rel.detail_desc2, '/', agm.detail_desc2)	AS 'v_Relasi/Agama',
								CONCAT(gen.detail_desc2, ' / ', msts.detail_desc2)	AS 'v_Gender',
								CONCAT(w.`tmp_lahir`, '/', DATE_FORMAT(w.`tgl_lahir`, '%d-%m-%Y'))	AS 'v_Tmp/TmpLahir',
								CONCAT(YEAR(NOW()) - YEAR(w.tgl_lahir), ', Gol.Darah: ', w.`darah`) AS 'v_Umur',
								w.mobile	AS v_NoHp,
								w.email	AS v_Email,
								edu.detail_desc2 as v_Pendidikan,
								job.detail_desc2 as v_Pekerjaan,
								wstts.detail_desc2 as v_Status,
								w.wnotes as v_Notes,
								
								CONCAT(DATE_FORMAT(w.`tgl_reg`, '%d-%m-%Y '), '/', w.reg_by)	AS 'v_Tgl_Entry',
								CONCAT(DATE_FORMAT(w.`lastcheck`, '%d-%m-%Y, %H:%i'), '/', w.check_by)	AS 'v_Tgl_Check',
								w.*,
									k.alamat1, k.alamat2,
									ling.detail_desc2 as ling, kbg.detail_desc2 as kbg ,
									DATE_FORMAT(w.`tgl_lahir`, '%d-%m-%Y')	AS tgl_lahir,
									rel.detail_desc2 as hub,
									GROUP_CONCAT(DISTINCT t.yy ORDER by t.yy) as rkm,
									gen.ntype AS pos_gender,
									msts.ntype AS pos_status,
									rel.ntype AS pos_relasi,
									agm.ntype AS pos_agama,
									edu.ntype AS pos_edu,
									job.ntype AS pos_job,
									dar.ntype AS pos_dar,
									wstts.ntype AS pos_wstts,
									'0' AS wgpfile									
									FROM m_warga w 
										left join m_kk k ON (w.seqno_kk = k.seqno_kk)
                                    	left join t_rkm t on (t.nik=w.nik)
										left join s_codedt gen on (gen.kode_detail=w.gender and gen.kode_master='GEN')
										left join s_codedt msts on (msts.kode_detail=w.msts and msts.kode_master='MSTS')
										left join s_codedt kbg on (kbg.kode_detail=w.sunit and kbg.kode_master='KBG')
										left join s_codedt ling on (ling.kode_detail=w.sgrp3 and ling.kode_master='LING')
										left join s_codedt rel on (rel.kode_detail=w.relasi and rel.kode_master='HUB')
										left join s_codedt agm on (agm.kode_detail=w.agama and agm.kode_master='AGM')
										left join s_codedt edu on (edu.kode_detail=w.edu and edu.kode_master='EDU')
										left join s_codedt job on (job.kode_detail=w.job and job.kode_master='JOB')
										left join s_codedt dar on (dar.kode_detail=w.darah and dar.kode_master='DAR')
										left join s_codedt wstts on (wstts.kode_detail=w.delstts and wstts.kode_master='WSTTS')
									WHERE w.nik='$par1'";
			
			$ar					= get_records($sql);
			// get Profile photo
			$tmp	= get_records("SELECT i.id FROM sys_imageupload i WHERE i.nik='$par1' AND imode ='WGPFILE' AND i.stts=0 ORDER BY id DESC  LIMIT 1");
			if (count($tmp) > 0) {
				$ar[0]["wgpfile"] 	= $tmp[0]["id"];
			}
			$ar_view_nik		= array_col2row($ar[0], "v_");
			$list_h				= $row_h * count($ar_view_nik);
			$tlg_par			.=  $ar[0]["v_Nama"] . "\n";
			// list yg tinggal serumah
			$no_kk	= $ar[0]["seqno_kk"];
			
			$sql	= "SELECT w.nik, w.nama, w.mobile, w.sgrp3, w.sunit, w.darah,
							w.edu, w.gender, agm.detail_desc as agama,
							job.detail_desc as job,
							YEAR(curdate()) - YEAR(w.tgl_lahir) as umur,
							DATE_FORMAT(w.tgl_lahir, '%d-%m-%Y')  as tgl_lahir, 
							k.alamat1, k.alamat2, 	
							rel.detail_desc2 as relasi,
							gen.ntype AS pos_gender,
							msts.ntype AS pos_status,
							( SELECT COUNT(t.id) FROM t_rkm t WHERE t.nik=w.nik AND t.delstts=0 
																	AND t.payment>0 AND t.yy='$yy') as is_bayar
							FROM m_warga w 
								left join m_kk k ON (w.seqno_kk = k.seqno_kk)
								left join s_codedt gen on (gen.kode_detail=w.gender and gen.kode_master='GEN')
								left join s_codedt msts on (msts.kode_detail=w.msts and msts.kode_master='MSTS')
								left join s_codedt rel on (rel.kode_detail=w.relasi and rel.kode_master='HUB')
								left join s_codedt agm on (agm.kode_detail=w.agama and agm.kode_master='AGM')
								left join s_codedt job on (job.kode_detail=w.job and job.kode_master='JOB')
							WHERE w.seqno_kk='$no_kk' and w.nik <> '$par1' and delstts>=0";
			$klg	= get_records($sql);
			//print_r($klg); 
			$ar[0]["is_bayar"] 	= $isbayar;
			$ar[0]["txt_rkm"] 	= $txt;			
			$ar[0]["list_hrow"] = $list_h;	// . "dp";
			$ar[0]["view_nik"] 	= $ar_view_nik;
			$ar[0]["serumah"] 	= $klg;
			
			break;
			
		case "VIEW_USER":
		
			// pakai par2 -> recid
			// par1  -> userid
			$isbayar 	= 0;
			$row_h		= 75;
			$list_h		= 0;
			$txt		= "\n";
			
			$sql	= "SELECT u.userid as v_Userid, u.nama as v_Nama, 
								CONCAT(u.role, '-', r.role_desc) AS v_Role,
								u.nohp as v_NoHp, 
								u.email as v_Email,
								CONCAT(u.ym_id, ' ', u.skype_id)  as v_Telegram, 
								r.list_menu AS v_ListMenu, 
								(SELECT CONCAT(a.time_logon, ', ' , a.platform) FROM sys_session a 
									WHERE a.userid='$par1' ORDER BY a.session_id DESC LIMIT 1) as v_Last_Web_Login,
								(SELECT CONCAT(a.lastupdate, ', ', a.mode) FROM s_android_log a 
									WHERE a.userid='$par1' ORDER BY a.id DESC LIMIT 1) as v_Last_APK_Akses,
							
								u.userid as id_key,
								r.list_rptgrp AS v_Report_Group, 
								u.list_grp1 as v_Dekanat,
								u.list_grp2 as v_Paroki, 
								u.recid, 
								r.seqno AS pos_role,
								u.list_grp2 as list_paroki, 
								u.list_grp3 as list_ling,
								u.list_unit as list_unit,
								u.nama, u.userid , u.nohp, u.email, u.role, u.list_grp1, u.list_grp2, u.list_grp3, u.list_unit,
								u.is_del
								FROM `s_user` u left join s_role r on (u.role=r.role) 
								WHERE u.userid='$par1'";
			//echo $sql; exit;
			$ar					= get_records($sql);
			
			if ($ar[0]["is_del"] == 1) {
				$ar[0]["userid"] = "";
			}
			$ar_view_nik		= array_col2row($ar[0], "v_");
			
			// user activity activity
			$sql			= "SELECT userid, mode, count(id) as ncount, DATE_FORMAT(MAX(lastupdate), '%d-%m-%Y, %H:%i') as nlast 
											FROM `s_android_log` WHERE userid='$par1' GROUP by userid, mode";
			$tmp			= get_records($sql);
			$nAct			= 0;
			$tmp_act		= array();
			for ($i=0; $i<count($tmp); $i++) {
				$nAct	+= $tmp[$i]["ncount"];
				
			}
			array_push($ar_view_nik, array("label"=>"== Akses Data:", "value"=>$nAct . " =="));
			for ($i=0; $i<count($tmp); $i++) {
				array_push($ar_view_nik, array("label"=>$tmp[$i]["mode"], "value"=>$tmp[$i]["ncount"] . " / " . $tmp[$i]["nlast"]));
				
			}
			
			// user activity update
			$sql			= "SELECT userid, mode, table_name, count(id) as ncount, DATE_FORMAT(MAX(update_date), '%d-%m-%Y, %H:%i') as nlast 
											FROM `sys_logupdate` WHERE userid='$par1' GROUP by userid, table_name, mode";
			$tmp			= get_records($sql);
			$nAct			= 0;
			$tmp_act		= array();
			for ($i=0; $i<count($tmp); $i++) {
				$nAct	+= $tmp[$i]["ncount"];
				
			}
			array_push($ar_view_nik, array("label"=>"== Update Data:", "value"=>$nAct . " =="));
			for ($i=0; $i<count($tmp); $i++) {
				array_push($ar_view_nik, array("label"=>$tmp[$i]["mode"] . " " . $tmp[$i]["table_name"], "value"=>$tmp[$i]["ncount"] . " / " . $tmp[$i]["nlast"]));
				
			}
				
				
			// insert row nama lingkungan	
			$ar_paroki			= explode(",", $ar[0]["list_paroki"]);
			for ($p=0; $p<count($ar_paroki); $p++) {
				
				
				// baca array kbg name
				$paroki			= $ar_paroki[$p];
				if ($paroki == "") {
					
				} else {
					$s_unit			= $ar[0]["list_unit"];
					$sql			= "SELECT o.grp2, o.grp3, o.grp4, s.detail_desc2 as lingnm, o.grpnm as kbgnm
										from m_org o left join s_codedt s on (s.kode_master='LING' and s.kode_detail=o.grp3)
										where  INSTR('$s_unit', o.grp4) ORDER BY lingnm, o.grp4";
					$tmp			= get_records($sql);
					$nkbg			= 0;
					for ($i=0; $i<count($tmp); $i++) {
						if ($paroki == $tmp[$i]["grp2"]) {
							$nkbg++;
						}
					}
					array_push($ar_view_nik, array("label"=>"== List Paroki Akses", "value"=>$ar_paroki[$p] . ": " . $nkbg . " KBG =="));
					
					
					for ($i=0; $i<count($tmp); $i++) {
						if ($paroki == $tmp[$i]["grp2"]) {
							array_push($ar_view_nik, array("label"=>$tmp[$i]["lingnm"], "value"=>$tmp[$i]["kbgnm"] ));
						}
					}
				}
			}
			
			
			
			$list_h				= $row_h * count($ar_view_nik);
			$ar[0]["txt_rkm"] 	= $txt;			
			$ar[0]["list_hrow"] = $list_h;	// . "dp";
			$ar[0]["view_nik"] 	= $ar_view_nik;
			$ar[0]["serumah"] 	= array();			
			break;
		
		case "CARI_RKM_WARGA":
		
		/*SELECT w.nik, w.nama, 				
							ling.detail_desc2 as ling, kbg.detail_desc2 as kbg ,
							k.nama_kk AS nama_kk,
							GROUP_CONCAT(SELECT CONCAT(rr.id, ':', 
											DATE_FORMAT(rr.trdt, '%d-%m-%Y') , 
											', ', rr.trnotes, ', ', rr.stts, ', ', rr.payment) 
                    			            from t_rkm rr where rr.nik=w.nik
										)
							FROM m_warga w 
								left join m_kk k ON (w.seqno_kk = k.seqno_kk)
								left join s_codedt kbg on (kbg.kode_detail=w.sunit and kbg.kode_master='KBG')
								left join s_codedt ling on (ling.kode_detail=w.sgrp3 and ling.kode_master='LING')
							WHERE  w.nama like '%rudy%' 									 
									AND w.sgrp2<>'' and w.sunit<>''
									GROUP BY w.nik	ORDER BY k.grp3, k.unit, w.nama LIMIT 100*/
									
			$sql	= "SELECT w.nik, w.nama, 				
							ling.detail_desc2 as ling, kbg.detail_desc2 as kbg ,
							k.nama_kk AS nama_kk,
							GROUP_CONCAT( CONCAT('Ref:', rr.id, ' ', 
											DATE_FORMAT(rr.trdt, '%d-%m-%Y') , 
											', ', rr.trnotes, ' (', rr.stts, ' ', rr.payment, ')\n') 
										) as txt_rkm
							FROM m_warga w 
                            	left join t_rkm rr ON (rr.nik=w.nik)
								left join m_kk k ON (w.seqno_kk = k.seqno_kk)
								left join s_codedt kbg on (kbg.kode_detail=w.sunit and kbg.kode_master='KBG')
								left join s_codedt ling on (ling.kode_detail=w.sgrp3 and ling.kode_master='LING')
							WHERE  (w.nama like '%$par1%' or w.mobile like '%$par1%')							 
									AND w.sgrp2<>'' and w.sunit<>''
									AND INSTR('$list_unit', w.sunit) 
									GROUP BY w.nik	ORDER BY rr.id desc LIMIT 100";
			$ar		= get_records($sql);
			for ($i=0; $i<count($ar); $i++) {
				$ar[$i]["line1"] 	= $ar[$i]["nama"] . " (KK: " . $ar[$i]["nama_kk"];
				$ar[$i]["line2"] 	= $ar[$i]["ling"] . " - " . $ar[$i]["kbg"];
				//$ar[$i]["line3"] 	= "Ref:" . $ar[$i]["id"] . " - " . $ar[$i]["trdt"] . ", " . $ar[$i]["trnotes"] . ", " . $ar[$i]["stts"] . ", " . $ar[$i]["payment"] ;  
				$ar[$i]["line3"] 	= str_replace(',Ref:' , 'Ref:', $ar[$i]["txt_rkm"]);
				$ar[$i]["icon"] = 1;
			}
			break;
			
		case "CARI_WARGA":
			$wh_cari	= "(LOWER(w.nama) LIKE '%$par1%' or  w.mobile like '%$par1%') ";
			
			if ($par1 == "tgl0") {
				$wh_cari	= "( w.tgl_lahir = '0000-00-00' or w.tgl_lahir='1900-00-00') " ;
			}
			$sql	= "SELECT w.nik, w.nama, k.alamat1, k.alamat2, 	w.gender, 
									YEAR(curdate()) - YEAR(w.tgl_lahir) as umur,
									ling.detail_desc2 as ling, kbg.detail_desc2 as kbg ,
									GROUP_CONCAT(DISTINCT t.yy ORDER by t.yy) as rkm,
									rel.detail_desc2 as relasi,
									gen.ntype AS pos_gender,
									msts.ntype AS pos_status,
									k.nama_kk AS nama_kk,
									( SELECT COUNT(t.id) FROM t_rkm t 
															WHERE t.nik=w.nik AND t.delstts=0 
															AND t.payment>0 AND t.yy='$yy' GROUP BY t.nik) as is_bayar
									FROM m_warga w 
										left join m_kk k ON (w.seqno_kk = k.seqno_kk)
                                    	left join t_rkm t on (t.nik=w.nik)
										left join s_codedt gen on (gen.kode_detail=w.gender and gen.kode_master='GEN')
										left join s_codedt msts on (msts.kode_detail=w.msts and msts.kode_master='MSTS')
										left join s_codedt kbg on (kbg.kode_detail=w.sunit and kbg.kode_master='KBG')
										left join s_codedt ling on (ling.kode_detail=w.sgrp3 and ling.kode_master='LING')
										left join s_codedt rel on (rel.kode_detail=w.relasi and rel.kode_master='HUB')
									WHERE $wh_cari
													AND w.sgrp3<> '' AND w.sunit <> ''
													AND INSTR('$list_unit', k.unit) 
													and w.delstts>=0
													group by w.nik ORDER BY k.grp3, k.unit LIMIT 100";
			//echo $sql;
			$ar		= get_records($sql);
			for ($i=0; $i<count($ar); $i++) {
				$ar[$i]["line1"] 	= $ar[$i]["nama"] . " (" . $ar[$i]["umur"] . "/" . $ar[$i]["relasi"] .":" .$ar[$i]["nama_kk"]  ;
				$ar[$i]["line2"] 	= $ar[$i]["alamat1"] . ", " . $ar[$i]["alamat2"];
				$ar[$i]["line3"] 	= $ar[$i]["ling"] . " - " . $ar[$i]["kbg"];
				if ($ar[$i]["is_bayar"]> 0) {
					$ar[$i]["icon"] = 1;
				} else {
					$ar[$i]["icon"] = 0;
				}
			}
			break;
			
		case "CARI_USER":
		
			if ($par1 == "") {
				$sql		= "SELECT s.* FROM s_user s 
									WHERE s.isactive='Active' ORDER BY s.userid LIMIT 100";
			} else {
				$sql		= "SELECT s.* FROM s_user s 
									WHERE s.isactive='Active' and 
											(LOWER(s.nama) LIKE '%$par1%') or
											(s.skype_id LIKE '%$par1%') or
											(s.ym_id LIKE '%$par1%') or 
											(LOWER(s.userid) LIKE '%$par1%') ORDER BY s.userid LIMIT 100";
			}
			$tmp		= get_records($sql);
			$ar			= array();
			for ($i=0; $i<count($tmp); $i++) {
				array_push($ar, array(	"userid" => $tmp[$i]["userid"], 
										"recid"	 => $tmp[$i]["recid"],
										"line1"  => $tmp[$i]["userid"] . ", " . $tmp[$i]["nama"] . " / " . $tmp[$i]["role"],
										"line2"  => "HP: " .  $tmp[$i]["nohp"] . ", Email:" . $tmp[$i]["email"] ,
										"line3"  => "Paroki: " . $tmp[$i]["list_grp2"],
										"icon"   => "0"
										));
			}
			
			break;
		case "CARI_ROLE":
		
			if ($par1 == "") {
				$sql		= "SELECT s.*, count(u.userid) as nuser 
									FROM s_role s left join s_user u on (s.role=u.role)
									WHERE 1  GROUP BY s.role ORDER BY s.role";
			} else {
				$sql		= "SELECT s.*, count(u.userid) as nuser 
									FROM s_role s left join s_user u on (s.role=u.role)
									WHERE (LOWER(s.role) LIKE '%$par1%') or 
											(LOWER(s.role_desc) LIKE '%$par1%')  GROUP BY s.role ORDER BY s.role";
			}
			$tmp		= get_records($sql);
			$ar			= array();
			for ($i=0; $i<count($tmp); $i++) {
				array_push($ar, array(	"userid" => $tmp[$i]["role"],
										"line1"  => $tmp[$i]["role"] . ", " . $tmp[$i]["role_desc"],
										"line2"  => "ListGroup: " .  $tmp[$i]["list_rptgrp"]  ,
										"line3"  => "ListMenu: " .  $tmp[$i]["list_menu"]  ,
										"line4"  => "Jml User: " . $tmp[$i]["nuser"],
										"icon"   => "0"
										));
			}
			
			break;
		case "CARI_PARAM":
		
			$sql		= "SELECT s.* FROM sys_general_detail s 
								 		WHERE s.kode_master='$par1'   ORDER BY s.kode_master";
			
			$tmp		= get_records($sql);
			$ar			= array();
			for ($i=0; $i<count($tmp); $i++) {
				array_push($ar, array(	"userid" => $tmp[$i]["kode_master"],
										"line1"  => $tmp[$i]["kode_detail"] ,
										"line2"  => "Value : " .  $tmp[$i]["detail_desc"]  ,
										"line3"  => "Desc2: " .  $tmp[$i]["detail_desc2"]  ,
										"icon"   => "0"
										));
			}
			
			break;
		case "CARI_CODE":
		
			$sql		= "SELECT s.*
									FROM s_codedt s 
									WHERE s.kode_master='$par1'   ORDER BY s.kode_detail";
			
			$tmp		= get_records($sql);
			$ar			= array();
			for ($i=0; $i<count($tmp); $i++) {
				array_push($ar, array(	"userid" => $tmp[$i]["kode_master"],
										"line1"  => $tmp[$i]["kode_detail"] . ", " . $tmp[$i]["detail_desc"],
										"line2"  => "CType: " .  $tmp[$i]["ctype"]  ,
										"line3"  => "NType: " .  $tmp[$i]["ntype"]  ,
										"icon"   => "0"
										));
			} 
			break;
		case "LOG_NIK":
		
			$ar		= get_records("SELECT * FROM m_warga w WHERE w.nik='$par1' ");	
			$recid	= $ar[0]["id"];
			$sql	= "SELECT * FROM sys_logupdate WHERE recid='$recid' and table_name='m_warga' ORDER BY id DESC";
			$ar		= get_records($sql);
			
			for ($i=0; $i<count($ar);$i++) {
				$txt	.= "\n" . $ar[$i]["update_date"] . ", " . $ar[$i]["userid"]  . " (" . $ar[$i]["spnotes"]. ")\n" . $ar[$i]["str_log"] ;
			}
			if ($txt == "") {
				$txt	= "-- Belum ada perubahan data --";
			}
			$ar		= array(array("log"=>$txt));
			
			break;
		case "LOG_USER":
		
			$mod_setting	= $aruser["mod_setting"];
			if ($mod_setting == "N") {
				$sql		= "SELECT s.userid, s.`mode` as v_mode, count(s.id) as v_jml, 'end' AS ending 
									FROM `s_android_log` s WHERE s.userid='$userid' 
									group by s.userid, s.mode ORDER BY s.lastupdate LIMIT 100";
			} else {
				$sql		= "SELECT s.userid, s.`mode` as v_mode, count(s.id) as v_jml, 
									(SELECT o.lastupdate FROM s_android_log o WHERE o.userid=s.userid and o.`mode`=s.`mode` ORDER BY o.id DESC LIMIT 1
									) as lastupdate
									FROM `s_android_log` s WHERE LOWER(s.userid) LIKE '%$par1%' 
									group by s.userid, s.mode ORDER BY lastupdate DESC LIMIT 100";
			}
			$tmp		= get_records($sql);
			$ar			= array();
			for ($i=0; $i<count($tmp); $i++) {
				array_push($ar, array(	"userid" => $tmp[$i]["userid"],
										"line1"  => $tmp[$i]["userid"] . ", " . $tmp[$i]["v_mode"] . " : " . $tmp[$i]["v_jml"] . ', (Last: ' . $tmp[$i]["lastupdate"] . ')', 
										"icon"   => "0"
										));
			}
			
			break;
			
		case "USER_ACCESS":
			// par1		= userid
			// par2		= START/LEFT2RIGHT/RIGHT2LEFT
			// par3		= data unit yg di move
			// baca array all kbg;
			
			// all KBG
			
			$sql		= "SELECT 	s.ctype as paroki, 
										s.ctype2 as grp3,
										(SELECT w.detail_desc2 from s_codedt w where w.kode_master='LING' and w.kode_detail=s.ctype2 ) as grp3nm,
										s.kode_detail, 
										s.detail_desc2 AS unitnm
									FROM  s_codedt s 
									WHERE s.kode_master='KBG' 
									ORDER BY ctype, grp3 , kode_detail ";
			$kbg_all	= get_records($sql);	
			
			// Userid KBG
			$cur_userid		= $par1;	//"elmo";
			$aruser			= get_records("SELECT a.*, r.* FROM s_user a left join s_role r ON (a.role=r.role) WHERE a.isactive=1 and a.userid='" . $cur_userid . "'");
			$aruser			= $aruser[0];
			$list_unit		= trim($aruser["list_unit"] . ",");
			
			if (trim($par2) == strtolower("LEFT2RIGHT")) {
				$list_unit	.= "," . $par3 ;
				if (substr($list_unit, 0, 1) == ",") {
					$list_unit	= substr($list_unit, 1, strlen($list_unit));
				}
				$list_unit	= str_replace(",,", ",", $list_unit);
				$sql		= "UPDATE s_user SET list_unit='$list_unit'  WHERE userid='$cur_userid'";
				mysqli_query($dbhandle, $sql);
				$sql		= "UPDATE s_user SET list_grp2= 
									(select GROUP_CONCAT(DISTINCT grp2) from m_org where  INSTR('$list_unit', grp4) )
									WHERE userid ='$cur_userid'";
				mysqli_query($dbhandle, $sql);
				$sql		= "UPDATE s_user SET list_grp3= 
									(select GROUP_CONCAT(DISTINCT grp3) from m_org where  INSTR('$list_unit', grp4) )
									WHERE userid ='$cur_userid'";
				mysqli_query($dbhandle, $sql);
			}
			if (trim($par2) == strtolower("RIGHT2LEFT")) {
				$list_unit	= str_replace($par3, "", $list_unit);
				if (substr($list_unit, 0, 1) == ",") {
					$list_unit	= substr($list_unit, 1, strlen($list_unit));
				}
				$list_unit	= str_replace(",,", ",", $list_unit) ;
				$sql		= "UPDATE s_user SET list_unit='$list_unit' WHERE userid='$cur_userid'";
				mysqli_query($dbhandle, $sql);
				$sql		= "UPDATE s_user SET list_grp2= 
									(select GROUP_CONCAT(DISTINCT grp2) from m_org where  INSTR('$list_unit', grp4) )
									WHERE userid ='$cur_userid'";
				mysqli_query($dbhandle, $sql);
				$sql		= "UPDATE s_user SET list_grp3= 
									(select GROUP_CONCAT(DISTINCT grp3) from m_org where  INSTR('$list_unit', grp4) )
									WHERE userid ='$cur_userid'";
				mysqli_query($dbhandle, $sql);
			}
			//txt_debug("sql.txt", $sql);
			$sql			= "SELECT 	s.ctype as paroki, 
										s.ctype2 as grp3,
										(SELECT w.detail_desc2 from s_codedt w where w.kode_master='LING' and w.kode_detail=s.ctype2 ) as grp3nm,
										s.kode_detail, 
										s.detail_desc2 AS unitnm
									FROM  s_codedt s 
									WHERE s.kode_master='KBG' 
											AND INSTR('$list_unit', kode_detail) 
									ORDER BY ctype, grp3 , kode_detail ";
									
			$user_kbg		= get_records($sql);
			
			// compare
			$sisa_kbg		= array();
			$is_ada			= 0;
			$tmpnm			= "";
			for ($i=0; $i<count($kbg_all); $i++) {
				$tmpnm	= $kbg_all[$i]["kode_detail"];
				$is_ada	= 0;
				if ($tmpnm <> "") {
					for ($c=0; $c<count($user_kbg); $c++) {
						if ($tmpnm == $user_kbg[$c]["kode_detail"]) {
							$is_ada = 1;
						}
					}
					if ($is_ada == 1) {
						
					} else {
						array_push($sisa_kbg, $kbg_all[$i]);
					}
				}
			}
			
			//---------
			$ar2			= array();
			for ($i=0; $i<count($user_kbg); $i++) {
				array_push($ar2, array(	"key" 	 => $user_kbg[$i]["kode_detail"],
										"line1"  => $user_kbg[$i]["paroki"] . ", " . $user_kbg[$i]["grp3nm"] , 
										"line2"  => $user_kbg[$i]["unitnm"]
										));
			}
			
			$ar			= array();
			for ($i=0; $i<count($sisa_kbg); $i++) {
				array_push($ar, array(	"key" 	 => $sisa_kbg[$i]["kode_detail"],
										"line1"  => $sisa_kbg[$i]["paroki"] . ", " . $sisa_kbg[$i]["grp3nm"]  , 
										"line2"  => $sisa_kbg[$i]["unitnm"]
										));
			}
			
			break;
			
			
		default:
			echo "Mode: $mode,masih belum terdefinisi..."; exit;
	}
	
include ("get_data_footer.php");
?>