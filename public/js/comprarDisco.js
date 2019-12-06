let total = 0;

document.addEventListener('DOMContentLoaded', () => {
    const addBtn = document.querySelectorAll('button[data-type=comprar]');
    const updateBtn = document.querySelectorAll('button[data-type=update]');
    const borrarBtn = document.querySelectorAll('button[data-type=borrar]');
    const inputCantidad = document.querySelectorAll('input[name=cantidad]');

    inputCantidad.forEach(element => {
        element.addEventListener('change', obtenerTotal);
    });

    addBtn.forEach(button => {
        button.addEventListener('click', event => {
            event.preventDefault();
            let albumBtn = event.target;

            let form = new FormData();
            form.append('album_id', albumBtn.getAttribute('data-id'));
            form.append('cantidad', 1);

            fetch('/api/addDisco', {
                body: form,
                method: 'POST'
            }).then(response => {
                console.log(response);

                if (response.status == 200) {
                    albumBtn.innerHTML = 'LISTO!';
                    albumBtn.setAttribute('disabled', true);
                    albumBtn.classList.remove('btn-naranja');
                    albumBtn.classList.add('btn-secondary');
                } else {
                    albumBtn.innerHTML = 'ERROR!';
                    albumBtn.setAttribute('disabled', true);
                    albumBtn.classList.remove('btn-naranja');
                    albumBtn.classList.add('btn-danger');
                    setTimeout(function() {
                        albumBtn.innerHTML = 'COMPRAR';
                        albumBtn.removeAttribute('disabled');
                        albumBtn.classList.add('btn-naranja');
                        albumBtn.classList.remove('btn-danger');
                    }, 3000);
                }
            });
        });
    });
    updateBtn.forEach(button => {
        button.addEventListener('click', event => {
            event.preventDefault();
            let albumBtn = event.target;
            let id = albumBtn.getAttribute('data-id');
            let cantidad = document.querySelector(`input[data-disco=d${id}]`)
                .value;
            let stock = albumBtn.getAttribute('data-stock');
            console.log(stock);
            console.log(cantidad);

            if (parseInt(cantidad) > parseInt(stock)) {
                albumBtn.innerHTML = 'No hay suficiente!';
                albumBtn.setAttribute('disabled', true);
                albumBtn.classList.remove('btn-danger');
                albumBtn.classList.add('btn-secondary');
                setTimeout(function() {
                    albumBtn.innerHTML = 'Actualizar';

                    albumBtn.removeAttribute('disabled');
                    albumBtn.classList.add('btn-danger');
                    albumBtn.classList.remove('btn-secondary');
                }, 2000);
            } else {
                let form = new FormData();
                form.append('album_id', albumBtn.getAttribute('data-id'));
                form.append('cantidad', cantidad);
                fetch('/api/updateDisco', { body: form, method: 'POST' }).then(
                    response => {
                        if (response.status == 200) {
                            albumBtn.innerHTML = 'LISTO!';
                            albumBtn.setAttribute('disabled', true);
                            albumBtn.classList.remove('btn-danger');
                            albumBtn.classList.add('btn-secondary');
                            setTimeout(function() {
                                albumBtn.innerHTML = 'Actualizar';

                                albumBtn.removeAttribute('disabled');
                                albumBtn.classList.add('btn-danger');
                                albumBtn.classList.remove('btn-secondary');
                            }, 2000);
                        }
                    }
                );
            }
        });
    });
    borrarBtn.forEach(button => {
        button.addEventListener('click', event => {
            event.preventDefault();
            let albumBtn = event.target;

            let form = new FormData();
            form.append('user_id', albumBtn.getAttribute('data-user'));
            form.append('album_id', albumBtn.getAttribute('data-id'));
            fetch('/api/destroyDisco', { body: form, method: 'POST' }).then(
                response => {
                    console.log(response);

                    if (response.status == 200) {
                        document
                            .querySelector(
                                `div[data-disco=d${albumBtn.getAttribute(
                                    'data-id'
                                )}`
                            )
                            .remove();
                        if (
                            document.querySelectorAll('div.carritoActivo .row')
                                .length === 0
                        ) {
                            document.querySelector(
                                'div.carritoActivo'
                            ).innerHTML +=
                                "<div class='titulos' style='font-size:2rem'>No hay discos en el carrito</div>                    ";
                        } else obtenerTotal();
                    }
                }
            );
        });
    });
});

function obtenerTotal() {
    const item = document.querySelectorAll('.row.pb-3');

    let subtotal = 0;
    item.forEach(row => {
        const precio = row.querySelector('#precio');
        const cantidad = row.querySelector('input[name=cantidad]');
        subtotal += Number(precio.innerHTML) * cantidad.value;
    });
    let subtotalText = document.querySelector('#valor-subtotal');
    subtotalText.innerHTML = subtotal;
}
