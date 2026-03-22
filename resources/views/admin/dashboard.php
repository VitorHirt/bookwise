<?php section('title'); ?>
    Dashboard
<?php endsection(); ?>

<?php section('content'); ?>
    <div class="container-admin-dashboard">
        <h1>Welcome to the Admin Dashboard</h1>
        <p>Here you can manage your bookstore, view sales reports, and more.</p>
    </div>
<?php endsection(); ?>

<?php push('scripts'); ?>
    <script src="<?= asset('assets/view/client/dashboard/dashboard.js') ?>"></script>
<?php endpush(); ?>

<?php push('styles'); ?>
    <link rel="stylesheet" href="<?= asset('assets/view/client/dashboard/dashboard.css') ?>">
<?php endpush(); ?>
