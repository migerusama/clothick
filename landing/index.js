addEventListener("onblur", checkValues);



function checkValues(){
//Regex 
let twoWordsNameRegex = /^[a-zA-Z]+\s[a-zA-Z]+$/i; //2 Words Name
let oneWordsNameRegex = /^[a-zA-Z]+$/i; // 1 Word Name
let emailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/; //e-mail

//Check Name
var nameId = document.getElementById("name-id").value.trim();
document.getElementById("name-id").value = nameId;

if(twoWordsNameRegex.test(nameId)==false && oneWordsNameRegex.test(nameId)==false){
   
}

//Check Last Name
var lastNameId = document.getElementById("last-name-id").value.trim();
document.getElementById("last-name-id").value = lastNameId;

if(twoWordsNameRegex.test(lastNameId)==false && oneWordsNameRegex.test(lastNameId)==false){
    //apellido incorrecto
}
//Check e-mail
var emailId = document.getElementById("email-id").value.trim();
document.getElementById("email-id").value = emailId;

if(emailRegex.test(emailId)==false){
    alert("PTUO");
}

//check password
    var simbolos = false;
    var digitos = false;   
    var password = document.getElementById("pass-id").value.trim();



}
