var nameError =document.getElementById('name-error');
var phoneError =document.getElementById('phone-error');
var emailError =document.getElementById('email-error');
var passwordError =document.getElementById('pass-error');
var passwordcheck =document.getElementById('pass-check');
var addError =document.getElementById('add-error');
var submitError =document.getElementById('submit-error');


function validateName(){
    var name = document.getElementById('contact-name').value;

    if(!name.match(/[A-Za-z]/)){
        nameError.innerHTML= '*write full name';
        return false;
    }
    nameError.innerHTML=' ';
    return true;

}

function validatePhone(){
    var phone = document.getElementById('contact-phone').value; 
    if (phone.length== 0){
        phoneError.innerHTML = '*number is required';
        return false;
    }
    if (phone.length !== 10){
        phoneError.innerHTML = '*invalid number';
        return false;
    }
    phoneError.innerHTML=' ';
    return true;
}

function validateAdd(){
    var address = document.getElementById('contact-add').value; 

    if(address.length==0 || address.match(/^\s{1}$/) || address.match(/^\s{3}$/) || address.match(/^\s{2}$/) || address.match(/^\s{4}$/) || address.match(/^\s{5}$/) || address.match(/^\s{11}$/) || address.match(/^\s{12}$/) || address.match(/^\s{13}$/) || address.match(/^\s{6}$/) || address.match(/^\s{7}$/) || address.match(/^\s{8}$/) || address.match(/^\s{9}$/) || address.match(/^\s{10}$/)){
        addError.innerHTML = '*address is required';
        return false;
    }
    addError.innerHTML=' ';
    return true;
}

function validateEmail(){
    var email = document.getElementById('contact-email').value; 

    if(!email.match(/^[A-Za-z\._\-[0-9]*[@][A-Za-z]*[\.][a-z]{2,4}$/))
    {
     emailError.innerHTML='Enter valid Email.';
     return false;
    }
    emailError.innerHTML=' ';
    return true;
}

function validatePass(){
    var pass = document.getElementById('contact-pass').value;

    if(pass.length==0){
        passwordError.innerHTML='*Must contain 6 character/ uppercase letter/ lowercase letter/ special character/ number';
        return false;
    }
    if(!pass.match(/[A-Z]/)){
        passwordError.innerHTML='*Must contain uppercase letter';
        return false;
    }
    else{
        passwordError.innerHTML=' ';
    }
    if(!pass.match(/[a-z]/)){
        passwordError.innerHTML='*Must contain lowercase letter';
        return false;
    }
    else{
        passwordError.innerHTML=' ';
    }
    if(!pass.match(/[^A-Za-z0-9]/)){
        passwordError.innerHTML='*Must contain special character';
        return false;
    }
    else{
        passwordError.innerHTML=' ';
    }
    if(!pass.match(/[0-9]/)){
        passwordError.innerHTML='*Must contain any number';
        return false;
    }
    else{
        passwordError.innerHTML=' ';
    }

    if(pass.length<6){
        passwordError.innerHTML='*Must contain at least 6 character';
        return false;
    }
    passwordError.innerHTML=' ';
    return true;
}

function validateconPass(){
    var pass = document.getElementById('contact-pass').value;
    var conpass = document.getElementById('con-pass').value;
    conlength= conpass.length;
    if(!conpass.match(pass)){
        passwordcheck.innerHTML='*password is not matched.';
        return false;
    }
    if(conpass.length>pass.length){
        passwordcheck.innerHTML='*password is not matched.';
        return false;
    }
    passwordcheck.innerHTML=' ';
    return true;
}

