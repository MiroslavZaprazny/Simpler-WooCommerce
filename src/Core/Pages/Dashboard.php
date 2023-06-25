<?php

namespace Plugin\Core\Pages;

class Dashboard extends Page
{
    public array $orders;
    public int $todaysOrders;
    public int $unfinishedOrders;

    public function __construct()
    {
        parent::__construct();

        $this->orders = (array) $this->client->get('orders');
        $this->todaysOrders = count(array_filter($this->orders, fn ($order) => date('Ymd') == date('Ymd', strtotime($order->date_created))));
        $this->unfinishedOrders = count(
            array_filter($this->orders, fn ($order) => $order->status === 'pending' || $order->status === 'processing' || $order->status === 'on-hold')
        );

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
            'dashboard-css',
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

        wp_enqueue_style('dashboard-css');
        wp_enqueue_script('jquery');
        wp_enqueue_script('data-table-js');
        wp_enqueue_style('data-table-css');
    }
}
