<?php

namespace Plugin\Core\Pages;

class Settings
{
    public function render()
    {
        require_once plugin_dir_path(__FILE__) . '../../view/settings.php';
    }
}
