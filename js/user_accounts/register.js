function toggleTerms(){

    let button = document.getElementById("createbutton");

    if(button.disabled){
        button.disabled = false;
    }else{
        button.disabled = true;
    }

}

function verify(){
    return false;
}