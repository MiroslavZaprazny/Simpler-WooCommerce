<?php require_once __DIR__ . '/partials/nav.php' ?>
<div class="body">
    <div>
        <table id="tblUser">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>State of order</th>
                    <th>Number of products</th>
                    <th>Date of order</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Test123</td>
                    <td>processing</td>
                    <td>2</td>
                    <td>1.6.2023</td>
                    <td>401$</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script>
    jQuery(document).ready(function($) {
        $('#tblUser').DataTable({
            "lengthChange": false
        });
    });
</script>