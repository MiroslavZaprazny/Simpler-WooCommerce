<?php

namespace Plugin\Core\Database;

class Credentials
{
    private $wpdb;
    private string $tableName;

    public function __construct()
    {
        global $wpdb;
        $this->wpdb = $wpdb;
        $this->tableName = $this->wpdb->prefix . "woocommerce_api_credentials";
    }
    public function createTable()
    {
        $charset = $this->wpdb->get_charset_collate();

        $sql = "CREATE TABLE IF NOT EXISTS $this->tableName (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            url varchar(255) NOT NULL,
            consumer_key varchar(255) NOT NULL,
            consumer_secret varchar(255) NOT NULL,
            PRIMARY KEY  (id)
	    ) $charset;";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }

    public function get()
    {
        return $this->wpdb->get_row(
            "SELECT * FROM $this->tableName",
            OBJECT
        );
    }
}
