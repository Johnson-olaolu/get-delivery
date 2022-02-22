<?php
require_once('../../../../wp-config.php');
require_once('../../../../wp-load.php');


$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
mysqli_set_charset($conn, "utf8");

$env_type = $_POST["env_type"];
$get_delivery_api_key = $_POST["get_delivery_api_key"];
$get_delivery_webhook_url = $_POST["get_delivery_webhook_url"];

global $wpdb;
$table_prefix = $wpdb->prefix;
$get_delivery_keys_api_table_name = $wpdb->prefix . "get_delivery_api_keys";

$current_keys = mysqli_query($conn, "SELECT * FROM $get_delivery_keys_api_table_name WHERE Env_type = '$env_type' ");

if ($current_keys->num_rows > 0) {
    mysqli_query($conn, "UPDATE $get_delivery_keys_api_table_name SET Get_Delivery_API_Key= '$get_delivery_api_key', Get_Delivery_Webhook_Url = '$get_delivery_webhook_url' WHERE Env_type = '$env_type';");
    echo "Added $env_type Keys to API";
} else {
    mysqli_query($conn, "INSERT INTO  $get_delivery_keys_api_table_name ( Get_Delivery_API_Key, Get_Delivery_Webhook_Url, Env_type) VALUES ('$get_delivery_api_key', '$get_delivery_webhook_url', '$env_type');");
    echo "Added $env_type Keys to API";
}
