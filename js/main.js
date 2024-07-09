// Shifa Mhaskar - 60099580

var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.querySelectorAll("#mySlides");
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    myIndex++;
    if (myIndex > x.length) { myIndex = 1 }
    x[myIndex - 1].style.display = "block";
    setTimeout(carousel, 3000);
}

var counter = 0;
secondSlides();

function secondSlides() {
    var c;
    var y = document.querySelectorAll("#second");
    for (c = 0; c < y.length; c++) {
        y[c].style.display = "none";
    }
    counter++;
    if (counter > y.length) { counter = 1 }
    y[counter - 1].style.display = "block";
    setTimeout(secondSlides, 3000);
}

function validateForm() {
    let validName = validateName()
    let validUser = validateUserName() 
    let validPassword = validatePassword()
    let validCPassword = validateCPassword()
    let validPreferred = validatePreferred()
    let validPhone = validatePhone()
    let validBuilding = validateBuilding()
    let validStreet = ValidateStreet()
    let validCity = validateCity()
    let validEmail = validateEmail()

    if (validName && validUser && validPassword && validCPassword && validPreferred && validPhone 
        && validBuilding && validStreet && validCity && validEmail) {
        return true;
    } else {
        return false;
    }
}

function validateName() {
    let name = document.getElementById('fullname')
    if (name.value == "") {
        name.style.borderColor = "red"
        name.placeholder = "This field cannot be empty"
        return false
    } 
    else {
        name.style.borderColor = "#ccc"
        name.placeholder = ""
        return true
    }
}

function validateUserName() {
    let name = document.getElementById('username')
    if (name.value == "") {
        name.style.borderColor = "red"
        name.placeholder = "This field cannot be empty"
        return false
    } 
    else {
        name.style.borderColor = "#ccc"
        name.placeholder = ""
        return true
    }
}

function validatePassword() {
    let password = document.getElementById('password')
    let passError = document.getElementById('passError')
    if (password.value.length < 4) {
        password.style.borderColor = "red"
        passError.innerHTML = "*The password should be 4 characters long"
        passError.style.color = "red"
        return false
    } 
    else {
        password.style.borderColor = "#ccc"
        passError.innerHTML = ""
        passError.style.color = "rgb(61, 61, 61)"
        return true
    }
}

function validateCPassword() {
    let password = document.getElementById('password')
    let cpassword = document.getElementById('cpassword')
    let cpassError = document.getElementById('cpassError')
    if (password.value != cpassword.value || cpassword.value == "") {
        cpassword.style.borderColor = "red"
        cpassError.innerHTML = "*The passwords do not match"
        cpassError.style.color = "red"
        return false
    } 
    else {
        cpassword.style.borderColor = "#ccc"
        cpassError.innerHTML = ""
        cpassError.style.color = "rgb(61, 61, 61)"
        return true
    }
}

function validatePreferred() {
    let call = document.getElementById('call')
    let email = document.getElementById('email1')
    let any = document.getElementById('any')
    let radioError = document.getElementById('radioError')
    if (call.checked || email1.checked || any.checked) {
        radioError.style.display = "none"
        radioError.style.color = "black"
        return true;
    } 
    else {
        radioError.innerHTML = "*Please select a method";
        radioError.style.color = "red"
        radioError.style.display = "inline"
        return false;
    }
}

function validatePhone() {
    let phone = document.getElementById('phone')
    let phoneError = document.getElementById('phoneError')
    if (phone.value.length < 8 || isNaN(phone.value)) {
        phoneError.innerHTML = "*Please enter a number of 8 digits"
        phoneError.style.color = "red"
        phone.style.borderColor = "red"
        return false
    } 
    else {
        phoneError.style.display = "none"
        phone.style.borderColor = "#ccc"
        return true
    }
}

function validateBuilding() {
    let building = document.getElementById('building')
    let buildError = document.getElementById('buildError')
    if (building.value < 1 || building.value > 9999 || isNaN(building.value)) {
        building.style.borderColor = "red"
        buildError.innerHTML = "*Please enter a building number between 1 and 9999"
        buildError.style.color = "red"
        return false
    } 
    else {
        building.style.borderColor = "#ccc"
        buildError.innerHTML = ""
        return true
    }
}

function ValidateStreet() {
    let name = document.getElementById('street')
    if (name.value == "") {
        name.style.borderColor = "red"
        name.placeholder = "This field cannot be empty"
        return false
    } 
    else {
        name.style.borderColor = "#ccc"
        name.placeholder = ""
        return true
    }
}


function validateCity() {
    let city = document.getElementById('city')
    let cityError = document.getElementById('cityError')
    if (city.value == "") {
        city.style.borderColor = "red"
        cityError.innerHTML = "*Please select a city"
        cityError.style.color = "red"
        return false
    } 
    else {
        city.style.borderColor = "#ccc"
        cityError.innerHTML = ""
        return true
    }
}

function validateEmail() {
    let email = document.getElementById('email')
    let emailError = document.getElementById('emailError')
    let emailArr = email.value.split('')
    let copy = [...emailArr]
    let index = emailArr.indexOf('@')
    let emailValid = emailArr.splice(index + 2)
    if (!(copy.includes('@')) && !(copy.includes('.com')) || emailValid.length < 6) {
        email.style.borderColor = "red"
        emailError.innerHTML = "Please enter a valid email"
        emailError.style.color = "red"
        return false
    } 
    else {
        email.style.borderColor = "#ccc"
        emailError.innerHTML = ""
        return true
    }
}