<?php
    


/**
 * Simple Media Taxonomy Gallery Options
 */

 defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

class SimpleMediaGalleries {
	private $simple_media_gallery_options;
    private $post_formats = array();
  

	public function __construct() {
        $defaults = array( 
            "photo_category"=> "photo_category", "photo_tag"=>  "photo_tag", "simple_media_taxonomies"=> "simple_media_taxonomies",   
            "simple_media_template_output"=>  "post", "simple_media_gallery_bulk_edit"=> "simple_media_gallery_bulk_edit",   
             "simple_media_post_formats"=> "gallery", "simple_media_template_path"=>  "");
		$this->simple_media_gallery_options = get_option( 'simple_media_gallery_options' );
        if (!$this->simple_media_gallery_options)
        {
            add_option('simple_media_gallery_options', $defaults);
            $this->simple_media_gallery_options = $defaults;
		}
        add_action( 'admin_menu', array( $this, 'simple_media_Galleries_add_plugin_page' ) );
		add_action( 'admin_init', array( $this, 'simple_media_Galleries_page_init' ) );
      
	}

	public function simple_media_Galleries_add_plugin_page() {
		add_options_page(
			'Simple Media Galleries', // page_title
			'Simple Media Galleries', // menu_title
			'manage_options', // capability
			'simple-media-Galleries', // menu_slug
			array( $this, 'simple_media_Galleries_create_admin_page' ) // function
		);
	}

	public function simple_media_Galleries_create_admin_page() {
 
    ?>
		<div class="wrap">
			<h2>Simple Media Galleries</h2>
			<p>This plugin should work with other media plugins. Some of the features may cause conflicts. Check out the help page for more information. </p>
			<?php //settings_errors(); /*will cause second settings saved message if no errors*/ ?>

			<form method="post" action="options.php">
				<?php
					settings_fields( 'simple_media_Galleries_option_group' );
					do_settings_sections( 'simple-media-Galleries-admin' );
					submit_button();
				?>
			</form>
		</div>
	<?php }

	public function simple_media_Galleries_page_init() {
		register_setting(
			'simple_media_Galleries_option_group', // option_group
			'simple_media_gallery_options', // option_name
			array( $this, 'simple_media_Galleries_sanitize' ) // sanitize_callback
		);

		add_settings_section(
			'simple_media_Galleries_setting_section', // id
			'Media Gallery Settings', // title
			array( $this, 'simple_media_Galleries_section_info' ), // callback
			'simple-media-Galleries-admin' // page
		);
        $taxonomies = get_object_taxonomies( 'attachment', 'objects' );
   
        foreach ( $taxonomies as $tx )
        {   
            $tax = $tx->labels->name;
            $label = $tx->name;
            if ($tax != 'Tags' && $tax != 'Categories')
            {
 		    add_settings_field(
			    $label, // id
			    $tax, // title
			    array( $this, 'simple_media_gallery_view' ), // callback
			    'simple-media-Galleries-admin', // page
			    'simple_media_Galleries_setting_section' // section
                , array($label, $tax)
		    );
            }
        }
	    add_settings_section(
			'simple_media_Galleries_bulk_section', // id
			'Bulk Editor', // title
			array( $this, 'simple_media_Galleries_bulk_info' ), // callback
			'simple-media-Galleries-admin' // page
		);
        add_settings_field('simple_media_gallery_bulk_edit', 
                        'Enable Bulk Editor', 
                        array($this, 'simple_media_gallery_bulk_view'), 
                        'simple-media-Galleries-admin', // page
			            'simple_media_Galleries_bulk_section' // section
        );
        add_settings_section(
			'simple_media_template_setting_section', // id
			'Media Gallery Template Settings', // title
			array( $this, 'simple_media_template_section_info' ), // callback
			'simple-media-Galleries-admin' // page
		);
	    add_settings_field(
			    'simple_media_template_output', // id
			    'Generate galleries as Pages or Posts?', // title
			    array( $this, 'simple_media_template_view' ), // callback
			    'simple-media-Galleries-admin', // page
			    'simple_media_template_setting_section' // section
                
		    );
        if ( current_theme_supports( 'post-formats' ) ) {
            $this->post_formats = get_theme_support( 'post-formats' );
  
            if ( is_array( $this->post_formats[0] ) ) {
                add_settings_field
                (
                    'simple_media_post_formats', //id
                    'Select a Post Format (Post only!)', //title
                    array($this, 'simple_media_post_type_view'), //callback
                    'simple-media-Galleries-admin', //page
                    'simple_media_template_setting_section' //section
                );
            }
        }
        add_settings_field(
			    'simple_media_template_path', // id
			    'Sub directory for single-{post-type}.php if not in the template directory of the theme or child theme (advanced users only).' , // title
			    array( $this, 'simple_media_template_path_view' ), // callback
			    'simple-media-Galleries-admin', // page
			    'simple_media_template_setting_section' // section
                
		    );
	    add_settings_section(
			'simple_media_taxonomies_setting_section', // id
			'Media Taxonomy Settings', // title
			array( $this, 'simple_media_taxonomies_section_info' ), // callback
			'simple-media-Galleries-admin' // page
		);
	    add_settings_field(
			    'simple_media_taxonomies', // id
			    'Photo Categories & Tags', // title
			    array( $this, 'simple_media_taxonomy_view' ), // callback
			    'simple-media-Galleries-admin', // page
			    'simple_media_taxonomies_setting_section' // section
                
		    );
    
	}

