function FirstLetterToUpperCase(string) {
    return string.charAt(0).toUpperCase() + string.slice(1).toLowerCase();
}
  
function GenerateUser() {
    var firstName = document.getElementById("FirstName").value;
    var middleName = document.getElementById("MiddleName").value;
    var lastName = document.getElementById("LastName").value;
    var LFirstName = FirstLetterToUpperCase(firstName);
    var LMiddleName= FirstLetterToUpperCase(middleName);
    var LLastName= FirstLetterToUpperCase(lastName);
    var random = Math.floor(Math.random() * 100) + 1
    var Username = LFirstName + LMiddleName + "." +LLastName + random;
    document.getElementById("user").value=Username;
}
function GenerateEmail() {
    var Username=document.getElementById("user").value;
    document.getElementById("Email").value=Username+"@gmail.com";
}
function verify(){
    let password = document.getElementById("Password").value;
    if (password.length<8){
        document.getElementById("ValidPass").innerHTML="Too short";
        document.getElementById("submit").disabled=true;
    } 
    else if(!/[A-Z]/.test(password)){
        document.getElementById("ValidPass").innerHTML="Must contain capital letters";
        document.getElementById("submit").disabled=true;
    }
    else if(!/[a-z]/.test(password)){
        document.getElementById("ValidPass").innerHTML="Must contain small letters";
        document.getElementById("submit").disabled=true;
    }
    else if (!/[0-9]/.test(password)){
        document.getElementById("ValidPass").innerHTML="Must contain numbers";
        document.getElementById("submit").disabled=true;
    }
    else if (!/[^[A-Z,a-z]0-9/.test(password) && /[a-z,A-Z]0-9/.test(password)){
        document.getElementById("ValidPass").innerHTML="Weak password";
        document.getElementById("submit").disabled=true;
    }
    else {
     document.getElementById("ValidPass").innerHTML="Good to go";
     document.getElementById("submit").disabled = false;
    }
}