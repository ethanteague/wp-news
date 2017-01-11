<?php
/*
Plugin Name: Poll
Plugin URI: http://total-soft.pe.hu/poll
Description: Poll WP plugin is a responsive and customizable for WordPress. Poll plugin will help you more easily create powerful poll, quiz, vote results and simple dashboard. You Can from admin panel see who voted and from where.
Author: totalsoft
Version: 1.0.1
Author URI: http://total-soft.pe.hu/
License: GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
*/

 	require_once(dirname(__FILE__) . '/Includes/Total-Soft-Poll-Widget.php');
 	require_once(dirname(__FILE__) . '/Includes/Total-Soft-Poll-Ajax.php');
 	add_action('wp_enqueue_scripts',function() {
 		wp_register_style('Total_Soft_Poll', plugins_url('/CSS/Total-Soft-Poll-Widget.css',__FILE__ ));
		wp_enqueue_style('Total_Soft_Poll');	
		wp_register_script('Total_Soft_Poll',plugins_url('/JS/Total-Soft-Poll-Widget.js',__FILE__),array('jquery','jquery-ui-core'));
		wp_localize_script('Total_Soft_Poll', 'object', array('ajaxurl' => admin_url('admin-ajax.php')));
		wp_enqueue_script('Total_Soft_Poll');
		wp_enqueue_script("jquery");
		wp_enqueue_script("jquery-ui-core");

		wp_register_style('fontawesome-css', plugins_url('/CSS/totalsoft.css', __FILE__)); 
  		wp_enqueue_style('fontawesome-css');
 	});

 	add_action('widgets_init', function() {
 		register_widget('Total_Soft_Poll');
 	});

	add_action("admin_menu", function() {
		add_menu_page('Admin Menu', 'Poll Options', 'manage_options','Total_Soft_Poll', 'Add_New_Poll',plugins_url('/Images/admin.png',__FILE__));
 		add_submenu_page('Total_Soft_Poll', 'Admin Menu', 'Poll Manager', 'manage_options', 'Total_Soft_Poll', 'Add_New_Poll');
 		add_submenu_page('Total_Soft_Poll', 'Admin Menu', 'Themes', 'manage_options', 'Total_Soft_Theme', 'Total_Soft_Themes');
 		add_submenu_page('Total_Soft_Poll', 'Admin Menu', 'Results', 'manage_options', 'Total_Soft_Result', 'Total_Soft_Results');
 		add_submenu_page('Total_Soft_Poll', 'Admin Menu', 'Info', 'manage_options', 'Total_Soft_Info', 'Total_Soft_Infos');
 		add_submenu_page('Total_Soft_Poll', 'Admin Menu', 'Total Products', 'manage_options', 'Total_Soft_Products', 'Total_Soft_Product_Poll');
	});

	add_action('admin_init', function() {
		wp_enqueue_style('wp-color-picker');
		wp_enqueue_script('wp-color-picker');

		wp_register_style('Total_Soft_Poll', plugins_url('/CSS/Total-Soft-Poll-Admin.css',__FILE__));
		wp_enqueue_style('Total_Soft_Poll' );	
		wp_register_script('Total_Soft_Poll', plugins_url('/JS/Total-Soft-Poll-Admin.js',__FILE__),array('jquery','jquery-ui-core'));
		wp_localize_script('Total_Soft_Poll','object', array('ajaxurl'=>admin_url('admin-ajax.php')));
		wp_enqueue_script('Total_Soft_Poll');
		wp_enqueue_script("jquery");
		wp_enqueue_script('jquery-ui-core');
		wp_enqueue_script('jquery-ui-sortable');

		wp_register_style('fontawesome-css', plugins_url('/CSS/totalsoft.css', __FILE__)); 
  		wp_enqueue_style('fontawesome-css');	
	});

	function Add_New_Poll()
	{
 		require_once(dirname(__FILE__) . '/Includes/Total-Soft-Poll-New.php');
	}
	function Total_Soft_Themes()
	{
 		require_once(dirname(__FILE__) . '/Includes/Total-Soft-Poll-Options.php');
	}
	function Total_Soft_Results()
	{
 		require_once(dirname(__FILE__) . '/Includes/Total-Soft-Poll-Results.php');
	}
	function Total_Soft_Infos()
	{
 		require_once(dirname(__FILE__) . '/Includes/Total-Soft-Poll-Info.php');
	}
	function Total_Soft_Product_Poll()
	{
 		require_once(dirname(__FILE__) . '/Includes/Total-Soft-Products.php');
	}
	function TotalSoftPollInstall()
	{
 		require_once(dirname(__FILE__) . '/Includes/Total-Soft-Poll-Install.php');
	}
	register_activation_hook(__FILE__,'TotalSoftPollInstall');

	function Total_SoftPoll_Short_ID($atts, $content = null)
	{
		$atts=shortcode_atts(
			array(
				"id"=>"1"
			),$atts
		);
		return Total_Soft_Draw_Poll($atts['id']);
	}
	add_shortcode('Total_Soft_Poll', 'Total_SoftPoll_Short_ID');
	function Total_Soft_Draw_Poll($Poll)
	{
		ob_start();	
			$args = shortcode_atts(array('name' => 'Widget Area','id'=>'','description'=>'','class'=>'','before_widget'=>'','after_widget'=>'','before_title'=>'','AFTER_TITLE'=>'','widget_id'=>'','widget_name'=>'Total Soft Poll'), $Poll, 'Total_Soft_Poll' );
			$Total_Soft_Poll=new Total_Soft_Poll;

			$instance=array('Total_Soft_Poll'=>$Poll);
			$Total_Soft_Poll->widget($args,$instance);	
			$cont[]= ob_get_contents();
		ob_end_clean();	
		return $cont[0];		
	}
	function TotalSoft_Poll_Color() 
	{
	    wp_enqueue_script(
	        'alpha-color-picker',
	        plugins_url('/JS/alpha-color-picker.js', __FILE__),	       
	        array( 'jquery', 'wp-color-picker' ), // You must include these here.
	        null,
	        true
	    );
	    wp_enqueue_style(
	        'alpha-color-picker',
	        plugins_url('/CSS/alpha-color-picker.css', __FILE__),
	        array( 'wp-color-picker' ) // You must include these here.
	    );
	}
	add_action( 'admin_enqueue_scripts', 'TotalSoft_Poll_Color' );
?>