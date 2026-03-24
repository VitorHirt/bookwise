<?php section('title'); ?>
    Detalhe do Livro Salvo
<?php endsection(); ?>

<?php section('content'); ?>
    <div class="container-admin-dashboard">
        <h1>Detalhe do Livro Salvo</h1>
        <p>Esta e a tela de entrada do livro salvo <?= htmlspecialchars($bookId ?? '', ENT_QUOTES, 'UTF-8') ?>.</p>
    </div>
<?php endsection(); ?>
