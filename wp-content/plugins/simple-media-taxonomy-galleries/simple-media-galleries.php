<?php
/*
Plugin Name: Simple Media Galleries (from Categories & Tags) 
Slug: simply-media-galleries
Plugin URI: http://www.shooflysolutions.com/plugins/simplymediagalleries
Description: A plugin that uses creates wordpress galleries form your media libray based on categories and tags
Version: 1.2
Author: A.R. Jones
Credit to Giuseppe-Mazzapica - GMMediaTags
https://github.com/Giuseppe-Mazzapica/GMMediaTags
Cretit to Brian Oz - Virtual Themed Page
https://gist.github.com/brianoz/9105004
Author URI: http://www.shooflysolutions.com
Copyright (C) 2016 Shoofly Solutions
Contact me at http://www.shooflysolutions.com/    
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program. If not, see <http://www.gnu.org//>.
licenses
*/
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
$dir = plugin_dir_path( __FILE__ );
define('GMMEDIATAGSPATH', plugin_dir_path( __FILE__ ) );
define('GMMEDIATAGSURL', plugins_url( '/' , __FILE__ ) );
require $dir . '/simple-media-galleries-tags.php';
require $dir . '/simple-media-galleries-admin.php';

//shortcode to retrieve medi id's

add_shortcode("smt_gallery", "smt_gallery", 2);

function smt_gallery($atts)
{
    $atts = shortcode_atts(array('slugs' => array(), 'taxonomy_name'=> ''), $atts);
    extract ($atts);
    unset($atts['slugs']);
    unset($atts['taxonomy_name']);
    $ids = simple_media_galleries_media_ids($slugs, $taxonomy_name);
    $atts['ids'] = $ids; 
    return gallery_shortcode( $atts); 
}

if (!class_exists('simple_media_galleries')):

class simple_media_galleries
{
  
    private $taxonomies;
    function __construct($simple_media_gallery_options)
    {
        if ( get_option( 'simple_media-galleries-activated', true ))
        {
             flush_rewrite_rules();
             update_option( 'simple_media-galleries-activated', false );
        }
        //Create the taxonomies
        if (isset($simple_media_gallery_options['simple_media_taxonomies'])) {
            if ($simple_media_gallery_options['simple_media_taxonomies'] == 'simple_media_taxonomies') {
        $this->simple_media_galleries_taxonomy();
            }
        }
     
 
        $taxonomies = get_object_taxonomies( 'attachment', 'objects' );
        $redirect = FALSE;

        foreach($taxonomies as $tax)
        {
           // var_dump($tax);
           // echo "<br>";
            $taxname = $tax->name;
            if (isset($simple_media_gallery_options[$taxname]))
            {
                if ($simple_media_gallery_options[$taxname] == $taxname) {
                    $this->taxonomies[] = $taxname;
                    $redirect  = TRUE;
                }
            }
        }
   
        if ($redirect)
        {
            add_action('parse_request', array($this, 'simple_media_galleries_parse_request'), 50);
         
        }

        //Check to create virtual taxonomy page
 
    }

    static function get_latest_priority( $filter )
    {
        if ( empty ( $GLOBALS['wp_filter'][ $filter ] ) )
            return PHP_INT_MAX;

        $priorities = array_keys( $GLOBALS['wp_filter'][ $filter ] );
        $last       = end( $priorities );

        if ( is_numeric( $last ) )
            return PHP_INT_MAX;

        return "$last-z";
    }

