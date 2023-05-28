<?php

/*
    Plugin Name: Simpler WooCommerce
    Description: WooCommerce made simpler
    Version: 1.0
*/

use Plugin\Core\Admin;
use Automattic\WooCommerce\Client;


if (!defined('ABSPATH')) {
    die;
}

if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

//TODO: query db to find credentials

$woocommerce = new Client(
    'storerl',
    'consumer_key',
    'consumer_secret',
);

$plugin = new Admin();
$plugin->activate();
