<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">

    <title>
        <?php yieldSection('title', 'Bookwise'); ?>
    </title>

    <?php stack('styles'); ?>
</head>
<body>

    <?php yieldSection('content'); ?>

    <?php stack('scripts'); ?>
</body>
</html>
