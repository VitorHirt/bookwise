<?php
$slides = [
    [
        'image' => 'https://images.unsplash.com/photo-1500534314209-a25ddb2bd429?q=80&w=1200&auto=format&fit=crop',
        'title' => 'Leia mundos inteiros em uma unica tela.',
        'description' => 'Colecoes interativas, favoritos salvos e uma experiencia imersiva para descobrir novas historias.',
    ],
    [
        'image' => 'https://images.unsplash.com/photo-1493246507139-91e8fad9978e?q=80&w=1200&auto=format&fit=crop',
        'title' => 'Organize sua biblioteca com ritmo e clareza.',
        'description' => 'Acompanhe seus titulos, continue de onde parou e mantenha suas escolhas sempre por perto.',
    ],
    [
        'image' => 'https://images.unsplash.com/photo-1511497584788-876760111969?q=80&w=1200&auto=format&fit=crop',
        'title' => 'Bookwise para leitores que gostam de atmosfera.',
        'description' => 'Um painel escuro, elegante e direto para navegar por aventuras, autores e colecoes.',
    ],
];
?>

<?php section('title'); ?>
    Login
<?php endsection(); ?>

<?php section('content'); ?>
    <section class="bw-auth-shell">
        <div class="bw-auth-card">
            <div class="bw-auth-showcase">
                <div id="bwAuthCarousel" class="carousel slide bw-auth-carousel" data-bs-ride="carousel" data-bs-interval="4200">
                    <div class="carousel-inner">
                        <?php foreach ($slides as $index => $slide): ?>
                            <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                                <div class="bw-auth-slide" style="background-image: linear-gradient(180deg, rgba(5, 8, 14, 0.08), rgba(5, 8, 14, 0.78)), url('<?= htmlspecialchars($slide['image'], ENT_QUOTES, 'UTF-8') ?>');">
                                    <div class="bw-auth-slide-top">
                                        <span class="bw-auth-brand">BW</span>

                                        <a href="<?= route('client.home') ?>" class="bw-auth-back-link">
                                            <span>Voltar ao site</span>
                                            <i class="bi bi-arrow-up-right-circle"></i>
                                        </a>
                                    </div>

                                    <div class="bw-auth-slide-bottom">
                                        <span class="bw-auth-slide-kicker">Bookwise</span>
                                        <h2 class="bw-auth-slide-title"><?= htmlspecialchars($slide['title']) ?></h2>
                                        <p class="bw-auth-slide-text"><?= htmlspecialchars($slide['description']) ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="carousel-indicators bw-auth-indicators">
                        <?php foreach ($slides as $index => $slide): ?>
                            <button type="button" data-bs-target="#bwAuthCarousel" data-bs-slide-to="<?= $index ?>" class="<?= $index === 0 ? 'active' : '' ?>" aria-current="<?= $index === 0 ? 'true' : 'false' ?>" aria-label="Slide <?= $index + 1 ?>"></button>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <div class="bw-auth-panel">
                <div class="bw-auth-panel-viewport" data-auth-panel>
                    <div class="bw-auth-panel-track">
                        <div class="bw-auth-panel-inner bw-auth-stage">
                            <span class="bw-auth-overline">Acesse sua conta</span>

                            <p class="bw-auth-switch">
                                Ainda nao tem uma conta?
                                <button type="button" class="bw-auth-switch-btn" data-auth-toggle="signup">Criar conta</button>
                            </p>

                            <h1 class="bw-auth-heading">Entre no Bookwise</h1>
                            <p class="bw-auth-subheading">
                                Continue sua leitura, recupere seus favoritos e volte para a sua biblioteca pessoal.
                            </p>

                            <form class="bw-auth-form" data-auth-form method="post" action="#">
                                <div class="bw-auth-field">
                                    <label for="bwLoginEmail" class="bw-auth-label">Email</label>
                                    <input type="email" id="bwLoginEmail" class="bw-auth-input" placeholder="voce@bookwise.com" autocomplete="email">
                                </div>

                                <div class="bw-auth-field">
                                    <div class="bw-auth-field-top">
                                        <label for="bwLoginPassword" class="bw-auth-label">Senha</label>
                                        <a href="#" class="bw-auth-inline-link">Esqueci minha senha</a>
                                    </div>

                                    <div class="bw-auth-password-wrap">
                                        <input type="password" id="bwLoginPassword" class="bw-auth-input bw-auth-input-password" placeholder="Digite sua senha" autocomplete="current-password">
                                        <button type="button" class="bw-auth-password-toggle" data-password-toggle data-password-target="#bwLoginPassword" aria-label="Mostrar senha">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                    </div>
                                </div>

                                <label class="bw-auth-check">
                                    <input type="checkbox" checked>
                                    <span>Mantenha-me conectado neste dispositivo</span>
                                </label>

                                <button type="submit" class="bw-auth-submit">Entrar</button>
                            </form>
                        </div>

                        <div class="bw-auth-panel-inner bw-auth-stage">
                            <span class="bw-auth-overline">Crie sua conta</span>

                            <p class="bw-auth-switch">
                                Ja tem uma conta?
                                <button type="button" class="bw-auth-switch-btn" data-auth-toggle="login">Log in</button>
                            </p>

                            <h1 class="bw-auth-heading">Crie a sua conta</h1>
                            <p class="bw-auth-subheading">
                                Monte seu espaco no Bookwise e comece a salvar leituras, autores e colecoes em um so lugar.
                            </p>

                            <form class="bw-auth-form" data-auth-form method="post" action="#">
                                <div class="bw-auth-form-grid">
                                    <div class="bw-auth-field">
                                        <label for="bwRegisterFirstName" class="bw-auth-label">Nome</label>
                                        <input type="text" id="bwRegisterFirstName" class="bw-auth-input" placeholder="Seu nome" autocomplete="given-name">
                                    </div>

                                    <div class="bw-auth-field">
                                        <label for="bwRegisterLastName" class="bw-auth-label">Sobrenome</label>
                                        <input type="text" id="bwRegisterLastName" class="bw-auth-input" placeholder="Seu sobrenome" autocomplete="family-name">
                                    </div>
                                </div>

                                <div class="bw-auth-field">
                                    <label for="bwRegisterEmail" class="bw-auth-label">Email</label>
                                    <input type="email" id="bwRegisterEmail" class="bw-auth-input" placeholder="voce@bookwise.com" autocomplete="email">
                                </div>

                                <div class="bw-auth-field">
                                    <label for="bwRegisterPassword" class="bw-auth-label">Senha</label>

                                    <div class="bw-auth-password-wrap">
                                        <input type="password" id="bwRegisterPassword" class="bw-auth-input bw-auth-input-password" placeholder="Crie uma senha" autocomplete="new-password">
                                        <button type="button" class="bw-auth-password-toggle" data-password-toggle data-password-target="#bwRegisterPassword" aria-label="Mostrar senha">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                    </div>
                                </div>

                                <label class="bw-auth-check">
                                    <input type="checkbox" checked>
                                    <span>Eu concordo com os termos e condicoes</span>
                                </label>

                                <button type="submit" class="bw-auth-submit">Criar conta</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endsection(); ?>

<?php push('scripts'); ?>
    <script src="<?= asset('assets/view/auth/login/login.js') ?>"></script>
<?php endpush(); ?>

<?php push('styles'); ?>
    <link rel="stylesheet" href="<?= asset('assets/view/auth/login/login.css') ?>">
<?php endpush(); ?>
