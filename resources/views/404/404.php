<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>404 | Page Not Found</title>

        <link rel="stylesheet" href="<?= asset('assets/custom/custom.css') ?>">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="<?= asset('assets/view/404/404.css') ?>">
    </head>
    <body data-home-url="<?= BASE_URL ?>/">
        <section class="bw-notfound-page">
            <div class="bw-notfound-shell">
                <div class="bw-notfound-code">404</div>

                <div class="bw-notfound-card">
                    <span class="bw-notfound-kicker">Lost in the library</span>
                    <h1 class="bw-notfound-title">This page could not be found.</h1>
                    <p class="bw-notfound-text">
                        The route you tried to access does not exist or may have been moved to another shelf.
                    </p>

                    <div class="bw-notfound-actions">
                        <button type="button" class="bw-notfound-btn bw-notfound-btn-primary" data-go-back>
                            <i class="bi bi-arrow-left"></i>
                            Back to previous page
                        </button>

                        <a href="<?= BASE_URL ?>/" class="bw-notfound-btn bw-notfound-btn-secondary">
                            <i class="bi bi-columns-gap"></i>
                            Go to Bookstore
                        </a>
                    </div>

                    <div class="bw-notfound-meta">
                        <span class="bw-notfound-meta-item">
                            <i class="bi bi-clock-history"></i>
                            Return to where you were
                        </span>

                        <span class="bw-notfound-meta-item">
                            <i class="bi bi-bookmark-check"></i>
                            Saved collections
                        </span>

                        <span class="bw-notfound-meta-item">
                            <i class="bi bi-bell"></i>
                            Smart notifications
                        </span>
                    </div>
                </div>
            </div>
        </section>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="<?= asset('assets/view/404/404.js') ?>"></script>
    </body>
</html>
