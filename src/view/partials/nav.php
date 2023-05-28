<div class="nav">
    <div class="left-panel">
        <div>
            <img src="" alt="logo goes here" />
        </div>
        <div class="nav-child">
            <?= date('d.m.Y') ?>
        </div>
        <div class="nav-child">
            <p>
                10 unfinished orders
            </p>
        </div>
    </div>
    <div class="right-panel">
        <div class="nav-child">
            <?php
            if ($_SERVER['QUERY_STRING'] === 'page=settings') {
                echo "<a href=" . get_admin_url() . "admin.php?page=simpler_woo>Dashboard</a>";
            } elseif ($_SERVER['QUERY_STRING'] === 'page=simpler_woo') {
                echo "<a href=" . get_admin_url() . "admin.php?page=settings>Settings</a>";
            }
            ?>
        </div>
        <div class="nav-child">
            <p>
                chat goes here
            </p>
        </div>
    </div>
</div>