var addBtn = document.querySelectorAll("button[data-type=comprar]");
var updateBtn = document.querySelectorAll("button[data-type=update]");
var borrarBtn = document.querySelectorAll("button[data-type=borrar]");

addBtn.forEach(button => {
    button.addEventListener("click", event => {
        event.preventDefault();
        let albumBtn = event.target;

        let form = new FormData();
        form.append("user_id", albumBtn.getAttribute("data-user"));
        form.append("album_id", albumBtn.getAttribute("data-id"));
        fetch("/api/addDisco", { body: form, method: "POST" }).then(
            response => {
                if (response.status == 200) {
                    albumBtn.innerHTML = "LISTO!";
                    albumBtn.setAttribute("disabled", true);
                    albumBtn.classList.remove("btn-naranja");
                    albumBtn.classList.add("btn-secondary");
                } else {
                    albumBtn.innerHTML = "ERROR!";
                    albumBtn.setAttribute("disabled", true);
                    albumBtn.classList.remove("btn-naranja");
                    albumBtn.classList.add("btn-danger");
                    setTimeout(function() {
                        albumBtn.innerHTML = "COMPRAR";
                        albumBtn.removeAttribute("disabled");
                        albumBtn.classList.add("btn-naranja");
                        albumBtn.classList.remove("btn-danger");
                    }, 3000);
                }
            }
        );
    });
});
updateBtn.forEach(button => {
    button.addEventListener("click", event => {
        event.preventDefault();
        let albumBtn = event.target;
        let id = albumBtn.getAttribute("data-id");
        let cantidad = document.querySelector(`input[data-disco=d${id}]`).value;
        let form = new FormData();
        form.append("user_id", albumBtn.getAttribute("data-user"));
        form.append("album_id", albumBtn.getAttribute("data-id"));
        form.append("cantidad", cantidad);
        fetch("/api/updateDisco", { body: form, method: "POST" }).then(
            response => {
                if (response.status == 200) {
                    albumBtn.innerHTML = "LISTO!";
                    albumBtn.setAttribute("disabled", true);
                    albumBtn.classList.remove("btn-danger");
                    albumBtn.classList.add("btn-secondary");
                    setTimeout(function() {
                        albumBtn.innerHTML = "Actualizar";

                        albumBtn.removeAttribute("disabled");
                        albumBtn.classList.add("btn-danger");
                        albumBtn.classList.remove("btn-secondary");
                    }, 2000);
                }
            }
        );
    });
});
borrarBtn.forEach(button => {
    button.addEventListener("click", event => {
        event.preventDefault();
        let albumBtn = event.target;

        let form = new FormData();
        form.append("user_id", albumBtn.getAttribute("data-user"));
        form.append("album_id", albumBtn.getAttribute("data-id"));
        fetch("/api/destroyDisco", { body: form, method: "POST" }).then(
            response => {
                if (response.status == 200) {
                    document
                        .querySelector(
                            `div[data-disco=d${albumBtn.getAttribute(
                                "data-id"
                            )}`
                        )
                        .remove();
                    if (
                        document.querySelectorAll("div.carrito .row").length ===
                        0
                    ) {
                        document.querySelector("div.container").innerHTML +=
                            "<div class='titulos' style='font-size:2rem'>No hay discos en el carrito</div>                    ";
                    }
                }
            }
        );
    });
});
