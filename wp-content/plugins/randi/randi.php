<?php
/**
 * Plugin Name: Randi
 * Plugin URI: https://github.com/henrywright/randi
 * Description: Fill your WordPress site with random users.
 * Version: 0.2.0
 * Author: Henry Wright
 * Author URI: https://about.me/henrywright
 * Text Domain: randi
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

/**
 * Randi
 *
 * @package Randi
 */

namespace Randi;

require_once ABSPATH . 'wp-admin/includes/import.php';

require_once dirname( __FILE__ ) . '/php/Random.php';
require_once dirname( __FILE__ ) . '/php/Randi.php';
require_once dirname( __FILE__ ) . '/php/functions.php';
require_once dirname( __FILE__ ) . '/php/actions.php';
require_once dirname( __FILE__ ) . '/php/filters.php';
