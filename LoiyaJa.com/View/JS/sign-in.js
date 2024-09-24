function isValid(form){
    
    let email = form.email.value;
    let password = form.password.value;
    let flag = true;
    
    document.getElementById("emailError").innerHTML = "";
    document.getElementById("passwordError").innerHTML = "";

    if(!email) {

        document.getElementById("emailError").innerHTML = "Please enter your email<br>";
        flag = false;

    }
    if(!password) {

        document.getElementById("passwordError").innerHTML = "Please enter your password<br>";
        flag = false;

    }

    return flag;


}