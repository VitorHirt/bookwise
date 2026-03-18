<?php section('title'); ?>
    Bookstore
<?php endsection(); ?>

<?php section('content'); ?>
    <section class="bw-bookstore-page">
        <div class="bw-bookstore-header text-center">
            <h1 class="bw-bookstore-title">Bookstore</h1>
            <p class="bw-bookstore-subtitle">Browse community-created gamebooks.</p>
        </div>

        <div class="bw-book-grid">
            <article class="bw-book-card">
                <div class="bw-book-cover">
                    <button type="button" class="bw-fav-btn" title="Favoritar">
                        <i class="bi bi-heart"></i>
                    </button>

                    <img src="https://images.unsplash.com/photo-1519608487953-e999c86e7455?q=80&w=900&auto=format&fit=crop" alt="Flight from the Dark">
                </div>
                <span class="bw-book-author">Joe Dever</span>
                <h3 class="bw-book-name">Flight from the Dark</h3>
            </article>

            <article class="bw-book-card">
                <div class="bw-book-cover">
                    <button type="button" class="bw-fav-btn" title="Favoritar">
                        <i class="bi bi-heart"></i>
                    </button>

                    <span class="bw-book-badge">Finished</span>
                    <img src="https://images.unsplash.com/photo-1502134249126-9f3755a50d78?q=80&w=900&auto=format&fit=crop" alt="Echoes of the Void">
                </div>
                <span class="bw-book-author">Jaxon Pryde</span>
                <h3 class="bw-book-name">Echoes of the Void</h3>
            </article>

            <article class="bw-book-card">
                <div class="bw-book-cover">
                    <button type="button" class="bw-fav-btn" title="Favoritar">
                        <i class="bi bi-heart"></i>
                    </button>

                    <img src="https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?q=80&w=900&auto=format&fit=crop" alt="Time Fracture">
                </div>
                <span class="bw-book-author">Corvin Dabrowski</span>
                <h3 class="bw-book-name">Time Fracture</h3>
            </article>

            <article class="bw-book-card">
                <div class="bw-book-cover">
                    <button type="button" class="bw-fav-btn" title="Favoritar">
                        <i class="bi bi-heart"></i>
                    </button>

                    <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?q=80&w=900&auto=format&fit=crop" alt="Hive of Dreams">
                </div>
                <span class="bw-book-author">Liora Plexis</span>
                <h3 class="bw-book-name">Hive of Dreams</h3>
            </article>

            <article class="bw-book-card">
                <div class="bw-book-cover">
                    <button type="button" class="bw-fav-btn" title="Favoritar">
                        <i class="bi bi-heart"></i>
                    </button>

                    <img src="https://images.unsplash.com/photo-1511497584788-876760111969?q=80&w=900&auto=format&fit=crop" alt="City of Ashes">
                </div>
                <span class="bw-book-author">Rylan Skye</span>
                <h3 class="bw-book-name">City of Ashes</h3>
            </article>

            <article class="bw-book-card">
                <div class="bw-book-cover">
                    <button type="button" class="bw-fav-btn" title="Favoritar">
                        <i class="bi bi-heart"></i>
                    </button>

                    <img src="https://images.unsplash.com/photo-1511818966892-d7d671e672a2?q=80&w=900&auto=format&fit=crop" alt="Golden Kingdom">
                </div>
                <span class="bw-book-author">Evelyn Hart</span>
                <h3 class="bw-book-name">Golden Kingdom</h3>
            </article>

            <article class="bw-book-card">
                <div class="bw-book-cover">
                    <button type="button" class="bw-fav-btn" title="Favoritar">
                        <i class="bi bi-heart"></i>
                    </button>

                    <img src="https://images.unsplash.com/photo-1500534623283-312aade485b7?q=80&w=900&auto=format&fit=crop" alt="Silent Horizon">
                </div>
                <span class="bw-book-author">Nael Orson</span>
                <h3 class="bw-book-name">Silent Horizon</h3>
            </article>

            <article class="bw-book-card">
                <div class="bw-book-cover">
                    <button type="button" class="bw-fav-btn" title="Favoritar">
                        <i class="bi bi-heart"></i>
                    </button>

                    <img src="https://images.unsplash.com/photo-1493246507139-91e8fad9978e?q=80&w=900&auto=format&fit=crop" alt="Moonlit Tower">
                </div>
                <span class="bw-book-author">Selene Voss</span>
                <h3 class="bw-book-name">Moonlit Tower</h3>
            </article>
        </div>
    </section>
<?php endsection(); ?>

<?php push('scripts'); ?>
    <script>
        $(function () {
            $('.bw-book-card').on('mouseenter', function () {
                $(this).addClass('is-hovered');
            }).on('mouseleave', function () {
                $(this).removeClass('is-hovered');
            });

            $(document).on('click', '.bw-fav-btn', function (e) {
                e.preventDefault();
                e.stopPropagation();

                const $button = $(this);
                const $icon = $button.find('i');

                $button.toggleClass('active');

                if ($button.hasClass('active')) {
                    $icon.removeClass('bi-heart').addClass('bi-heart-fill');
                } else {
                    $icon.removeClass('bi-heart-fill').addClass('bi-heart');
                }
            });
        });
    </script>
<?php endpush(); ?>

<?php push('styles'); ?>
    <link rel="stylesheet" href="<?= asset('assets/view/client/home/home.css') ?>">
<?php endpush(); ?>