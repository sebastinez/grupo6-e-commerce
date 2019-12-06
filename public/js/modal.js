document.addEventListener("DOMContentLoaded", event => {
    console.log($("#register"));

    const loginButton = document.querySelector("#loginLink");
    loginButton.addEventListener("click", () => {
        $("#login").modal("show");
    });
    const registerButton = document.querySelector("#registerLink");
    registerButton.addEventListener("click", () => {
        $("#register").modal("show");
    });
});
