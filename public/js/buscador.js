var searchField = document.getElementById('search');
searchField.addEventListener('keyup', busquedaCambio);
function busquedaCambio(event) {
    fetch(`/search?query=${event.target.value}`, {
        method: 'GET'
    })
        .then(response => response.json())
        .then(json => {
            $('.ui.search').search({
                type: 'category',
                source: json,
                onSelect: x => {
                    window.location.href = `/${x.category}/${x.id}`;
                }
            });
        });
}
function insertAfter(newNode, referenceNode) {
    referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
}
