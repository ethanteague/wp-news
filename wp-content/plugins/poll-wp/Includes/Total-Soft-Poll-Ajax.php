<?php
	add_action( 'wp_ajax_TSoftPoll_Vimeo_Video_Image', 'TSoftPoll_Vimeo_Video_Image_Callback' );
	add_action( 'wp_ajax_nopriv_TSoftPoll_Vimeo_Video_Image', 'TSoftPoll_Vimeo_Video_Image_Callback' );

	function TSoftPoll_Vimeo_Video_Image_Callback()
	{
		$GET_Video_Video_Src = sanitize_text_field($_POST['foobar']);

		$TSoft_Poll_Image_Src=explode('video/',$GET_Video_Video_Src);
		$TSoft_Poll_Image_Src_Real=unserialize(file_get_contents("http://vimeo.com/api/v2/video/$TSoft_Poll_Image_Src[1].php"));
		$TSoft_Poll_Image_Src_Real=$TSoft_Poll_Image_Src_Real[0]['thumbnail_large'];

		echo $TSoft_Poll_Image_Src_Real;
		die();
	}

	add_action( 'wp_ajax_TotalSoftPoll_Del', 'TotalSoftPoll_Del_Callback' );
	add_action( 'wp_ajax_nopriv_TotalSoftPoll_Del', 'TotalSoftPoll_Del_Callback' );

	function TotalSoftPoll_Del_Callback()
	{
		$Poll_ID = sanitize_text_field($_POST['foobar']);
		global $wpdb;
		$table_name1 = $wpdb->prefix . "totalsoft_poll_manager";
		$table_name2 = $wpdb->prefix . "totalsoft_poll_answers";

		$wpdb->query($wpdb->prepare("DELETE FROM $table_name1 WHERE id=%d", $Poll_ID));
		$wpdb->query($wpdb->prepare("DELETE FROM $table_name2 WHERE Question_ID=%s", $Poll_ID));
		die();
	}

	add_action( 'wp_ajax_TotalSoftPoll_Edit', 'TotalSoftPoll_Edit_Callback' );
	add_action( 'wp_ajax_nopriv_TotalSoftPoll_Edit', 'TotalSoftPoll_Edit_Callback' );

	function TotalSoftPoll_Edit_Callback()
	{
		$Poll_ID = sanitize_text_field($_POST['foobar']);
		global $wpdb;
		$table_name1 = $wpdb->prefix . "totalsoft_poll_manager";
		$table_name2 = $wpdb->prefix . "totalsoft_poll_answers";

		$Total_Soft_Poll_Manager=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name1 WHERE id=%s", $Poll_ID));
		print_r($Total_Soft_Poll_Manager);
		die();
	}

	add_action( 'wp_ajax_TotalSoftPoll_Edit_Ans', 'TotalSoftPoll_Edit_Ans_Callback' );
	add_action( 'wp_ajax_nopriv_TotalSoftPoll_Edit_Ans', 'TotalSoftPoll_Edit_Ans_Callback' );

	function TotalSoftPoll_Edit_Ans_Callback()
	{
		$Poll_ID = sanitize_text_field($_POST['foobar']);
		global $wpdb;
		$table_name1 = $wpdb->prefix . "totalsoft_poll_manager";
		$table_name2 = $wpdb->prefix . "totalsoft_poll_answers";

		$TotalSoftPoll_Edit_Answers=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name2 WHERE Question_ID=%s order by id", $Poll_ID));
		print_r($TotalSoftPoll_Edit_Answers);
		die();
	}

	add_action( 'wp_ajax_TotalSoftPoll_1_Vote', 'TotalSoftPoll_1_Vote_Callback' );
	add_action( 'wp_ajax_nopriv_TotalSoftPoll_1_Vote', 'TotalSoftPoll_1_Vote_Callback' );

	function TotalSoftPoll_1_Vote_Callback()
	{
		$Total_Soft_Poll_1_Ans_ID = sanitize_text_field($_POST['foobar']);

		global $wpdb;
		$table_name6 = $wpdb->prefix . "totalsoft_poll_results";
		$table_name7 = $wpdb->prefix . "totalsoft_poll_inform";

		$Voted_Poll_Pars_Split=explode('^*^', $Total_Soft_Poll_1_Ans_ID);

		$Total_Soft_Poll_Question_ID=$wpdb->get_var($wpdb->prepare("SELECT Poll_ID FROM $table_name6 WHERE Poll_A_ID=%d", $Voted_Poll_Pars_Split[0]));

		for($i=0;$i<count($Voted_Poll_Pars_Split);$i++)
		{
			$Total_Soft_Poll_Ans_Votes=$wpdb->get_var($wpdb->prepare("SELECT Poll_A_Votes FROM $table_name6 WHERE Poll_A_ID=%d", $Voted_Poll_Pars_Split[$i]));
			$Total_Soft_Poll_Ans_Votes++;

			$wpdb->query($wpdb->prepare("UPDATE $table_name6 set Poll_A_Votes=%s WHERE Poll_A_ID=%s",$Total_Soft_Poll_Ans_Votes, $Voted_Poll_Pars_Split[$i]));
		}
		
		if ( isset( $_SERVER['HTTP_CLIENT_IP'] ) ) {
			$Total_Soft_IP_Address = $_SERVER['HTTP_CLIENT_IP'];
		} elseif ( getenv( 'HTTP_X_FORWARDED_FOR' ) ) {
			$Total_Soft_IP_Address = getenv( 'HTTP_X_FORWARDED_FOR' );
		} elseif ( getenv( 'HTTP_X_FORWARDED' ) ) {
			$Total_Soft_IP_Address = getenv( 'HTTP_X_FORWARDED' );
		} elseif ( getenv( 'HTTP_FORWARDED_FOR' ) ) {
			$Total_Soft_IP_Address = getenv( 'HTTP_FORWARDED_FOR' );
		} elseif ( getenv( 'HTTP_FORWARDED' ) ) {
			$Total_Soft_IP_Address = getenv( 'HTTP_FORWARDED' );
		} elseif ( getenv( 'REMOTE_ADDR' ) ) {
			$Total_Soft_IP_Address = getenv( 'REMOTE_ADDR' );
		} else {
			$Total_Soft_IP_Address = 'UNKNOWN';
		}

		$Total_Soft_IP_Address_Info = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$Total_Soft_IP_Address));
		$Total_Soft_IP_Address_Info['geoplugin_city']='( Pro )';
		$Total_Soft_IP_Address_Info['geoplugin_region']='( Pro )';
		$Total_Soft_IP_Address_Info['geoplugin_countryName']='( Pro )';
		$Total_Soft_IP_Address_Info['geoplugin_countryCode']='UN';

		$wpdb->query($wpdb->prepare("INSERT INTO $table_name7 (id, Poll_ID, IPAddress, City, Region, CountryCode, CountryName, CountryFlag, Data) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s)", '', $Total_Soft_Poll_Question_ID, $Total_Soft_IP_Address, $Total_Soft_IP_Address_Info['geoplugin_city'], $Total_Soft_IP_Address_Info['geoplugin_region'], $Total_Soft_IP_Address_Info['geoplugin_countryCode'], $Total_Soft_IP_Address_Info['geoplugin_countryName'], plugins_url('../Images/Flags/' . $Total_Soft_IP_Address_Info['geoplugin_countryCode'] . '.png',__FILE__), date("Y.m.d h:i:sa")));

		$Total_Soft_Poll_Results=$wpdb->get_results($wpdb->prepare("SELECT Poll_A_Votes FROM $table_name6 WHERE Poll_ID=%s order by id", $Total_Soft_Poll_Question_ID));
		print_r($Total_Soft_Poll_Results);
		die();
	}

	add_action( 'wp_ajax_TotalSoftPoll_1_Results', 'TotalSoftPoll_1_Results_Callback' );
	add_action( 'wp_ajax_nopriv_TotalSoftPoll_1_Results', 'TotalSoftPoll_1_Results_Callback' );

	function TotalSoftPoll_1_Results_Callback()
	{
		$Total_Soft_Poll_1_Quest_ID = sanitize_text_field($_POST['foobar']);
		global $wpdb;
		$table_name6 = $wpdb->prefix . "totalsoft_poll_results";
		
		$Total_Soft_Poll_Results=$wpdb->get_results($wpdb->prepare("SELECT Poll_A_Votes FROM $table_name6 WHERE Poll_ID=%s order by id", $Total_Soft_Poll_1_Quest_ID));
		print_r($Total_Soft_Poll_Results);
		die();
	}
?>