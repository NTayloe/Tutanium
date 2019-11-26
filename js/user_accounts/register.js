function toggleTerms(){

    let button = document.getElementById("createbutton");

    if(button.disabled){
        button.disabled = false;
    }else{
        button.disabled = true;
    }

}

function verify(){

    if(document.getElementById("firstname").value === ""){
        alert("missing firstname");
        return false;
    }else if(document.getElementById("lastname").value === ""){
        alert("missing lastname");
        return false;
    }else if(document.getElementById("birthdate").value === ""){
        alert("missing birthdate");
        return false;
    }else if(document.getElementById("male").checked != true && document.getElementById("female").checked != true){
        alert("missing gender");
        return false;
    }else if(document.getElementById("email").value === ""){
        alert("missing email");
        return false;
    }else if(document.getElementById("username").value === ""){
        alert("missing username");
        return false;
    }else if(document.getElementById("pass1").value === ""){
        alert("missing password");
        return false;
    }else if(document.getElementById("pass2").value === ""){
        alert("password must be confirmed");
        return false;
    }else if(document.getElementById("pass1").value != document.getElementById("pass2").value){
        alert("passwords must match");
        return false;
    }

    return true;
}