<?php
/**
 * Plugin Name: SD CONTACT FORM
 * Description: The SD CONTACT FORM plugin allows users to create and store contact form records in database and can be retrived by the admin at any time. The SD contact form provide a drop down input with all the Nigeria 36 states and local government.
 * Plugin URI: https://dandigitals.com
 * Author: Daniel Abughdyer
 * Version: 1.0.0
 * Author URI: https://dandigitals.com
 * Text Domain: SD CONTACT FORM
 * Domain Path: /languages
 * License: GPL2
 * Requires at least: 4.9
 * Tested up to: 5.8
 * Requires PHP: 5.2.4
 * @package SD CONTACT FORM
 * @category Core
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
    die( 'Invalid request.' );
}

// create feedback table

// register_activation_hook( __FILE__, 'sd_Create_sdvip_Table');
function sd_Create_sdvip_Table() {
  global $wpdb;
          $charset_collate = $wpdb->get_charset_collate();
          $table_name = $wpdb->prefix . 'sd_cform';
          $table_name2 = $wpdb->prefix . 'sd_api';
          $sql = "CREATE TABLE `$table_name` (
          `id` int(11) NOT NULL AUTO_INCREMENT,
          `name` varchar(220) DEFAULT NULL,
          `email` varchar(220) DEFAULT NULL,
          `phone` varchar(220) DEFAULT NULL,
          `address` varchar(220) DEFAULT NULL,
          `state` varchar(220) DEFAULT NULL,
          `lg` varchar(220) DEFAULT NULL,
          `city` varchar(220) DEFAULT NULL,
          `subject` varchar(250) DEFAULT NULL,
          `description` varchar(250) DEFAULT NULL,
          `date` date DEFAULT NULL,
          `note` text DEFAULT NULL,
          PRIMARY KEY(id)
  );
  ";
//create second tb
  $sql2 = "CREATE TABLE `$table_name2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(100) DEFAULT NULL,
  `api` varchar(50) DEFAULT NULL,
  `call` varchar(50) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY(id)
  ) ENGINE=MyISAM DEFAULT CHARSET=latin1;
  ";
  if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql,$sql2);
    dbDelta($sql2);
  }
}

/**
 * Flush our rewrite rules on deactivation.
 *
 * @since 0.8.0
 *
 * @internal
 */
function sd_deactivation() {
    flush_rewrite_rules();
}


function sd_my_save_error()
    {
    file_put_contents(dirname(__file__).'/error_activation.txt', ob_get_contents());
}
add_action('activated_plugin','sd_my_save_error');
//deactivate_rules
register_deactivation_hook( __FILE__, 'sd_deactivation' );
//require other parts
require_once(plugin_dir_path(__FILE__).'/includes/sd-form.php');
require_once(plugin_dir_path(__FILE__).'/includes/sd-short-code.php');
// require_once(plugin_dir_path(__FILE__).'/includes/sd-function.php');
// require_once(plugin_dir_path(__FILE__).'/includes/sd-scripts.php');
// require_once(plugin_dir_path(__FILE__).'/includes/sd-fields.php'); 
// require_once(plugin_dir_path(__FILE__).'/includes/sd-shortcodes.php');
// require_once(plugin_dir_path(__FILE__).'/includes/sd-results.php');
// require_once(plugin_dir_path(__FILE__).'/includes/sd-game-results.php');
// require_once(plugin_dir_path(__FILE__).'/includes/sd-delete.php');