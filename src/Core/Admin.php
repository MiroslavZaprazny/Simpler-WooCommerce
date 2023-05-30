<?php

namespace PLugin\Core;

use Plugin\Core\Pages\Dashboard;
use Plugin\Core\Pages\Settings;

class Admin
{
    private Dashboard $dashboard;
    private Settings $settings;

    public function __construct()
    {
        $this->dashboard = new Dashboard();
        $this->settings = new Settings();
    }

    public function activate(): void
    {
        add_action(
            'admin_menu',
            [$this, 'menu'],
        );
    }

    public function menu(): void
    {
        add_menu_page(
            'Simpler WooCommerce',
            'Simpler WooCommerce',
            'manage_options',
            'simpler_woo',
        );

        add_submenu_page(
            'simpler_woo',
            'Simpler WooCommerce',
            'Dashboard',
            'manage_options',
            'simpler_woo',
            [$this->dashboard, 'render'],
        );

        add_submenu_page(
            'simpler_woo',
            'Settings',
            'Settings',
            'manage_options',
            'settings',
            [$this->settings, 'render'],
        );
    }
}
