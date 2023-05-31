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
    }
}
