<?php
/**
 * Action hooks
 *
 * @package Randi
 * @subpackage Actions
 */

namespace Randi;

add_action( 'init',        __NAMESPACE__ . '\\i18n'            );
add_action( 'admin_init',  __NAMESPACE__ . '\\create_importer' );
add_action( 'delete_user', __NAMESPACE__ . '\\delete_image'    );
