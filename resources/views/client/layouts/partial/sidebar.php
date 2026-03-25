<aside class="bw-sidebar">
    <div class="bw-sidebar-top">
        <a href="#" class="bw-sidebar-logo">
            M
        </a>
    </div>

    <div class="bw-sidebar-center">
        <a href="<?= route('client.home') ?>" class="bw-sidebar-link <?= route_is('client.home') ? 'active' : '' ?>" title="Bookstore">
            <i class="bi bi-columns-gap"></i>
        </a>

        <a href="<?= route('client.book') ?>" class="bw-sidebar-link <?= route_is('client.book') ? 'active' : '' ?>" title="Library">
            <i class="bi bi-book"></i>
        </a>

        <a href="<?= route('client.favorite') ?>" class="bw-sidebar-link <?= route_is('client.favorite') ? 'active' : '' ?>" title="Saved">
            <i class="bi bi-bookmark-check"></i>
        </a>

        <a href="<?= route('client.finished') ?>" class="bw-sidebar-link <?= route_is('client.finished') ? 'active' : '' ?>" title="Finished">
            <i class="bi bi-file-earmark-check"></i>
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

        <div class="bw-sidebar-profile bw-sidebar-flyout" data-flyout-card>
            <a href="#" class="bw-sidebar-avatar" title="Perfil" data-profile-trigger>
                <img src="https://i.pravatar.cc/80?img=12" alt="Avatar do usuário">
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

<?php push('styles'); ?>
    <link rel="stylesheet" href="<?= asset('assets/view/client/sidebar/sidebar.css') ?>">
<?php endpush(); ?>

<?php push('scripts'); ?>
    <script src="<?= asset('assets/view/client/sidebar/sidebar.js') ?>"></script>
<?php endpush(); ?>
