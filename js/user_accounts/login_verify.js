function verify(form){
    
    if(document.getElementById("username").value === ""){
        alert("You must enter a username");
        return false;
    }else if(document.getElementById("password").value === ""){
        alert("You must enter a password");
        return false;
    }

    return true;
}