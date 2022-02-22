<?php
/**
 * @package Get Delivery
 * @version 1.0.0
 */
/*
Plugin Name: Get Delivery
Plugin URI: http://staging-web-app.getdelivry.com
Description: Get deivery API plugin
Author: Johnson Olaoluwa
Author URI: http://github.com/johnson-olaolu
Version: 1.0.0
Author URI: http://ma.tt/
*/

if( !defined( 'WPINC')) {
    die;
}

define( 'get_delivery_url', plugin_dir_url(__FILE__));

include( plugin_dir_path(__FILE__) . 'includes/get_delivery_menus.php');
include( plugin_dir_path(__FILE__) . 'includes/get_delivery_styles.php');
include( plugin_dir_path(__FILE__) . 'includes/get_delivery_scripts.php');

#include pages
include(plugin_dir_path(__FILE__) . 'includes/get_delivery_authentication_page.php');


# Initaite database
function add_get_delivery_tables_to_db() {
 
    global $wpdb;
  
    $get_delivery_keys_api_table_name = $wpdb->prefix . "get_delivery_api_keys";
 
    $charset_collate = $wpdb->get_charset_collate();
 
    $create_api_table = "CREATE TABLE IF NOT EXISTS $get_delivery_keys_api_table_name (
      id bigint(20) NOT NULL AUTO_INCREMENT,
      Env_type VARCHAR(100) NOT NULL,
      Get_Delivery_API_Key VARCHAR (100) NOT NULL,
      Get_Delivery_Webhook_Url VARCHAR (100) NOT NULL,
      created_at datetime NOT NULL,
      expires_at datetime NOT NULL,
      PRIMARY KEY id (id)
    ) $charset_collate;";

 
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($create_api_table);
}    
 
register_activation_hook( __FILE__, 'add_get_delivery_tables_to_db' );
