<?php
/**
 * Filter hooks
 *
 * @package Randi
 * @subpackage Filters
 */

namespace Randi;

add_filter( 'pre_get_avatar_data', __NAMESPACE__ . '\\avatar_default', 10, 2 );
