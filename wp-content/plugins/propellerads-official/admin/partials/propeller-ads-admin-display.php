<?php
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 */
if ( isset( $_GET['settings-updated'] ) ) {
	add_settings_error(
		'propeller_ads_messages',
		'propeller_ads_message',
		__( 'Settings Updated', 'propeller-ads' ),
		'updated'
	);
}
settings_errors( 'propeller_ads_messages' );
?>

<div class="wrap">
	<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>

	<p>Do you have a PropellerAds Publisher account? If not, <a href="https://propellerads.com/registration-publisher/" target="_blank"><strong>register one</strong></a> - it takes less than 3 minutes.</p>

	<form class="card propeller-ads" action="options.php" method="post">
		<?php settings_fields( $this->plugin_name ); ?>
		<?php do_settings_sections( $this->plugin_name ); ?>
		<?php submit_button(); ?>
	</form>
</div>

