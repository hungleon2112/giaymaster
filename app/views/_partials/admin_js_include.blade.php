<!-- jQuery -->
<script src="/admin/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="/admin/js/bootstrap.min.js"></script>

<script src="/admin/js/bootstrap-table.js"></script>

<?php if(strpos($_SERVER['REQUEST_URI'], 'dashboard') !== false) : ?>
<!-- Morris Charts JavaScript -->
<script src="/admin/js/plugins/morris/raphael.min.js"></script>
<script src="/admin/js/plugins/morris/morris.min.js"></script>
<script src="/admin/js/plugins/morris/morris-data.js"></script>
<?php endif;?>

<script src="/admin/js/admin_js.js"></script>