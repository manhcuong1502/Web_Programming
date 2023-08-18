
function validateForm(){
    var firstName = document.forms["registrationForm"]["firstName"].value;
    var lastName = document.forms["registrationForm"]["lastName"].value;
    var email = document.forms["registrationForm"]["email"].value;
    var password = document.forms["registrationForm"]["password"].value;
    var birthdayDay = document.forms["registrationForm"]["birthdayDay"].value;
    var birthdayMonth = document.forms["registrationForm"]["birthdayMonth"].value;
    var birthdayYear = document.forms["registrationForm"]["birthdayYear"].value;
    var gender = document.forms["registrationForm"]["gender"].value;
    var country = document.forms["registrationForm"]["country"].value;
    var about = document.forms["registrationForm"]["about"].value;
    
    if (firstName.length < 2 || firstName.length > 30) {
        alert("First name must be between 2 and 30 characters.");
        return false;
    }
    if (lastName.length < 2 || lastName.length > 30) {
        alert("Last name must be between 2 and 30 characters.");
        return false;
    }
    if (!validateEmail(email)) {
        alert("Invalid email format.");
        return false;
    }
    if (password.length < 2 || password.length > 30) {
        alert("Password must be between 2 and 30 characters.");
        return false;
    }
    if (birthdayDay == "" || birthdayMonth == "" || birthdayYear == "") {
        alert("Please select a valid date of birth.");
        return false;
    }
    if (about.length > 10000) {
        alert("The 'About' field can have at most 10000 characters.");
        return false;
    }
    
    alert("Complete!");
    return true;
}

function validateEmail(email) {
    var re = /\S+@\S+\.\S+/;
    return re.test(email);
}

