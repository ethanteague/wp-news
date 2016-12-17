<?php
/**
 * Function definitions
 *
 * @package Randi
 * @subpackage Functions
 */

namespace Randi;

/**
 * Load the plugin's textdomain.
 *
 * @since 0.1.0
 */
function i18n() {
	load_plugin_textdomain( 'randi' );
}

/**
 * Filter the avatar "default".
 *
 * @since 0.1.0
 *
 * @param array $args The avatar's data.
 * @param mixed $id_or_email The identifier.
 * @return array
 */
function avatar_default( $args, $id_or_email ) {

	if ( is_numeric( $id_or_email ) ) {
		$user = get_user_by( 'id', absint( $id_or_email ) );
	}

	if ( is_string( $id_or_email ) ) {
		$user = get_user_by( 'email', $id_or_email );
	}

	if ( $id_or_email instanceof \WP_User ) {
		$user = $id_or_email;
	}

	if ( $id_or_email instanceof \WP_Post ) {
		$user = get_user_by( 'id', (int) $id_or_email->post_author );
	}

	if ( $id_or_email instanceof \WP_Comment ) {
		$user = get_user_by( 'email', $id_or_email->comment_author_email );
	}

	$random = new Random;

	// Check if the user has a local image.
	if ( $random->image_exists( $user->ID ) ) {
		$args['default'] = $random->get_image( $user->ID );
	}

	return $args;
}

/**
 * Delete a user's image.
 *
 * @since 0.1.0
 */
function delete_image( $user_id ) {
	$random = new Random;
	$random->delete_image( $user_id );
}

/**
 * Create a new importer.
 *
 * @since 0.1.0
 */
function create_importer() {
	$randi = new Randi;
	register_importer( 'randi', 'Randi', __( 'Fill your site with random users.', 'randi' ), array( $randi, 'dispatch' ) );
}
