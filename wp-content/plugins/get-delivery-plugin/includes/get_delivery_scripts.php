<?php
    function get_delivery_admin_scripts($hook) {
        wp_register_script(
            'get_delivery_plugin_admin_script',
            get_delivery_url. 'assets/js/admin.js',
            ['jquery'],
            time()
        );

        wp_localize_script('get_delivery_plugin_admin_script','wpplugin', [
            'hook' => $hook,
            'pluginsUrl' => plugins_url(),
        ]);

        if('toplevel_page_get-delivery-home' == $hook) {
            wp_deregister_script('jquery');
            wp_register_script( 'jquery', 'https://code.jquery.com/jquery-3.6.0.min.js',null,'3.6.0');
            wp_enqueue_script('jquery');
            wp_enqueue_script('get_delivery_plugin_admin_script');
        }
        
    }

    add_action('admin_enqueue_scripts', 'get_delivery_admin_scripts');
?>