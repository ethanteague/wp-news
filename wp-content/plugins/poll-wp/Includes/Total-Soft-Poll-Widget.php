<?php
	class Total_Soft_Poll extends WP_Widget
	{
		function __construct()
 	  	{
 			$params=array('name'=>'Total Soft Poll','description'=>'This is the widget of Total Soft Poll plugin');
			parent::__construct('Total_Soft_Poll','',$params);
 	  	}
		function form($instance)
 		{
 			$defaults = array('Total_Soft_Poll'=>'');
		    $instance = wp_parse_args((array)$instance, $defaults);

		   	$Total_Soft_Poll = $instance['Total_Soft_Poll'];
		   	?>
		   	<div>			  
			   	<p>
			   		Select Question:
			   		<select name="<?php echo $this->get_field_name('Total_Soft_Poll'); ?>" class="widefat">
				   		<?php
				   			global $wpdb;

							$table_name1 = $wpdb->prefix . "totalsoft_poll_manager";
							$Total_Soft_Poll=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name1 WHERE id > %d order by id", 0));
				   			
				   			foreach ($Total_Soft_Poll as $Total_Soft_Poll1)
				   			{
				   				?> <option value="<?php echo $Total_Soft_Poll1->id; ?>"> <?php echo $Total_Soft_Poll1->TotalSoftPoll_Question; ?> </option> <?php 
				   			}
				   		?>
			   		</select>
			   	</p>
		   	</div>
		   	<?php	
 		}
 		function widget($args,$instance)
 		{
 			extract($args);
 		 	$Total_Soft_Poll = empty($instance['Total_Soft_Poll']) ? '' : $instance['Total_Soft_Poll'];
 		 	global $wpdb;
 		 	$table_name1 = $wpdb->prefix . "totalsoft_poll_manager";
			$table_name2 = $wpdb->prefix . "totalsoft_poll_answers";
			$table_name4 = $wpdb->prefix . "totalsoft_poll_dbt";
			$table_name5 = $wpdb->prefix . "totalsoft_poll_stpoll";
			$table_name6 = $wpdb->prefix . "totalsoft_poll_results";
			$table_name8 = $wpdb->prefix . "totalsoft_poll_stpoll_1";

			$Total_Soft_Poll_Man=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name1 WHERE id = %d order by id", $Total_Soft_Poll));
			$Total_Soft_Poll_Ans=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name2 WHERE Question_ID = %s order by id", $Total_Soft_Poll));
			$Total_Soft_Poll_Res=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name6 WHERE Poll_ID = %s order by id", $Total_Soft_Poll));
			$Total_Soft_Poll_Res_Count=$wpdb->get_var($wpdb->prepare("SELECT SUM(Poll_A_Votes) FROM $table_name6 WHERE Poll_ID = %s", $Total_Soft_Poll));
			if($Total_Soft_Poll_Res_Count == 0){ $Total_Soft_Poll_Res_Count = 1; }
			$Total_Soft_Poll_Themes=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE id=%d order by id", $Total_Soft_Poll_Man[0]->TotalSoftPoll_Theme));
			if($Total_Soft_Poll_Themes[0]->TotalSoft_Poll_TType=='Standart Poll')
			{
				$Total_Soft_Poll_Theme=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name5 WHERE TotalSoft_Poll_TID=%s order by id", $Total_Soft_Poll_Themes[0]->id));
				$Total_Soft_Poll_Theme_1=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name8 WHERE TotalSoft_Poll_TID=%s order by id", $Total_Soft_Poll_Themes[0]->id));
			}

 		 	echo $before_widget;
			?>
				<link rel="stylesheet" type="text/css" href="<?php echo plugins_url('../CSS/totalsoft.css',__FILE__);?>">
				<?php if($Total_Soft_Poll_Themes[0]->TotalSoft_Poll_TType == 'Standart Poll'){ ?>
					<style type="text/css">
						.Total_Soft_Poll_1_Main_Div_<?php echo $Total_Soft_Poll;?>
						{
							position: relative;
							overflow: hidden;
							width: <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_MW;?>%;
							<?php if($Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_Pos == 'left'){ ?>
								float: left;
							<?php } else if($Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_Pos == 'right'){ ?>
								float: right;
							<?php } else { ?>
								margin: 0 auto;
							<?php }?>
							border: <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_BW;?>px solid <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_BC;?>;
							border-radius: <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_BR;?>px;
							<?php if($Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_BoxSh_Show == 'true'){ ?>
	    						<?php if($Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_BoxSh_Type == 'true'){ ?> 
	    							-webkit-box-shadow: 0px 0px <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_BoxSh;?>px <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_BoxShC;?>;
	                                -moz-box-shadow: 0px 0px <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_BoxSh;?>px <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_BoxShC;?>;
	    							box-shadow: 0px 0px <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_BoxSh;?>px <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_BoxShC;?>;
	    						<?php }else{ ?>
	    							-webkit-box-shadow: 0 25px <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_BoxSh;?>px -18px <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_BoxShC;?>;
	    							-moz-box-shadow: 0 25px <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_BoxSh;?>px -18px <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_BoxShC;?>;
	    							box-shadow: 0 25px <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_BoxSh;?>px -18px <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_BoxShC;?>;
	    						<?php }?>
	    					<?php }?>
						}
						.Total_Soft_Poll_1_Main_Div_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_Quest_Div_<?php echo $Total_Soft_Poll;?>
						{
							position: relative;
							background-color: <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_Q_BgC;?>;
							color: <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_Q_C;?>;
							font-size: <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_Q_FS;?>px;
							font-family: <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_Q_FF;?>;
							text-align: <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_Q_TA;?>;
							padding: 5px 10px;
						}						
						.Total_Soft_Poll_1_Main_Div_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_LAQ_Div_<?php echo $Total_Soft_Poll;?>
						{
							position: relative;
							width: <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_LAQ_W;?>%;
							margin: 0 auto;
							border-top: <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_LAQ_H;?>px <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_LAQ_S;?> <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_LAQ_C;?>;
						}
						.Total_Soft_Poll_1_Main_Div_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_Ans_Div_<?php echo $Total_Soft_Poll;?>
						{
							position: relative;
							background-color:  <?php echo $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_A_MBgC;?>;
							padding: 5px 10px;
						}
						.Total_Soft_Poll_1_Main_Div_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_Ans_Div_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_Ans_Check_Div
						{
							position:relative; 
							display: inline-block; 
							width: 100%;
							padding: 0px 5px;
							background-color: <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_A_BgC;?>;
							margin-top: 3px;
							line-height: 1 !important;
						}
						.Total_Soft_Poll_1_Main_Div_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_Ans_Div_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_Ans_Lab_<?php echo $Total_Soft_Poll;?>
						{
							display: inline-block; 
							float: none;
							width: 100%;
							font-family: FontAwesome;
						}
						.Total_Soft_Poll_1_Main_Div_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_Ans_Div_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_Ans_Check_Div:hover
						{
							background-color: <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_A_HBgC;?>;
						}
						.Total_Soft_Poll_1_Main_Div_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_Ans_Div_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_Ans_Check_Div:hover label
						{
							color: <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_A_HC;?> !important;
						}
						.Total_Soft_Poll_1_Main_Div_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_Ans_Div_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_Ans_Check_Div input
						{
						  	display: none;
						}												
						.Total_Soft_Poll_1_Main_Div_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_Ans_Div_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_Ans_Check_Div input + label {
							<?php if($Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_A_CTF == 'true'){ ?>
								color: <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_A_C;?> !important;
							<?php }?>
							font-size: <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_A_FS;?>px !important;
							cursor: pointer;
							margin-bottom: 0px !important;
						}
						.Total_Soft_Poll_1_Main_Div_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_Ans_Div_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_Ans_Check_Div input + label:before {
							color: <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_CH_CBC;?>;
							content: "\<?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_CH_TBC;?>";
							margin: 0 .25em 0 0 !important;
							padding: 0 !important;
							<?php if($Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_CH_S=='big'){ ?>
								font-size: 32px !important;		
								vertical-align: middle !important;						
							<?php }else if($Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_CH_S=='medium 2'){ ?>
								font-size: 26px !important;	
								vertical-align: sub !important;						
							<?php }else if($Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_CH_S=='medium 1'){ ?>
								font-size: 22px !important;	
								vertical-align: sub !important;						
							<?php }else{ ?>
								font-size: 18px !important;
								vertical-align: initial !important;						
							<?php }?>
						}
						.Total_Soft_Poll_1_Main_Div_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_Ans_Div_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_Ans_Check_Div input:checked + label:before {
							color: <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_CH_CAC;?> !important;
							content: "\<?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_CH_TAC;?>";
						}
						.Total_Soft_Poll_1_Main_Div_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_Ans_Div_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_Ans_Check_Div input:checked + label:after {
						  font-weight: bold;
						}
						.Total_Soft_Poll_1_Main_Div_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_LAA_Div_<?php echo $Total_Soft_Poll;?>
						{
							position: relative;
							width: <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_LAA_W;?>%;
							margin: 5px auto 0 auto;
							border-top: <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_LAA_H;?>px <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_LAA_S;?> <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_LAA_C;?>;
						}
						.Total_Soft_Poll_1_Main_Div_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_But_MDiv_<?php echo $Total_Soft_Poll;?>
						{
							padding: 0px;
							background-color: <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_VB_MBgC;?>;
							position: relative;
						    float: left;
						    width: 100%;
						}
						.Total_Soft_Poll_1_Main_Div_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_But_Result_<?php echo $Total_Soft_Poll;?>
						{
							background: <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_RB_BgC;?> !important;
							border: <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_RB_BW;?>px solid <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_RB_BC;?> !important;
							border-radius: <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_RB_BR;?>px !important;
							<?php if($Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_RB_Pos=='right'){ ?>
								float: right;
								margin: 10px 10px;
							<?php }else if($Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_RB_Pos=='left'){ ?>
								margin: 10px 10px;
							<?php }else if($Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_RB_Pos=='full'){ ?>
								width: 98% !important;
								margin: 5px 1%;
							<?php }?>								
							color: <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_RB_C;?> !important;
							padding: 3px 10px !important;
							text-transform: none !important;
							line-height: 1 !important;
							cursor: pointer;							
						}
						.Total_Soft_Poll_1_Main_Div_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_But_Result_<?php echo $Total_Soft_Poll;?> span
						{
							font-size: <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_RB_FS;?>px !important;
							font-family: <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_RB_FF;?>;
						}
						.Total_Soft_Poll_1_Main_Div_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_But_Result_<?php echo $Total_Soft_Poll;?>:hover
						{
							background: <?php echo $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_RB_HBgC;?> !important;
							color: <?php echo $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_RB_HC;?> !important;
							opacity: 1 !important;
						}
						.Total_Soft_Poll_1_Main_Div_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_But_Result_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_Result_But_Icon
						{						
							font-size: <?php echo $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_RB_IS;?>px !important;
						}
						.Total_Soft_Poll_1_Main_Div_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_But_Result_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_Result_But_Icon:before
						{
							<?php if($Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_RB_IA=='after'){ ?>
								float: right;
								margin-left: 10px;
							<?php }else{ ?>
								margin-right: 10px;
							<?php }?>
							content: "\<?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_RB_IT;?>";
						}
						.Total_Soft_Poll_1_Main_Div_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_But_Vote_<?php echo $Total_Soft_Poll;?>
						{
							background: <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_VB_BgC;?> !important;
							border: <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_VB_BW;?>px solid <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_VB_BC;?> !important;
							border-radius: <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_VB_BR;?>px !important;
							<?php if($Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_VB_Pos=='right'){ ?>
								float: right;
								margin: 10px 10px;
							<?php }else if($Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_VB_Pos=='left'){ ?>
								margin: 10px 10px;
							<?php }else if($Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_VB_Pos=='full'){ ?>
								width: 98% !important;
								margin: 5px 1%;
							<?php }?>								
							color: <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_VB_C;?> !important;
							padding: 3px 10px !important;
							text-transform: none !important;
							line-height: 1 !important;
							cursor: pointer;							
						}
						.Total_Soft_Poll_1_Main_Div_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_But_Vote_<?php echo $Total_Soft_Poll;?> span
						{
							font-size: <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_VB_FS;?>px !important;
							font-family: <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_VB_FF;?>;
						}
						.Total_Soft_Poll_1_Main_Div_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_But_Vote_<?php echo $Total_Soft_Poll;?>:hover
						{
							background: <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_VB_HBgC;?> !important;
							color: <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_VB_HC;?> !important;
							opacity: 1 !important;							
						}
						.Total_Soft_Poll_1_Main_Div_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_But_Vote_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_Vote_But_Icon
						{						
							font-size: <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_VB_IS;?>px !important;
						}
						.Total_Soft_Poll_1_Main_Div_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_But_Vote_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_Vote_But_Icon:before
						{
							<?php if($Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_VB_IA=='after'){ ?>
								float: right;
								margin-left: 10px;
							<?php }else{ ?>
								margin-right: 10px;
							<?php }?>
							content: "\<?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_VB_IT;?>";
						}
						@media only screen and ( max-width: 500px )
						{
							.Total_Soft_Poll_1_Main_Div_<?php echo $Total_Soft_Poll;?> 
							{
								width: 100% !important;
							}
							.Total_Soft_Poll_1_Main_Ans_Div_<?php echo $Total_Soft_Poll;?>
							{
								width: 100% !important;
								left: 0% !important;
							}
							.Total_Soft_Poll_1_Main_Div_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_But_Vote_<?php echo $Total_Soft_Poll;?>, .Total_Soft_Poll_1_Main_Div_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_But_Result_<?php echo $Total_Soft_Poll;?>, .Total_Soft_Poll_1_Main_Ans_Div_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_But_Back_<?php echo $Total_Soft_Poll;?>, .Total_Soft_Poll_1_Main_Ans_Div_Fix_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_But_Back_<?php echo $Total_Soft_Poll;?>
							{
								width: 98% !important;
								margin: 5px 1%;
							}
						}
						.Total_Soft_Poll_1_Main_Div_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_But_Vote_<?php echo $Total_Soft_Poll;?>:focus, .Total_Soft_Poll_1_Main_Div_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_But_Result_<?php echo $Total_Soft_Poll;?>:focus, .Total_Soft_Poll_1_Main_Ans_Div_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_But_Back_<?php echo $Total_Soft_Poll;?>:focus, .Total_Soft_Poll_1_Main_Ans_Div_Fix_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_But_Back_<?php echo $Total_Soft_Poll;?>:focus
						{
							outline: none !important;
						}
						.Total_Soft_Poll_Main_Div .Total_Soft_Poll_1_Main_Ans_Div_<?php echo $Total_Soft_Poll;?>
						{
							<?php if( $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_ShEff == 'FTTB' ){ ?>
								position: absolute;
								width: <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_MW;?>%;
								height: 100%;
								left: <?php echo (100-$Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_MW)/2;?>%;
								top: 0%;
								overflow: hidden;
								border: <?php echo $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_BW; ?>px solid <?php echo $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_BC; ?>;
								border-radius: <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_BR; ?>px;
								-webkit-transform: translateY(-12000px);
							    -moz-transform: translateY(-12000px);
							    -o-transform: translateY(-12000px);
							    -ms-transform: translateY(-12000px);
							    transform: translateY(-12000px);
							    -webkit-transition: all 0.5s ease-in-out 0.5s;
							    -moz-transition: all 0.5s ease-in-out 0.5s;
							    -o-transition: all 0.5s ease-in-out 0.5s;
							    -ms-transition: all 0.5s ease-in-out 0.5s;
							    transition: all 0.5s ease-in-out 0.5s;
							    -webkit-transition-delay: 0s;
								-moz-transition-delay: 0s;
								-o-transition-delay: 0s;
								-ms-transition-delay: 0s;
								transition-delay: 0s;
							<?php } else if( $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_ShEff == 'FLTR' ){ ?>
								position: absolute;
								width: <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_MW;?>%;
								height: 100%;
								left: <?php echo (100-$Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_MW)/2;?>%;
								top: 0%;
								overflow: hidden;
								border: <?php echo $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_BW; ?>px solid <?php echo $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_BC; ?>;
								border-radius: <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_BR; ?>px;
							    -webkit-transform: translateX(-12000px);
							    -moz-transform: translateX(-12000px);
							    -o-transform: translateX(-12000px);
							    -ms-transform: translateX(-12000px);
							    transform: translateX(-12000px);
							    -webkit-transition: all 0.5s ease-in-out 0.5s;
							    -moz-transition: all 0.5s ease-in-out 0.5s;
							    -o-transition: all 0.5s ease-in-out 0.5s;
							    -ms-transition: all 0.5s ease-in-out 0.5s;
							    transition: all 0.5s ease-in-out 0.5s;
							    -webkit-transition-delay: 0s;
								-moz-transition-delay: 0s;
								-o-transition-delay: 0s;
								-ms-transition-delay: 0s;
								transition-delay: 0s;
							<?php } else if( $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_ShEff == 'FRTL' ){ ?>
								position: absolute;
								width: <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_MW;?>%;
								height: 100%;
								left: <?php echo (100-$Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_MW)/2;?>%;
								top: 0%;
								overflow: hidden;
								border: <?php echo $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_BW; ?>px solid <?php echo $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_BC; ?>;
								border-radius: <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_BR; ?>px;
							    -webkit-transform: translateX(12000px);
							    -moz-transform: translateX(12000px);
							    -o-transform: translateX(12000px);
							    -ms-transform: translateX(12000px);
							    transform: translateX(12000px);
							    -webkit-transition: all 0.5s ease-in-out 0.5s;
							    -moz-transition: all 0.5s ease-in-out 0.5s;
							    -o-transition: all 0.5s ease-in-out 0.5s;
							    -ms-transition: all 0.5s ease-in-out 0.5s;
							    transition: all 0.5s ease-in-out 0.5s;
							    -webkit-transition-delay: 0s;
								-moz-transition-delay: 0s;
								-o-transition-delay: 0s;
								-ms-transition-delay: 0s;
								transition-delay: 0s;
							<?php } else if( $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_ShEff == 'FCTA' ){ ?>
								position: absolute;
								width: 0%;
								height: 0%;
								top: 50%;
								left: 50%;
								overflow: hidden;
								border: 0px;
								border-style: solid;
								border-color: <?php echo $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_BC;?>;
							<?php } else if( $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_ShEff == 'FTL' ){ ?>
								position: absolute;
								width: <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_MW;?>%;
								height: 100%;
								left: <?php echo (100-$Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_MW)/2;?>%;
								top: 0%;
								overflow: hidden;
								border: <?php echo $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_BW; ?>px solid <?php echo $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_BC; ?>;
								border-radius: <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_BR; ?>px;
							    -ms-transform: rotateY(-90deg); /* IE 9 */
							    -moz-transform: rotateY(-90deg);
							    -o-transform: rotateY(-90deg);
							    -webkit-transform: rotateY(-90deg); /* Safari */
							    transform: rotateY(-90deg); /* Standard syntax */
							    -webkit-transition: all 0.5s ease-in-out 0.5s;
							    -moz-transition: all 0.5s ease-in-out 0.5s;
							    -o-transition: all 0.5s ease-in-out 0.5s;
							    -ms-transition: all 0.5s ease-in-out 0.5s;
							    transition: all 0.5s ease-in-out 0.5s;
							    -webkit-transition-delay: 0s;
								-moz-transition-delay: 0s;
								-o-transition-delay: 0s;
								-ms-transition-delay: 0s;
								transition-delay: 0s;
							<?php } else if( $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_ShEff == 'FTR' ){ ?>
								position: absolute;
								width: <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_MW;?>%;
								height: 100%;
								left: <?php echo (100-$Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_MW)/2;?>%;
								top: 0%;
								overflow: hidden;
								border: <?php echo $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_BW; ?>px solid <?php echo $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_BC; ?>;
								border-radius: <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_BR; ?>px;
							    -ms-transform: rotateX(-90deg); /* IE 9 */
							    -moz-transform: rotateX(-90deg);
							    -o-transform: rotateX(-90deg);
							    -webkit-transform: rotateX(-90deg); /* Safari */
							    transform: rotateX(-90deg); /* Standard syntax */
							    -webkit-transition: all 0.5s ease-in-out 0.5s;
							    -moz-transition: all 0.5s ease-in-out 0.5s;
							    -o-transition: all 0.5s ease-in-out 0.5s;
							    -ms-transition: all 0.5s ease-in-out 0.5s;
							    transition: all 0.5s ease-in-out 0.5s;
							    -webkit-transition-delay: 0s;
								-moz-transition-delay: 0s;
								-o-transition-delay: 0s;
								-ms-transition-delay: 0s;
								transition-delay: 0s;
							<?php } else if( $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_ShEff == 'FBL' ){ ?>
								position: absolute;
								width: <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_MW;?>%;
								height: 100%;
								left: <?php echo (100-$Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_MW)/2;?>%;
								top: 0%;
								overflow: hidden;
								border: <?php echo $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_BW; ?>px solid <?php echo $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_BC; ?>;
								border-radius: <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_BR; ?>px;
							  	z-index: -1;
							    -ms-transform: rotate(-180deg); /* IE 9 */
							    -moz-transform: rotate(-180deg);
							    -o-transform: rotate(-180deg);
							    -webkit-transform: rotate(-180deg); /* Safari */
							    transform: rotate(-180deg); /* Standard syntax */
							    -webkit-transition: all 0.5s ease-in-out 0.5s;
							    -moz-transition: all 0.5s ease-in-out 0.5s;
							    -o-transition: all 0.5s ease-in-out 0.5s;
							    -ms-transition: all 0.5s ease-in-out 0.5s;
							    transition: all 0.5s ease-in-out 0.5s;
							    -webkit-transition-delay: 0s;
								-moz-transition-delay: 0s;
								-o-transition-delay: 0s;
								-ms-transition-delay: 0s;
								transition-delay: 0s;
							<?php } else if( $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_ShEff == 'FBR' ){ ?>
								position: absolute;
								width: <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_MW;?>%;
								height: 100%;
								left: <?php echo (100-$Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_MW)/2;?>%;
								top: 0%;
								overflow: hidden;
								border: <?php echo $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_BW; ?>px solid <?php echo $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_BC; ?>;
								border-radius: <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_BR; ?>px;
							    -ms-transform: skewX(90deg); /* IE 9 */
							    -moz-transform: skewX(90deg);
							    -o-transform: skewX(90deg);
							    -webkit-transform: skewX(90deg); /* Safari */
							    transform: skewX(90deg); /* Standard syntax */
							    -webkit-transition: all 0.5s ease-in-out 0.5s;
							    -moz-transition: all 0.5s ease-in-out 0.5s;
							    -o-transition: all 0.5s ease-in-out 0.5s;
							    -ms-transition: all 0.5s ease-in-out 0.5s;
							    transition: all 0.5s ease-in-out 0.5s;
							    -webkit-transition-delay: 0s;
								-moz-transition-delay: 0s;
								-o-transition-delay: 0s;
								-ms-transition-delay: 0s;
								transition-delay: 0s;
							<?php } else if( $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_ShEff == 'FBTT' ){ ?>
								position: absolute;
								width: <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_MW;?>%;
								height: 100%;
								left: <?php echo (100-$Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_MW)/2;?>%;
								top: 0%;
								overflow: hidden;
								border: <?php echo $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_BW; ?>px solid <?php echo $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_BC; ?>;
								border-radius: <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_BR; ?>px;
							    -ms-transform: skewY(90deg);
							    -moz-transform: skewY(90deg);
							    -o-transform: skewY(90deg);
							    -webkit-transform: skewY(90deg); 
							    transform: skewY(90deg); 
							    -webkit-transition: all 0.5s ease-in-out 0.5s;
							    -moz-transition: all 0.5s ease-in-out 0.5s;
							    -o-transition: all 0.5s ease-in-out 0.5s;
							    -ms-transition: all 0.5s ease-in-out 0.5s;
							    transition: all 0.5s ease-in-out 0.5s;
							    -webkit-transition-delay: 0s;
								-moz-transition-delay: 0s;
								-o-transition-delay: 0s;
								-ms-transition-delay: 0s;
								transition-delay: 0s;
							<?php }?>
						}	
						.Total_Soft_Poll_1_Main_Ans_Div_Fix_<?php echo $Total_Soft_Poll;?>
						{
							<?php if( $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_ShPop == 'true'){ ?>
								position: relative; 
								margin: 12% auto 0; 
								<?php if( $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_ShEff == 'FTTB' ){ ?>
									width: 100%;
									max-width: 750px;
									height: inherit;
									overflow: hidden;
									border: <?php echo $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_BW; ?>px solid <?php echo $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_BC; ?>;
									border-radius: <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_BR; ?>px;
									-webkit-transform: translateY(-12000px);
								    -moz-transform: translateY(-12000px);
								    -o-transform: translateY(-12000px);
								    -ms-transform: translateY(-12000px);
								    transform: translateY(-12000px);
								    -webkit-transition: all 0.5s ease-in-out 0.5s;
								    -moz-transition: all 0.5s ease-in-out 0.5s;
								    -o-transition: all 0.5s ease-in-out 0.5s;
								    -ms-transition: all 0.5s ease-in-out 0.5s;
								    transition: all 0.5s ease-in-out 0.5s;
								    -webkit-transition-delay: 0s;
									-moz-transition-delay: 0s;
									-o-transition-delay: 0s;
									-ms-transition-delay: 0s;
									transition-delay: 0s;
								<?php } else if( $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_ShEff == 'FLTR' ){ ?>
									width: 100%;
									max-width: 750px;
									height: inherit;
									overflow: hidden;
									border: <?php echo $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_BW; ?>px solid <?php echo $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_BC; ?>;
									border-radius: <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_BR; ?>px;
								    -webkit-transform: translateX(-12000px);
								    -moz-transform: translateX(-12000px);
								    -o-transform: translateX(-12000px);
								    -ms-transform: translateX(-12000px);
								    transform: translateX(-12000px);
								    -webkit-transition: all 0.5s ease-in-out 0.5s;
								    -moz-transition: all 0.5s ease-in-out 0.5s;
								    -o-transition: all 0.5s ease-in-out 0.5s;
								    -ms-transition: all 0.5s ease-in-out 0.5s;
								    transition: all 0.5s ease-in-out 0.5s;
								    -webkit-transition-delay: 0s;
									-moz-transition-delay: 0s;
									-o-transition-delay: 0s;
									-ms-transition-delay: 0s;
									transition-delay: 0s;
								<?php } else if( $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_ShEff == 'FRTL' ){ ?>
									width: 100%;
									max-width: 750px;
									height: inherit;
									overflow: hidden;
									border: <?php echo $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_BW; ?>px solid <?php echo $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_BC; ?>;
									border-radius: <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_BR; ?>px;
								    -webkit-transform: translateX(12000px);
								    -moz-transform: translateX(12000px);
								    -o-transform: translateX(12000px);
								    -ms-transform: translateX(12000px);
								    transform: translateX(12000px);
								    -webkit-transition: all 0.5s ease-in-out 0.5s;
								    -moz-transition: all 0.5s ease-in-out 0.5s;
								    -o-transition: all 0.5s ease-in-out 0.5s;
								    -ms-transition: all 0.5s ease-in-out 0.5s;
								    transition: all 0.5s ease-in-out 0.5s;
								    -webkit-transition-delay: 0s;
									-moz-transition-delay: 0s;
									-o-transition-delay: 0s;
									-ms-transition-delay: 0s;
									transition-delay: 0s;
								<?php } else if( $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_ShEff == 'FCTA' ){ ?>
									position: absolute;
									width: 0%;
									height: 0%;
									overflow: hidden;
									border: 0px;
									border-style: solid;
									border-color: <?php echo $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_BC;?>;
								<?php } else if( $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_ShEff == 'FTL' ){ ?>
									width: 100%;
									max-width: 750px;
									height: inherit;
									overflow: hidden;
									border: <?php echo $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_BW; ?>px solid <?php echo $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_BC; ?>;
									border-radius: <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_BR; ?>px;
								    -ms-transform: rotateY(-90deg); 
								    -moz-transform: rotateY(-90deg);
								    -o-transform: rotateY(-90deg);
								    -webkit-transform: rotateY(-90deg); 
								    transform: rotateY(-90deg); 
								    -webkit-transition: all 0.5s ease-in-out 0.5s;
								    -moz-transition: all 0.5s ease-in-out 0.5s;
								    -o-transition: all 0.5s ease-in-out 0.5s;
								    -ms-transition: all 0.5s ease-in-out 0.5s;
								    transition: all 0.5s ease-in-out 0.5s;
								    -webkit-transition-delay: 0s;
									-moz-transition-delay: 0s;
									-o-transition-delay: 0s;
									-ms-transition-delay: 0s;
									transition-delay: 0s;
								<?php } else if( $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_ShEff == 'FTR' ){ ?>
									width: 100%;
									max-width: 750px;
									height: inherit;
									overflow: hidden;
									border: <?php echo $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_BW; ?>px solid <?php echo $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_BC; ?>;
									border-radius: <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_BR; ?>px;
								    -ms-transform: rotateX(-90deg); 
								    -moz-transform: rotateX(-90deg);
								    -o-transform: rotateX(-90deg);
								    -webkit-transform: rotateX(-90deg); 
								    transform: rotateX(-90deg); 
								    -webkit-transition: all 0.5s ease-in-out 0.5s;
								    -moz-transition: all 0.5s ease-in-out 0.5s;
								    -o-transition: all 0.5s ease-in-out 0.5s;
								    -ms-transition: all 0.5s ease-in-out 0.5s;
								    transition: all 0.5s ease-in-out 0.5s;
								    -webkit-transition-delay: 0s;
									-moz-transition-delay: 0s;
									-o-transition-delay: 0s;
									-ms-transition-delay: 0s;
									transition-delay: 0s;
								<?php } else if( $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_ShEff == 'FBL' ){ ?>
									width: 100%;
									max-width: 750px;
									height: inherit;
									overflow: hidden;
									border: <?php echo $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_BW; ?>px solid <?php echo $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_BC; ?>;
									border-radius: <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_BR; ?>px;
								  	opacity: 0;
								    -ms-transform: rotate(-180deg); 
								    -moz-transform: rotate(-180deg);
								    -o-transform: rotate(-180deg);
								    -webkit-transform: rotate(-180deg); 
								    transform: rotate(-180deg); 
								    -webkit-transition: all 0.5s ease-in-out 0.5s;
								    -moz-transition: all 0.5s ease-in-out 0.5s;
								    -o-transition: all 0.5s ease-in-out 0.5s;
								    -ms-transition: all 0.5s ease-in-out 0.5s;
								    transition: all 0.5s ease-in-out 0.5s;
								    -webkit-transition-delay: 0s;
									-moz-transition-delay: 0s;
									-o-transition-delay: 0s;
									-ms-transition-delay: 0s;
									transition-delay: 0s;
								<?php } else if( $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_ShEff == 'FBR' ){ ?>
									width: 100%;
									max-width: 750px;
									height: inherit;
									overflow: hidden;
									border: <?php echo $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_BW; ?>px solid <?php echo $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_BC; ?>;
									border-radius: <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_BR; ?>px;
								    -ms-transform: skewX(90deg);
								    -moz-transform: skewX(90deg);
								    -o-transform: skewX(90deg);
								    -webkit-transform: skewX(90deg); 
								    transform: skewX(90deg); 
								    -webkit-transition: all 0.5s ease-in-out 0.5s;
								    -moz-transition: all 0.5s ease-in-out 0.5s;
								    -o-transition: all 0.5s ease-in-out 0.5s;
								    -ms-transition: all 0.5s ease-in-out 0.5s;
								    transition: all 0.5s ease-in-out 0.5s;
								    -webkit-transition-delay: 0s;
									-moz-transition-delay: 0s;
									-o-transition-delay: 0s;
									-ms-transition-delay: 0s;
									transition-delay: 0s;
								<?php } else if( $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_ShEff == 'FBTT' ){ ?>
									width: 100%;
									max-width: 750px;
									height: inherit;
									overflow: hidden;
									border: <?php echo $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_BW; ?>px solid <?php echo $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_BC; ?>;
									border-radius: <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_BR; ?>px;
								    -ms-transform: skewY(90deg);
								    -moz-transform: skewY(90deg);
								    -o-transform: skewY(90deg);
								    -webkit-transform: skewY(90deg); 
								    transform: skewY(90deg); 
								    -webkit-transition: all 0.5s ease-in-out 0.5s;
								    -moz-transition: all 0.5s ease-in-out 0.5s;
								    -o-transition: all 0.5s ease-in-out 0.5s;
								    -ms-transition: all 0.5s ease-in-out 0.5s;
								    transition: all 0.5s ease-in-out 0.5s;
								    -webkit-transition-delay: 0s;
									-moz-transition-delay: 0s;
									-o-transition-delay: 0s;
									-ms-transition-delay: 0s;
									transition-delay: 0s;
								<?php }?>
							<?php } else { ?>
								display: none;
							<?php }?>
						}					
						.Total_Soft_Poll_1_Main_Ans_Div_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_Quest_Div_<?php echo $Total_Soft_Poll;?>, .Total_Soft_Poll_1_Main_Ans_Div_Fix_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_Quest_Div_<?php echo $Total_Soft_Poll;?>
						{
							position: relative;
							background-color: <?php echo $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_Q_BgC;?>;
							color: <?php echo $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_Q_C;?>;
							font-size: <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_Q_FS;?>px;
							font-family: <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_Q_FF;?>;
							text-align: <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_Q_TA;?>;
							padding: 5px 10px;
						}
						.Total_Soft_Poll_1_Main_Div_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_Quest_Div_<?php echo $Total_Soft_Poll;?> label, .Total_Soft_Poll_1_Main_Ans_Div_Fix_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_Quest_Div_<?php echo $Total_Soft_Poll;?> label, .Total_Soft_Poll_1_Main_Ans_Div_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_Quest_Div_<?php echo $Total_Soft_Poll;?> label
						{
							margin-bottom: 0px !important;
						}
						.Total_Soft_Poll_1_Main_Ans_Div_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_LAQ_Div_<?php echo $Total_Soft_Poll;?>, .Total_Soft_Poll_1_Main_Ans_Div_Fix_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_LAQ_Div_<?php echo $Total_Soft_Poll;?>
						{
							position: relative;
							width: <?php echo $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_LAQ_W;?>%;
							margin: 0 auto;
							border-top: <?php echo $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_LAQ_H;?>px <?php echo $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_LAQ_S;?> <?php echo $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_LAQ_C;?>;
						}
						.Total_Soft_Poll_1_Main_Ans_Div_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_Ans_Div_<?php echo $Total_Soft_Poll;?>, .Total_Soft_Poll_1_Main_Ans_Div_Fix_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_Ans_Div_<?php echo $Total_Soft_Poll;?>
						{
							position: relative;
							background-color:  <?php echo $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_A_MBgC;?>;
							padding: 0px 10px;
						}
						.Total_Soft_Poll_1_Main_Ans_Div_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_Ans_Div_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_Ans_Check_Div, .Total_Soft_Poll_1_Main_Ans_Div_Fix_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_Ans_Div_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_Ans_Check_Div
						{
							position:relative; 
							display: inline-block; 
							width: 100%;
							padding: 0px;
							background-color: <?php echo $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_A_BgC;?> !important;
							margin-top: 3px;
							line-height: 1 !important
						}
						.Total_Soft_Poll_1_Main_Ans_Div_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_Ans_Div_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_Ans_Lab_<?php echo $Total_Soft_Poll;?>, .Total_Soft_Poll_1_Main_Ans_Div_Fix_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_Ans_Div_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_Ans_Lab_<?php echo $Total_Soft_Poll;?>
						{
							display: inline-block; 
							float: none;
							width: 100%;
							font-size: <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_A_FS;?>px !important;
							color: <?php echo $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_A_VC;?> !important;
							position: relative;
							padding: 3px 0px;
							line-height: 1 !important;
							margin-bottom: 0px !important;
						}
						.Total_Soft_Poll_1_Main_Ans_Div_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_Ans_Div_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_Ans_Lab_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_Ans_Lab_Sp2_<?php echo $Total_Soft_Poll;?>, .Total_Soft_Poll_1_Main_Ans_Div_Fix_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_Ans_Div_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_Ans_Lab_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_Ans_Lab_Sp2_<?php echo $Total_Soft_Poll;?>
						{
							position: absolute;
						    min-width: 10px;
						    height: 100%;
						   	<?php if($Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_A_CTF == 'true'){ ?>
								background-color: <?php echo $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_A_C;?> !important;
							<?php }?>
						    left: 0;
						    top: 0;
						    <?php if($Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_A_VEff != '0'){ ?>
						    	background: url('<?php echo plugins_url("../Images/icon" . $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_A_VEff . ".png" ,__FILE__);?>') 100% repeat-x;
						    <?php }?>
						}
						.Total_Soft_Poll_1_Main_Ans_Div_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_Ans_Div_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_Ans_Lab_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_Ans_Lab_Sp3_<?php echo $Total_Soft_Poll;?>, .Total_Soft_Poll_1_Main_Ans_Div_Fix_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_Ans_Div_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_Ans_Lab_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_Ans_Lab_Sp3_<?php echo $Total_Soft_Poll;?>
						{
							float: right; 
							margin-right: 3px;  
							position: inherit; 
							z-index: 99999999999;
						}
						.Total_Soft_Poll_1_Main_Ans_Div_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_LAA_Div_<?php echo $Total_Soft_Poll;?>, .Total_Soft_Poll_1_Main_Ans_Div_Fix_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_LAA_Div_<?php echo $Total_Soft_Poll;?>
						{
							position: relative;
							width: <?php echo $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_LAA_W;?>%;
							margin: 5px auto 0 auto;
							border-top: <?php echo $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_LAA_H;?>px <?php echo $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_LAA_S;?> <?php echo $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_LAA_C;?>;
						}
						.Total_Soft_Poll_1_Main_Ans_Div_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_But_MDiv_<?php echo $Total_Soft_Poll;?>, .Total_Soft_Poll_1_Main_Ans_Div_Fix_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_But_MDiv_<?php echo $Total_Soft_Poll;?>
						{
							padding: 0px;
							background-color: <?php echo $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_BB_MBgC;?>;
							position: relative;
						    float: left;
						    width: 100%;
						    height: inherit !important;
						}
						.Total_Soft_Poll_1_Main_Ans_Div_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_But_Back_<?php echo $Total_Soft_Poll;?>, .Total_Soft_Poll_1_Main_Ans_Div_Fix_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_But_Back_<?php echo $Total_Soft_Poll;?>
						{
							background: <?php echo $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_BB_BgC;?> !important;
							border: <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_RB_BW;?>px solid <?php echo $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_BB_BC;?> !important;
							border-radius: <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_RB_BR;?>px !important;
							<?php if($Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_BB_Pos=='right'){ ?>
								float: right;
								margin: 10px 10px;
							<?php }else if($Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_BB_Pos=='left'){ ?>
								margin: 10px 10px;
							<?php }else if($Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_BB_Pos=='full'){ ?>
								width: 98% !important;
								margin: 5px 1%;
							<?php }?>								
							color: <?php echo $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_BB_C;?> !important;
							padding: 3px 10px !important;
							text-transform: none !important;
							line-height: 1 !important;
							cursor: pointer;
						}
						.Total_Soft_Poll_1_Main_Ans_Div_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_But_Back_<?php echo $Total_Soft_Poll;?> span, .Total_Soft_Poll_1_Main_Ans_Div_Fix_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_But_Back_<?php echo $Total_Soft_Poll;?> span
						{
							font-size: <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_RB_FS;?>px !important;
							font-family: <?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_RB_FF;?>;
						}
						.Total_Soft_Poll_1_Main_Ans_Div_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_But_Back_<?php echo $Total_Soft_Poll;?>:hover, .Total_Soft_Poll_1_Main_Ans_Div_Fix_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_But_Back_<?php echo $Total_Soft_Poll;?>:hover
						{
							background: <?php echo $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_BB_HBgC;?> !important;
							color: <?php echo $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_BB_HC;?> !important;
							opacity: 1 !important;
						}
						.Total_Soft_Poll_1_Main_Ans_Div_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_But_Back_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_Back_But_Icon, .Total_Soft_Poll_1_Main_Ans_Div_Fix_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_But_Back_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_Back_But_Icon
						{						
							font-size: <?php echo $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_RB_IS;?>px !important;
						}
						.Total_Soft_Poll_1_Main_Ans_Div_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_But_Back_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_Back_But_Icon:before, .Total_Soft_Poll_1_Main_Ans_Div_Fix_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_But_Back_<?php echo $Total_Soft_Poll;?> .Total_Soft_Poll_1_Back_But_Icon:before
						{
							<?php if($Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_BB_IA=='after'){ ?>
								float: right;
								margin-left: 10px;
							<?php }else{ ?>
								margin-right: 10px;
							<?php }?>
							content: "\<?php echo $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_BB_IT;?>";
						}
						.Total_Soft_Poll_1_Ans_Fix_<?php echo $Total_Soft_Poll;?>
						{
							position: fixed;
							width: 100%;
							height: 0%;
							background-color: rgba(0, 0, 0, 0.3);
							left: 0;
							top: 0;
							z-index: 999999;
						}
						.Total_Soft_Poll_1_Ans_Fix_1_<?php echo $Total_Soft_Poll;?>
						{
							position: fixed; 
							z-index: 9999999999;
							width: 0%; 
							left: 0; 
							top: 0; 
						}
					</style>
					<script type="text/javascript">
						function Total_Soft_Poll_Ans_Div(Poll_ID)
						{
							<?php if( $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_ShPop == 'false'){ ?>
								Total_Soft_Poll_Ans_Div1(Poll_ID);								
							<?php } else { ?>
								Total_Soft_Poll_Ans_Div2(Poll_ID);								
							<?php }?>
						}
						function Total_Soft_Poll_Ans_Div1(Poll_ID)
						{
							<?php if( $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_ShEff == 'FTTB' ){ ?>
							    jQuery(".Total_Soft_Poll_1_Main_Ans_Div_"+Poll_ID).css({'transform':'translateY(0px)','-ms-transform': 'translateY(0px)', '-o-transform': 'translateY(0px)','-moz-transform': 'translateY(0px)','-webkit-transform': 'translateY(0px)'});
							<?php } else if( $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_ShEff == 'FLTR' ){ ?>
								jQuery(".Total_Soft_Poll_1_Main_Ans_Div_"+Poll_ID).css({'transform':'translateX(0px)','-ms-transform': 'translateX(0px)', '-o-transform': 'translateX(0px)','-moz-transform': 'translateX(0px)','-webkit-transform': 'translateX(0px)'});
							<?php } else if( $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_ShEff == 'FRTL' ){ ?>
								jQuery(".Total_Soft_Poll_1_Main_Ans_Div_"+Poll_ID).css({'transform':'translateX(0px)','-ms-transform': 'translateX(0px)', '-o-transform': 'translateX(0px)','-moz-transform': 'translateX(0px)','-webkit-transform': 'translateX(0px)'});
							<?php } else if( $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_ShEff == 'FCTA' ){ ?>
								jQuery(".Total_Soft_Poll_1_Main_Ans_Div_"+Poll_ID).animate({top: '0%', left: '<?php echo (100-$Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_MW)/2;?>%', width: '<?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_MW;?>%', height: '100%', borderRadius: '<?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_BR;?>px', borderWidth: '<?php echo $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_BW;?>px' },500);
							<?php } else if( $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_ShEff == 'FTL' ){ ?>
								jQuery(".Total_Soft_Poll_1_Main_Ans_Div_"+Poll_ID).css({'transform':'rotateY(0deg)','-ms-transform': 'rotateY(0deg)', '-o-transform': 'rotateY(0deg)','-moz-transform': 'rotateY(0deg)','-webkit-transform': 'rotateY(0deg)'});
							<?php } else if( $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_ShEff == 'FTR' ){ ?>
								jQuery(".Total_Soft_Poll_1_Main_Ans_Div_"+Poll_ID).css({'transform':'rotateX(0deg)','-ms-transform': 'rotateX(0deg)', '-o-transform': 'rotateX(0deg)','-moz-transform': 'rotateX(0deg)','-webkit-transform': 'rotateX(0deg)'});
							<?php } else if( $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_ShEff == 'FBL' ){ ?>
								jQuery(".Total_Soft_Poll_1_Main_Ans_Div_"+Poll_ID).css({'transform':'rotate(0deg)','-ms-transform': 'rotate(0deg)', '-o-transform': 'rotate(0deg)','-moz-transform': 'rotate(0deg)','-webkit-transform': 'rotate(0deg)', 'z-index': '9999'});
							<?php } else if( $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_ShEff == 'FBR' ){ ?>
								jQuery(".Total_Soft_Poll_1_Main_Ans_Div_"+Poll_ID).css({'transform':'skewX(0deg)','-ms-transform': 'skewX(0deg)', '-o-transform': 'skewX(0deg)','-moz-transform': 'skewX(0deg)','-webkit-transform': 'skewX(0deg)'});
							<?php } else if( $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_ShEff == 'FBTT' ){ ?>
								jQuery(".Total_Soft_Poll_1_Main_Ans_Div_"+Poll_ID).css({'transform':'skewY(0deg)','-ms-transform': 'skewY(0deg)', '-o-transform': 'skewY(0deg)','-moz-transform': 'skewY(0deg)','-webkit-transform': 'skewY(0deg)'});
							<?php }?>
							jQuery('.Total_Soft_Poll_1_Main_Ans_Div_'+Poll_ID+ ' .Total_Soft_Poll_1_LAA_Div_'+Poll_ID).fadeOut(500);
							jQuery('.Total_Soft_Poll_1_Main_Ans_Div_'+Poll_ID+ ' .Total_Soft_Poll_1_But_MDiv_'+Poll_ID).fadeOut(500);	
							jQuery('.Total_Soft_Poll_1_Ans_Div_'+Poll_ID).css('height','inherit');
						}
						function Total_Soft_Poll_Ans_Div2(Poll_ID)
						{
							<?php if( $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_ShEff == 'FTTB' ){ ?>
								jQuery(".Total_Soft_Poll_1_Ans_Fix_"+Poll_ID).animate({height: '100%'},300);
								jQuery(".Total_Soft_Poll_1_Ans_Fix_1_"+Poll_ID).css('width','100%');
								jQuery(".Total_Soft_Poll_1_Main_Ans_Div_Fix_"+Poll_ID).css({'transform':'translateY(0px)','-ms-transform': 'translateY(0px)', '-o-transform': 'translateY(0px)','-moz-transform': 'translateY(0px)','-webkit-transform': 'translateY(0px)'});
							<?php } else if( $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_ShEff == 'FLTR' ){ ?>
								jQuery(".Total_Soft_Poll_1_Ans_Fix_"+Poll_ID).animate({height: '100%'},300);
								jQuery(".Total_Soft_Poll_1_Ans_Fix_1_"+Poll_ID).css('width','100%');
								jQuery(".Total_Soft_Poll_1_Main_Ans_Div_Fix_"+Poll_ID).css({'transform':'translateX(0px)','-ms-transform': 'translateX(0px)', '-o-transform': 'translateX(0px)','-moz-transform': 'translateX(0px)','-webkit-transform': 'translateX(0px)'});
							<?php } else if( $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_ShEff == 'FRTL' ){ ?>
								jQuery(".Total_Soft_Poll_1_Ans_Fix_"+Poll_ID).animate({height: '100%'},300);
								jQuery(".Total_Soft_Poll_1_Ans_Fix_1_"+Poll_ID).css('width','100%');
								jQuery(".Total_Soft_Poll_1_Main_Ans_Div_Fix_"+Poll_ID).css({'transform':'translateX(0px)','-ms-transform': 'translateX(0px)', '-o-transform': 'translateX(0px)','-moz-transform': 'translateX(0px)','-webkit-transform': 'translateX(0px)'});
							<?php } else if( $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_ShEff == 'FCTA' ){ ?>
								jQuery(".Total_Soft_Poll_1_Ans_Fix_"+Poll_ID).animate({height: '100%'},300);
								jQuery(".Total_Soft_Poll_1_Ans_Fix_1_"+Poll_ID).css('width','100%');
								jQuery(".Total_Soft_Poll_1_Main_Ans_Div_Fix_"+Poll_ID).animate({maxWidth: '750px' , width: '100%', height: '100%', borderRadius: '<?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_BR;?>px', borderWidth: '<?php echo $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_BW;?>px' },500);
								jQuery(".Total_Soft_Poll_1_Main_Ans_Div_Fix_"+Poll_ID).css('position', 'relative');
							<?php } else if( $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_ShEff == 'FTL' ){ ?>
								jQuery(".Total_Soft_Poll_1_Ans_Fix_"+Poll_ID).animate({height: '100%'},300);
								jQuery(".Total_Soft_Poll_1_Ans_Fix_1_"+Poll_ID).css('width','100%');
								jQuery(".Total_Soft_Poll_1_Main_Ans_Div_Fix_"+Poll_ID).css({'transform':'rotateY(0deg)','-ms-transform': 'rotateY(0deg)', '-o-transform': 'rotateY(0deg)','-moz-transform': 'rotateY(0deg)','-webkit-transform': 'rotateY(0deg)'});
							<?php } else if( $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_ShEff == 'FTR' ){ ?>
								jQuery(".Total_Soft_Poll_1_Ans_Fix_"+Poll_ID).animate({height: '100%'},300);
								jQuery(".Total_Soft_Poll_1_Ans_Fix_1_"+Poll_ID).css('width','100%');
								jQuery(".Total_Soft_Poll_1_Main_Ans_Div_Fix_"+Poll_ID).css({'transform':'rotateX(0deg)','-ms-transform': 'rotateX(0deg)', '-o-transform': 'rotateX(0deg)','-moz-transform': 'rotateX(0deg)','-webkit-transform': 'rotateX(0deg)'});
							<?php } else if( $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_ShEff == 'FBL' ){ ?>
								jQuery(".Total_Soft_Poll_1_Main_Ans_Div_Fix_"+Poll_ID).css({'transform':'rotate(0deg)','-ms-transform': 'rotate(0deg)', '-o-transform': 'rotate(0deg)','-moz-transform': 'rotate(0deg)','-webkit-transform': 'rotate(0deg)', 'opacity': '1'});
								jQuery(".Total_Soft_Poll_1_Ans_Fix_"+Poll_ID).animate({height: '100%'},300);
								jQuery(".Total_Soft_Poll_1_Ans_Fix_1_"+Poll_ID).css('width','100%');
							<?php } else if( $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_ShEff == 'FBR' ){ ?>
								jQuery(".Total_Soft_Poll_1_Main_Ans_Div_Fix_"+Poll_ID).css({'transform':'skewX(0deg)','-ms-transform': 'skewX(0deg)', '-o-transform': 'skewX(0deg)','-moz-transform': 'skewX(0deg)','-webkit-transform': 'skewX(0deg)'});
								jQuery(".Total_Soft_Poll_1_Ans_Fix_"+Poll_ID).animate({height: '100%'},300);
								jQuery(".Total_Soft_Poll_1_Ans_Fix_1_"+Poll_ID).css('width','100%');
							<?php } else if( $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_ShEff == 'FBTT' ){ ?>
								jQuery(".Total_Soft_Poll_1_Main_Ans_Div_Fix_"+Poll_ID).css({'transform':'skewY(0deg)','-ms-transform': 'skewY(0deg)', '-o-transform': 'skewY(0deg)','-moz-transform': 'skewY(0deg)','-webkit-transform': 'skewY(0deg)'});
								jQuery(".Total_Soft_Poll_1_Ans_Fix_"+Poll_ID).animate({height: '100%'},300);
								jQuery(".Total_Soft_Poll_1_Ans_Fix_1_"+Poll_ID).css('width','100%');
							<?php }?>
							jQuery('.Total_Soft_Poll_1_Main_Ans_Div_Fix_'+Poll_ID+ ' .Total_Soft_Poll_1_LAA_Div_'+Poll_ID).css('display','none');
							jQuery('.Total_Soft_Poll_1_Main_Ans_Div_Fix_'+Poll_ID+ ' .Total_Soft_Poll_1_But_MDiv_'+Poll_ID).css('display','none');	
							jQuery('.Total_Soft_Poll_1_Ans_Div_'+Poll_ID).css('height','inherit');
						}
						function Total_Soft_Poll_1_Result(Poll_ID)
						{
							<?php if( $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_ShPop == 'false'){ ?>
								<?php if( $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_ShEff == 'FTTB' ){ ?>
								    jQuery(".Total_Soft_Poll_1_Main_Ans_Div_"+Poll_ID).css({'transform':'translateY(0px)','-ms-transform': 'translateY(0px)', '-o-transform': 'translateY(0px)','-moz-transform': 'translateY(0px)','-webkit-transform': 'translateY(0px)'});
								<?php } else if( $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_ShEff == 'FLTR' ){ ?>
									jQuery(".Total_Soft_Poll_1_Main_Ans_Div_"+Poll_ID).css({'transform':'translateX(0px)','-ms-transform': 'translateX(0px)', '-o-transform': 'translateX(0px)','-moz-transform': 'translateX(0px)','-webkit-transform': 'translateX(0px)'});
								<?php } else if( $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_ShEff == 'FRTL' ){ ?>
									jQuery(".Total_Soft_Poll_1_Main_Ans_Div_"+Poll_ID).css({'transform':'translateX(0px)','-ms-transform': 'translateX(0px)', '-o-transform': 'translateX(0px)','-moz-transform': 'translateX(0px)','-webkit-transform': 'translateX(0px)'});
								<?php } else if( $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_ShEff == 'FCTA' ){ ?>
									jQuery(".Total_Soft_Poll_1_Main_Ans_Div_"+Poll_ID).animate({ width: '<?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_MW;?>%', left: '<?php echo (100-$Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_MW)/2;?>%', height: '100%', top: '0%', borderRadius: '<?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_BR;?>px', borderWidth: '<?php echo $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_BW;?>px' },500);
								<?php } else if( $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_ShEff == 'FTL' ){ ?>
									jQuery(".Total_Soft_Poll_1_Main_Ans_Div_"+Poll_ID).css({'transform':'rotateY(0deg)','-ms-transform': 'rotateY(0deg)', '-o-transform': 'rotateY(0deg)','-moz-transform': 'rotateY(0deg)','-webkit-transform': 'rotateY(0deg)'});
								<?php } else if( $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_ShEff == 'FTR' ){ ?>
									jQuery(".Total_Soft_Poll_1_Main_Ans_Div_"+Poll_ID).css({'transform':'rotateX(0deg)','-ms-transform': 'rotateX(0deg)', '-o-transform': 'rotateX(0deg)','-moz-transform': 'rotateX(0deg)','-webkit-transform': 'rotateX(0deg)'});
								<?php } else if( $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_ShEff == 'FBL' ){ ?>
									jQuery(".Total_Soft_Poll_1_Main_Ans_Div_"+Poll_ID).css({'transform':'rotate(0deg)','-ms-transform': 'rotate(0deg)', '-o-transform': 'rotate(0deg)','-moz-transform': 'rotate(0deg)','-webkit-transform': 'rotate(0deg)', 'z-index': '9999'});
								<?php } else if( $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_ShEff == 'FBR' ){ ?>
									jQuery(".Total_Soft_Poll_1_Main_Ans_Div_"+Poll_ID).css({'transform':'skewX(0deg)','-ms-transform': 'skewX(0deg)', '-o-transform': 'skewX(0deg)','-moz-transform': 'skewX(0deg)','-webkit-transform': 'skewX(0deg)'});
								<?php } else if( $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_ShEff == 'FBTT' ){ ?>
									jQuery(".Total_Soft_Poll_1_Main_Ans_Div_"+Poll_ID).css({'transform':'skewY(0deg)','-ms-transform': 'skewY(0deg)', '-o-transform': 'skewY(0deg)','-moz-transform': 'skewY(0deg)','-webkit-transform': 'skewY(0deg)'});
								<?php }?>
							<?php } else { ?>
								<?php if( $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_ShEff == 'FTTB' ){ ?>
									jQuery(".Total_Soft_Poll_1_Ans_Fix_"+Poll_ID).animate({height: '100%'},300);
									jQuery(".Total_Soft_Poll_1_Ans_Fix_1_"+Poll_ID).css('width','100%');
									jQuery(".Total_Soft_Poll_1_Main_Ans_Div_Fix_"+Poll_ID).css({'transform':'translateY(0px)','-ms-transform': 'translateY(0px)', '-o-transform': 'translateY(0px)','-moz-transform': 'translateY(0px)','-webkit-transform': 'translateY(0px)'});
								<?php } else if( $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_ShEff == 'FLTR' ){ ?>
									jQuery(".Total_Soft_Poll_1_Ans_Fix_"+Poll_ID).animate({height: '100%'},300);
									jQuery(".Total_Soft_Poll_1_Ans_Fix_1_"+Poll_ID).css('width','100%');
									jQuery(".Total_Soft_Poll_1_Main_Ans_Div_Fix_"+Poll_ID).css({'transform':'translateX(0px)','-ms-transform': 'translateX(0px)', '-o-transform': 'translateX(0px)','-moz-transform': 'translateX(0px)','-webkit-transform': 'translateX(0px)'});
								<?php } else if( $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_ShEff == 'FRTL' ){ ?>
									jQuery(".Total_Soft_Poll_1_Ans_Fix_"+Poll_ID).animate({height: '100%'},300);
									jQuery(".Total_Soft_Poll_1_Ans_Fix_1_"+Poll_ID).css('width','100%');
									jQuery(".Total_Soft_Poll_1_Main_Ans_Div_Fix_"+Poll_ID).css({'transform':'translateX(0px)','-ms-transform': 'translateX(0px)', '-o-transform': 'translateX(0px)','-moz-transform': 'translateX(0px)','-webkit-transform': 'translateX(0px)'});
								<?php } else if( $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_ShEff == 'FCTA' ){ ?>
									jQuery(".Total_Soft_Poll_1_Ans_Fix_"+Poll_ID).animate({height: '100%'},300);
									jQuery(".Total_Soft_Poll_1_Ans_Fix_1_"+Poll_ID).css('width','100%');
									jQuery(".Total_Soft_Poll_1_Main_Ans_Div_Fix_"+Poll_ID).animate({maxWidth: '750px' , width: '100%', height: '100%', borderRadius: '<?php echo $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_BR;?>px', borderWidth: '<?php echo $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_BW;?>px' },500);
									jQuery(".Total_Soft_Poll_1_Main_Ans_Div_Fix_"+Poll_ID).css('position', 'relative');
								<?php } else if( $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_ShEff == 'FTL' ){ ?>
									jQuery(".Total_Soft_Poll_1_Ans_Fix_"+Poll_ID).animate({height: '100%'},300);
									jQuery(".Total_Soft_Poll_1_Ans_Fix_1_"+Poll_ID).css('width','100%');
									jQuery(".Total_Soft_Poll_1_Main_Ans_Div_Fix_"+Poll_ID).css({'transform':'rotateY(0deg)','-ms-transform': 'rotateY(0deg)', '-o-transform': 'rotateY(0deg)','-moz-transform': 'rotateY(0deg)','-webkit-transform': 'rotateY(0deg)'});
								<?php } else if( $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_ShEff == 'FTR' ){ ?>
									jQuery(".Total_Soft_Poll_1_Ans_Fix_"+Poll_ID).animate({height: '100%'},300);
									jQuery(".Total_Soft_Poll_1_Ans_Fix_1_"+Poll_ID).css('width','100%');
									jQuery(".Total_Soft_Poll_1_Main_Ans_Div_Fix_"+Poll_ID).css({'transform':'rotateX(0deg)','-ms-transform': 'rotateX(0deg)', '-o-transform': 'rotateX(0deg)','-moz-transform': 'rotateX(0deg)','-webkit-transform': 'rotateX(0deg)'});
								<?php } else if( $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_ShEff == 'FBL' ){ ?>
									jQuery(".Total_Soft_Poll_1_Main_Ans_Div_Fix_"+Poll_ID).css({'transform':'rotate(0deg)','-ms-transform': 'rotate(0deg)', '-o-transform': 'rotate(0deg)','-moz-transform': 'rotate(0deg)','-webkit-transform': 'rotate(0deg)', 'opacity': '1'});
									jQuery(".Total_Soft_Poll_1_Ans_Fix_"+Poll_ID).animate({height: '100%'},300);
									jQuery(".Total_Soft_Poll_1_Ans_Fix_1_"+Poll_ID).css('width','100%');
								<?php } else if( $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_ShEff == 'FBR' ){ ?>
									jQuery(".Total_Soft_Poll_1_Main_Ans_Div_Fix_"+Poll_ID).css({'transform':'skewX(0deg)','-ms-transform': 'skewX(0deg)', '-o-transform': 'skewX(0deg)','-moz-transform': 'skewX(0deg)','-webkit-transform': 'skewX(0deg)'});
									jQuery(".Total_Soft_Poll_1_Ans_Fix_"+Poll_ID).animate({height: '100%'},300);
									jQuery(".Total_Soft_Poll_1_Ans_Fix_1_"+Poll_ID).css('width','100%');
								<?php } else if( $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_ShEff == 'FBTT' ){ ?>
									jQuery(".Total_Soft_Poll_1_Main_Ans_Div_Fix_"+Poll_ID).css({'transform':'skewY(0deg)','-ms-transform': 'skewY(0deg)', '-o-transform': 'skewY(0deg)','-moz-transform': 'skewY(0deg)','-webkit-transform': 'skewY(0deg)'});
									jQuery(".Total_Soft_Poll_1_Ans_Fix_"+Poll_ID).animate({height: '100%'},300);
									jQuery(".Total_Soft_Poll_1_Ans_Fix_1_"+Poll_ID).css('width','100%');
								<?php }?>
							<?php }?>
						}
						function Total_Soft_Poll_1_Back(Poll_ID)
						{
							<?php if( $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_ShPop == 'false'){ ?>
								<?php if( $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_ShEff == 'FTTB' ){ ?>
								    jQuery(".Total_Soft_Poll_1_Main_Ans_Div_"+Poll_ID).css({'transform':'translateY(-12000px)','-ms-transform': 'translateY(-12000px)', '-o-transform': 'translateY(-12000px)','-moz-transform': 'translateY(-12000px)','-webkit-transform': 'translateY(-12000px)'});
								<?php } else if( $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_ShEff == 'FLTR' ){ ?>
									jQuery(".Total_Soft_Poll_1_Main_Ans_Div_"+Poll_ID).css({'transform':'translateX(-12000px)','-ms-transform': 'translateX(-12000px)', '-o-transform': 'translateX(-12000px)','-moz-transform': 'translateX(-12000px)','-webkit-transform': 'translateX(-12000px)'});
								<?php } else if( $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_ShEff == 'FRTL' ){ ?>
									jQuery(".Total_Soft_Poll_1_Main_Ans_Div_"+Poll_ID).css({'transform':'translateX(12000px)','-ms-transform': 'translateX(12000px)', '-o-transform': 'translateX(12000px)','-moz-transform': 'translateX(12000px)','-webkit-transform': 'translateX(12000px)'});
								<?php } else if( $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_ShEff == 'FCTA' ){ ?>
									jQuery(".Total_Soft_Poll_1_Main_Ans_Div_"+Poll_ID).animate({width: '0', height: '0', left: '50%', top: '50%', borderRadius: '0px', borderWidth: '0px' },100);
								<?php } else if( $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_ShEff == 'FTL' ){ ?>
									jQuery(".Total_Soft_Poll_1_Main_Ans_Div_"+Poll_ID).css({'transform':'rotateY(-90deg)','-ms-transform': 'rotateY(-90deg)', '-o-transform': 'rotateY(-90deg)','-moz-transform': 'rotateY(-90deg)','-webkit-transform': 'rotateY(-90deg)'});
								<?php } else if( $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_ShEff == 'FTR' ){ ?>
									jQuery(".Total_Soft_Poll_1_Main_Ans_Div_"+Poll_ID).css({'transform':'rotateX(-90deg)','-ms-transform': 'rotateX(-90deg)', '-o-transform': 'rotateX(-90deg)','-moz-transform': 'rotateX(-90deg)','-webkit-transform': 'rotateX(-90deg)'});
								<?php } else if( $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_ShEff == 'FBL' ){ ?>
									jQuery(".Total_Soft_Poll_1_Main_Ans_Div_"+Poll_ID).css({'transform':'rotate(-180deg)','-ms-transform': 'rotate(-180deg)', '-o-transform': 'rotate(-180deg)','-moz-transform': 'rotate(-180deg)','-webkit-transform': 'rotate(-180deg)', 'z-index': '-1'});
								<?php } else if( $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_ShEff == 'FBR' ){ ?>
									jQuery(".Total_Soft_Poll_1_Main_Ans_Div_"+Poll_ID).css({'transform':'skewX(90deg)','-ms-transform': 'skewX(90deg)', '-o-transform': 'skewX(90deg)','-moz-transform': 'skewX(90deg)','-webkit-transform': 'skewX(90deg)'});
								<?php } else if( $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_ShEff == 'FBTT' ){ ?>
									jQuery(".Total_Soft_Poll_1_Main_Ans_Div_"+Poll_ID).css({'transform':'skewY(90deg)','-ms-transform': 'skewY(90deg)', '-o-transform': 'skewY(90deg)','-moz-transform': 'skewY(90deg)','-webkit-transform': 'skewY(90deg)'});
								<?php }?>
							<?php } else { ?>
								<?php if( $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_ShEff == 'FTTB' ){ ?>
									jQuery(".Total_Soft_Poll_1_Main_Ans_Div_Fix_"+Poll_ID).css({'transform':'translateY(-12000px)','-ms-transform': 'translateY(-12000px)', '-o-transform': 'translateY(-12000px)','-moz-transform': 'translateY(-12000px)','-webkit-transform': 'translateY(-12000px)'});
									jQuery(".Total_Soft_Poll_1_Ans_Fix_"+Poll_ID).animate({height: '0%'},300);
									setTimeout(function(){
										jQuery(".Total_Soft_Poll_1_Ans_Fix_1_"+Poll_ID).css('width','0%');
									},200)									
								<?php } else if( $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_ShEff == 'FLTR' ){ ?>
									jQuery(".Total_Soft_Poll_1_Main_Ans_Div_Fix_"+Poll_ID).css({'transform':'translateX(-12000px)','-ms-transform': 'translateX(-12000px)', '-o-transform': 'translateX(-12000px)','-moz-transform': 'translateX(-12000px)','-webkit-transform': 'translateX(-12000px)'});
									jQuery(".Total_Soft_Poll_1_Ans_Fix_"+Poll_ID).animate({height: '0%'},300);
									setTimeout(function(){
										jQuery(".Total_Soft_Poll_1_Ans_Fix_1_"+Poll_ID).css('width','0%');
									},200)	
								<?php } else if( $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_ShEff == 'FRTL' ){ ?>
									jQuery(".Total_Soft_Poll_1_Main_Ans_Div_Fix_"+Poll_ID).css({'transform':'translateX(12000px)','-ms-transform': 'translateX(12000px)', '-o-transform': 'translateX(12000px)','-moz-transform': 'translateX(12000px)','-webkit-transform': 'translateX(12000px)'});
									jQuery(".Total_Soft_Poll_1_Ans_Fix_"+Poll_ID).animate({height: '0%'},300);
									setTimeout(function(){
										jQuery(".Total_Soft_Poll_1_Ans_Fix_1_"+Poll_ID).css('width','0%');
									},200)	
								<?php } else if( $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_ShEff == 'FCTA' ){ ?>
									jQuery(".Total_Soft_Poll_1_Main_Ans_Div_Fix_"+Poll_ID).animate({width: '0%', height: '0%', borderRadius: '0px', borderWidth: '0px' },500);
									jQuery(".Total_Soft_Poll_1_Ans_Fix_"+Poll_ID).animate({height: '0%'},300);
									setTimeout(function(){
										jQuery(".Total_Soft_Poll_1_Main_Ans_Div_Fix_"+Poll_ID).css('position', 'absolute');
										jQuery(".Total_Soft_Poll_1_Ans_Fix_1_"+Poll_ID).css('width','0%');
									},200)	
								<?php } else if( $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_ShEff == 'FTL' ){ ?>
									jQuery(".Total_Soft_Poll_1_Main_Ans_Div_Fix_"+Poll_ID).css({'transform':'rotateY(-90deg)','-ms-transform': 'rotateY(-90deg)', '-o-transform': 'rotateY(-90deg)','-moz-transform': 'rotateY(-90deg)','-webkit-transform': 'rotateY(-90deg)'});
									jQuery(".Total_Soft_Poll_1_Ans_Fix_"+Poll_ID).animate({height: '0%'},300);
									setTimeout(function(){
										jQuery(".Total_Soft_Poll_1_Ans_Fix_1_"+Poll_ID).css('width','0%');
									},400)	
								<?php } else if( $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_ShEff == 'FTR' ){ ?>
									jQuery(".Total_Soft_Poll_1_Main_Ans_Div_Fix_"+Poll_ID).css({'transform':'rotateX(-90deg)','-ms-transform': 'rotateX(-90deg)', '-o-transform': 'rotateX(-90deg)','-moz-transform': 'rotateX(-90deg)','-webkit-transform': 'rotateX(-90deg)'});
									jQuery(".Total_Soft_Poll_1_Ans_Fix_"+Poll_ID).animate({height: '0%'},300);
									setTimeout(function(){
										jQuery(".Total_Soft_Poll_1_Ans_Fix_1_"+Poll_ID).css('width','0%');
									},600)	
								<?php } else if( $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_ShEff == 'FBL' ){ ?>
									jQuery(".Total_Soft_Poll_1_Main_Ans_Div_Fix_"+Poll_ID).css({'transform':'rotate(-180deg)','-ms-transform': 'rotate(-180deg)', '-o-transform': 'rotate(-180deg)','-moz-transform': 'rotate(-180deg)','-webkit-transform': 'rotate(-180deg)', 'opacity': '0'});
									jQuery(".Total_Soft_Poll_1_Ans_Fix_"+Poll_ID).animate({height: '0%'},300);
									setTimeout(function(){
										jQuery(".Total_Soft_Poll_1_Ans_Fix_1_"+Poll_ID).css('width','0%');
									},600)
								<?php } else if( $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_ShEff == 'FBR' ){ ?>
									jQuery(".Total_Soft_Poll_1_Main_Ans_Div_Fix_"+Poll_ID).css({'transform':'skewX(90deg)','-ms-transform': 'skewX(90deg)', '-o-transform': 'skewX(90deg)','-moz-transform': 'skewX(90deg)','-webkit-transform': 'skewX(90deg)'});
									jQuery(".Total_Soft_Poll_1_Ans_Fix_"+Poll_ID).animate({height: '0%'},300);
									setTimeout(function(){
										jQuery(".Total_Soft_Poll_1_Ans_Fix_1_"+Poll_ID).css('width','0%');
									},600)
								<?php } else if( $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_ShEff == 'FBTT' ){ ?>
									jQuery(".Total_Soft_Poll_1_Main_Ans_Div_Fix_"+Poll_ID).css({'transform':'skewY(90deg)','-ms-transform': 'skewY(90deg)', '-o-transform': 'skewY(90deg)','-moz-transform': 'skewY(90deg)','-webkit-transform': 'skewY(90deg)'});
									jQuery(".Total_Soft_Poll_1_Ans_Fix_"+Poll_ID).animate({height: '0%'},300);
									setTimeout(function(){
										jQuery(".Total_Soft_Poll_1_Ans_Fix_1_"+Poll_ID).css('width','0%');
									},600)
								<?php }?>
							<?php }?>
						}
					</script>
					<form method="POST" onsubmit="">
						<div  class="Total_Soft_Poll_Main_Div">
							<div class="Total_Soft_Poll_1_Main_Div_<?php echo $Total_Soft_Poll;?>">
								<div class="Total_Soft_Poll_1_Quest_Div_<?php echo $Total_Soft_Poll;?>">
									<label><?php echo html_entity_decode($Total_Soft_Poll_Man[0]->TotalSoftPoll_Question);?></label>
									<div class="Total_Soft_Poll_1_LAQ_Div_<?php echo $Total_Soft_Poll;?>"></div>
								</div>
								<div class="Total_Soft_Poll_1_Ans_Div_<?php echo $Total_Soft_Poll;?>">
									<?php for($i = 0 ; $i < $Total_Soft_Poll_Man[0]->TotalSoftPoll_Ans_C; $i++){ 
										if( $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_CH_CM == 'true')
										{
											$Total_Soft_Poll_1_Check_Name = "Total_Soft_Poll_1_Ans_". $Total_Soft_Poll . "_" . $i+1;
										}
										else
										{
											$Total_Soft_Poll_1_Check_Name = "Total_Soft_Poll_1_Ans_". $Total_Soft_Poll;
										}
										?>
										<div class="Total_Soft_Poll_1_Ans_Check_Div">
											<input type="<?php if( $Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_CH_CM == 'true' ){ echo 'checkbox'; }else{ echo 'radio'; }?>" class="Total_Soft_Poll_1_Ans_CheckBox" id="Total_Soft_Poll_1_Ans_<?php echo $Total_Soft_Poll;?>_<?php echo $i+1;?>" name="<?php echo $Total_Soft_Poll_1_Check_Name;?>" value="<?php echo $Total_Soft_Poll_Ans[$i]->id;?>">
											<label class="Total_Soft_Poll_1_Ans_Lab_<?php echo $Total_Soft_Poll;?> totalsoft totalsoft-question-circle-o" for="Total_Soft_Poll_1_Ans_<?php echo $Total_Soft_Poll;?>_<?php echo $i+1;?>" style="<?php if($Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_A_CTF == 'false'){ ?> color: <?php echo $Total_Soft_Poll_Ans[$i]->TotalSoftPoll_Ans_Cl;?> !important <?php }?>"><?php echo html_entity_decode($Total_Soft_Poll_Ans[$i]->TotalSoftPoll_Ans);?></label>
										</div>
									<?php }?>
									<div class="Total_Soft_Poll_1_LAA_Div_<?php echo $Total_Soft_Poll;?>"></div>
								</div>
								<div class="Total_Soft_Poll_1_But_MDiv_<?php echo $Total_Soft_Poll;?>">
									<?php if($Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_RB_Show == 'true'){ ?>
										<button class="Total_Soft_Poll_1_But_Result_<?php echo $Total_Soft_Poll;?>" id="Total_Soft_Poll_1_But_Result_<?php echo $Total_Soft_Poll;?>" name="Total_Soft_Poll_1_But_Result_<?php echo $Total_Soft_Poll;?>" type="button" value="<?php echo html_entity_decode($Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_RB_Text);?>" onclick="Total_Soft_Poll_1_Result(<?php echo $Total_Soft_Poll;?>)">
											<i class="totalsoft Total_Soft_Poll_1_Result_But_Icon">
												<span><?php echo html_entity_decode($Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_RB_Text);?></span>
											</i>
										</button>
									<?php }?>
									<button class="Total_Soft_Poll_1_But_Vote_<?php echo $Total_Soft_Poll;?>" id="Total_Soft_Poll_1_But_Vote_<?php echo $Total_Soft_Poll;?>" name="Total_Soft_Poll_1_But_Vote_<?php echo $Total_Soft_Poll;?>" type="button" value="<?php echo html_entity_decode($Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_VB_Text);?>" onclick="Total_Soft_Poll_1_Vote(<?php echo $Total_Soft_Poll;?>)">
										<i class="totalsoft Total_Soft_Poll_1_Vote_But_Icon">
											<span><?php echo html_entity_decode($Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_VB_Text);?></span>
										</i>
									</button>
								</div>
							</div>

							<div class="Total_Soft_Poll_1_Main_Ans_Div_<?php echo $Total_Soft_Poll;?>">
								<div class="Total_Soft_Poll_1_Quest_Div_<?php echo $Total_Soft_Poll;?>">
									<label><?php echo html_entity_decode($Total_Soft_Poll_Man[0]->TotalSoftPoll_Question);?></label>
									<div class="Total_Soft_Poll_1_LAQ_Div_<?php echo $Total_Soft_Poll;?>"></div>
								</div>
								<div class="Total_Soft_Poll_1_Ans_Div_<?php echo $Total_Soft_Poll;?>">
									<?php for($i = 0 ; $i < $Total_Soft_Poll_Man[0]->TotalSoftPoll_Ans_C; $i++){ ?>
										<div class="Total_Soft_Poll_1_Ans_Check_Div">
											<label class="Total_Soft_Poll_1_Ans_Lab_<?php echo $Total_Soft_Poll;?>">
												<span style="margin-left: 3px; position: inherit; z-index: 99999999999;">
													<?php echo html_entity_decode($Total_Soft_Poll_Ans[$i]->TotalSoftPoll_Ans);?>
												</span>
												<span class="Total_Soft_Poll_1_Ans_Lab_Sp2_<?php echo $Total_Soft_Poll;?> Total_Soft_Poll_1_Ans_Lab_Sp2_<?php echo $Total_Soft_Poll;?>_<?php echo $i;?>" style="width: <?php echo round($Total_Soft_Poll_Res[$i]->Poll_A_Votes*100/$Total_Soft_Poll_Res_Count,2) . '%'; ?>;<?php if($Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_A_CTF == 'false'){ ?> background-color: <?php echo $Total_Soft_Poll_Ans[$i]->TotalSoftPoll_Ans_Cl;?> !important <?php }?>">
													
												</span>
												<span class="Total_Soft_Poll_1_Ans_Lab_Sp3_<?php echo $Total_Soft_Poll;?> Total_Soft_Poll_1_Ans_Lab_Sp3_<?php echo $Total_Soft_Poll;?>_<?php echo $i;?>">
													<?php if( $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_A_VT == 'percent' ){ ?>
														<?php echo round($Total_Soft_Poll_Res[$i]->Poll_A_Votes*100/$Total_Soft_Poll_Res_Count,2) . ' %'; ?>
													<?php } else if( $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_A_VT == 'count' ){ ?>
														<?php echo $Total_Soft_Poll_Res[$i]->Poll_A_Votes; ?>
													<?php } else { ?>
														<?php echo $Total_Soft_Poll_Res[$i]->Poll_A_Votes . ' ( ' . round($Total_Soft_Poll_Res[$i]->Poll_A_Votes*100/$Total_Soft_Poll_Res_Count,2) . ' % )'; ?>
													<?php } ?>													
												</span>
											</label>
										</div>
									<?php }?>
									<div class="Total_Soft_Poll_1_LAA_Div_<?php echo $Total_Soft_Poll;?>"></div>
								</div>
								<div class="Total_Soft_Poll_1_But_MDiv_<?php echo $Total_Soft_Poll;?>">
									<button class="Total_Soft_Poll_1_But_Back_<?php echo $Total_Soft_Poll;?>" id="Total_Soft_Poll_1_But_Back_<?php echo $Total_Soft_Poll;?>" name="Total_Soft_Poll_1_But_Back_<?php echo $Total_Soft_Poll;?>" type="button" value="<?php echo html_entity_decode($Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_BB_Text);?>" onclick="Total_Soft_Poll_1_Back(<?php echo $Total_Soft_Poll;?>)">
										<i class="totalsoft Total_Soft_Poll_1_Back_But_Icon">
											<span><?php echo html_entity_decode($Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_BB_Text);?></span>
										</i>
									</button>
								</div>
							</div>
						</div>						
					</form>
					<div class="Total_Soft_Poll_1_Ans_Fix_<?php echo $Total_Soft_Poll;?>"></div>
					<div class="Total_Soft_Poll_1_Ans_Fix_1_<?php echo $Total_Soft_Poll;?>">
						<div class="Total_Soft_Poll_1_Main_Ans_Div_Fix Total_Soft_Poll_1_Main_Ans_Div_Fix_<?php echo $Total_Soft_Poll;?>">
							<div class="Total_Soft_Poll_1_Quest_Div_<?php echo $Total_Soft_Poll;?>">
								<label><?php echo html_entity_decode($Total_Soft_Poll_Man[0]->TotalSoftPoll_Question);?></label>
								<div class="Total_Soft_Poll_1_LAQ_Div_<?php echo $Total_Soft_Poll;?>"></div>
							</div>
							<div class="Total_Soft_Poll_1_Ans_Div_<?php echo $Total_Soft_Poll;?>">
								<?php for($i = 0 ; $i < $Total_Soft_Poll_Man[0]->TotalSoftPoll_Ans_C; $i++){ ?>
									<div class="Total_Soft_Poll_1_Ans_Check_Div">
										<label class="Total_Soft_Poll_1_Ans_Lab_<?php echo $Total_Soft_Poll;?>">
											<span style="margin-left: 3px; position: inherit; z-index: 99999999999;">
												<?php echo html_entity_decode($Total_Soft_Poll_Ans[$i]->TotalSoftPoll_Ans);?>
											</span>
											<span class="Total_Soft_Poll_1_Ans_Lab_Sp2_<?php echo $Total_Soft_Poll;?> Total_Soft_Poll_1_Ans_Lab_Sp2_<?php echo $Total_Soft_Poll;?>_<?php echo $i;?>" style="width: <?php echo round($Total_Soft_Poll_Res[$i]->Poll_A_Votes*100/$Total_Soft_Poll_Res_Count,2) . '%'; ?>;<?php if($Total_Soft_Poll_Theme[0]->TotalSoft_Poll_1_A_CTF == 'false'){ ?> background-color: <?php echo $Total_Soft_Poll_Ans[$i]->TotalSoftPoll_Ans_Cl;?> !important <?php }?>">
												
											</span>
											<span class="Total_Soft_Poll_1_Ans_Lab_Sp3_<?php echo $Total_Soft_Poll;?> Total_Soft_Poll_1_Ans_Lab_Sp3_<?php echo $Total_Soft_Poll;?>_<?php echo $i;?>">
												<?php if( $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_A_VT == 'percent' ){ ?>
													<?php echo round($Total_Soft_Poll_Res[$i]->Poll_A_Votes*100/$Total_Soft_Poll_Res_Count,2) . ' %'; ?>
												<?php } else if( $Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_A_VT == 'count' ){ ?>
													<?php echo $Total_Soft_Poll_Res[$i]->Poll_A_Votes; ?>
												<?php } else { ?>
													<?php echo $Total_Soft_Poll_Res[$i]->Poll_A_Votes . ' ( ' . round($Total_Soft_Poll_Res[$i]->Poll_A_Votes*100/$Total_Soft_Poll_Res_Count,2) . ' % )'; ?>
												<?php } ?>													
											</span>
										</label>
									</div>
								<?php }?>
								<div class="Total_Soft_Poll_1_LAA_Div_<?php echo $Total_Soft_Poll;?>"></div>
							</div>
							<div class="Total_Soft_Poll_1_But_MDiv_<?php echo $Total_Soft_Poll;?>">
								<button class="Total_Soft_Poll_1_But_Back_<?php echo $Total_Soft_Poll;?>" id="Total_Soft_Poll_1_But_Back_<?php echo $Total_Soft_Poll;?>" name="Total_Soft_Poll_1_But_Back_<?php echo $Total_Soft_Poll;?>" type="button" value="<?php echo html_entity_decode($Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_BB_Text);?>" onclick="Total_Soft_Poll_1_Back(<?php echo $Total_Soft_Poll;?>)">
									<i class="totalsoft Total_Soft_Poll_1_Back_But_Icon">
										<span><?php echo html_entity_decode($Total_Soft_Poll_Theme_1[0]->TotalSoft_Poll_1_P_BB_Text);?></span>
									</i>
								</button>
							</div>
						</div>
					</div>				
				<?php }
 		 	echo $after_widget;
 		}
	}
?>