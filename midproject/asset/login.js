
function validation() {
    let email = document.getElementById('username').value;
    let password = document.getElementById('password').value;

    if (!username) {
        document.getElementById('message').innerHTML = "Username Couldn't Be Empty!";
        return false;
    }

    if (!password) {
        document.getElementById('message').innerHTML = "Password Couldn't Be Empty!";
        return false;
    }

    if (password == username) {
        document.getElementById('message').innerHTML = "Email and Password cannot be the same!";
        return false;
    }
}
