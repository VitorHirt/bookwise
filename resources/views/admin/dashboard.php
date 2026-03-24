<?php section('title'); ?>
    Dashboard
<?php endsection(); ?>

<?php section('content'); ?>
    <div class="container-admin-dashboard">
        <h1>Dashboard</h1>
        <p>Esta e a tela inicial do dashboard administrativo.</p>
    </div>
<?php endsection(); ?>

<?php push('scripts'); ?>
    <script src="<?= asset('assets/view/admin/dashboard/dashboard.js') ?>"></script>
<?php endpush(); ?>

<?php push('styles'); ?>
    <link rel="stylesheet" href="<?= asset('assets/view/admin/dashboard/dashboard.css') ?>">
<?php endpush(); ?>
