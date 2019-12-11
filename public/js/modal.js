document.addEventListener('DOMContentLoaded', event => {
    console.log($('#register'));

    const loginButton = document.querySelector('#loginLink');
    loginButton.addEventListener('click', () => {
        $('#login').modal('show');
    });
    const registerButton = document.querySelectorAll('.registerLink');
    registerButton.forEach(element => {
        element.addEventListener('click', () => {
            $('#register').modal('show');
        });
    });
});
