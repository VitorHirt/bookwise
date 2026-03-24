function createDataTable(tableId, options = {}) {
    const settings = {
        processing: true,
        serverSide: true,
        dom: "rtip",
        ajax: {
            url: options.ajaxUrl || "",
            type: "GET",
            data: function (d) {
                if (typeof options.ajaxData === "function") {
                    options.ajaxData(d);
                }
                return d;
            },
        },
        language: {
            processing: "Carregando...",
            zeroRecords: "Nenhum registro encontrado",
            emptyTable: "Nenhum dado disponível na tabela",
            info: "Mostrando _START_ até _END_ de _TOTAL_ registros",
            infoEmpty: "Mostrando 0 até 0 de 0 registros",
            infoFiltered: "(filtrado de _MAX_ registros no total)",
            lengthMenu: "Mostrar _MENU_ registros",
            loadingRecords: "Carregando...",
            search: "Pesquisar:",
            paginate: {
                previous: '<i class="bi bi-chevron-left"></i>',
                next: '<i class="bi bi-chevron-right"></i>',
                first: '<i class="bi bi-chevron-double-left"></i>',
                last: '<i class="bi bi-chevron-double-right"></i>',
            },
        },
        columns: options.columns || [],
    };

    const table = $("#" + tableId).DataTable(settings);

    if (options.refreshInterval && options.refreshInterval > 0) {
        setInterval(function() {
            table.ajax.reload(null, false);
        }, options.refreshInterval);
    }

    const searchSelector = options.searchInput || "#search-input";
    const searchInput = document.querySelector(searchSelector);
    if (searchInput) {
        let typingTimer;
        searchInput.addEventListener("keyup", function () {
            clearTimeout(typingTimer);
            typingTimer = setTimeout(() => {
                table.search(this.value).draw();
            }, 500);
        });
    }

    const lengthSelector = options.lengthInput || "#entries-per-page";
    if (document.querySelector(lengthSelector)) {
        document.querySelector(lengthSelector).addEventListener("change", function () {
            table.page.len(this.value).draw();
        });
    }

    return table;
}