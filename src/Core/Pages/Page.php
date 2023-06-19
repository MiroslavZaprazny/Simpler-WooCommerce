<?php

namespace Plugin\Core\Pages;

use Automattic\WooCommerce\Client;
use Plugin\Core\Database\Credentials;

class Page
{
    protected Client $client;
    protected ?object $credentials = null;

    public function __construct()
    {
        $table = new Credentials();
        $this->credentials = $table->get();

        $this->client =
            new Client(
                $this->credentials->url ?? '',
                $this->credentials->consumer_key ?? '',
                $this->credentials->consumer_secret ?? '',
                [
                    'wp_api' => true,
                    'version' => 'wc/v3',
                    'timeout' => 400
                ]
            );

        add_action(
            'admin_enqueue_scripts',
            [$this, 'enqueue']
        );
    }

    public function enqueue(): void
    {
        wp_register_style(
            'navbar',
            plugins_url('../../../assets/navbar.css', __FILE__),
            false,
            '1.0.0'
        );

        wp_register_style(
            'main',
            plugins_url('../../../assets/main.css', __FILE__),
            false,
            '1.0.0'
        );

        wp_enqueue_style('navbar');
        wp_enqueue_style('main');
    }
}
