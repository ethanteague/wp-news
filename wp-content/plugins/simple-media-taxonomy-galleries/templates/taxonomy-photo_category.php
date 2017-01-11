<?php
  /**
   * The template for displaying Custom taxonomy.
   * Learn more: http://codex.wordpress.org/Template_Hierarchy
   *
   * @package WordPress
   * @subpackage Media Library Assistant plugin
   * @revised 2013-07-12, Jonas Lundman
   * @since 1.4
   */


  get_header(); ?>
  <?php

	global $wp_query;
	$term = $wp_query->query_vars['term'];

	// Useful stuff :
	//echo var_export($wp_query->queried_object_id, true) . '<br />';
	//echo var_export($wp_query->query_vars['taxonomy'], true) . '';
	//echo '<pre>';
	//echo var_export(get_queried_object(), true) . '';
	//echo '</pre>';

	$obj = get_queried_object();
	$paged = (get_query_var('page')) ? get_query_var('page') : 1;
	$ppage = 12;
	$columns = $ppage/2;
	$orderby = 'ID';

	$args = array(
		'post_type' => 'attachment',
		'post_status' => 'all',
		'numberposts' => -1,
		'posts_per_page' => $ppage,
		'paged' => $paged,
		'orderby' => $orderby,
		'order' => 'DESC',
		'tax_query' => array(
			array(
				'taxonomy' => 'photo_category',
				'field' => 'slug',
				'terms' => array($term)
			)
		)
	);
       $_attachments = get_posts($args);
       
        $attachments = array();
        foreach ($_attachments as $key => $val) {
            $attachments[$val->ID] = $_attachments[$key];
          
        }
    

    if (empty($attachments)) return '';
 
    $output =' 	<div>">';
		    
    foreach ($attachments as $id => $attachment) {
       
    // Fetch the image
   //     $imgt = wp_get_attachment_image_src($id, 'medium');
        $img = wp_get_attachment_image_src($id, 'thumbnail');

  $output .= "<div>
		     <img src=\"{$img[0]}\" alt=\"title\" />
         </div>";
 
    }

   
    $output .= "</div>\n";
    echo $output;
  

  get_footer(); ?>