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

        add_action(
            'admin_enqueue_scripts',
            [$this, 'enqueue']
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

    public function enqueue()
    {
        wp_register_style(
            'custom_wp_admin_css',
            plugins_url('/assets/dashboard.css', __FILE__),
            false,
            '1.0.0'
        );
        wp_enqueue_style('custom_wp_admin_css');
    }
}

$plugin = new SimplerWooCommerce();
$plugin->activate();
