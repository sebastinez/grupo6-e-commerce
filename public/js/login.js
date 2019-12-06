let email = document.querySelector('#login input[type=email]');
let password = document.querySelector('#login input[type=password]');
let token = document.querySelector('#login input[type=hidden]');
let btn = document.querySelector('#login button[type=submit]');
let formHTML = document.querySelector('#login form.body .form-group');
console.log(btn);

btn.addEventListener('click', e => {
    e.preventDefault();

    let form = new FormData();
    form.append('_token', token.value);
    form.append('email', email.value);
    form.append('password', password.value);

    fetch('/api/checkUser', {
        body: form,
        method: 'POST'
    })
        .then(result => {
            if (result.status == 200) {
                document.getElementById('login').submit();
            }
            if (result.status == 403) {
                alert('No autorizado');
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
});
