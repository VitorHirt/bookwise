<?php section('title'); ?>
    Livros
<?php endsection(); ?>

<?php section('content'); ?>
    <div class="bw-book-page">
        <?php includeView('admin/book/components/toolbar.php'); ?>
        <?php includeView('admin/book/components/datatables.php'); ?>
    </div>
<?php endsection(); ?>

<?php push('scripts'); ?>
    <script src="<?= asset('assets/hooks/createDatatables.js') ?>"></script>
    <script src="<?= asset('assets/view/admin/book/book.js') ?>"></script>
<?php endpush(); ?>

<?php push('styles'); ?>
    <link rel="stylesheet" href="<?= asset('assets/view/admin/book/book.css') ?>">
<?php endpush(); ?>