    function simple_media_galleries_taxonomy()
    {
            /* Categories*/
	        $labels = array(
		        'name'              => _x( 'Photo Categories', 'taxonomy general name' ),
		        'singular_name'     => _x( 'Photo Category', 'taxonomy singular name' ),
		        'search_items'      => __( 'Search Photo Categories' ),
		        'all_items'         => __( 'All Photo Categories' ),
		        'parent_item'       => __( 'Parent Photo Category' ),
		        'parent_item_colon' => __( 'Parent Categories:' ),
		        'edit_item'         => __( 'Edit Photo Category' ),
		        'update_item'       => __( 'Update Photo Category' ),
		        'add_new_item'      => __( 'Add New Photo Category' ),
		        'new_item_name'     => __( 'New Photo Category Name' ),
		        'menu_name'         => __( 'Photo Categories' ),
	        );

	        $args = array(
		        'hierarchical'      => true,
		        'labels'            => $labels,
		        'show_ui'           => true,
		        'show_admin_column' => true,
                'show_in_modal'     => true,
                'show_tagcloud'     => true,
                'show_in_quick_edit' => TRUE,
                'update_count_callback' => '_update_post_term_count',
		        'query_var'         => true,
		        'rewrite'           => array( 'slug' => 'photo-category' ),
	        );
                register_taxonomy( "photo_category", "attachment", $args ); 
            /* Tags*/
 	        $labels2 = array(
		        'name'              => _x( 'Photo Tags', 'taxonomy general name' ),
		        'singular_name'     => _x( 'Photo Tag', 'taxonomy singular name' ),
		        'search_items'      => __( 'Search Photo Tags' ),
		        'all_items'         => __( 'All Photo Tags' ),
		        'parent_item'       => __( 'Parent Photo Tag' ),
		        'parent_item_colon' => __( 'Parent Tag:' ),
		        'edit_item'         => __( 'Edit Photo Tag' ),
		        'update_item'       => __( 'Update Photo Tag' ),
		        'add_new_item'      => __( 'Add New Photo Tag' ),
		        'new_item_name'     => __( 'New Photo Tag Name' ),
		        'menu_name'         => __( 'Photo Tags' ),
	        );

	        $args2 = array(
		        'hierarchical'      => true,
		        'labels'            => $labels2,
		        'show_ui'           => true,
		        'show_admin_column' => true,
                'show_in_modal'     => true,
                       'show_tagcloud'     => true,
                'show_in_quick_edit' => TRUE,
                'update_count_callback' => '_update_post_term_count',
		        'query_var'         => true,
		        'rewrite'           => array( 'slug' => 'photo-tag' ),
	        );
            register_taxonomy( "photo_tag", "attachment", $args2);
    }
    


    // Check request for our taxonomy
    function simple_media_galleries_parse_request($query)
    {
        $redirect = FALSE;
      
    
        if (!isset($this->taxonomies))
            return;
            
        foreach ($this->taxonomies as $tax)
        {
            if (isset($query->query_vars[$tax]))
            {
              
                $redirect = TRUE;
                break;
            }
        }
        
        if (!$redirect)
        {
            return;
        }
        // setup hooks and filters to generate virtual  page
        add_action('template_redirect', array($this, 'simple_media_galleries_template_redir'), 10);

        
        new simple_media_galleries_dummy_class();  //go create the dummy page
   
    }

     function simple_media_galleries_template_redir()
        {
            $simple_media_gallery_options = get_option( 'simple_media_gallery_options' );
   
     
            $opost_type = isset($simple_media_gallery_options['simple_media_template_output']) ? $simple_media_gallery_options['simple_media_template_output'] : '';
            $opost_format = isset($simple_media_gallery_options['simple_media_post_formats']) ? $simple_media_gallery_options['simple_media_post_formats'] : '';
            $template_path = isset($simple_media_gallery_options['simple_media_template_path']) ? $simple_media_gallery_options['simple_media_template_path'] : '';
            if ($opost_type == "post")
                $opost_type = "single";
            else
                $opost_type = "page";
            if ($template_path)
                $opost_type = $template_path . "/" . $opost_type;
   
        //  add_filter('get_post_format', array($this, 'get_this_format'), 1, 1);
            add_filter( 'get_the_terms', array($this, 'get_this_format'), 1, 3);//
            get_template_part($opost_type, $opost_format);

            exit;
        }
        function get_this_format($terms, $ID, $taxonomy )
        {

          if ($ID == -1 && $taxonomy == "post_format")
           {
            $format = isset($terms['post_format']) ? $terms['post_format'] : new stdClass();
             $simple_media_gallery_options = get_option( 'simple_media_gallery_options' );
           
            $format->term_id = 'post_format';              
            $format->slug = $simple_media_gallery_options['simple_media_post_formats'];
            $terms['post_format'] = $format;
             return $terms;
                
           }
           else
                 return FALSE;
        }
}

endif;


add_action('init', 'simple_media_galleries_register', simple_media_galleries::get_latest_priority( current_filter() ));


function simple_media_galleries_register()
{
    $simple_media_gallery_options = get_option( 'simple_media_gallery_options' );
    new simple_media_galleries($simple_media_gallery_options);   
    if (isset($simple_media_gallery_options['simple_media_gallery_bulk_edit'])){
        if (($simple_media_gallery_options['simple_media_gallery_bulk_edit']) == 'simple_media_gallery_bulk_edit'){
            GMMediaTagsAdmin::init();
        }
    }
}


if (!class_exists('simple_media_galleries_dummy_class')):

class simple_media_galleries_dummy_class
{
// Setup a dummy post/page 
// From the WP view, a post == a page
//

