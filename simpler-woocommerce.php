<?php

/*
    Plugin Name: Simpler WooCommerce
    Description: WooCommerce made simpler
    Version: 1.0
*/

use Plugin\Core\Admin;

if (!defined('ABSPATH')) {
    die;
}

if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

$plugin = new Admin();
$plugin->activate();
