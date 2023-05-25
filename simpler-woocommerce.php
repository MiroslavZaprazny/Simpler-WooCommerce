<?php

/*
    Plugin Name: Simpler WooCommerce
    Description: WooCommerce made simpler
    Version: 1.0
*/

if (!defined('ABSPATH')) {
    die;
}

class SimplerWooCommerce
{
    public function activate()
    {
        add_action(
            'admin_menu',
            [$this, 'addAdminPage'],
        );
    }

    public function addAdminPage()
    {
        add_menu_page(
            'Simpler WooCommerce',
            'Simpler WooCommerce',
            'manage_options',
            'dashboard',
            [$this, 'renderDashboard'],
        );
    }

    public function renderDashboard()
    {
        require_once plugin_dir_path(__FILE__) . 'view/dashboard.php';
    }
}

$plugin = new SimplerWooCommerce();
$plugin->activate();
// register_activation_hook(__FILE__, [$plugin, 'activate']);
