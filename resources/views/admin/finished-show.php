<?php section('title'); ?>
    Detalhe do Finalizado
<?php endsection(); ?>

<?php section('content'); ?>
    <div class="container-admin-dashboard">
        <h1>Detalhe do Finalizado</h1>
        <p>Esta e a tela de entrada do livro finalizado <?= htmlspecialchars($bookId ?? '', ENT_QUOTES, 'UTF-8') ?>.</p>
    </div>
<?php endsection(); ?>
