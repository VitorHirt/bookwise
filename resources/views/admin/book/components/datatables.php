<section class="bw-book-table-card">
    <div class="bw-book-table-card__table">
        <table
            id="books-table"
            class="display bw-book-table"
            data-ajax-url="<?= route('admin.book.dataTables'); ?>"
            aria-describedby="books-table-description"
        >
            <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Autor</th>
                    <th>Genero</th>
                    <th>Status</th>
                    <th>Criado em</th>
                    <th>Acoes</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="6" class="bw-book-table__empty">
                        Carregando livros...
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</section>
