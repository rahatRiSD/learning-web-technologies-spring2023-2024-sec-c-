function currentPassword(password)
{
    if (password === "") {
        alert('Fill the password Properly');
        return false;
    }
    return true;
}

function validatePassword(password) {
    if (password === "") {
        alert('Fill the password Properly');
        return false;
    }


    if (password.length<=8) {
        alert("Password must be at least 8 characters long.");
        return false;
    }

    let specialCharacters = ['@', '#', '$', '%'];
    let containsSpecialChar = false;

    for (let char of specialCharacters) {
        if (password.includes(char)) {
            containsSpecialChar = true;
            break;
        }
    }

    if (!containsSpecialChar) {
        alert("Password must contain at least one of the special characters (@, #, $, %).");
        return false;
    }

    return true;
}


function confirmpass(pass, cpass) {
    if (cpass === "") {
        alert("Confirm Password required");
        return false;
    } else if (pass !== cpass) {
        alert("Confirm password doesn't match ");
        return false;
    }

    return true;
}


function Form() {
    let password = document.getElementById('CurrentPassword').value;
    let newpassword = document.getElementById('NewPassword').value;
    let confirmPassword = document.getElementById('Repassword').value;

    if (!currentPassword(password)||
        !validatePassword(newpassword) ||
        !confirmpass(password, confirmPassword) 
       
    ) 
    {
        return false;
    }

    return true;
}