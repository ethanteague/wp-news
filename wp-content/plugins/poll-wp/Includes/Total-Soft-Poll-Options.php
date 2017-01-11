<?php
	if(!defined('ABSPATH')) exit;
	if(!current_user_can('manage_options'))
	{
		die('Access Denied');
	}
	global $wpdb;
	$table_name4 = $wpdb->prefix . "totalsoft_poll_dbt";

	$TotalSoftPollThemes=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE id>%d order by id", 0));
?>
<link rel="stylesheet" type="text/css" href="<?php echo plugins_url('../CSS/totalsoft.css',__FILE__);?>">
<form method="POST">
	<div class="Total_Soft_Poll_AMD">

		<a href="http://total-soft.pe.hu/poll/" target="_blank" title="Click to Buy">
			<div class="Full_Version"><i class="totalsoft totalsoft-cart-arrow-down"></i> Get The Full Version</div>
		</a>
		<div class="Full_Version_Span">
			This is the free version of the plugin.
		</div>

		<div class="Total_Soft_Poll_AMD1"></div>
		<div class="Total_Soft_Poll_AMD3">
			<i class="Total_Soft_Poll_Help totalsoft totalsoft-question-circle-o" title=""></i>
			<input type="button" value="Cancel" class="Total_Soft_Poll_AMD2_But" onclick='TotalSoftPoll_Reload()'>
		</div>
	</div>

	<table class="Total_Soft_Poll_TMMTable">
		<tr class="Total_Soft_Poll_TMMTableFR">
			<td>No</td>
			<td>Title</td>
			<td>Type</td>
			<td>Actions</td>
		</tr>
	</table>

	<table class="Total_Soft_Poll_TMOTable">
	 	<?php for($i=0;$i<count($TotalSoftPollThemes);$i++){ ?> 
	 		<tr>
				<td><?php echo $i+1;?></td>
				<td><?php echo $TotalSoftPollThemes[$i]->TotalSoft_Poll_TTitle;?></td>
				<td><?php echo $TotalSoftPollThemes[$i]->TotalSoft_Poll_TType;?></td>
				<td onclick="TotalSoftPoll_Theme_Edit(<?php echo $i+1;?>)"><i class="Total_SoftPoll_icon totalsoft totalsoft-pencil"></i></td>
				<td><i class="Total_SoftPoll_icon totalsoft totalsoft-trash"></i></td>
			</tr>
	 	<?php }?>
	</table>

	<img src="<?php echo plugins_url('../Images/Themes/poll-1.png',__FILE__);?>" class="TotalSoft_Poll_Free_Version_Im" id="TotalSoft_Poll_Free_Version_Im_1">
	<img src="<?php echo plugins_url('../Images/Themes/poll-2.png',__FILE__);?>" class="TotalSoft_Poll_Free_Version_Im" id="TotalSoft_Poll_Free_Version_Im_2">
	<img src="<?php echo plugins_url('../Images/Themes/poll-3.png',__FILE__);?>" class="TotalSoft_Poll_Free_Version_Im" id="TotalSoft_Poll_Free_Version_Im_3">
	<img src="<?php echo plugins_url('../Images/Themes/poll-4.png',__FILE__);?>" class="TotalSoft_Poll_Free_Version_Im" id="TotalSoft_Poll_Free_Version_Im_4">
</form>