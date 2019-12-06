let email = document.querySelector("input[type=email]");
let password = document.querySelector("input[type=password]");
let token = document.querySelector("input[type=hidden]");
let btn = document.querySelector("button[type=submit]");
let formHTML = document.querySelector("form.body .form-group");
btn.addEventListener("click", e => {
    e.preventDefault();

    let form = new FormData();
    form.append("_token", token.value);
    form.append("email", email.value);
    form.append("password", password.value);

    fetch("/api/checkUser", {
        body: form,
        method: "POST"
    })
        .then(result => {
            if (result.status == 200) {
                document.getElementById("loginForm").submit();
            }
            if (result.status == 403) {
                alert("No autorizado");
            }
        })
        .catch(error => {
            console.error("Error:", error);
        });
});