    function __construct()
    {
          add_filter( 'the_posts', array($this,'simple_media_galleries_dummy'), 10, 2 );
 
        // prevent shortcode content from having spurious <p> and <br> added
        remove_filter('the_content', 'wpautop'); 
    }
    function simple_media_galleries_dummy( $posts, $query ) 
    {
       global $post;
        $tax = isset($query->query_vars['taxonomy']) ? $query->query_vars['taxonomy'] : ''; 
  	//  var_dump($query);
        $simple_media_gallery_options = get_option( 'simple_media_gallery_options' );
   
        if (isset($simple_media_gallery_options[$tax]))
        {
            if ($simple_media_gallery_options[$tax] != $tax){
                return;
            }
        }
        $opost_type = $simple_media_gallery_options['simple_media_template_output'];
        $opost_format = $simple_media_gallery_options['simple_media_post_formats'];
        $term = isset($query->query_vars['term']) ? $query->query_vars['term'] : '' ;
        if (!$term)
            return;
      $termobj = get_term_by('slug', $term, $tax); 
    $name = $termobj->name; 
        $ids = simple_media_galleries_media_ids($term, $tax);
        // have to create a dummy post as otherwise many templates
        // don't call the_content filter
        global $wp, $wp_query;
         //create a fake post intance
        $p = new stdClass;
        // fill $p with everything a page in the database would have
        $p->ID = -1;
        $p->post_author = 1;
        $p->post_date = current_time('mysql');
        $p->post_date_gmt =  current_time('mysql', $gmt = 1);
        $p->post_content ="[gallery ids='$ids']";
        $p->post_title = ucfirst($name); 
        $p->post_excerpt = '';
        $p->post_status = 'publish';
        $p->ping_status = 'closed';
        $p->post_password = '';
        $p->post_name = $name; 
        $p->name = $term;
        $p->to_ping = '';
        $p->pinged = '';
        $p->modified = $p->post_date;
        $p->modified_gmt = $p->post_date_gmt;
        $p->post_content_filtered = '';
        $p->post_parent = 0;
        $p->guid = get_home_url('/' . $p->post_name); // use url instead?
        $p->menu_order = 0;
        $p->post_type = $opost_type;
        $p->post_format=$opost_format;
        $p->post_mime_type = '';
        $p->comment_status = 'closed';
        $p->comment_count = 0;
        $p->filter = 'raw';
        $p->taxonomy = $tax;
        $p->ancestors = array(); // 3.6
        $post = $p;
        // reset wp_query properties to simulate a found page
        $wp_query->is_page = TRUE;
        $wp_query->is_singular = FALSE;
        $wp_query->is_home = FALSE;
        $wp_query->is_archive = TRUE;
        $wp_query->is_category = FALSE;
        unset($wp_query->query['error']);
        $wp->query = array();
        $wp_query->query_vars['error'] = '';
        $wp_query->is_404 = FALSE;

        $wp_query->current_post = $p->ID;
        $wp_query->found_posts = 1;
        $wp_query->post_count = 1;
        $wp_query->comment_count = 0;
        // -1 for current_comment displays comment if not logged in!
        $wp_query->current_comment = null;
        $wp_query->is_singular = 1;
    
        $wp_query->post = $p;
        $wp_query->posts = array($p);
        $wp_query->queried_object = $p;
        $wp_query->queried_object_id = $p->ID;
        $wp_query->current_post = $p->ID;
        $wp_query->post_count = 1;

        return array($p);
    }


    // Virtual page - tell wordpress we are using the page.php
    // template if it exists (it normally will).
    //
    // We use the theme page.php if we possibly can; if not, we do our best.
    // The get_template_part() call will use child theme template if it exists.
    // This gets called before any output to browser
    //
   
  
}
endif;




function simple_media_galleries_media_ids($slug, $tax='photo-category', $links=false, $size='thumbnail', $orderby="ID")
{
        wp_reset_query();
    if (!is_array($slug))
        $term = explode(",", $slug);
    else
        $term = $slug;
    //$orderby = 'ID';
	$args = array(
		'post_type' => 'attachment',
		'post_status' => 'all',
		'numberposts' => -1,
		'posts_per_page' => -1,
	//	'paged' => $paged,
		'orderby' => $orderby,
		'order' => 'DESC',
		'tax_query' => array(
			array(
				'taxonomy' => $tax,
				'field' => 'slug',
				'terms' => $term
			)
		)
	);
 
    $_attachments = get_posts($args);

    if ($size)
    {
        $sizes = explode($size, ',');
    }
    else 
    {
        $sizes = array();
    }
    $attachments = array();
    foreach ($_attachments as $key => $val) {
        $id = $val->ID;
        if ($links)
            {
                foreach($sizes as $sz)
                    $attachments[]->{$sz} = wp_get_attachment_image_src($id, $sz);
            }
        else
            $attachments[] = $val->ID;

        
          
    }
    if ($links)
        return $attachments;
    else
        return implode(', ', $attachments);
 
        
}
function simple_media_galleries_categories()
{

    $args = array( 'hide_empty' => false );
    $terms = get_terms( 'photo_category', $args );
    return $terms;
}



?>