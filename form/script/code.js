"use strict";

/*
 * Mensajes de error
 */
var formErrors = {
    mandatoryNameSur: 'El nombre es obligatorio',
    mandatoryEmail: 'El email es obligatorio',
    mandatoryPassword: 'La contraseña es obligatoria',
    mandatoryPasswordConfirm: 'Repite la contraseña',
    passwordTooShort: 'La contraseña debe tener al menos ocho caracteres',
    passwordLowerCase: 'La contraseña debe tener al menos una letra minúscula',
    passwordUpperCase: 'La contraseña debe tener al menos una letra mayúscula',
    passwordNumber: 'La contraseña debe tener al menos un número',
    passwordSymbol: 'La contraseña debe tener al menos un símbolo',
    passwordsNotMatch: 'Las contraseñas no coinciden',
    invalidCreditCard: 'Formato inválido de tarjeta de crédito'
}

/*
 * Error, lista de errores y envío correcto
 */
var errorsBlock = document.getElementById('errorsBlock');
var errorsUl = document.getElementById('errorsUl');
var sentBlock = document.getElementById('sentBlock');



/*
 * Campos del formulario
 */
var nameSur = document.getElementById('nameSur');
var email = document.getElementById('email');
var password = document.getElementById('password');
var passwordConfirm = document.getElementById('passwordConfirm');
var sex = document.getElementById('sex');
var birth = document.getElementById('birth');
var address = document.getElementById('address');
var country = document.getElementById('country');
var creditCard = document.getElementById('creditCard');

var creditCardBlocked = document.getElementById('creditCardBlocked');



/*
 * Valida el formulario
 */
function validateForm() {
    errorsUl.innerHTML = '';
    
    var detectedErrors = [];
    
    
    
    /*
     * mandatoryNameSur
     */
    if (nameSur.value == '') {
        detectedErrors.push('mandatoryNameSur');
    }
    
    
    
    /*
     * mandatoryEmail
     */
    if (email.value == '') {
        detectedErrors.push('mandatoryEmail');
    }
    
    
    
    /*
     * mandatoryPassword
     */
    if (password.value == '') {
        detectedErrors.push('mandatoryPassword');
    } else {
        /*
        * passwordTooShort
        */
        if (password.value.length < 8) {
            detectedErrors.push('passwordTooShort');
        }
        
        /*
        * passwordLowerCase
        * && passwordUpperCase
        * && passwordNumber
        * && passwordSymbol
        */
        var hasLowerCase = false;
        var hasUpperCase = false;
        var hasNumber = false;
        var hasSymbol = false;
        
        for (let i = 0; i < password.value.length; i++) {
            var thisChar = password.value[i];
            
            // LowerCase
            if (thisChar == thisChar.toLowerCase()) {
                hasLowerCase = true;
            }
            
            // UpperCase
            if (thisChar == thisChar.toUpperCase()) {
                hasUpperCase = true;
            }
            
            // Number
            if (thisChar >= 0 || thisChar <= 9) {
                hasNumber = true;
            }
            
            // Symbol
            var format = /^[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]*$/;
            
            if (thisChar.match(format)) {
                hasSymbol = true;
            }
        }
        
        if (!hasLowerCase) {
            detectedErrors.push('passwordLowerCase');
        }
        
        if (!hasUpperCase) {
            detectedErrors.push('passwordUpperCase');
        }
        
        if (!hasNumber) {
            detectedErrors.push('passwordNumber');
        }
        
        if (!hasSymbol) {
            detectedErrors.push('passwordSymbol');
        }
    }
    
    
    
    /*
     * mandatoryPasswordConfirm
     */
    if (passwordConfirm.value == '') {
        detectedErrors.push('mandatoryPasswordConfirm');
    } else {
        /*
         * passwordsNotMatch
         */
        if (password.value != passwordConfirm.value) {
            detectedErrors.push('passwordsNotMatch');
        }
    }
    
    
    
    /*
     * invalidCreditCard
     */
    var creditNumber = creditCard.value;
    
    // Solo se comprueba si el campo se ha rellenado
    if (creditNumber != '') {
        var isInvalidCreditCard = false;
        
        if (creditNumber.length != 19) {
            isInvalidCreditCard = true;
        }
        
        if (creditNumber[4] != '-' || creditNumber[9] != '-' || creditNumber[14] != '-') {
            isInvalidCreditCard = true;
        }
        
        for (let i = 0; i < creditNumber.length; i++) {
            var thisChar = creditNumber[i];
            
            if (i != 4 && i != 9 && i != 14) {
                var isChar = false;
                
                if (thisChar >= 0 && thisChar <= 9) {
                    isChar = true;
                }
                
                if (!isChar) {
                    isInvalidCreditCard = true;
                }
            }
        }
        
        if (isInvalidCreditCard) {
            detectedErrors.push('invalidCreditCard');
        }
    }
    
    
    
    /*
     * Validating / Showing errors
     */
    if (detectedErrors.length == 0) {
        errorsBlock.style.display = 'none';
        sentBlock.style.display = 'block';
    } else {
        errorsBlock.style.display = 'block';
        sentBlock.style.display = 'none';
        
        detectedErrors.forEach(thisError => {
            errorsUl.innerHTML += ''
                + '<li>'
                + formErrors[thisError]
                + '</li>';
        });
    }
    
    return false;
}



/*
 * Filtro de nombre (un solo espacio)
 */
function filterName(event) {
    var newStr = '';
    var noSpace = true;
    
    for (let i = 0; i < nameSur.value.length; i++) {
        let thisChar = nameSur.value[i];
        
        if (thisChar == ' ') {
            if (noSpace) {
                noSpace = false;
            } else {
                continue;
            }
        }
        
        newStr += thisChar;
    }
    
    nameSur.value = newStr;
}

/*
 * Muestra/oculta el campo 'creditCard' y el mensaje de bloqueo en función de 'address' y 'country'
 */
function showCreditCard(event) {
    if (address.value != '' && country.value != '') {
        creditCard.style.display = 'block';
        creditCardBlocked.style.display = 'none';
    } else {
        creditCard.style.display = 'none';
        creditCardBlocked.style.display = 'block';
    }
}

function processCreditCard(event) {
    var thisCreditCard = creditCard.value;
    
    var oldValue = '';
    
    // Loop for removing non-numbers
    for (let i = 0; i < thisCreditCard.length; i++) {
        var thisChar = thisCreditCard[i];
        
        if (thisChar >= 0 || thisChar <= 9) {
            oldValue += thisChar;
        }
    }
    
    var newValue = '';
    
    // Loop for adding hyphens
    for (let i = 0; i < oldValue.length; i++) {
        var thisChar = oldValue[i];
        
        newValue += thisChar;
        console.log(i, oldValue.length - 1);
        if (event.inputType != 'deleteContentBackward' || i != oldValue.length - 1) {
            if ((i - 3) % 4 == 0 && i != 15) {
                newValue += '-';
            }
        }
    }
    
    creditCard.value = newValue;
    
    if (creditCard.value.length != event.target.selectionStart) {
        creditCard.setSelectionRange(event.target.selectionStart - 1, event.target.selectionStart - 1);
    }
}

nameSur.addEventListener('input', filterName);

address.addEventListener('input', showCreditCard);
country.addEventListener('input', showCreditCard);

creditCard.addEventListener('input', processCreditCard);