	public function simple_media_Galleries_sanitize($input) {
       
        $taxonomies = get_object_taxonomies( 'attachment', 'objects' );
		$sanitary_values = array();
  
        foreach ( $taxonomies as $tx )
        {
            $label = $tx->name;
		    if ( isset( $input[$label] ) ) {

			    $sanitary_values[$label] = $input[$label] == $label ? $label : '';
		    }

		}
        if (isset($input['simple_media_taxonomies'] )) 
        {
            $sanitary_values['simple_media_taxonomies'] = $input['simple_media_taxonomies'] == 'simple_media_taxonomies' ? 'simple_media_taxonomies' : '';
        }
        if (isset($input['simple_media_template_output']))
        {
            $value = $input['simple_media_template_output'];
            $sanitary_values['simple_media_template_output'] = $value === 'post' || $value == 'page' ? $value : '';
        }
        if (isset($input['simple_media_gallery_bulk_edit']))
        {
            $value = $input['simple_media_gallery_bulk_edit'];
            $sanitary_values['simple_media_gallery_bulk_edit'] = $input['simple_media_gallery_bulk_edit'] == 'simple_media_gallery_bulk_edit' ? 'simple_media_gallery_bulk_edit' : '';
        }
        if (isset($input['simple_media_post_formats']))
        {
            $value = $input['simple_media_post_formats'];
          if (in_array($value, $this->post_formats[0]))
            {
                $sanitary_values['simple_media_post_formats'] = $value;
            }
                
        }
        if (isset($input['simple_media_template_path']))
        {
            $sanitary_values['simple_media_template_path'] =  sanitize_text_field($input['simple_media_template_path']);
        }
		return $sanitary_values;
	}
    public function simple_media_template_section_info()
    {
        echo 'Select the output type for virtual galleries:';
    }
	public function simple_media_Galleries_section_info() {
        echo "Select the taxonomies that will generate virtual galleries:";
		
	}
    public function simple_media_taxonomies_section_info()
    {
        echo "Enable custom photo categories and tags";
    }
    public function simple_media_Galleries_bulk_info()
    {
        echo "Add taxonomy editor to the bulk actions menu";
        
    }
	public function simple_media_gallery_view($args) {
        $label = $args[0];
        $tax = $args[1];
        echo "<div>";
        $this->checkbox($label);
        echo "<span style='margin-left:15px'>[smt_gallery taxonomy_name='$label' slugs='some_slug']</span>";
        echo "</div>";
	//	printf(
	//		'<input type="checkbox" name="simple_media_gallery_options[' . $label . ']" id="' . $label . '" value="' . $label . '" %s> <label for="' . $label . '">' . $tax . '</label>',
		//	( isset( $this->simple_media_gallery_options[$label] ) && $this->simple_media_gallery_options[$label] === $label ) ? 'checked' : ''
	//	);
	}
    public function simple_media_gallery_bulk_view()
    {
        $chkfield =  'simple_media_gallery_bulk_edit';
	    $this->checkbox ($chkfield);     
    }
    private function checkbox($chkfield, $text = 'Check to enable')
    {
     	printf(	'<input type="checkbox" name="simple_media_gallery_options[' . $chkfield . ']" id="' . $chkfield . '" value="' . $chkfield . '" %s> <label for="' . $chkfield . '">' . $text . '</label>',
			( isset( $this->simple_media_gallery_options[$chkfield] ) && $this->simple_media_gallery_options[$chkfield] === $chkfield ) ? 'checked' : '');   
    }
    public function simple_media_taxonomy_view()
    {
        $chkfield =  'simple_media_taxonomies';
        $this->checkbox($chkfield, 'Check to enable');

        
    }

