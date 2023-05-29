<?php require_once __DIR__ . '/partials/nav.php' ?>

<form action="<?= WP_PLUGIN_URL . '/simpler-woocommerce/src/Actions/settings-form.php' ?>" method="post">
    <label for="">
        Site URL
    </label>
    <input type="text" name="url" value=<?= $this->credentials->url ?? '' ?>>
    <label for="">
        WooCommerce REST Api key
    </label>
    <input type="text" name="key" value=<?= $this->credentials->consumer_key ?? '' ?>>
    <label for="">
        WooCommerce REST Api secret
    </label>
    <input type="text" name="secret" value=<?= $this->credentials->consumer_secret ?? '' ?>>
    <button type="submit">Submit</button>
</form>