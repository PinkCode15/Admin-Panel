function createAccount(){
    document.getElementById("create-account").style.display = "block";
    document.getElementById("contain").style.opacity = "0.5";
    document.getElementById("contain").style.filter = "blur(3px)";
}
function closeAccount(){
    document.getElementById("create-account").style.display = "none";
    document.getElementById("contain").style.opacity = "";
    document.getElementById("contain").style.filter = "";
    document.getElementById("details").style.opacity = "";
    document.getElementById("details").style.filter = "";
}