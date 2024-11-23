function verify(){
    let FirstPassword = document.getElementById("password").value;
    let SecondPassword = document.getElementById("password2").value;
    if(FirstPassword===SecondPassword){
    if (FirstPassword.length<8){
        document.getElementById("ValidPass").innerHTML="Too short";
        document.getElementById("submit").disabled=true;
    } 
    else if(!/[A-Z]/.test(FirstPassword)){
        document.getElementById("ValidPass").innerHTML="Must contain capital letters";
        document.getElementById("submit").disabled=true;
    }
    else if(!/[a-z]/.test(FirstPassword)){
        document.getElementById("ValidPass").innerHTML="Must contain small letters";
        document.getElementById("submit").disabled=true;
    }
    else if (!/[0-9]/.test(FirstPassword)){
        document.getElementById("ValidPass").innerHTML="Must contain numbers";
        document.getElementById("submit").disabled=true;
    }
    else if (!/[^[A-Z,a-z]0-9/.test(FirstPassword) && /[a-z,A-Z]0-9/.test(FirstPassword)){
        document.getElementById("ValidPass").innerHTML="Weak password";
        document.getElementById("submit").disabled=true;
    }
    if (SecondPassword.length<8){
        document.getElementById("ValidPass").innerHTML="Too short";
        document.getElementById("submit").disabled=true;
    } 
    else if(!/[A-Z]/.test(SecondPassword)){
        document.getElementById("ValidPass").innerHTML="Must contain capital letters";
        document.getElementById("submit").disabled=true;
    }
    else if(!/[a-z]/.test(SecondPassword)){
        document.getElementById("ValidPass").innerHTML="Must contain small letters";
        document.getElementById("submit").disabled=true;
    }
    else if (!/[0-9]/.test(SecondPassword)){
        document.getElementById("ValidPass").innerHTML="Must contain numbers";
        document.getElementById("submit").disabled=true;
    }
    else if (!/[^[A-Z,a-z]0-9/.test(SecondPassword) && /[a-z,A-Z]0-9/.test(SecondPassword)){
        document.getElementById("ValidPass").innerHTML="Weak password";
        document.getElementById("submit").disabled=true;
    }
    else {
     document.getElementById("ValidPass").innerHTML="Good to go";
     document.getElementById("submit").disabled = false;
    }
    
}
else {
    document.getElementById("ValidPass").innerHTML="Passwords don't match";
    document.getElementById("submit").disabled=true;
}
}