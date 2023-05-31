<?php require_once __DIR__ . '/partials/nav.php' ?>
<div>
    <p>
        Dashboard
    </p>
    <div>
        <table id="tblUser" class="display">
            <thead>
                <th>Fullname</th>
            </thead>
            <tbody>
                <tr>
                    <td>
                        jako
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script>
    jQuery(document).ready(function($) {
        $('#tblUser').DataTable();
    });
</script>