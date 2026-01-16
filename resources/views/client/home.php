<?php section('title'); ?>
Home Client
<?php endsection(); ?>

<?php section('content'); ?>
<h1>Bem-vindo</h1>
<p>Página client funcionando 🚀</p>
<h1><?= $teste ?></h1>
<?php endsection(); ?>

<?php push('scripts'); ?>
<script>
    console.log('Script da home');
</script>
<?php endpush(); ?>
