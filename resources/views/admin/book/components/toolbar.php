<section class="bw-book-toolbar">
    <div class="bw-book-toolbar__content">
        <div class="d-flex justify-content-between w-100 bw-book-toolbar__controls">
            <label class="bw-book-toolbar__search" for="search-input">
                <i class="bi bi-search"></i>
                <input
                    id="search-input"
                    type="search"
                    name="search"
                    placeholder="Search..."
                    autocomplete="off"
                >
            </label>

            <div class="bw-book-toolbar__actions">
                <label class="bw-book-toolbar__entries" for="entries-per-page">
                    <span>Exibir</span>
                    <select id="entries-per-page" name="entries">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </label>

                <a class="bw-book-toolbar__button" href="<?= route('admin.book.create'); ?>">
                    <span>Novo livro</span>
                </a>
            </div>
        </div>
    </div>
</section>
