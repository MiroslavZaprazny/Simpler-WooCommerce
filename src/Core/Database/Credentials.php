<?php

namespace Plugin\Core\Database;

class Credentials
{
    public function createTable()
    {
        global $wpdb;
        $tableName = $wpdb->prefix . "woocommerce_api_credentials";
        $charset = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE IF NOT EXISTS $tableName (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            url varchar(255) NOT NULL,
            consumer_key varchar(255) NOT NULL,
            consumer_secret varchar(255) NOT NULL,
            PRIMARY KEY  (id)
	    ) $charset;";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }
}
