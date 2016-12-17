<?php
/**
 * Randi class
 *
 * @package Randi
 * @subpackage Classes
 */

namespace Randi;

/**
 * The Randi class definition.
 *
 * @since 0.2.0
 */
class Randi {

	/**
	 * The number of users imported.
	 *
	 * @since 0.2.0
	 * @var int
	 */
	public $tally = 0;

	/**
	 * The user data.
	 *
	 * @since 0.2.0
	 * @var object
	 */
	public $data;

	/**
	 * The error data.
	 *
	 * @since 0.2.0
	 * @var WP_Error
	 */
	public $error;

	/**
	 * These aren't the droids we're looking for.
	 *
	 * @since 0.2.0
	 * @access public
	 */
	public function __construct() {}

	/**
	 * Check the form data.
	 *
	 * @since 0.2.0
	 * @access public
	 */
	public function check() {

		if ( ! current_user_can( 'manage_options' ) ) {
			$this->error->add( 'err', __( 'You do not have permission to do that.', 'randi' ) );
		}

		if ( empty( $_POST['results'] ) ) {
			$this->error->add( 'err', __( 'You must enter a number.', 'randi' ) );
		}

		if ( ! ctype_digit( $_POST['results'] ) ) {
			$this->error->add( 'err', __( 'You must enter a valid number.', 'randi' ) );
		}

		if ( empty( $_POST['password'] ) ) {
			$this->error->add( 'err', __( 'You must choose a password.', 'randi' ) );
		}

		if ( ! in_array( $_POST['role'], array_keys( get_editable_roles() ) ) ) {
			$this->error->add( 'err', __( 'That role is not valid.', 'randi' ) );
		}

		if ( ! in_array( $_POST['gender'], array( '', 'female', 'male' ) ) ) {
			$this->error->add( 'err', __( 'That is not a gender.', 'randi' ) );
		}

		if ( ! in_array( $_POST['nat'], array( '', 'au', 'br', 'ca', 'ch', 'de', 'es', 'fi', 'fr', 'gb', 'ie', 'ir', 'nl', 'nz', 'us' ) ) ) {
			$this->error->add( 'err', __( 'That nationality is not supported.', 'randi' ) );
		}
	}

	/**
	 * Get the user data.
	 *
	 * @since 0.2.0
	 * @access public
	 */
	public function get() {
		$request = "https://randomuser.me/api/0.8/?results={$_POST['results']}";
		$request .= "&nat={$_POST['nat']}";
		$request .= "&gender={$_POST['gender']}";
		$this->data = json_decode( file_get_contents( $request ) );
	}

	/**
	 * Set the user data.
	 *
	 * @since 0.2.0
	 * @access public
	 */
	public function set() {
		foreach( $this->data->results as $result ) {
			$random = new Random;
			if ( ! is_wp_error( $random->create( $result->user ) ) ) {
				$this->tally++;
			}
		}
	}

	/**
	 * The registered callback.
	 *
	 * @since 0.2.0
	 * @access public
	 */
	public function dispatch() {

		if ( ! empty( $_POST ) ) {

			check_admin_referer( 'randi', '1d60f2' );
			$this->error = new \WP_Error;
			$this->check();

			if ( empty( $this->error->errors['err'] ) ) {
				$this->get();
				if ( empty( $this->data->results ) ) {
					$this->error->add( 'err', __( "These aren't the droids we're looking for.", 'randi' ) );
				} else {
					$this->set();
				}
				if ( empty( $this->error->errors['err'] ) ) {
					?>
					<div class="updated"><p><?php printf( __( '%d users were imported.', 'randi' ), $this->tally ); ?></p></div>
					<?php
				} else {
					?>
					<div class="error"><p><?php printf( __( '%s', 'randi' ), $this->error->errors['err'][0] ); ?></p></div>
					<?php
				}
			} else {
				?>
				<div class="error"><p><?php printf( __( '%s', 'randi' ), $this->error->errors['err'][0] ); ?></p></div>
				<?php
			}
		}
		$this->form();
	}

	/**
	 * Output the form.
	 *
	 * @since 0.2.0
	 * @access public
	 */
	public function form() {
		?>
		<div class="wrap">
			<h2><?php _e( 'Randi', 'randi' ); ?></h2>
			<p><?php _e( 'Create random users and add them to this site.', 'randi' ); ?></p>
			<form method="post" name="randi" id="createuser">
				<?php wp_nonce_field( 'randi', '1d60f2' ); ?>
				<p>
					<label for="results"><?php _e( 'Choose # to add', 'randi' ); ?></label>
					<input type="number" name="results" step="1" min="1" max="100" id="results" value="" class="small-text">
				</p>
				<p>
					<label for="gender"><?php _e( 'Choose a gender', 'randi' ); ?></label>
					<select name="gender" id="gender">
						<option value=""></option>
						<option value="female">Female</option>
						<option value="male">Male</option>
					</select>
				</p>
				<p>
					<label for="nat"><?php _e( 'Choose a nationality', 'randi' ); ?></label>
					<select name="nat" id="nat">
						<option value=""></option>
						<option value="au">AU</option>
						<option value="br">BR</option>
						<option value="ca">CA</option>
						<option value="ch">CH</option>
						<option value="de">DE</option>
						<option value="es">ES</option>
						<option value="fi">FI</option>
						<option value="fr">FR</option>
						<option value="gb">GB</option>
						<option value="ie">IE</option>
						<option value="ir">IR</option>
						<option value="nl">NL</option>
						<option value="nz">NZ</option>
						<option value="us">US</option>
					</select>
				</p>
				<p>
					<label for="role"><?php _e( 'Choose a role', 'randi' ); ?></label>
					<select name="role" id="role">
						<?php wp_dropdown_roles( get_option( 'default_role' ) ); ?>
					</select>
				</p>
				<p>
					<label for="password"><?php _e( 'Choose a password', 'randi' ); ?></label>
					<input type="text" name="password" id="password" value="">
				</p>
				<p>
					<input type="submit" name="submit" value="<?php esc_attr_e( 'Start', 'randi' ); ?>">
				</p>
			</form>
		</div>
		<?php
	}
}
