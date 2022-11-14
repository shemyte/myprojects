const usernameEl = document.querySelector('#username');
const emailEl = document.querySelector('#email');
const phoneEl = document.querySelector('#phone');
const registrationEl = document.querySelector('#regno');
const addressEl = document.querySelector('#address');
const passwordEl = document.querySelector('#password');
const password2El = document.querySelector('#password2');

const form = document.querySelector('#form');
 

form.addEventListener('submit', function (e) {
        // validate forms
        let isUsernameValid = checkUsername(),
            isEmailValid = checkEmail(),
            isPasswordValid = checkPassword(),
            isPhoneValid = checkPhone(),
            isRegistrationValid = checkRegistration(),
            isAddressValid = checkAddress(),
            isConfirmPasswordValid = checkConfirmPassword();
    
        let isFormValid = isUsernameValid &&
            isEmailValid &&
            isPasswordValid &&
            isPhoneValid &&
            isRegistrationValid &&
            isAddressValid &&
            isConfirmPasswordValid;
    
        // submit to the server if the form is valid
        if (!isFormValid) {
                e.preventDefault();
        }
    });

// the isrequired function returns true if the input argument is empty
const isRequired = value => value === '' ? false : true;

// the isBetween() returns false if the length argument is not between the min and max argument
const isBetween = (length, min, max) => length < min || length > max ? false : true;

// to check if email is Valid
const isEmailValid = (email) => {
        const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(String(email).toLowerCase());
};

// to check if phone is valid
const isPhoneValid = (phone) => {
    const re = /(\+\d{1,3}\s?)?((\(\d{3}\)\s?)|(\d{3})(\s|-?))(\d{3}(\s|-?))(\d{4})(\s?(([E|e]xt[:|.|]?)|x|X)(\s?\d+))?/g;
    return re.test(phone);
};

// check if password is strong
const isPasswordSecure = (password) => {
        const re = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
        return re.test(password);
};

// show the error message
const showError = (input, message) => {
        const formField = input.parentElement;
        formField.classList.remove('success');
        formField.classList.add('error');
    
        // show the error message
        const error = formField.querySelector('small');
        error.textContent = message;
};

// show success message
const showSuccess = (input) => {
        const formField = input.parentElement;
    
        // remove the error class
        formField.classList.remove('error');
        formField.classList.add('success');
    
        // hide the error message
        const error = formField.querySelector('small');
        error.textContent = '';
}

const checkUsername = () => {

        let valid = false;
        const min = 3,
            max = 25;
        const username = usernameEl.value.trim();
        if (!isRequired(username)) {
            showError(usernameEl, 'Username cannot be blank.');
        } else if (!isBetween(username.length, min, max)) {
            showError(usernameEl, `Username must be between ${min} and ${max} characters.`)
        } else {
            showSuccess(usernameEl);
            valid = true;
        }
        return valid;
    }

    const checkEmail = () => {
        let valid = false;
        const email = emailEl.value.trim();
        if (!isRequired(email)) {
            showError(emailEl, 'Email cannot be blank.');
        } else if (!isEmailValid(email)) {
            showError(emailEl, 'Email is not valid.');
        } else {
            showSuccess(emailEl);
            valid = true;
        }
        return valid;
    }

    // validating phone number
    const checkPhone = () => {
        let valid = false;
        const phone = phoneEl.value.trim();
        if(!isRequired(phone)) {
            showError(phoneEl, 'Phone cannot be blank.');
        }else if(!isPhoneValid(phone)){
            showError(phoneEl, 'Phone is not valid');
        }else {
            showSuccess(phoneEl);
            valid = true;
        }
        return valid;
    }

    // validate registration number - work in progress
    const checkRegistration = () => {
        let valid = false;
        const registration = registrationEl.value.trim();
        if(!isRequired(registration)) {
            showError(registrationEl, 'Registration cannot be blank');
        }else {
            showSuccess(registrationEl);
            valid = true;
        }
        return valid;
    }

    // validate address - work in progress
    const checkAddress = () => {
        let valid = false;
        const address = addressEl.value.trim();
        if(!isRequired(address)) {
            showError(addressEl, 'Address cannot be blank');
        }else {
            showSuccess(addressEl);
            valid = true;
        }
        return valid;
    }

//     validate the password
const checkPassword = () => {
        let valid = false;
        const password = passwordEl.value.trim();
        if (!isRequired(password)) {
            showError(passwordEl, 'Password cannot be blank.');
        } else if (!isPasswordSecure(password)) {
            showError(passwordEl, 'Password must has at least 8 characters that include at least 1 lowercase character, 1 uppercase characters, 1 number, and 1 special character in (!@#$%^&*)');
        } else {
            showSuccess(passwordEl);
            valid = true;
        }
        return valid;
    };

//     validate the confirm password
const checkConfirmPassword = () => {
        let valid = false;
        // check confirm password
        const confirmPassword = password2El.value.trim();
        const password = passwordEl.value.trim();
    
        if (!isRequired(confirmPassword)) {
            showError(password2El, 'Please enter the password again');
        } else if (password !== confirmPassword) {
            showError(password2El, 'Confirm password does not match');
        } else {
            showSuccess(password2El);
            valid = true;
        }
    
        return valid;
    };