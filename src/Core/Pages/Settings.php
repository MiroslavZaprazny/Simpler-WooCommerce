<?php

namespace Plugin\Core\Pages;

use Plugin\Core\Database\Credentials;

class Settings extends Page
{
    public function __construct()
    {
        parent::__construct();
    }

    public function render(): void
    {
        require_once plugin_dir_path(__FILE__) . '../../view/settings.php';
    }

    public function store(string $url, string $key, string $secret): void
    {
        $credentials = new Credentials();
        $credentials->createNewCredentials($url, $key, $secret);
    }
}
