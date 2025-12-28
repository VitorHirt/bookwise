<?php 
    require_once __DIR__ . '/../route/web.php';
    $views = 'book_book';
?>

<section class="d-flex justify-content-center gap-2 mt-5 flex-wrap">
    <?php foreach ($listaDeLivros as $livros): ?>
        <div class="card" style="width: 18rem;">
            <img src="<?php echo $livros['url'] ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><i class="bi bi-journals"></i> <?php echo $livros['nome'] ?></h5>
                <p class="card-text"><?php echo $livros['descricao'] ?></p>
                <a href="/views/<?php echo $views ?>.php/<?php echo $livros['id'] ?>" class="btn w-100 fw-bold d-flex justify-content-between align-items-center bg-info-subtle">
                    <span>Ver mais</span>
                    <i class="bi fs-4 bi-arrow-right-short"></i>
                </a>
            </div>
        </div>
    <?php endforeach ?>
</section>