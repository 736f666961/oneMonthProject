// #### Validate Edit Profile ####
let edit = document.getElementById('editProfile');

edit.onsubmit = validateEditProfile;

// Validate Firstname field
function validateFirstname(event){
    let firstname = document.getElementById('firstname');
    var regName = /^[a-z|A-Z]+$/;

    // Check if firstname is empty
    if (firstname.value.length == 0){
        // Get element to inject the error
        var firstnameError = document.getElementById("firstnameError");
        firstnameError.innerHTML = "Firstname cannot be empty";
        firstname.style.border = "2px solid red";
        event.preventDefault();
        return false;
    }

    // Check for RegExp
    if(!regName.test(firstname.value)){
        // firstname.style.border = "2px solid red";
        // console.log('False firstname with: ' + firstname.value);
        
        // Get element to inject the error
        var firstnameError = document.getElementById("firstnameError");
        firstnameError.innerHTML = "Firstname field must only contain characters";
        
        event.preventDefault();
        return false;
    }else{
        // firstname.style.border = "2px solid green";
        // console.log('True firstname with: ' + firstname.value);
        return true;
    }
}

// Validate Lastaname field
function validateLastname(event){
    let lastname = document.getElementById('lastname');
    var regName = /^[a-z|A-Z]+$/;
    
    // Check if firstname is empty
    if (lastname.value.length == 0){
        // Get element to inject the error
        var lastnameError = document.getElementById("lastnameError");
        lastnameError.innerHTML = "Lastname cannot be empty";
        lastname.style.border = "2px solid red";
        event.preventDefault();
        return false;
    }

    // Check for RegExp
    if(!regName.test(lastname.value)){
        // lastname.style.border = "2px solid red";
        // console.log('False lastname with: ' + lastname.value);

        // Get element to inject the error
        var lastnameError = document.getElementById("lastnameError");
        lastnameError.innerHTML = "Lastname field must only contain characters";

        event.preventDefault();
        return false;
    }else{
        // lastname.style.border = "2px solid green";
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
    
    // Check if firstname is empty
    if (username.value.length == 0){
        // Get element to inject the error
        var usernameError = document.getElementById("usernameError");
        usernameError.innerHTML = "Username cannot be empty";
        username.style.border = "2px solid red";

        event.preventDefault();
        return false;
    }

    // Check for RegExp
    if(!usr.test(username.value)){
        // username.style.border = "2px solid red";
        // console.log('False username with: ' + username.value);

        // Get element to inject the error
        var usernameError = document.getElementById("usernameError");
        usernameError.innerHTML = "Username field cannot contain symbols";

        event.preventDefault();
        return false;
    }else{
        // username.style.border = "2px solid green";
        // console.log('True username with : ' + username.value);
        // alert("True username")
    }
   
}

// Validate email field
function validateEmail(event){
    let email = document.getElementById('email');
    let eml = /^[a-zA-Z0-9._-]+@gmail\.[a-zA-Z]{2,4}$/;
    
    // Check if firstname is empty
    if (email.value.length == 0){
        // Get element to inject the error
        var emailError = document.getElementById("emailError");
        email.style.border = "2px solid red";

        emailError.innerHTML = "Email cannot be empty";
        event.preventDefault();
        return false;
    }

    // Check for RegExp
    if(!eml.test(email.value)){
        // email.style.border = "2px solid red";
        // console.log('False email with: ' + email.value);

        // Get element to inject the error
        var emailError = document.getElementById("emailError");
        emailError.innerHTML = "You must use a gmail account ex: example@gmail.com";

        event.preventDefault();
        return false;
    }else{
        // email.style.border = "2px solid green";
        // console.log('True email with : ' + email.value);
        // alert("True email")
        return true;
    }
}

// Validate password field
function validatePassword(event){
    let password = document.getElementById('password');
    // let pwd = /^([a-z]|[a-z0-9]|[a-zA-Z]|[a-zA-Z0-9]|[A-Z0-9]|[~!@#$%^&*()_+}|"?><\[\]])+$/;

    // Check if firstname is empty
    if (password.value.length == 0){
        // Get element to inject the error
        var passwordError = document.getElementById("passwordError");
        passwordError.innerHTML = "Password cannot be empty";
        password.style.border = "2px solid red";

        event.preventDefault();
        return false;
    }

    // Check for RegExp
    let pwd = /[A-Za-z0-9~`!#$%^&*()_+-]+/;
    if(!pwd.test(password.value)){
        // password.style.border = "2px solid red";
        // console.log('False password with: ' + password.value);

        // Get element to inject the error
        var passwordError = document.getElementById("passwordError");
        passwordError.innerHTML = "Password field cannot be empty"; 
        
        event.preventDefault();
        return false;
    }else{
        // password.style.border = "2px solid green";
        // console.log('True password with : ' + password.value);
        // alert("True password")
        return true;
    }
}

// Validate password field
function validatePhoneNumber(event){
    let phone = document.getElementById('phone');
    let number = /^[0-9]+$/;

    // Check if firstname is empty
    if (phone.value.length == 0){
        // Get element to inject the error
        var phoneNumberError = document.getElementById("phoneNumberError");
        phoneNumberError.innerHTML = "Phone cannot be empty";
        phone.style.border = "2px solid red";
        
        event.preventDefault();
        return false;
    }

    // Check for RegExp
    if(!number.test(phone.value)){
        // phone.style.border = "2px solid red";
        // console.log('False phone with: ' + phone.value);

        // Get element to inject the error
        var phoneNumberError = document.getElementById("phoneNumberError");
        phoneNumberError.innerHTML = "Phone field must only contain numbers"; 

        event.preventDefault();
        return false;
    }else{
        // phone.style.border = "2px solid green";
        // console.log('True phone with : ' + username.value);
        // alert("True phone")
        return true;
    }
}

// Validate Edit Profile 
function validateEditProfile(event) {
    validateFirstname(event);   // Check firstname field
    validateLastname(event);    // check lastname field
    validateUsername(event);    // check username field
    validateEmail(event);       // check email field
    validatePassword(event);    // check password field
    validatePhoneNumber(event); // check phone field
}