   public function simple_media_template_view()
    {
        $chkfield =  'simple_media_template_output';
        $value = isset($this->simple_media_gallery_options[$chkfield]) ? $this->simple_media_gallery_options[$chkfield]: "post";
      
        $field = "simple_media_gallery_options[$chkfield]";
        ?>
        <div>
            <select  id="<?php echo $chkfield?>" name="<?php echo $field; ?>">
			    <?php $selected = $value === "post" ? "selected" : "" ?>
			    <option value="post" <?php echo $selected; ?>>Post</option>
			    <?php $selected = $value === "page" ? "selected" : "" ?>
			    <option value="page" <?php echo $selected; ?>>Page</option>
		    </select>
        </div>
<?php
        }
        public function simple_media_template_path_view()
        {
         $chkfield = 'simple_media_template_path';
        $value = isset($this->simple_media_gallery_options[$chkfield]) ? $this->simple_media_gallery_options[$chkfield] : '';
        ?>
        <input type='text' value='<?php echo $value; ?>' name = 'simple_media_gallery_options[<?php echo $chkfield; ?>]'/>
        <?php
        }
        public function simple_media_post_type_view()
        {
      
        if ( current_theme_supports( 'post-formats' ) ) {
           
  
            if ( is_array( $this->post_formats[0] ) ) {
                $options =  $this->post_formats[0] ;
            }
        
            $chkfield =  'simple_media_post_formats';
            $value = isset($this->simple_media_gallery_options[$chkfield]) ? $this->simple_media_gallery_options[$chkfield]: "gallery";
            ?><div><?php
            foreach ($options as $option)
            {
                $checked = $option == $value ? "checked" : '';
                ?>

    		    <label for="<?php echo $chkfield . "-" . $option?>"><input type="radio" name="simple_media_gallery_options[<?php echo $chkfield ?>]" id="<?php echo $chkfield . "-" .$option?>" value="<?php echo $option?>" <?php echo $checked; ?>><?php echo ucfirst($option);?></label><br>
        <?php
            }
            ?></div>
            <?php
        }
       
    }
}
if ( is_admin() )
	$simple_media_Galleries = new SimpleMediaGalleries();

/* 
 * Retrieve this value with:
 * $simple_media_gallery_options = get_option( 'simple_media_gallery_options' ); // Array of All Options
 * $post_category_0 = $simple_media_gallery_options['post_category_0']; // post_category
 * $post_option_1 = $simple_media_gallery_options['post_option_1']; // post_option
 */

 function simple_media_galleries_fix_permalinks()
 {
      add_option( 'simple_media-galleries-activated', true );

     
 }
 register_activation_hook( 'simple-media-galleries.php', 'simple_media_galleries_fix_permalinks' );
?>