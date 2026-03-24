<?php section('title'); ?>
    Editar Livro
<?php endsection(); ?>

<?php section('content'); ?>
    <div class="container-admin-dashboard">
        <h1>Editar Livro</h1>
        <p>Esta e a tela de entrada para editar o livro <?= htmlspecialchars($bookId ?? '', ENT_QUOTES, 'UTF-8') ?>.</p>
    </div>
<?php endsection(); ?>
