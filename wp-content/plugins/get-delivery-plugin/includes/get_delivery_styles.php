<?php
    function get_delivery_admin_styles ($hook) {
        wp_register_style(
            'get-delivery-plugin-admin-style',
            get_delivery_url. 'assets/css/admin.css',
            [],
            time()
        );
        //wp_enqueue_script('get-delivery-plugin-admin');
        if('toplevel_page_get-delivery-home' == $hook) {
            wp_enqueue_style('get-delivery-plugin-admin-style');
        }
    }

    add_action('admin_enqueue_scripts', 'get_delivery_admin_styles')
?>