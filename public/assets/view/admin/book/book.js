document.addEventListener("DOMContentLoaded", function () {
    const tableElement = document.querySelector("#books-table");

    if (!tableElement || typeof createDataTable !== "function") {
        return;
    }

    const ajaxUrl = tableElement.dataset.ajaxUrl;

    // Evita inicializar o DataTables sem um endpoint valido.
    if (!ajaxUrl) {
        return;
    }

    createDataTable("books-table", {
        ajaxUrl,
        searchInput: "#search-input",
        lengthInput: "#entries-per-page",
        columns: [
            { data: "title", name: "title" },
            { data: "author", name: "author" },
            { data: "genre", name: "genre" },
            { data: "status", name: "status" },
            { data: "created_at", name: "created_at" },
            { data: "actions", name: "actions", orderable: false, searchable: false },
        ],
    });
});
