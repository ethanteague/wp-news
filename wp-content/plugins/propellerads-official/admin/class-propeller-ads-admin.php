<?php

/**
 * The admin-specific functionality of the plugin.
 */
class Propeller_Ads_Admin {

	/**
	 * @var      string $plugin_name The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * @var      string $version The current version of this plugin.
	 */
	private $version;

	/**
	 * @var Propeller_Ads_Settings_Helper $setting_helper Settings helper instance
	 */
	private $setting_helper;

	/**
	 * @param      string $plugin_name The name of this plugin.
	 * @param      string $version The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {
		$this->plugin_name    = $plugin_name;
		$this->version        = $version;
		$this->setting_helper = new Propeller_Ads_Settings_Helper( $this->plugin_name );
	}

	/**
	 * Register the stylesheets for the admin area.
	 */
	public function enqueue_styles() {
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/propeller-ads-admin.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the admin area.
	 */
	public function enqueue_scripts() {
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/propeller-ads-admin.js', array( 'jquery' ), $this->version, false );
	}

	/**
	 * Add an settings page to the main menu
	 */
	public function add_settings_page() {
		// TODO: check https://developer.wordpress.org/reference/functions/add_menu_page/#notes about capabilities
		add_menu_page(
			__( 'PropellerAds', 'propeller-ads' ),
			__( 'PropellerAds', 'propeller-ads' ),
			'administrator',
			$this->plugin_name,
			array( $this, 'display_options_page' ),
			'none',
			76  // right after the 'Tools' submenu
		);
	}

	/**
	 * Render the options page
	 */
	public function display_options_page() {
		include_once 'partials/propeller-ads-admin-display.php';
	}

	/**
	 * Register all plugin settings
	 */
	public function register_settings() {
		$this->setting_helper->add_section( array(
			'id'    => 'general',
			'title' => 'General',
		) );

		$this->setting_helper->add_field( array(
			'section'        => 'general',
			'id'             => 'logged_in_disabled',
			'title'          => 'Membership',
			'type'           => Propeller_Ads_Settings_Helper::FIELD_TYPE_CHECKBOX,
			'checkbox_label' => 'Disable ads for logged in users',
			'description'    => __( 'You can disable ads for all registered users (and administrators).', 'propeller-ads' )
		) );

		// Onclick
		$this->setting_helper->add_section( array(
			'id'    => 'onclick',
			'title' => 'Onclick / Popunder Ads',
		) );

		$this->setting_helper->add_field( array(
			'section'        => 'onclick',
			'id'             => 'enabled',
			'title'          => 'Activation',
			'type'           => Propeller_Ads_Settings_Helper::FIELD_TYPE_CHECKBOX,
			'checkbox_label' => 'Allow ads on all pages',
		) );

		$this->setting_helper->add_field( array(
			'section'        => 'onclick',
			'id'             => 'anti_adblock_enabled',
			'title'          => 'Anti-AdBlock',
			'type'           => Propeller_Ads_Settings_Helper::FIELD_TYPE_CHECKBOX,
			'checkbox_label' => 'Show ads for visitors with ad blockers',
		) );

		$this->setting_helper->add_field( array(
			'section'     => 'onclick',
			'id'          => 'anti_adblock_token',
			'title'       => 'Anti-AdBlock Token',
			'type'        => Propeller_Ads_Settings_Helper::FIELD_TYPE_INPUT_TEXT,
			'size'        => 35,
			'description' => '<a href="https://support.propellerads.com/Knowledgebase/Article/View/133/0/how-to-integrate-onclickads-code-with-anti-adblock-support#get-token" target="_blank">Where to find Anti-AdBlock Token?</a>',
		) );

		$this->setting_helper->add_field( array(
			'section' => 'onclick',
			'id'      => 'anti_adblock_zone_id',
			'title'   => 'Anti-AdBlock Zone ID',
			'type'    => Propeller_Ads_Settings_Helper::FIELD_TYPE_INPUT_INTEGER,
		) );

		$this->setting_helper->add_field( array(
			'section' => 'onclick',
			'id'      => 'zone_id',
			'title'   => 'Zone ID',
			'type'    => Propeller_Ads_Settings_Helper::FIELD_TYPE_INPUT_INTEGER,
		) );

		// Interstitial
		$this->setting_helper->add_section( array(
			'id'    => 'interstitial',
			'title' => 'Mobile Interstitial',
		) );

		$this->setting_helper->add_field( array(
			'section'        => 'interstitial',
			'id'             => 'enabled',
			'title'          => 'Activation',
			'type'           => Propeller_Ads_Settings_Helper::FIELD_TYPE_CHECKBOX,
			'checkbox_label' => 'Allow ads on all pages',
		) );

		$this->setting_helper->add_field( array(
			'section' => 'interstitial',
			'id'      => 'zone_id',
			'title'   => 'Zone ID',
			'type'    => Propeller_Ads_Settings_Helper::FIELD_TYPE_INPUT_INTEGER,
		) );

		// Pushup
		$this->setting_helper->add_section( array(
			'id'    => 'pushup',
			'title' => 'Mobile Dialog Ads / Push Up',
		) );

		$this->setting_helper->add_field( array(
			'section'        => 'pushup',
			'id'             => 'enabled',
			'title'          => 'Activation',
			'type'           => Propeller_Ads_Settings_Helper::FIELD_TYPE_CHECKBOX,
			'checkbox_label' => 'Allow ads on all pages',
		) );

		$this->setting_helper->add_field( array(
			'section' => 'pushup',
			'id'      => 'zone_id',
			'title'   => 'Zone ID',
			'type'    => Propeller_Ads_Settings_Helper::FIELD_TYPE_INPUT_INTEGER,
		) );
	}

}
