<?php

/**
 * The public-facing functionality of the plugin.
 */
class Propeller_Ads_Public {

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
	 * @param      string $plugin_name The name of the plugin.
	 * @param      string $version The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {
		$this->plugin_name    = $plugin_name;
		$this->version        = $version;
		$this->setting_helper = new Propeller_Ads_Settings_Helper( $this->plugin_name );
	}

	/**
	 * Insert ad
	 */
	public function insert_script() {
		if ( is_user_logged_in() && $this->setting_helper->get_field_value( 'general', 'logged_in_disabled' ) ) {
			return;
		}

		if ( $this->setting_helper->get_field_value( 'onclick', 'enabled' ) ) {
			$onclick_anti_adblock_token   = $this->setting_helper->get_field_value( 'onclick', 'anti_adblock_token' );
			$onclick_anti_adblock_zone_id = $this->setting_helper->get_field_value( 'onclick', 'anti_adblock_zone_id' );

			if (
				$this->setting_helper->get_field_value( 'onclick', 'anti_adblock_enabled' )
				&& ( ! empty( $onclick_anti_adblock_token ) )
				&& ( ! empty( $onclick_anti_adblock_zone_id ) )
			) {
				$onclick_anti_adblock = new Propeller_Ads_Anti_Adblock( $onclick_anti_adblock_token, $onclick_anti_adblock_zone_id );
				echo $onclick_anti_adblock->get();
			} else {
				echo $this->get_standard_script( 'onclick' );
			}
		}

		echo $this->get_standard_script( 'interstitial' );
		echo $this->get_standard_script( 'pushup' );
	}

	/**
	 * Get standard tag
	 *
	 * @param   string $format
	 * @return  string
	 */
	private function get_standard_script( $format ) {
		$is_enabled = $this->setting_helper->get_field_value( $format, 'enabled' );
		$zone_id    = $this->setting_helper->get_field_value( $format, 'zone_id' );

		if ( $is_enabled && ( ! empty( $zone_id ) ) ) {
			return sprintf( $this->get_standard_script_template( $format ), $zone_id );
		}

		return '';
	}

	/**
	 * Get template for standard tag
	 *
	 * @param string $format
	 * @return string
	 */
	private function get_standard_script_template( $format ) {
		if ( $format === 'onclick' ) {
			return '<script data-cfasync="false" type="text/javascript" src="//go.oclasrv.com/apu.php?zoneid=%d"></script>';
		}

		if ( $format === 'interstitial' ) {
			return '<script data-cfasync="false" type="text/javascript" src="//go.mobtrks.com/notice.php?p=%d&interstitial=1"></script>';
		}

		if ( $format === 'pushup' ) {
			return '<script data-cfasync="false" type="text/javascript" src="//go.mobisla.com/notice.php?p=%d&interactive=1&pushup=1" async="async"></script>';
		}

		return '';
	}

}
