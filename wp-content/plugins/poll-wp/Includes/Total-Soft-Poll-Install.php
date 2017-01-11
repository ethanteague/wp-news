<?php
	if(!defined('ABSPATH')) exit;
	if(!current_user_can('manage_options'))
	{
		die('Access Denied');
	}
	global $wpdb;

	$table_name  = $wpdb->prefix . "totalsoft_fonts";
	$table_name1 = $wpdb->prefix . "totalsoft_poll_manager";
	$table_name2 = $wpdb->prefix . "totalsoft_poll_answers";
	$table_name3 = $wpdb->prefix . "totalsoft_poll_id";
	$table_name4 = $wpdb->prefix . "totalsoft_poll_dbt";
	$table_name5 = $wpdb->prefix . "totalsoft_poll_stpoll";
	$table_name6 = $wpdb->prefix . "totalsoft_poll_results";
	$table_name7 = $wpdb->prefix . "totalsoft_poll_inform";	
	$table_name8 = $wpdb->prefix . "totalsoft_poll_stpoll_1";
	
	$sql = 'CREATE TABLE IF NOT EXISTS ' .$table_name . '(
		id INTEGER(10) UNSIGNED AUTO_INCREMENT,
		Font VARCHAR(255) NOT NULL,
		PRIMARY KEY (id))';
	$sql1 = 'CREATE TABLE IF NOT EXISTS ' .$table_name1 . '(
		id INTEGER(10) UNSIGNED AUTO_INCREMENT,
		TotalSoftPoll_Question VARCHAR(255) NOT NULL,
		TotalSoftPoll_Theme VARCHAR(255) NOT NULL,
		TotalSoftPoll_Ans_C VARCHAR(255) NOT NULL,
		PRIMARY KEY (id))';
	$sql2 = 'CREATE TABLE IF NOT EXISTS ' .$table_name2 . '(
		id INTEGER(10) UNSIGNED AUTO_INCREMENT,
		Question_ID VARCHAR(255) NOT NULL,
		TotalSoftPoll_Ans VARCHAR(255) NOT NULL,
		TotalSoftPoll_Ans_Im VARCHAR(255) NOT NULL,
		TotalSoftPoll_Ans_Vd VARCHAR(255) NOT NULL,
		TotalSoftPoll_Ans_Cl VARCHAR(255) NOT NULL,
		TotalSoftPoll_Ans_01 VARCHAR(255) NOT NULL,
		TotalSoftPoll_Ans_02 VARCHAR(255) NOT NULL,
		TotalSoftPoll_Ans_03 VARCHAR(255) NOT NULL,
		TotalSoftPoll_Ans_04 VARCHAR(255) NOT NULL,
		TotalSoftPoll_Ans_05 VARCHAR(255) NOT NULL,
		PRIMARY KEY (id))';
	$sql3 = 'CREATE TABLE IF NOT EXISTS ' .$table_name3 . '(
		id INTEGER(10) UNSIGNED AUTO_INCREMENT,
		Poll_ID VARCHAR(255) NOT NULL,
		PRIMARY KEY (id))';
	$sql4 = 'CREATE TABLE IF NOT EXISTS ' .$table_name4 . '(
		id INTEGER(10) UNSIGNED AUTO_INCREMENT,
		TotalSoft_Poll_TTitle VARCHAR(255) NOT NULL,
		TotalSoft_Poll_TType VARCHAR(255) NOT NULL,
		PRIMARY KEY (id))';
	$sql5 = 'CREATE TABLE IF NOT EXISTS ' .$table_name5 . '(
		id INTEGER(10) UNSIGNED AUTO_INCREMENT,
		TotalSoft_Poll_TID VARCHAR(255) NOT NULL,
		TotalSoft_Poll_TTitle VARCHAR(255) NOT NULL,
		TotalSoft_Poll_TType VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_MW VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_Pos VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_BW VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_BC VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_BR VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_BoxSh_Show VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_BoxSh_Type VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_BoxSh VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_BoxShC VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_Q_BgC VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_Q_C VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_Q_FS VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_Q_FF VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_Q_TA VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_LAQ_W VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_LAQ_H VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_LAQ_C VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_LAQ_S VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_A_FS VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_A_CTF VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_A_BgC VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_A_C VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_CH_CM VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_CH_S VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_CH_TBC VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_CH_CBC VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_CH_TAC VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_CH_CAC VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_A_HBgC VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_A_HC VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_LAA_W VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_LAA_H VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_LAA_C VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_LAA_S VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_VB_MBgC VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_VB_Pos VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_VB_BW VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_VB_BC VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_VB_BR VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_VB_BgC VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_VB_C VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_VB_FS VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_VB_FF VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_VB_Text VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_VB_IT VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_VB_IA VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_VB_IS VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_VB_HBgC VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_VB_HC VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_RB_Show VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_RB_Pos VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_RB_BW VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_RB_BC VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_RB_BR VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_RB_BgC VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_RB_C VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_RB_FS VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_RB_FF VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_RB_Text VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_RB_IT VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_RB_IA VARCHAR(255) NOT NULL,
		PRIMARY KEY (id))';
	$sql6 = 'CREATE TABLE IF NOT EXISTS ' .$table_name6 . '(
		id INTEGER(10) UNSIGNED AUTO_INCREMENT,
		Poll_ID INTEGER(10) NOT NULL,
		Poll_A_ID INTEGER(10) NOT NULL,
		Poll_A_Votes INTEGER(10) NOT NULL,
		PRIMARY KEY  (id) )';
	$sql7 = 'CREATE TABLE IF NOT EXISTS ' . $table_name7 . ' ( 
		id INTEGER(10) UNSIGNED AUTO_INCREMENT, 
		Poll_ID VARCHAR(255) NOT NULL, 
		IPAddress VARCHAR(255) NOT NULL, 
		City VARCHAR(255) NOT NULL, 
		Region VARCHAR(255) NOT NULL, 
		CountryCode VARCHAR(255) NOT NULL, 
		CountryName VARCHAR(255) NOT NULL, 
		CountryFlag VARCHAR(255) NOT NULL, 
		Data VARCHAR(255) NOT NULL, 
		PRIMARY KEY (id))';
	$sql8 = 'CREATE TABLE IF NOT EXISTS ' .$table_name8 . '(
		id INTEGER(10) UNSIGNED AUTO_INCREMENT,
		TotalSoft_Poll_TID VARCHAR(255) NOT NULL,
		TotalSoft_Poll_TTitle VARCHAR(255) NOT NULL,
		TotalSoft_Poll_TType VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_RB_IS VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_RB_HBgC VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_RB_HC VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_P_BW VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_P_BC VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_P_ShPop VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_P_ShEff VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_P_Q_BgC VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_P_Q_C VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_P_LAQ_W VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_P_LAQ_H VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_P_LAQ_C VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_P_LAQ_S VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_P_A_BgC VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_P_A_C VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_P_A_VT VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_P_A_VC VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_P_A_VEff VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_P_LAA_W VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_P_LAA_H VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_P_LAA_C VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_P_LAA_S VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_P_BB_Pos VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_P_BB_BC VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_P_BB_BgC VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_P_BB_C VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_P_BB_Text VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_P_BB_IT VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_P_BB_IA VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_P_BB_HBgC VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_P_BB_HC VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_P_BB_MBgC VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_P_A_MBgC VARCHAR(255) NOT NULL,
		TotalSoft_Poll_1_A_MBgC VARCHAR(255) NOT NULL,
		PRIMARY KEY (id))';
	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	dbDelta($sql);
	dbDelta($sql1);
	dbDelta($sql2);
	dbDelta($sql3);
	dbDelta($sql4);
	dbDelta($sql5);
	dbDelta($sql6);
	dbDelta($sql7);
	dbDelta($sql8);

	$sqla  = 'ALTER TABLE ' . $table_name . ' CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci';
	$sqla1 = 'ALTER TABLE ' . $table_name1 . ' CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci';
	$sqla2 = 'ALTER TABLE ' . $table_name2 . ' CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci';
	$sqla3 = 'ALTER TABLE ' . $table_name3 . ' CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci';
	$sqla4 = 'ALTER TABLE ' . $table_name4 . ' CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci';
	$sqla5 = 'ALTER TABLE ' . $table_name5 . ' CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci';
	$sqla6 = 'ALTER TABLE ' . $table_name6 . ' CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci';
	$sqla7 = 'ALTER TABLE ' . $table_name7 . ' CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci';
	$sqla8 = 'ALTER TABLE ' . $table_name8 . ' CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci';

	$wpdb->query($sqla);
	$wpdb->query($sqla1);
	$wpdb->query($sqla2);
	$wpdb->query($sqla3);
	$wpdb->query($sqla4);
	$wpdb->query($sqla5);
	$wpdb->query($sqla6);
	$wpdb->query($sqla7);
	$wpdb->query($sqla8);

	$TotalSoft_Fonts = array('Abadi MT Condensed Light','Aharoni','Aldhabi','Andalus','Angsana New','AngsanaUPC','Aparajita','Arabic Typesetting','Arial','Arial Black', 'Batang','BatangChe','Browallia New','BrowalliaUPC','Calibri','Calibri Light','Calisto MT','Cambria','Candara','Century Gothic','Comic Sans MS','Consolas', 'Constantia','Copperplate Gothic','Copperplate Gothic Light','Corbel','Cordia New','CordiaUPC','Courier New','DaunPenh','David','DFKai-SB','DilleniaUPC', 'DokChampa','Dotum','DotumChe','Ebrima','Estrangelo Edessa','EucrosiaUPC','Euphemia','FangSong','Franklin Gothic Medium','FrankRuehl','FreesiaUPC','Gabriola', 'Gadugi','Gautami','Georgia','Gisha','Gulim','GulimChe','Gungsuh','GungsuhChe','Impact','IrisUPC','Iskoola Pota','JasmineUPC','KaiTi','Kalinga','Kartika', 'Khmer UI','KodchiangUPC','Kokila','Lao UI','Latha','Leelawadee','Levenim MT','LilyUPC','Lucida Console','Lucida Handwriting Italic','Lucida Sans Unicode', 'Malgun Gothic','Mangal','Manny ITC','Marlett','Meiryo','Meiryo UI','Microsoft Himalaya','Microsoft JhengHei','Microsoft JhengHei UI','Microsoft New Tai Lue', 'Microsoft PhagsPa','Microsoft Sans Serif','Microsoft Tai Le','Microsoft Uighur','Microsoft YaHei','Microsoft YaHei UI','Microsoft Yi Baiti','MingLiU_HKSCS', 'MingLiU_HKSCS-ExtB','Miriam','Mongolian Baiti','MoolBoran','MS UI Gothic','MV Boli','Myanmar Text','Narkisim','Nirmala UI','News Gothic MT','NSimSun','Nyala', 'Palatino Linotype','Plantagenet Cherokee','Raavi','Rod','Sakkal Majalla','Segoe Print','Segoe Script','Segoe UI Symbol','Shonar Bangla','Shruti','SimHei','SimKai', 'Simplified Arabic','SimSun','SimSun-ExtB','Sylfaen','Tahoma','Times New Roman','Traditional Arabic','Trebuchet MS','Tunga','Utsaah','Vani','Vijaya');
	
	$TotalSoftFontCount=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE id>%d",0));
	if(count($TotalSoftFontCount)==0)
	{
		foreach ($TotalSoft_Fonts as $Fonts) 
		{
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name (id, Font) VALUES (%d, %s)", '', $Fonts));
		}
	}

	$TotalSoftPoll1=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name5 WHERE id>%d",0));
	if(count($TotalSoftPoll1) == 0)
	{
		//1
		$wpdb->query($wpdb->prepare("INSERT INTO $table_name4 (id, TotalSoft_Poll_TTitle, TotalSoft_Poll_TType) VALUES (%d, %s, %s)", '', 'Total Soft Poll 1', 'Standart Poll'));

		$TotalSoftPoll1_ID=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE TotalSoft_Poll_TTitle=%s order by id desc limit 1", 'Total Soft Poll 1'));

		$wpdb->query($wpdb->prepare("INSERT INTO $table_name5 (id, TotalSoft_Poll_TID, TotalSoft_Poll_TTitle, TotalSoft_Poll_TType, TotalSoft_Poll_1_MW, TotalSoft_Poll_1_Pos, TotalSoft_Poll_1_BW, TotalSoft_Poll_1_BC, TotalSoft_Poll_1_BR, TotalSoft_Poll_1_BoxSh_Show, TotalSoft_Poll_1_BoxSh_Type, TotalSoft_Poll_1_BoxSh, TotalSoft_Poll_1_BoxShC, TotalSoft_Poll_1_Q_BgC, TotalSoft_Poll_1_Q_C, TotalSoft_Poll_1_Q_FS, TotalSoft_Poll_1_Q_FF, TotalSoft_Poll_1_Q_TA, TotalSoft_Poll_1_LAQ_W, TotalSoft_Poll_1_LAQ_H, TotalSoft_Poll_1_LAQ_C, TotalSoft_Poll_1_LAQ_S, TotalSoft_Poll_1_A_FS, TotalSoft_Poll_1_A_CTF, TotalSoft_Poll_1_A_BgC, TotalSoft_Poll_1_A_C, TotalSoft_Poll_1_CH_CM, TotalSoft_Poll_1_CH_S, TotalSoft_Poll_1_CH_TBC, TotalSoft_Poll_1_CH_CBC, TotalSoft_Poll_1_CH_TAC, TotalSoft_Poll_1_CH_CAC, TotalSoft_Poll_1_A_HBgC, TotalSoft_Poll_1_A_HC, TotalSoft_Poll_1_LAA_W, TotalSoft_Poll_1_LAA_H, TotalSoft_Poll_1_LAA_C, TotalSoft_Poll_1_LAA_S, TotalSoft_Poll_1_VB_MBgC, TotalSoft_Poll_1_VB_Pos, TotalSoft_Poll_1_VB_BW, TotalSoft_Poll_1_VB_BC, TotalSoft_Poll_1_VB_BR, TotalSoft_Poll_1_VB_BgC, TotalSoft_Poll_1_VB_C, TotalSoft_Poll_1_VB_FS, TotalSoft_Poll_1_VB_FF, TotalSoft_Poll_1_VB_Text, TotalSoft_Poll_1_VB_IT, TotalSoft_Poll_1_VB_IA, TotalSoft_Poll_1_VB_IS, TotalSoft_Poll_1_VB_HBgC, TotalSoft_Poll_1_VB_HC, TotalSoft_Poll_1_RB_Show, TotalSoft_Poll_1_RB_Pos, TotalSoft_Poll_1_RB_BW, TotalSoft_Poll_1_RB_BC, TotalSoft_Poll_1_RB_BR, TotalSoft_Poll_1_RB_BgC, TotalSoft_Poll_1_RB_C, TotalSoft_Poll_1_RB_FS, TotalSoft_Poll_1_RB_FF, TotalSoft_Poll_1_RB_Text, TotalSoft_Poll_1_RB_IT, TotalSoft_Poll_1_RB_IA) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', $TotalSoftPoll1_ID[0]->id, 'Total Soft Poll 1', 'Standart Poll', '85', 'center', '6', '#ffffff', '15', 'true', 'true', '13', '#848484', '#ffffff', '#000000', '23', 'Gabriola', 'center', '80', '1', '#1e73be', 'solid', '17', 'true', '#ffffff', '#1e73be', 'false', 'medium 1', 'f10c', '#000000', 'f192', '#000000', '#ffffff', '#333333', '80', '1', '#1e73be', 'solid', '#ffffff', 'right', '1', '#e8e8e8', '10', '#ffffff', '#000000', '20', 'Gabriola', 'Vote', 'f0a1', 'before', '18', '#ffffff', '#515151', 'true', 'left', '1', '#e8e8e8', '10', '#ffffff', '#000000', '20', 'Gabriola', 'Results', 'f084', 'after'));
		$wpdb->query($wpdb->prepare("INSERT INTO $table_name8 (id, TotalSoft_Poll_TID, TotalSoft_Poll_TTitle, TotalSoft_Poll_TType, TotalSoft_Poll_1_RB_IS, TotalSoft_Poll_1_RB_HBgC, TotalSoft_Poll_1_RB_HC, TotalSoft_Poll_1_P_BW, TotalSoft_Poll_1_P_BC, TotalSoft_Poll_1_P_ShPop, TotalSoft_Poll_1_P_ShEff, TotalSoft_Poll_1_P_Q_BgC, TotalSoft_Poll_1_P_Q_C, TotalSoft_Poll_1_P_LAQ_W, TotalSoft_Poll_1_P_LAQ_H, TotalSoft_Poll_1_P_LAQ_C, TotalSoft_Poll_1_P_LAQ_S, TotalSoft_Poll_1_P_A_BgC, TotalSoft_Poll_1_P_A_C, TotalSoft_Poll_1_P_A_VT, TotalSoft_Poll_1_P_A_VC, TotalSoft_Poll_1_P_A_VEff, TotalSoft_Poll_1_P_LAA_W, TotalSoft_Poll_1_P_LAA_H, TotalSoft_Poll_1_P_LAA_C, TotalSoft_Poll_1_P_LAA_S, TotalSoft_Poll_1_P_BB_Pos, TotalSoft_Poll_1_P_BB_BC, TotalSoft_Poll_1_P_BB_BgC, TotalSoft_Poll_1_P_BB_C, TotalSoft_Poll_1_P_BB_Text, TotalSoft_Poll_1_P_BB_IT, TotalSoft_Poll_1_P_BB_IA, TotalSoft_Poll_1_P_BB_HBgC, TotalSoft_Poll_1_P_BB_HC, TotalSoft_Poll_1_P_BB_MBgC, TotalSoft_Poll_1_P_A_MBgC, TotalSoft_Poll_1_A_MBgC) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', $TotalSoftPoll1_ID[0]->id, 'Total Soft Poll 1', 'Standart Poll', '18', '#ffffff', '#515151', '1', '#ffffff', 'false', 'FCTA', '#ffffff', '#000000', '80', '1', '#1e73be', 'solid', '#d1d1d1', '#000000', 'both', '#ffffff', '0', '80', '1', '#1e73be', 'solid', 'right', '#ffffff', '#ffffff', '#000000', 'Back', 'f021', 'before', '#ffffff', '#515151', '#ffffff', '#ffffff', '#ffffff'));
		//2
		$wpdb->query($wpdb->prepare("INSERT INTO $table_name4 (id, TotalSoft_Poll_TTitle, TotalSoft_Poll_TType) VALUES (%d, %s, %s)", '', 'Total Soft Poll 2', 'Standart Poll'));

		$TotalSoftPoll1_ID=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE TotalSoft_Poll_TTitle=%s order by id desc limit 1", 'Total Soft Poll 2'));

		$wpdb->query($wpdb->prepare("INSERT INTO $table_name5 (id, TotalSoft_Poll_TID, TotalSoft_Poll_TTitle, TotalSoft_Poll_TType, TotalSoft_Poll_1_MW, TotalSoft_Poll_1_Pos, TotalSoft_Poll_1_BW, TotalSoft_Poll_1_BC, TotalSoft_Poll_1_BR, TotalSoft_Poll_1_BoxSh_Show, TotalSoft_Poll_1_BoxSh_Type, TotalSoft_Poll_1_BoxSh, TotalSoft_Poll_1_BoxShC, TotalSoft_Poll_1_Q_BgC, TotalSoft_Poll_1_Q_C, TotalSoft_Poll_1_Q_FS, TotalSoft_Poll_1_Q_FF, TotalSoft_Poll_1_Q_TA, TotalSoft_Poll_1_LAQ_W, TotalSoft_Poll_1_LAQ_H, TotalSoft_Poll_1_LAQ_C, TotalSoft_Poll_1_LAQ_S, TotalSoft_Poll_1_A_FS, TotalSoft_Poll_1_A_CTF, TotalSoft_Poll_1_A_BgC, TotalSoft_Poll_1_A_C, TotalSoft_Poll_1_CH_CM, TotalSoft_Poll_1_CH_S, TotalSoft_Poll_1_CH_TBC, TotalSoft_Poll_1_CH_CBC, TotalSoft_Poll_1_CH_TAC, TotalSoft_Poll_1_CH_CAC, TotalSoft_Poll_1_A_HBgC, TotalSoft_Poll_1_A_HC, TotalSoft_Poll_1_LAA_W, TotalSoft_Poll_1_LAA_H, TotalSoft_Poll_1_LAA_C, TotalSoft_Poll_1_LAA_S, TotalSoft_Poll_1_VB_MBgC, TotalSoft_Poll_1_VB_Pos, TotalSoft_Poll_1_VB_BW, TotalSoft_Poll_1_VB_BC, TotalSoft_Poll_1_VB_BR, TotalSoft_Poll_1_VB_BgC, TotalSoft_Poll_1_VB_C, TotalSoft_Poll_1_VB_FS, TotalSoft_Poll_1_VB_FF, TotalSoft_Poll_1_VB_Text, TotalSoft_Poll_1_VB_IT, TotalSoft_Poll_1_VB_IA, TotalSoft_Poll_1_VB_IS, TotalSoft_Poll_1_VB_HBgC, TotalSoft_Poll_1_VB_HC, TotalSoft_Poll_1_RB_Show, TotalSoft_Poll_1_RB_Pos, TotalSoft_Poll_1_RB_BW, TotalSoft_Poll_1_RB_BC, TotalSoft_Poll_1_RB_BR, TotalSoft_Poll_1_RB_BgC, TotalSoft_Poll_1_RB_C, TotalSoft_Poll_1_RB_FS, TotalSoft_Poll_1_RB_FF, TotalSoft_Poll_1_RB_Text, TotalSoft_Poll_1_RB_IT, TotalSoft_Poll_1_RB_IA) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', $TotalSoftPoll1_ID[0]->id, 'Total Soft Poll 2', 'Standart Poll', '70', 'center', '4', '#000000', '10', 'true', 'false', '13', '#848484', '#000000', '#ffffff', '23', 'Gabriola', 'center', '80', '0', '#1e73be', 'solid', '17', 'true', '#000000', '#dd9933', 'false', 'small', 'f10c', '#dd9933', 'f192', '#dd9933', '#000000', '#ffffff', '80', '1', '#dd9933', 'solid', '#000000', 'right', '1', '#000000', '10', '#dd9933', '#ffffff', '18', 'Gabriola', 'Vote', 'f1d8', 'before', '18', '#dd9933', '#ffffff', 'true', 'left', '2', '#dd9933', '10', '#dd9933', '#ffffff', '18', 'Gabriola', 'Results', 'f05a', 'after'));
		$wpdb->query($wpdb->prepare("INSERT INTO $table_name8 (id, TotalSoft_Poll_TID, TotalSoft_Poll_TTitle, TotalSoft_Poll_TType, TotalSoft_Poll_1_RB_IS, TotalSoft_Poll_1_RB_HBgC, TotalSoft_Poll_1_RB_HC, TotalSoft_Poll_1_P_BW, TotalSoft_Poll_1_P_BC, TotalSoft_Poll_1_P_ShPop, TotalSoft_Poll_1_P_ShEff, TotalSoft_Poll_1_P_Q_BgC, TotalSoft_Poll_1_P_Q_C, TotalSoft_Poll_1_P_LAQ_W, TotalSoft_Poll_1_P_LAQ_H, TotalSoft_Poll_1_P_LAQ_C, TotalSoft_Poll_1_P_LAQ_S, TotalSoft_Poll_1_P_A_BgC, TotalSoft_Poll_1_P_A_C, TotalSoft_Poll_1_P_A_VT, TotalSoft_Poll_1_P_A_VC, TotalSoft_Poll_1_P_A_VEff, TotalSoft_Poll_1_P_LAA_W, TotalSoft_Poll_1_P_LAA_H, TotalSoft_Poll_1_P_LAA_C, TotalSoft_Poll_1_P_LAA_S, TotalSoft_Poll_1_P_BB_Pos, TotalSoft_Poll_1_P_BB_BC, TotalSoft_Poll_1_P_BB_BgC, TotalSoft_Poll_1_P_BB_C, TotalSoft_Poll_1_P_BB_Text, TotalSoft_Poll_1_P_BB_IT, TotalSoft_Poll_1_P_BB_IA, TotalSoft_Poll_1_P_BB_HBgC, TotalSoft_Poll_1_P_BB_HC, TotalSoft_Poll_1_P_BB_MBgC, TotalSoft_Poll_1_P_A_MBgC, TotalSoft_Poll_1_A_MBgC) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', $TotalSoftPoll1_ID[0]->id, 'Total Soft Poll 2', 'Standart Poll', '18', '#dd9933', '#ffffff', '1', '#ffffff', 'false', 'FTTB', '#000000', '#ffffff', '80', '1', '#ffffff', 'solid', '#000000', '#dd9933', 'both', '#ffffff', '1', '80', '1', '#ffffff', 'solid', 'full', '#dd9933', '#dd9933', '#ffffff', 'Back', 'f021', 'before', '#dd9933', '#ffffff', '#000000', '#000000', '#000000'));
		//3
		$wpdb->query($wpdb->prepare("INSERT INTO $table_name4 (id, TotalSoft_Poll_TTitle, TotalSoft_Poll_TType) VALUES (%d, %s, %s)", '', 'Total Soft Poll 3', 'Standart Poll'));

		$TotalSoftPoll1_ID=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE TotalSoft_Poll_TTitle=%s order by id desc limit 1", 'Total Soft Poll 3'));

		$wpdb->query($wpdb->prepare("INSERT INTO $table_name5 (id, TotalSoft_Poll_TID, TotalSoft_Poll_TTitle, TotalSoft_Poll_TType, TotalSoft_Poll_1_MW, TotalSoft_Poll_1_Pos, TotalSoft_Poll_1_BW, TotalSoft_Poll_1_BC, TotalSoft_Poll_1_BR, TotalSoft_Poll_1_BoxSh_Show, TotalSoft_Poll_1_BoxSh_Type, TotalSoft_Poll_1_BoxSh, TotalSoft_Poll_1_BoxShC, TotalSoft_Poll_1_Q_BgC, TotalSoft_Poll_1_Q_C, TotalSoft_Poll_1_Q_FS, TotalSoft_Poll_1_Q_FF, TotalSoft_Poll_1_Q_TA, TotalSoft_Poll_1_LAQ_W, TotalSoft_Poll_1_LAQ_H, TotalSoft_Poll_1_LAQ_C, TotalSoft_Poll_1_LAQ_S, TotalSoft_Poll_1_A_FS, TotalSoft_Poll_1_A_CTF, TotalSoft_Poll_1_A_BgC, TotalSoft_Poll_1_A_C, TotalSoft_Poll_1_CH_CM, TotalSoft_Poll_1_CH_S, TotalSoft_Poll_1_CH_TBC, TotalSoft_Poll_1_CH_CBC, TotalSoft_Poll_1_CH_TAC, TotalSoft_Poll_1_CH_CAC, TotalSoft_Poll_1_A_HBgC, TotalSoft_Poll_1_A_HC, TotalSoft_Poll_1_LAA_W, TotalSoft_Poll_1_LAA_H, TotalSoft_Poll_1_LAA_C, TotalSoft_Poll_1_LAA_S, TotalSoft_Poll_1_VB_MBgC, TotalSoft_Poll_1_VB_Pos, TotalSoft_Poll_1_VB_BW, TotalSoft_Poll_1_VB_BC, TotalSoft_Poll_1_VB_BR, TotalSoft_Poll_1_VB_BgC, TotalSoft_Poll_1_VB_C, TotalSoft_Poll_1_VB_FS, TotalSoft_Poll_1_VB_FF, TotalSoft_Poll_1_VB_Text, TotalSoft_Poll_1_VB_IT, TotalSoft_Poll_1_VB_IA, TotalSoft_Poll_1_VB_IS, TotalSoft_Poll_1_VB_HBgC, TotalSoft_Poll_1_VB_HC, TotalSoft_Poll_1_RB_Show, TotalSoft_Poll_1_RB_Pos, TotalSoft_Poll_1_RB_BW, TotalSoft_Poll_1_RB_BC, TotalSoft_Poll_1_RB_BR, TotalSoft_Poll_1_RB_BgC, TotalSoft_Poll_1_RB_C, TotalSoft_Poll_1_RB_FS, TotalSoft_Poll_1_RB_FF, TotalSoft_Poll_1_RB_Text, TotalSoft_Poll_1_RB_IT, TotalSoft_Poll_1_RB_IA) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', $TotalSoftPoll1_ID[0]->id, 'Total Soft Poll 3', 'Standart Poll', '85', 'center', '0', '#dd3333', '15', 'true', 'true', '10', '#848484', '#ffffff', '#dd0000', '23', 'Gabriola', 'center', '80', '1', '#000000', 'solid', '17', 'false', '#ffffff', '#1e73be', 'true', 'medium 1', 'f096', '#000000', 'f14a', '#000000', '#ffffff', '#333333', '80', '1', '#000000', 'solid', '#ffffff', 'right', '1', '#dd3333', '10', '#ffffff', '#dd3333', '16', 'Aldhabi', 'Vote', 'f124', 'before', '18', '#ffffff', '#dd0000', 'true', 'left', '1', '#dd3333', '10', '#ffffff', '#dd3333', '16', 'Aldhabi', 'Results', 'f128', 'after'));
		$wpdb->query($wpdb->prepare("INSERT INTO $table_name8 (id, TotalSoft_Poll_TID, TotalSoft_Poll_TTitle, TotalSoft_Poll_TType, TotalSoft_Poll_1_RB_IS, TotalSoft_Poll_1_RB_HBgC, TotalSoft_Poll_1_RB_HC, TotalSoft_Poll_1_P_BW, TotalSoft_Poll_1_P_BC, TotalSoft_Poll_1_P_ShPop, TotalSoft_Poll_1_P_ShEff, TotalSoft_Poll_1_P_Q_BgC, TotalSoft_Poll_1_P_Q_C, TotalSoft_Poll_1_P_LAQ_W, TotalSoft_Poll_1_P_LAQ_H, TotalSoft_Poll_1_P_LAQ_C, TotalSoft_Poll_1_P_LAQ_S, TotalSoft_Poll_1_P_A_BgC, TotalSoft_Poll_1_P_A_C, TotalSoft_Poll_1_P_A_VT, TotalSoft_Poll_1_P_A_VC, TotalSoft_Poll_1_P_A_VEff, TotalSoft_Poll_1_P_LAA_W, TotalSoft_Poll_1_P_LAA_H, TotalSoft_Poll_1_P_LAA_C, TotalSoft_Poll_1_P_LAA_S, TotalSoft_Poll_1_P_BB_Pos, TotalSoft_Poll_1_P_BB_BC, TotalSoft_Poll_1_P_BB_BgC, TotalSoft_Poll_1_P_BB_C, TotalSoft_Poll_1_P_BB_Text, TotalSoft_Poll_1_P_BB_IT, TotalSoft_Poll_1_P_BB_IA, TotalSoft_Poll_1_P_BB_HBgC, TotalSoft_Poll_1_P_BB_HC, TotalSoft_Poll_1_P_BB_MBgC, TotalSoft_Poll_1_P_A_MBgC, TotalSoft_Poll_1_A_MBgC) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', $TotalSoftPoll1_ID[0]->id, 'Total Soft Poll 3', 'Standart Poll', '18', '#ffffff', '#ff0000', '1', '#ffffff', 'true', 'FTTB', '#ffffff', '#dd3333', '80', '1', '#000000', 'solid', '#eaeaea', '#000000', 'both', '#000000', '10', '80', '1', '#000000', 'solid', 'right', '#ff0000', '#ffffff', '#ff0000', 'Back', 'f021', 'before', '#ffffff', '#dd3333', '#ffffff', '#ffffff', '#ffffff'));
		//4
		$wpdb->query($wpdb->prepare("INSERT INTO $table_name4 (id, TotalSoft_Poll_TTitle, TotalSoft_Poll_TType) VALUES (%d, %s, %s)", '', 'Total Soft Poll 4', 'Standart Poll'));

		$TotalSoftPoll1_ID=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE TotalSoft_Poll_TTitle=%s order by id desc limit 1", 'Total Soft Poll 4'));

		$wpdb->query($wpdb->prepare("INSERT INTO $table_name5 (id, TotalSoft_Poll_TID, TotalSoft_Poll_TTitle, TotalSoft_Poll_TType, TotalSoft_Poll_1_MW, TotalSoft_Poll_1_Pos, TotalSoft_Poll_1_BW, TotalSoft_Poll_1_BC, TotalSoft_Poll_1_BR, TotalSoft_Poll_1_BoxSh_Show, TotalSoft_Poll_1_BoxSh_Type, TotalSoft_Poll_1_BoxSh, TotalSoft_Poll_1_BoxShC, TotalSoft_Poll_1_Q_BgC, TotalSoft_Poll_1_Q_C, TotalSoft_Poll_1_Q_FS, TotalSoft_Poll_1_Q_FF, TotalSoft_Poll_1_Q_TA, TotalSoft_Poll_1_LAQ_W, TotalSoft_Poll_1_LAQ_H, TotalSoft_Poll_1_LAQ_C, TotalSoft_Poll_1_LAQ_S, TotalSoft_Poll_1_A_FS, TotalSoft_Poll_1_A_CTF, TotalSoft_Poll_1_A_BgC, TotalSoft_Poll_1_A_C, TotalSoft_Poll_1_CH_CM, TotalSoft_Poll_1_CH_S, TotalSoft_Poll_1_CH_TBC, TotalSoft_Poll_1_CH_CBC, TotalSoft_Poll_1_CH_TAC, TotalSoft_Poll_1_CH_CAC, TotalSoft_Poll_1_A_HBgC, TotalSoft_Poll_1_A_HC, TotalSoft_Poll_1_LAA_W, TotalSoft_Poll_1_LAA_H, TotalSoft_Poll_1_LAA_C, TotalSoft_Poll_1_LAA_S, TotalSoft_Poll_1_VB_MBgC, TotalSoft_Poll_1_VB_Pos, TotalSoft_Poll_1_VB_BW, TotalSoft_Poll_1_VB_BC, TotalSoft_Poll_1_VB_BR, TotalSoft_Poll_1_VB_BgC, TotalSoft_Poll_1_VB_C, TotalSoft_Poll_1_VB_FS, TotalSoft_Poll_1_VB_FF, TotalSoft_Poll_1_VB_Text, TotalSoft_Poll_1_VB_IT, TotalSoft_Poll_1_VB_IA, TotalSoft_Poll_1_VB_IS, TotalSoft_Poll_1_VB_HBgC, TotalSoft_Poll_1_VB_HC, TotalSoft_Poll_1_RB_Show, TotalSoft_Poll_1_RB_Pos, TotalSoft_Poll_1_RB_BW, TotalSoft_Poll_1_RB_BC, TotalSoft_Poll_1_RB_BR, TotalSoft_Poll_1_RB_BgC, TotalSoft_Poll_1_RB_C, TotalSoft_Poll_1_RB_FS, TotalSoft_Poll_1_RB_FF, TotalSoft_Poll_1_RB_Text, TotalSoft_Poll_1_RB_IT, TotalSoft_Poll_1_RB_IA) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', $TotalSoftPoll1_ID[0]->id, 'Total Soft Poll 4', 'Standart Poll', '85', 'center', '4', '#ffffff', '15', 'true', 'true', '13', '#848484', '#ff0044', '#ffffff', '23', 'Gabriola', 'center', '80', '1', '#ffffff', 'solid', '17', 'true', '#ff0044', '#ffffff', 'false', 'medium 1', 'f10c', '#ffffff', 'f192', '#ffffff', '#dd003b', '#ffffff', '80', '1', '#ffffff', 'solid', '#ff0044', 'right', '1', '#ffffff', '10', '#ffffff', '#ff0044', '20', 'Gabriola', 'Vote', 'f25a', 'before', '18', '#ff0044', '#ffffff', 'true', 'left', '1', '#ffffff', '10', '#ffffff', '#ff0044', '16', 'Arial', 'Results', 'f080', 'after'));
		$wpdb->query($wpdb->prepare("INSERT INTO $table_name8 (id, TotalSoft_Poll_TID, TotalSoft_Poll_TTitle, TotalSoft_Poll_TType, TotalSoft_Poll_1_RB_IS, TotalSoft_Poll_1_RB_HBgC, TotalSoft_Poll_1_RB_HC, TotalSoft_Poll_1_P_BW, TotalSoft_Poll_1_P_BC, TotalSoft_Poll_1_P_ShPop, TotalSoft_Poll_1_P_ShEff, TotalSoft_Poll_1_P_Q_BgC, TotalSoft_Poll_1_P_Q_C, TotalSoft_Poll_1_P_LAQ_W, TotalSoft_Poll_1_P_LAQ_H, TotalSoft_Poll_1_P_LAQ_C, TotalSoft_Poll_1_P_LAQ_S, TotalSoft_Poll_1_P_A_BgC, TotalSoft_Poll_1_P_A_C, TotalSoft_Poll_1_P_A_VT, TotalSoft_Poll_1_P_A_VC, TotalSoft_Poll_1_P_A_VEff, TotalSoft_Poll_1_P_LAA_W, TotalSoft_Poll_1_P_LAA_H, TotalSoft_Poll_1_P_LAA_C, TotalSoft_Poll_1_P_LAA_S, TotalSoft_Poll_1_P_BB_Pos, TotalSoft_Poll_1_P_BB_BC, TotalSoft_Poll_1_P_BB_BgC, TotalSoft_Poll_1_P_BB_C, TotalSoft_Poll_1_P_BB_Text, TotalSoft_Poll_1_P_BB_IT, TotalSoft_Poll_1_P_BB_IA, TotalSoft_Poll_1_P_BB_HBgC, TotalSoft_Poll_1_P_BB_HC, TotalSoft_Poll_1_P_BB_MBgC, TotalSoft_Poll_1_P_A_MBgC, TotalSoft_Poll_1_A_MBgC) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', $TotalSoftPoll1_ID[0]->id, 'Total Soft Poll 4', 'Standart Poll', '18', '#ff0044', '#ffffff', '4', '#ffffff', 'false', 'FTTB', '#ff0044', '#ffffff', '80', '1', '#ffffff', 'solid', '#ffffff', '#e8e8e8', 'count', '#ff0044', '0', '80', '1', '#ffffff', 'solid', 'full', '#ffffff', '#ffffff', '#ff0044', 'Back', 'f021', 'before', '#ff0044', '#ffffff', '#ff0044', '#ff0044', '#ff0044'));
	}

	$TotalSoftPollQuest1=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name1 WHERE id>%d",0));
	if(count($TotalSoftPollQuest1) == 0)
	{
		$TotalSoftPoll1_ID=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE TotalSoft_Poll_TTitle=%s order by id desc limit 1", 'Total Soft Poll 1'));

		$wpdb->query($wpdb->prepare("INSERT INTO $table_name1 (id, TotalSoftPoll_Question, TotalSoftPoll_Theme, TotalSoftPoll_Ans_C) VALUES (%d, %s, %s, %s)", '', 'Do You Like Our Plugin?', $TotalSoftPoll1_ID[0]->id, '5'));

		$TotalSoftPollQuest1_ID=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name1 WHERE TotalSoftPoll_Question=%s order by id desc limit 1", 'Do You Like Our Plugin?'));
		$wpdb->query($wpdb->prepare("INSERT INTO $table_name3 (id, Poll_ID) VALUES (%d, %d)", '', $TotalSoftPollQuest1_ID[0]->id));

		$wpdb->query($wpdb->prepare("INSERT INTO $table_name2 (id, Question_ID, TotalSoftPoll_Ans, TotalSoftPoll_Ans_Im, TotalSoftPoll_Ans_Vd, TotalSoftPoll_Ans_Cl, TotalSoftPoll_Ans_01, TotalSoftPoll_Ans_02, TotalSoftPoll_Ans_03, TotalSoftPoll_Ans_04, TotalSoftPoll_Ans_05) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', $TotalSoftPollQuest1_ID[0]->id, 'Yes', '', '', '#dd3333', '', '', '', '', ''));
		$TotalSoftPollAns1_ID=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name2 WHERE Question_ID=%s order by id desc limit 1", $TotalSoftPollQuest1_ID[0]->id));
		$wpdb->query($wpdb->prepare("INSERT INTO $table_name6 (id, Poll_ID, Poll_A_ID, Poll_A_Votes) VALUES (%d, %s, %s, %s)", '', $TotalSoftPollQuest1_ID[0]->id, $TotalSoftPollAns1_ID[0]->id, 50));
		$wpdb->query($wpdb->prepare("INSERT INTO $table_name2 (id, Question_ID, TotalSoftPoll_Ans, TotalSoftPoll_Ans_Im, TotalSoftPoll_Ans_Vd, TotalSoftPoll_Ans_Cl, TotalSoftPoll_Ans_01, TotalSoftPoll_Ans_02, TotalSoftPoll_Ans_03, TotalSoftPoll_Ans_04, TotalSoftPoll_Ans_05) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', $TotalSoftPollQuest1_ID[0]->id, 'No', '', '', '#dd9933', '', '', '', '', ''));
		$TotalSoftPollAns1_ID=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name2 WHERE Question_ID=%s order by id desc limit 1", $TotalSoftPollQuest1_ID[0]->id));
		$wpdb->query($wpdb->prepare("INSERT INTO $table_name6 (id, Poll_ID, Poll_A_ID, Poll_A_Votes) VALUES (%d, %s, %s, %s)", '', $TotalSoftPollQuest1_ID[0]->id, $TotalSoftPollAns1_ID[0]->id, 20));
		$wpdb->query($wpdb->prepare("INSERT INTO $table_name2 (id, Question_ID, TotalSoftPoll_Ans, TotalSoftPoll_Ans_Im, TotalSoftPoll_Ans_Vd, TotalSoftPoll_Ans_Cl, TotalSoftPoll_Ans_01, TotalSoftPoll_Ans_02, TotalSoftPoll_Ans_03, TotalSoftPoll_Ans_04, TotalSoftPoll_Ans_05) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', $TotalSoftPollQuest1_ID[0]->id, 'Not at All', '', '', '#81d742', '', '', '', '', ''));
		$TotalSoftPollAns1_ID=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name2 WHERE Question_ID=%s order by id desc limit 1", $TotalSoftPollQuest1_ID[0]->id));
		$wpdb->query($wpdb->prepare("INSERT INTO $table_name6 (id, Poll_ID, Poll_A_ID, Poll_A_Votes) VALUES (%d, %s, %s, %s)", '', $TotalSoftPollQuest1_ID[0]->id, $TotalSoftPollAns1_ID[0]->id, 30));
		$wpdb->query($wpdb->prepare("INSERT INTO $table_name2 (id, Question_ID, TotalSoftPoll_Ans, TotalSoftPoll_Ans_Im, TotalSoftPoll_Ans_Vd, TotalSoftPoll_Ans_Cl, TotalSoftPoll_Ans_01, TotalSoftPoll_Ans_02, TotalSoftPoll_Ans_03, TotalSoftPoll_Ans_04, TotalSoftPoll_Ans_05) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', $TotalSoftPollQuest1_ID[0]->id, 'Of Course', '', '', '#1e73be', '', '', '', '', ''));
		$TotalSoftPollAns1_ID=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name2 WHERE Question_ID=%s order by id desc limit 1", $TotalSoftPollQuest1_ID[0]->id));
		$wpdb->query($wpdb->prepare("INSERT INTO $table_name6 (id, Poll_ID, Poll_A_ID, Poll_A_Votes) VALUES (%d, %s, %s, %s)", '', $TotalSoftPollQuest1_ID[0]->id, $TotalSoftPollAns1_ID[0]->id, 70));
		$wpdb->query($wpdb->prepare("INSERT INTO $table_name2 (id, Question_ID, TotalSoftPoll_Ans, TotalSoftPoll_Ans_Im, TotalSoftPoll_Ans_Vd, TotalSoftPoll_Ans_Cl, TotalSoftPoll_Ans_01, TotalSoftPoll_Ans_02, TotalSoftPoll_Ans_03, TotalSoftPoll_Ans_04, TotalSoftPoll_Ans_05) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', $TotalSoftPollQuest1_ID[0]->id, 'The Best Plugin Ever', '', '', '#8224e3', '', '', '', '', ''));
		$TotalSoftPollAns1_ID=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name2 WHERE Question_ID=%s order by id desc limit 1", $TotalSoftPollQuest1_ID[0]->id));
		$wpdb->query($wpdb->prepare("INSERT INTO $table_name6 (id, Poll_ID, Poll_A_ID, Poll_A_Votes) VALUES (%d, %s, %s, %s)", '', $TotalSoftPollQuest1_ID[0]->id, $TotalSoftPollAns1_ID[0]->id, 110));
	}
?>