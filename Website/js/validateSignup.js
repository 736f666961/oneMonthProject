// #### Validate Signup ####
let signup = document.getElementById('signup');

signup.onsubmit = validateSignup;

// Validate Firstname field
function validateFirstname(event){
    let firstname = document.getElementById('firstname');
    var regName = /^[a-z|A-Z]+$/;

    if(!regName.test(firstname.value)){
        // Get element Error
        let firstnameError = document.getElementById("firstnameError");
        firstnameError.innerHTML = "Firstname cannot contain numbers";

        firstname.style.border = "2px solid red";
        // console.log('False firstname with: ' + firstname.value);
        event.preventDefault();
        return false;
    }else{
        firstname.style.border = "2px solid green";
        // console.log('True firstname with: ' + firstname.value);
        return true;
    }
}

// Validate Lastaname field
function validateLastname(event){
    let lastname = document.getElementById('lastname');
    var regName = /^[a-z|A-Z]+$/;

    if(!regName.test(lastname.value)){
        // Get element Error
        let lastnameError = document.getElementById("lastnameError");
        lastnameError.innerHTML = "Lastname cannot contain numbers";
        
        lastname.style.border = "2px solid red";
        // console.log('False lastname with: ' + lastname.value);
        event.preventDefault();
        return false;
    }else{
        lastname.style.border = "2px solid green";
        // console.log('True Lastname with : ' + lastname.value);
        // alert("True lastanem")
        return true;
    }
}

// Validate username field
function validateUsername(event){
    let username = document.getElementById('username');
    // console.log(username);
    let usr = /^([a-z]|[a-z0-9]|[a-zA-Z]|[a-zA-Z0-9]|[A-Z0-9])+$/;
    
    if(!usr.test(username.value)){
        // Get element Error
        let usernameError = document.getElementById("usernameError");
        usernameError.innerHTML = "Username cannot contain symbols";

        username.style.border = "2px solid red";
        // console.log('False username with: ' + username.value);
        event.preventDefault();
        return false;
    }else{
        username.style.border = "2px solid green";
        // console.log('True username with : ' + username.value);
        // alert("True username")
        return true;
    }
   
}

// Validate email field
function validateEmail(event){
    let email = document.getElementById('email');
    let eml = /^[a-zA-Z0-9._-]+@gmail\.[a-zA-Z]{2,4}$/;

    if(!eml.test(email.value)){
        // Get element Error
        let emailError = document.getElementById("emailError");
        emailError.innerHTML = "Email must be contain gmail extension";

        email.style.border = "2px solid red";
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
        // Get element Error
        let passwordError = document.getElementById("passwordError");
        passwordError.innerHTML = "Try another password";

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

// Validate password field
function validatePhoneNumber(event){
    let phone = document.getElementById('phone');
    let number = /^[0-9]+$/;

    if(!number.test(phone.value)){
        // Get element Error
        let phoneError = document.getElementById("phoneError");
        phoneError.innerHTML = "Phone number must contain numbers";

        phone.style.border = "2px solid red";
        // console.log('False phone with: ' + phone.value);
        event.preventDefault();
        return false;
    }else{
        phone.style.border = "2px solid green";
        // console.log('True phone with : ' + username.value);
        // alert("True phone")
        return true;
    }
}

// Validate Signup 
function validateSignup(event) {
    // Check firstname field
    validateFirstname(event);

    // check lastname field
    validateLastname(event);

    // check username field
    validateUsername(event);

    // check email field
    validateEmail(event);

    // check password field
    validatePassword(event);

    // check phone field
    validatePhoneNumber(event);
}

