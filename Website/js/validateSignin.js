// #### Validate Signin ####
let signin = document.getElementById('signin');

signin.onsubmit = validateSignin;

// Validate email field
function validateEmail(event){
    let email = document.getElementById('email');
    let eml = /^[a-zA-Z0-9._-]+@gmail\.[a-zA-Z]{2,4}$/;

    if(!eml.test(email.value)){
        email.style.border = "2px solid red";
        // Get error element and inject error
        let emailError = document.getElementById("emailError");
        emailError.innerHTML = "Email field cannot left blank";

        // console.log('False email with: ' + email.value);
        event.preventDefault();
        return false;
    }else{
        email.style.border = "2px solid green";
        // console.log('True email with : ' + email.value);
        // alert("True email")
        return true;
    }
}

// Validate password field
function validatePassword(event){
    let password = document.getElementById('password');
    // let pwd = /^([a-z]|[a-z0-9]|[a-zA-Z]|[a-zA-Z0-9]|[A-Z0-9]|[~!@#$%^&*()_+}|"?><\[\]])+$/;
    let pwd = /[A-Za-z0-9~`!#$%^&*()_+-]+/;
    if(!pwd.test(password.value)){
        // Get error element and inject error
        let passwordError = document.getElementById("passwordError");
        passwordError.innerHTML = "Password field cannot left blank";
        password.style.border = "2px solid red";
        // console.log('False password with: ' + password.value);
        event.preventDefault();
        return false;
    }else{
        password.style.border = "2px solid green";
        // console.log('True password with : ' + password.value);
        // alert("True password")
        return true;
    }
}

// Validate Signin
function validateSignin(event) {
    // check email field
    validateEmail(event);

    // check password field
    validatePassword(event);
}
