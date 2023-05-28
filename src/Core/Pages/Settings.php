<?php

namespace Plugin\Core\Pages;

class Settings extends Page
{
    public function __construct()
    {
        parent::__construct();
    }

    public function render()
    {
        require_once plugin_dir_path(__FILE__) . '../../view/settings.php';
    }
}
