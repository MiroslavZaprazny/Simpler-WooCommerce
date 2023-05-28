<?php

namespace Plugin\Core\Pages;

use Automattic\WooCommerce\Client;

class Dashboard
{
    private Client $client;

    public function __construct()
    {
        $this->client = woocommerce();

        add_action(
            'admin_enqueue_scripts',
            [$this, 'enqueue']
        );
    }

    public function render()
    {
        require_once plugin_dir_path(__FILE__) . '../../view/dashboard.php';
    }

    public function enqueue()
    {
        wp_register_style(
            'custom_wp_admin_css',
            plugins_url('../../../assets/dashboard.css', __FILE__),
            false,
            '1.0.0'
        );
        wp_enqueue_style('custom_wp_admin_css');
    }
}
