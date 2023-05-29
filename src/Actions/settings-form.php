<?php

use Plugin\Core\Pages\Settings;

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
$settings->create($url, $key, $secret);
