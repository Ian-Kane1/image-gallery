// script.js

// function to show/hide password
function showPassword() {
    const passwordField = document.querySelector('#password')
    const showPassword = document.querySelector('#showPassword')
    // show password logic
    if (showPassword.innerText == 'Show Password') {
        showPassword.innerText = 'Hide Password'
        passwordField.type = 'text'
        // hide password logic
    } else if (showPassword.innerText === 'Hide Password') {
        passwordField.type = 'password'
        showPassword.innerText = 'Show Password'
    }
}

// call is_logged_in.php to check if user is logged in
fetch('helper/is_logged_in.php')
    .then(res => res.json())
    .then(function (res) {
        if (res.status == 'yes') {
            // set login link display to none
            // set logout link display to inline-block
            // set image upload link display to inline-block
            const login = document.querySelector('#login')
            login.style.display = 'none'
            const logout = document.querySelector('#logout')
            logout.style.display = 'inline-block'
            const upload = document.querySelector('#upload')
            upload.style.display = 'inline-block'

            logout.addEventListener('click', function (e) {
                e.preventDefault()
                // call logout_ajax.php to log user out
                fetch('helper/logout_ajax.php')
                    .then(res => res.json())
                    .then(function (res) {
                        if (res.status == 'success') {
                            // set login link display to inline-block
                            // set logout link display to none
                            // set image upload link display to none
                            login.style.display = 'inline-block'
                            logout.style.display = 'none'
                            upload.style.display = 'none'
                            // redirect user to home page
                            window.location.replace("home.php")
                            // set message text alerting user to logged out status
                            document.querySelector('#message').innerHTML = '<p>You have been logged out</p>'
                        }
                    })
            })
        }
    })
