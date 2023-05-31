<?php

use Plugin\Core\Pages\Settings;

require_once dirname(__FILE__) . '/../../../../../wp-load.php';

if (
    !isset($_POST['key']) &&
    !isset($_POST['url']) &&
    !isset($_POST['key'])
) {
    exit;
}

$url = htmlspecialchars($_POST['url']);
$key = htmlspecialchars($_POST['key']);
$secret = htmlspecialchars($_POST['secret']);

$settings = new Settings();
$settings->store($url, $key, $secret);

wp_redirect(admin_url() . 'admin.php?page=settings');
