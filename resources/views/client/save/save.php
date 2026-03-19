<?php section('title'); ?>
    Saved Books
<?php endsection(); ?>

<?php section('content'); ?>
    <section class="bw-bookstore-page">
        <div class="bw-bookstore-header text-center">
            <h1 class="bw-bookstore-title">Saved Books</h1>
            <p class="bw-bookstore-subtitle">Browse the books you marked to revisit later.</p>
        </div>

        <div class="bw-book-grid">
            <article class="bw-book-card">
                <div class="bw-book-cover">
                    <button type="button" class="bw-fav-btn active" title="Salvo">
                        <i class="bi bi-heart-fill"></i>
                    </button>

                    <img src="https://images.unsplash.com/photo-1519608487953-e999c86e7455?q=80&w=900&auto=format&fit=crop" alt="Flight from the Dark">
                </div>

                <span class="bw-book-author">Joe Dever</span>
                <h3 class="bw-book-name">Flight from the Dark</h3>

                <div class="bw-book-stats">
                    <span class="bw-book-stat">
                        <i class="bi bi-eye"></i>
                        12.4k views
                    </span>

                    <span class="bw-book-stat">
                        <i class="bi bi-download"></i>
                        3.1k downloads
                    </span>

                    <span class="bw-book-stat">
                        <i class="bi bi-star"></i>
                        4.8 rating
                    </span>
                </div>
            </article>

            <article class="bw-book-card">
                <div class="bw-book-cover">
                    <button type="button" class="bw-fav-btn active" title="Salvo">
                        <i class="bi bi-heart-fill"></i>
                    </button>

                    <span class="bw-book-badge">Finished</span>
                    <img src="https://images.unsplash.com/photo-1502134249126-9f3755a50d78?q=80&w=900&auto=format&fit=crop" alt="Echoes of the Void">
                </div>

                <span class="bw-book-author">Jaxon Pryde</span>
                <h3 class="bw-book-name">Echoes of the Void</h3>

                <div class="bw-book-stats">
                    <span class="bw-book-stat">
                        <i class="bi bi-eye"></i>
                        8.9k views
                    </span>

                    <span class="bw-book-stat">
                        <i class="bi bi-download"></i>
                        2.4k downloads
                    </span>

                    <span class="bw-book-stat">
                        <i class="bi bi-bookmark-check"></i>
                        1.2k saves
                    </span>
                </div>
            </article>
        </div>
    </section>
<?php endsection(); ?>

<?php push('scripts'); ?>
    <script src="<?= asset('assets/view/client/save/save.js') ?>"></script>
<?php endpush(); ?>

<?php push('styles'); ?>
    <link rel="stylesheet" href="<?= asset('assets/view/client/save/save.css') ?>">
<?php endpush(); ?>
