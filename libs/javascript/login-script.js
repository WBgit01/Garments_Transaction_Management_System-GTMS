document.addEventListener('DOMContentLoaded', function() {
    // CLOSE THE FORM TRANSFER TO INDEX.PHP
    document.querySelectorAll('.form_close').forEach(closeButton => {
        closeButton.addEventListener('click', function() {
            this.closest('.form_center').classList.remove('show');
            window.location.href = 'index.php';
        });
    });

    // TOGGLE LOGIN TO SIGNUP FORM
    document.querySelectorAll('.login-link').forEach(loginLink => {
        loginLink.addEventListener('click', function() {
            this.closest('.form_container').querySelector('.signup_form').style.display = 'none';
            this.closest('.form_container').querySelector('.login_form').style.display = 'block';
            this.closest('.form_center').classList.add('show');
        });
    });

    // TOGGLE VISIBILITY OF SIGNUP FORM
    document.querySelectorAll('.signup').forEach(signupButton => {
        signupButton.addEventListener('click', function() {
            // Toggle visibility of the signup form
            document.querySelector('.signup_form').classList.toggle('show');
        });
    });

    // REDIRECT TO REGISTER.PHP WHEN SIGNUP BUTTON CLICKED
    document.querySelectorAll('.signup').forEach(signupButton => {
        signupButton.addEventListener('click', function() {
            window.location.href = 'register.php';
        });
    });

    // SHOW/HIDE PASSWORD
    document.querySelectorAll('.pwhide').forEach(icon => {
        icon.addEventListener('click', function() {
            let input = this.parentElement.querySelector('input');
            if (input.type === 'password') {
                input.type = 'text'; // SHOW PW
                this.classList.replace('fa-eye-slash', 'fa-eye');
            } else {
                input.type = 'password'; // HIDE PW
                this.classList.replace('fa-eye', 'fa-eye-slash');
            }
        });
    });
});
