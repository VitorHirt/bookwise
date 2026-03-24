<aside class="bw-sidebar">
    <div class="bw-sidebar-top">
        <a href="<?= route('admin.dashboard') ?>" class="bw-sidebar-brand" title="Admin Dashboard">
            <span class="bw-sidebar-logo">A</span>
        </a>
    </div>

    <div class="bw-sidebar-center">
        <a href="<?= route('admin.dashboard') ?>" class="bw-sidebar-link <?= route_is('admin.dashboard') ? 'active' : '' ?>" title="Dashboard">
            <i class="bi bi-grid-1x2-fill"></i>
        </a>

        <a href="<?= route('admin.book') ?>" class="bw-sidebar-link <?= route_is('admin.book*') ? 'active' : '' ?>" title="Livros">
            <i class="bi bi-book"></i>
        </a>

        <a href="<?= route('admin.saveBook') ?>" class="bw-sidebar-link <?= route_is('admin.saveBook*') ? 'active' : '' ?>" title="Salvos">
            <i class="bi bi-bookmark-plus"></i>
        </a>

        <a href="<?= route('admin.finished') ?>" class="bw-sidebar-link <?= route_is('admin.finished*') ? 'active' : '' ?>" title="Finalizados">
            <i class="bi bi-journal-check"></i>
        </a>

        <a href="<?= route('admin.settings') ?>" class="bw-sidebar-link <?= route_is('admin.settings') ? 'active' : '' ?>" title="Configuracoes">
            <i class="bi bi-sliders2"></i>
        </a>
    </div>

    <div class="bw-sidebar-bottom">
        <div class="bw-sidebar-flyout" data-flyout-card>
            <button type="button" class="bw-sidebar-link bw-sidebar-action" title="Search" data-flyout-trigger>
                <i class="bi bi-search"></i>
            </button>

            <div class="bw-filter-card" data-flyout-panel>
                <div class="bw-filter-card-header">
                    <span class="bw-filter-card-kicker">Search</span>
                    <h4 class="bw-filter-card-title">Filter library</h4>
                    <p class="bw-filter-card-text">Ajuste os filtros visuais para encontrar conteudo mais rapido.</p>
                </div>

                <div class="bw-filter-card-section">
                    <label class="bw-filter-label" for="bwFilterSearchName">Pesquisar por nome</label>
                    <div class="bw-filter-input-wrap">
                        <i class="bi bi-search"></i>
                        <input type="text" id="bwFilterSearchName" class="bw-filter-input" placeholder="Digite o nome do livro">
                    </div>
                </div>

                <div class="bw-filter-card-section">
                    <span class="bw-filter-label">Status</span>

                    <label class="bw-filter-check">
                        <input type="checkbox">
                        <span>Favoritos</span>
                    </label>

                    <label class="bw-filter-check">
                        <input type="checkbox">
                        <span>Finalizado</span>
                    </label>
                </div>

                <div class="bw-filter-card-section">
                    <label class="bw-filter-label" for="bwFilterDate">Data</label>
                    <input type="date" id="bwFilterDate" class="bw-filter-input bw-filter-date-input">
                </div>

                <div class="bw-filter-card-footer">
                    <button type="button" class="bw-filter-btn bw-filter-btn-ghost">Limpar</button>
                    <button type="button" class="bw-filter-btn bw-filter-btn-primary">Aplicar</button>
                </div>
            </div>
        </div>

        <button type="button" class="bw-sidebar-link bw-sidebar-action" title="Notifications" data-bs-toggle="offcanvas" data-bs-target="#bwNotificationsDrawer" aria-controls="bwNotificationsDrawer">
            <i class="bi bi-bell"></i>
            <span class="bw-sidebar-dot">3</span>
        </button>

        <div class="bw-sidebar-profile bw-sidebar-flyout" data-flyout-card>
            <a href="#" class="bw-sidebar-account" title="Perfil" data-profile-trigger>
                <span class="bw-sidebar-avatar">
                    <img src="https://i.pravatar.cc/80?img=12" alt="Avatar do usuário">
                </span>
            </a>

            <div class="bw-profile-card" data-flyout-panel>
                <div class="bw-profile-card-header">
                    <img class="bw-profile-card-avatar" src="https://i.pravatar.cc/80?img=12" alt="Avatar do usuário">

                    <div class="bw-profile-card-meta">
                        <div class="bw-profile-card-topline">
                            <strong class="bw-profile-card-name">Max Smith</strong>
                            <span class="bw-profile-card-badge">Pro</span>
                        </div>

                        <span class="bw-profile-card-mail">max@kt.com</span>
                    </div>
                </div>

                <div class="bw-profile-card-section">
                    <a href="#" class="bw-profile-card-link">My Profile</a>
                    <a href="#" class="bw-profile-card-link">
                        <span>My Projects</span>
                        <span class="bw-profile-card-pill">3</span>
                    </a>
                    <a href="#" class="bw-profile-card-link">
                        <span>My Subscription</span>
                        <i class="bi bi-chevron-right"></i>
                    </a>
                    <a href="#" class="bw-profile-card-link">My Statements</a>
                </div>

                <div class="bw-profile-card-section">
                    <a href="#" class="bw-profile-card-link">
                        <span>Mode</span>
                        <i class="bi bi-brightness-high"></i>
                    </a>
                    <a href="#" class="bw-profile-card-link">
                        <span>Language</span>
                        <span class="bw-profile-card-language">English <span>US</span></span>
                    </a>
                    <a href="#" class="bw-profile-card-link">Account Settings</a>
                    <a href="#" class="bw-profile-card-link bw-profile-card-link-danger">Sign Out</a>
                </div>
            </div>
        </div>
    </div>
