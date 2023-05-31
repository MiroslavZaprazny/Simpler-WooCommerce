<?php

namespace Plugin\Core\Pages;

class Dashboard extends Page
{
    private array $orders;

    public function __construct()
    {
        parent::__construct();

        $this->orders = $this->client->get('orders');
        // echo "<pre>";
        // var_dump($this->orders);
        // exit;

        add_action(
            'admin_enqueue_scripts',
            [$this, 'enqueue']
        );
    }

    public function render(): void
    {
        require_once plugin_dir_path(__FILE__) . '../../view/dashboard.php';
    }

    public function enqueue(): void
    {
        wp_register_style(
            'custom_wp_admin_css',
            plugins_url('../../../assets/dashboard.css', __FILE__),
            false,
            '1.0.0'
        );

        wp_register_script(
            'jquery',
            'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js'
        );

        wp_register_script(
            'data-table-js',
            'https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js'
        );

        wp_register_style(
            'data-table-css',
            'https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css',
            false,
            '1.0.0'
        );

        wp_enqueue_style('custom_wp_admin_css');
        wp_enqueue_script('jquery');
        wp_enqueue_script('data-table-js');
        wp_enqueue_style('data-table-css');
    }
}
