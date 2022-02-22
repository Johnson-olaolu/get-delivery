<?php

function get_delivery_settings_page() {
    add_menu_page(
        'Get Delivery',
        'Get Delivery',
        'manage_options',
        'get-delivery-home',
        'get_delivery_home_page_markup',
        'dashicons-wordpress-alt',
        100
    );

    add_submenu_page(
        'get-delivery-home',
        'Get Delivery page2',
        'Get Delivery page2',
        'manage_options',
        'get-delivery-page2',
        'get_delivery_page2_page_markup'
    );

    add_submenu_page(
        'get-delivery-home',
        'Get Delivery page3',
        'Get Delivery page3',
        'manage_options',
        'get-delivery-page3',
        'get_delivery_page3_page_markup'
    );

    add_submenu_page(
        'wc-admin',
        'Get Delivery page4',
        'Get Delivery page4',
        'manage_options',
        'get-delivery-page4',
        'get_delivery_page4_page_markup'
    );

}
add_action('admin_menu', 'get_delivery_settings_page');



function get_delivery_page2_page_markup() {
    if( !current_user_can('manage_options')) {
        return;
    }
    ?>
    <div class="wrap">
        <h1 class=""><?php esc_html_e( get_admin_page_title()) ?></h1>
        <p class=""> <?php esc_html_e( 'Some content.', 'get-delivery-page2') ?></p>
    </div>
    <?php
}

function get_delivery_page3_page_markup() {
    if( !current_user_can('manage_options')) {
        return;
    }
    ?>
    <div class="wrap">
        <h1 class=""><?php esc_html_e( get_admin_page_title()) ?></h1>
        <p class=""> <?php esc_html_e( 'Some content.', 'get-delivery-page3') ?></p>
    </div>
    <?php
}

function get_delivery_page4_page_markup() {
    if( !current_user_can('manage_options')) {
        return;
    }
    ?>
    <div class="wrap">
        <h1 class=""><?php esc_html_e( get_admin_page_title()) ?></h1>
        <p class=""> <?php esc_html_e( 'Some content.', 'get-delivery-page4') ?></p>
    </div>
    <?php
}

function get_delivery_add_settings_link ($links) {
    $settigs_link = '<a href="admin.php?page=get-delivery-home" class="">'._( 'Settings'). '</a>';
    array_push($links, $settigs_link);
    return $links;
}
$fllter_name = "plugin_action_links_" . plugin_basename(__FILE__);
add_filter($filter_name, 'get_delivery_add_settings_link');