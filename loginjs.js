const container = document.getElementById('container');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');

function checkPassword() {
   
    var password = document.getElementById('password').value;
    var confirmPassword = document.getElementById('confirmPassword').value;

   
    if (password === confirmPassword) {
        document.getElementById('resultMessage').innerHTML = "Passwords match!";
        document.getElementById('signupButton').disabled = false; 
    } else if (confirmPassword === "") {
        document.getElementById('resultMessage').innerHTML = "";
        document.getElementById('signupButton').disabled = true; 
    } else {
        document.getElementById('resultMessage').innerHTML = "Passwords do not match. Please make sure the passwords match.";
        document.getElementById('signupButton').disabled = true; 
    }
}
function signup(){

    var firstName = document.getElementById('firstName').value;
    var surname = document.getElementById('surName').value;
    var middleName = document.getElementById('middleName').value;
    var course = document.getElementById('course').value;
    var yearLevel = document.getElementById('year').value;
    var semester = document.getElementById('sem').value;
    var section = document.getElementById('sec').value;
    var studentNumber = parseInt(document.getElementById('studentNumber').value);
    var email = document.getElementById('email').value;
    var date = document.getElementById('date').value;
    var address = document.getElementById('address').value;
    var username = document.getElementById('username').value;
    var pass = document.getElementById('password').value;
    var checkPassword = document.getElementById('checkPassword').value;


    if (firstName == "" && surname == "" && middleName == "" && course == "" && yearLevel == "" && semester == "" && 
    section == "" && studentNumber == "" && email == "" && date == "" && address == "" && username == "" && pass == "" && checkPassword == ""){
            alert("Please complete all the necessary details")
    }
    else{
        
    }
}















registerBtn.addEventListener('click', () => {
    container.classList.add("active");
});

loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
});

