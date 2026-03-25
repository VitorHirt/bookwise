<?php section('title'); ?>
    Cadastrar Livro
<?php endsection(); ?>

<?php section('content'); ?>
    <div class="bw-book-create-page">
        <section class="bw-book-create-hero">
            <div>
                <span class="bw-book-create-hero__eyebrow">Cadastro</span>
                <h1 class="bw-book-create-hero__title">Adicionar novo livro</h1>
                <p class="bw-book-create-hero__description">
                    Preencha as informacoes principais do livro para organizar sua biblioteca administrativa.
                </p>
            </div>

            <a class="bw-book-create-hero__back" href="<?= route('admin.book'); ?>">
                <i class="bi bi-arrow-left"></i>
                <span>Voltar para listagem</span>
            </a>
        </section>

        <form class="bw-book-create-form" action="" method="POST">
            <div class="bw-book-create-grid">
                <section class="bw-book-create-card">
                    <div class="bw-book-create-card__header">
                        <h2>Informacoes principais</h2>
                        <p>Campos essenciais para identificar e apresentar o livro.</p>
                    </div>

                    <div class="row g-3">
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control bw-floating" id="bookTitle" name="title" placeholder="Nome do livro">
                                <label for="bookTitle">Nome do livro</label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control bw-floating" id="bookAuthor" name="author" placeholder="Autor">
                                <label for="bookAuthor">Autor</label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control bw-floating" id="bookGenre" name="genre" placeholder="Genero">
                                <label for="bookGenre">Genero</label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-floating">
                                <select class="form-select bw-floating" id="bookStatus" name="status" aria-label="Status do livro">
                                    <option value="Rascunho">Rascunho</option>
                                    <option value="Revisao">Revisao</option>
                                    <option value="Publicado">Publicado</option>
                                </select>
                                <label for="bookStatus">Status</label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-floating">
                                <input type="date" class="form-control bw-floating" id="bookReleaseDate" name="release_date" placeholder="Data de lancamento">
                                <label for="bookReleaseDate">Data de lancamento</label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-floating">
                                <input type="number" min="1" class="form-control bw-floating" id="bookPages" name="pages" placeholder="Numero de paginas">
                                <label for="bookPages">Numero de paginas</label>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control bw-floating bw-floating--textarea" placeholder="Sinopse" id="bookSynopsis" name="synopsis"></textarea>
                                <label for="bookSynopsis">Sinopse</label>
                            </div>
                        </div>
                    </div>
                </section>

                <aside class="bw-book-create-sidebar">
                    <section class="bw-book-create-card">
                        <div class="bw-book-create-card__header">
                            <h2>Publicacao</h2>
                            <p>Configure exibicao, idioma e identificadores.</p>
                        </div>

                        <div class="row g-3">
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control bw-floating" id="bookIsbn" name="isbn" placeholder="ISBN">
                                    <label for="bookIsbn">ISBN</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control bw-floating" id="bookPublisher" name="publisher" placeholder="Editora">
                                    <label for="bookPublisher">Editora</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-floating">
                                    <select class="form-select bw-floating" id="bookLanguage" name="language" aria-label="Idioma">
                                        <option value="pt-BR">Portugues (Brasil)</option>
                                        <option value="en-US">Ingles</option>
                                        <option value="es-ES">Espanhol</option>
                                    </select>
                                    <label for="bookLanguage">Idioma</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="url" class="form-control bw-floating" id="bookCover" name="cover_url" placeholder="URL da capa">
                                    <label for="bookCover">URL da capa</label>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="bw-book-create-card">
                        <div class="bw-book-create-card__header">
                            <h2>Organizacao</h2>
                            <p>Dados internos para facilitar filtros e catalogacao.</p>
                        </div>

                        <div class="row g-3">
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control bw-floating" id="bookTags" name="tags" placeholder="Tags">
                                    <label for="bookTags">Tags</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control bw-floating" id="bookCollection" name="collection" placeholder="Colecao ou serie">
                                    <label for="bookCollection">Colecao ou serie</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control bw-floating bw-floating--notes" placeholder="Observacoes internas" id="bookNotes" name="notes"></textarea>
                                    <label for="bookNotes">Observacoes internas</label>
                                </div>
                            </div>
                        </div>
                    </section>
                </aside>
            </div>

            <div class="bw-book-create-actions">
                <a href="<?= route('admin.book'); ?>" class="btn btn-outline-light">Cancelar</a>
                <button type="submit" class="btn bw-book-create-submit">
                    <span>Salvar</span>
                </button>
            </div>
        </form>
    </div>
<?php endsection(); ?>

<?php push('styles'); ?>
    <link rel="stylesheet" href="<?= asset('assets/view/admin/book/create.css') ?>">
<?php endpush(); ?>