</aside>

<?php section('drawer'); ?>
    <div class="offcanvas offcanvas-end bw-notification-drawer" tabindex="-1" id="bwNotificationsDrawer" aria-labelledby="bwNotificationsDrawerLabel">
        <div class="offcanvas-header bw-notification-header">
            <div>
                <span class="bw-notification-kicker">Activity</span>
                <h5 class="offcanvas-title bw-notification-title" id="bwNotificationsDrawerLabel">Notifications</h5>
            </div>

            <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>

        <div class="offcanvas-body bw-notification-body">
            <div class="bw-notification-toolbar">
                <span class="bw-notification-counter">3 new updates</span>
                <button type="button" class="bw-notification-clear" data-notification-clear>Mark all as read</button>
            </div>

            <div class="bw-notification-list">
                <article class="bw-notification-card is-new">
                    <div class="bw-notification-icon">
                        <i class="bi bi-bookmark-heart"></i>
                    </div>

                    <div class="bw-notification-copy">
                        <p class="bw-notification-text"><strong>Echoes of the Void</strong> reached 1.2k saves.</p>
                        <span class="bw-notification-time">2 minutes ago</span>
                    </div>

                    <button type="button" class="bw-notification-dismiss" data-notification-dismiss aria-label="Dismiss notification">
                        <i class="bi bi-x-lg"></i>
                    </button>
                </article>

                <article class="bw-notification-card is-new">
                    <div class="bw-notification-icon">
                        <i class="bi bi-download"></i>
                    </div>

                    <div class="bw-notification-copy">
                        <p class="bw-notification-text"><strong>Flight from the Dark</strong> got 250 new downloads today.</p>
                        <span class="bw-notification-time">18 minutes ago</span>
                    </div>

                    <button type="button" class="bw-notification-dismiss" data-notification-dismiss aria-label="Dismiss notification">
                        <i class="bi bi-x-lg"></i>
                    </button>
                </article>

                <article class="bw-notification-card is-new">
                    <div class="bw-notification-icon">
                        <i class="bi bi-star"></i>
                    </div>

                    <div class="bw-notification-copy">
                        <p class="bw-notification-text"><strong>Moonlit Tower</strong> received a new 5-star rating.</p>
                        <span class="bw-notification-time">1 hour ago</span>
                    </div>

                    <button type="button" class="bw-notification-dismiss" data-notification-dismiss aria-label="Dismiss notification">
                        <i class="bi bi-x-lg"></i>
                    </button>
                </article>

                <article class="bw-notification-card">
                    <div class="bw-notification-icon">
                        <i class="bi bi-check2-circle"></i>
                    </div>

                    <div class="bw-notification-copy">
                        <p class="bw-notification-text">Your last sync with the library completed successfully.</p>
                        <span class="bw-notification-time">Yesterday</span>
                    </div>

                    <button type="button" class="bw-notification-dismiss" data-notification-dismiss aria-label="Dismiss notification">
                        <i class="bi bi-x-lg"></i>
                    </button>
                </article>
            </div>
        </div>
    </div>
<?php endsection(); ?>

<?php push('styles'); ?>
    <link rel="stylesheet" href="<?= asset('assets/view/client/sidebar/sidebar.css') ?>">
    <link rel="stylesheet" href="<?= asset('assets/view/admin/sidebar/sidebar.css') ?>">
<?php endpush(); ?>

<?php push('scripts'); ?>
    <script src="<?= asset('assets/view/client/sidebar/sidebar.js') ?>"></script>
<?php endpush(); ?>
