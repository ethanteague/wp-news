<?php
/**
 * Random class
 *
 * @package Randi
 * @subpackage Classes
 */

namespace Randi;

/**
 * The Random class definition.
 *
 * @since 0.1.0
 */
class Random {

	/**
	 * The name of the main image directory.
	 *
	 * @since 0.1.0
	 * @var string
	 */
	const IMAGE_DIR = 'randi';

	/**
	 * The base path.
	 *
	 * @since 0.1.0
	 * @var string
	 */
	public $basedir;

	/**
	 * The base path.
	 *
	 * @since 0.1.0
	 * @var string
	 */
	public $baseurl;

	/**
	 * Set path data.
	 *
	 * @since 0.1.0
	 * @access public
	 */
	public function __construct() {
		$uploads = wp_upload_dir();
		$this->basedir = trailingslashit( $uploads['basedir'] ) . self::IMAGE_DIR;
		$this->baseurl = trailingslashit( $uploads['baseurl'] ) . self::IMAGE_DIR;
	}

	/**
	 * Create a user.
	 *
	 * @since 0.1.0
	 * @access public
	 *
	 * @param object $user The user data.
	 */
	public function create( $user ) {

		$user_id = wp_insert_user( array(
			'first_name'      => ucfirst( sanitize_text_field( $user->name->first ) ),
			'last_name'       => ucfirst( sanitize_text_field( $user->name->last ) ),
			'user_email'      => sanitize_email( $user->email ),
			'user_login'      => sanitize_user( $user->username ),
			'user_pass'       => $_POST['password'],
			'role'            => $_POST['role'],
			'user_registered' => date( 'Y-m-d H:i:s', (int) $user->registered )
		) );

		if ( ! is_wp_error( $user_id ) ) {
			// Tag this user.
			update_user_meta( $user_id, 'randi', 1 );

			// Create a directory.
			wp_mkdir_p( trailingslashit( $this->basedir ) . $user_id );

			// Copy the source image.
			copy( esc_url_raw( $user->picture->large ), trailingslashit( $this->basedir ) . trailingslashit( $user_id ) . 'image.jpg' );
		}
		return $user_id;
	}

	/**
	 * Delete a user's image.
	 *
	 * @since 0.1.0
	 * @access public
	 *
	 * @param int $user_id The user ID.
	 */
	public function delete_image( $user_id ) {
		// Delete the image.
		@unlink( trailingslashit( $this->basedir ) . trailingslashit( $user_id ) . 'image.jpg' );

		// Delete the image directory.
		@rmdir( trailingslashit( $this->basedir ) . $user_id );

		// Delete the image base directory.
		@rmdir( $this->basedir );
	}

	/**
	 * Get the user image URL.
	 *
	 * @since 0.1.0
	 * @access public
	 *
	 * @return string
	 */
	public function get_image( $user_id ) {
		return trailingslashit( $this->baseurl ) . trailingslashit( $user_id ) . 'image.jpg';
	}

	/**
	 * Check if an image exists for a given user.
	 *
	 * @since 0.1.0
	 * @access public
	 *
	 * @return bool
	 */
	public function image_exists( $user_id ) {
		if ( file_exists( trailingslashit( $this->basedir ) . trailingslashit( $user_id ) . 'image.jpg' ) ) {
			return true;
		} else {
			return false;
		}
	}
}
