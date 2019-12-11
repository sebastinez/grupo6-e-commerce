$(".ui.search").search({
    apiSettings: {
        url: "/api/search/?q={query}"
    },
    type: "category",
    minCharacters: 3,
    showNoResults: true,
    maxResults: 5,
    searchDelay: 400,
    error: {
        source: "Hubo problemas en la consulta.",
        noResults: "No se encontro nada..."
    },
    fields: {
        results: "results",
        title: "title"
    },
    onSelect: x => {
        window.location.href = `/${x.category}/${x.id}`;
    }
});
