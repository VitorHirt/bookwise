<?php 
    $books = [
        [
            'title' => 'Echoes of the Void',
            'author' => 'Jaxon Pryde',
            'author_age' => '34 anos',
            'author_bio' => 'Escritor de ficcao cientifica com foco em suspense espacial, IA e dilemas morais em ambientes hostis.',
            'cover' => 'https://images.unsplash.com/photo-1502134249126-9f3755a50d78?q=80&w=900&auto=format&fit=crop',
            'badge' => 'Finished',
            'description' => 'Uma tripulacao perdida no vazio descobre um sinal impossivel e mergulha em uma trama sobre memoria, tempo e sacrificio.',
            'stats' => [
                ['icon' => 'bi-eye', 'label' => '8.9k views'],
                ['icon' => 'bi-download', 'label' => '2.4k downloads'],
                ['icon' => 'bi-bookmark-check', 'label' => '1.2k saves'],
            ],
        ],
    ];
?>

<?php section('title'); ?>
    My Books Finished
<?php endsection(); ?>

<?php section('content'); ?>
    <section class="bw-bookstore-page">
        <div class="bw-bookstore-header text-center">
            <h1 class="bw-bookstore-title">My Books Finished</h1>
            <p class="bw-bookstore-subtitle">Browse the books you have added.</p>
        </div>

        <div class="bw-book-grid">
            <?php foreach ($books as $book): ?>
                <?php
                $statsJson = htmlspecialchars(json_encode($book['stats']), ENT_QUOTES, 'UTF-8');
                $description = htmlspecialchars($book['description'], ENT_QUOTES, 'UTF-8');
                $authorBio = htmlspecialchars($book['author_bio'], ENT_QUOTES, 'UTF-8');
                ?>
                <article
                    class="bw-book-card"
                    role="button"
                    tabindex="0"
                    data-book-title="<?= htmlspecialchars($book['title'], ENT_QUOTES, 'UTF-8') ?>"
                    data-book-author="<?= htmlspecialchars($book['author'], ENT_QUOTES, 'UTF-8') ?>"
                    data-book-author-age="<?= htmlspecialchars($book['author_age'], ENT_QUOTES, 'UTF-8') ?>"
                    data-book-author-bio="<?= $authorBio ?>"
                    data-book-description="<?= $description ?>"
                    data-book-cover="<?= htmlspecialchars($book['cover'], ENT_QUOTES, 'UTF-8') ?>"
                    data-book-stats="<?= $statsJson ?>"
                >
                    <div class="bw-book-cover">
                        <?php if (!empty($book['badge'])): ?>
                            <span class="bw-book-badge"><?= htmlspecialchars($book['badge']) ?></span>
                        <?php endif; ?>

                        <img src="<?= htmlspecialchars($book['cover'], ENT_QUOTES, 'UTF-8') ?>" alt="<?= htmlspecialchars($book['title'], ENT_QUOTES, 'UTF-8') ?>">

                        <div class="bw-book-cover-overlay">
                            <span class="bw-book-overlay-label">Autor</span>
                            <h4 class="bw-book-overlay-name"><?= htmlspecialchars($book['author']) ?></h4>
                            <span class="bw-book-overlay-age"><?= htmlspecialchars($book['author_age']) ?></span>
                            <p class="bw-book-overlay-bio"><?= htmlspecialchars($book['author_bio']) ?></p>
                            <span class="bw-book-overlay-link">Ver mais sobre o autor <i class="bi bi-arrow-right"></i></span>
                        </div>
                    </div>

                    <span class="bw-book-author"><?= htmlspecialchars($book['author']) ?></span>
                    <h3 class="bw-book-name"><?= htmlspecialchars($book['title']) ?></h3>

                    <div class="bw-book-stats">
                        <?php foreach ($book['stats'] as $stat): ?>
                            <span class="bw-book-stat"><i class="bi <?= htmlspecialchars($stat['icon']) ?>"></i> <?= htmlspecialchars($stat['label']) ?></span>
                        <?php endforeach; ?>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

    <div class="modal fade bw-book-modal" id="bwBookDetailModal" tabindex="-1" aria-labelledby="bwBookDetailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <span class="bw-book-modal-kicker">Descricao</span>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="bw-book-modal-layout">
                        <div class="bw-book-modal-cover-column">
                            <div class="bw-book-modal-cover-wrap">
                                <img id="bwBookModalCover" src="" alt="" class="bw-book-modal-cover">
                            </div>

                            <div class="bw-book-modal-author-card">
                                <span class="bw-book-modal-author-label">Autor</span>
                                <strong id="bwBookModalAuthorName"></strong>
                                <span id="bwBookModalAuthorAge" class="bw-book-modal-author-age"></span>
                                <p id="bwBookModalAuthorBio" class="bw-book-modal-author-bio mb-0"></p>
                            </div>
                        </div>

                        <div class="bw-book-modal-content-column">
                            <span class="bw-book-modal-author" id="bwBookModalAuthor"></span>
                            <h2 class="bw-book-modal-title" id="bwBookDetailModalLabel"></h2>
                            <p class="bw-book-modal-description" id="bwBookModalDescription"></p>

                            <div class="bw-book-modal-stats">
                                <h3 class="bw-book-modal-stats-title">Estatisticas</h3>
                                <div class="bw-book-modal-stats-grid" id="bwBookModalStats"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endsection(); ?>

<?php push('scripts'); ?>
    <script src="<?= asset('assets/view/client/finished/finished.js') ?>"></script>
<?php endpush(); ?>

<?php push('styles'); ?>
    <link rel="stylesheet" href="<?= asset('assets/view/client/finished/finished.css') ?>">
<?php endpush(); ?>
