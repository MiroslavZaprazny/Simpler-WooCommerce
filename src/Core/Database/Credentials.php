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

    public function createTable(): void
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

    public function get(): ?object
    {
        return $this->wpdb->get_row(
            "SELECT * FROM $this->tableName",
            OBJECT
        );
    }

    public function createNewCredentials(string $url, string $key, string $secret): void
    {
        $credentials = $this->get();

        if ($credentials === null) {
            $this->wpdb->insert(
                $this->tableName,
                [
                    'url' => $url,
                    'consumer_key' => $key,
                    'consumer_secret' => $secret,
                ],
                [
                    '%s',
                    '%s',
                    '%s',
                ]
            );

            return;
        }

        $this->wpdb->update(
            $this->tableName,
            [
                'url' => $url,
                'consumer_key' => $key,
                'consumer_secret' => $secret,
            ],
            ['id' => $credentials->id],
            [
                '%s',
                '%s',
                '%s',
            ],
            [
                '%d'
            ]
        );
    }
}
