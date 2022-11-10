$(document).ready(function () {
  $("#birth-date").mask("00/00/0000");
  $("#phone-number").mask("0000-0000");
});

("use strict");

/*
 * Mensajes de error
 */
var formErrors = {
  nameSurMandatory: "El nombre es obligatorio",
  emailMandatory: "El email es obligatorio",
  passwordMandatory: "La contraseña es obligatoria",
  passwordConfirmMandatory: "Repite la contraseña",
  passwordTooShort: "La contraseña debe tener al menos ocho caracteres",
  passwordLowerCase: "La contraseña debe tener al menos una letra minúscula",
  passwordUpperCase: "La contraseña debe tener al menos una letra mayúscula",
  passwordNumber: "La contraseña debe tener al menos un número",
  passwordSymbol: "La contraseña debe tener al menos un símbolo",
  passwordsNotMatch: "Las contraseñas no coinciden",
  creditCardInvalid: "Formato inválido de tarjeta de crédito",
};

/*
 * Error, lista de errores y envío correcto
 */
var errorsBlock = document.getElementById("errorsBlock");
//var errorsUl = document.getElementById('errorsUl');
var sentBlock = document.getElementById("sentBlock");

/*
 * Campos del formulario
 */
var nameSur = document.getElementById("nameSur");
var email = document.getElementById("email");
var password = document.getElementById("password");
var passwordConfirm = document.getElementById("passwordConfirm");
var sex = document.getElementById("sex");
var birth = document.getElementById("birth");
var address = document.getElementById("address");
var country = document.getElementById("country");
var creditCard = document.getElementById("creditCard");

var creditCardBlocked = document.getElementById("creditCardBlocked");

var nameSurError = document.getElementById("nameSurError");
var emailError = document.getElementById("emailError");
var passwordError = document.getElementById("passwordError");
var passwordConfirmError = document.getElementById("passwordConfirmError");
var creditCardError = document.getElementById("creditCardError");

/*
 * Valida el formulario
 */
function validateForm() {
  //errorsUl.innerHTML = '';

  var detectedErrors = [];

  /*
   * nameSurMandatory
   */
  if (nameSur.value == "") {
    detectedErrors.push("nameSurMandatory");
  }

  /*
   * emailMandatory
   */
  if (email.value == "") {
    detectedErrors.push("emailMandatory");
  }

  /*
   * passwordMandatory
   */
  if (password.value == "") {
    detectedErrors.push("passwordMandatory");
  } else {
    /*
     * passwordTooShort
     */
    if (password.value.length < 8) {
      detectedErrors.push("passwordTooShort");
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
      detectedErrors.push("passwordLowerCase");
    }

    if (!hasUpperCase) {
      detectedErrors.push("passwordUpperCase");
    }

    if (!hasNumber) {
      detectedErrors.push("passwordNumber");
    }

    if (!hasSymbol) {
      detectedErrors.push("passwordSymbol");
    }
  }

  /*
   * passwordConfirmMandatory
   */
  if (passwordConfirm.value == "") {
    detectedErrors.push("passwordConfirmMandatory");
  } else {
    /*
     * passwordsNotMatch
     */
    if (password.value != passwordConfirm.value) {
      detectedErrors.push("passwordsNotMatch");
    }
  }

  /*
   * creditCardInvalid
   */
  var creditNumber = creditCard.value;

  // Solo se comprueba si el campo se ha rellenado
  if (creditNumber != "") {
    var isreditCardInvalidC = false;

    if (creditNumber.length != 19) {
      isreditCardInvalidC = true;
    }

    if (
      creditNumber[4] != "-" ||
      creditNumber[9] != "-" ||
      creditNumber[14] != "-"
    ) {
      isreditCardInvalidC = true;
    }

    for (let i = 0; i < creditNumber.length; i++) {
      var thisChar = creditNumber[i];

      if (i != 4 && i != 9 && i != 14) {
        var isChar = false;

        if (thisChar >= 0 && thisChar <= 9) {
          isChar = true;
        }

        if (!isChar) {
          isreditCardInvalidC = true;
        }
      }
    }

    if (isreditCardInvalidC) {
      detectedErrors.push("creditCardInvalid");
    }
  }

  /*
   * Validating / Showing errors
   */
  nameSurError.innerHTML = "";
  emailError.innerHTML = "";
  passwordError.innerHTML = "";
  passwordConfirmError.innerHTML = "";
  creditCardError.innerHTML = "";

  if (detectedErrors.length == 0) {
    errorsBlock.style.display = "none";
    sentBlock.style.display = "block";
  } else {
    errorsBlock.style.display = "block";
    sentBlock.style.display = "none";

    detectedErrors.forEach((thisError) => {
      // Antiguo código para msotrarlo en la cabecera
      /*errorsUl.innerHTML += ''
                + '<li>'
                + formErrors[thisError]
                + '</li>';*/

      if (thisError.includes("nameSur")) {
        nameSurError.innerHTML += "<p>" + formErrors[thisError] + "</p>";
      }

      if (thisError.includes("email")) {
        emailError.innerHTML += "<p>" + formErrors[thisError] + "</p>";
      }

      if (thisError.includes("Confirm")) {
        passwordConfirmError.innerHTML +=
          "<p>" + formErrors[thisError] + "</p>";
      } else {
        if (thisError.includes("password")) {
          passwordError.innerHTML += "<p>" + formErrors[thisError] + "</p>";
        }
      }

      if (thisError.includes("creditCard")) {
        creditCardError.innerHTML += "<p>" + formErrors[thisError] + "</p>";
      }
    });
  }

  return false;
}

/*
 * Filtro de nombre (un solo espacio)
 */
function filterName(event) {
  var newStr = "";
  var noSpace = true;

  for (let i = 0; i < nameSur.value.length; i++) {
    let thisChar = nameSur.value[i];

    if (thisChar == " ") {
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
  if (address.value != "" && country.value != "") {
    creditCard.style.display = "block";
    creditCardBlocked.style.display = "none";
  } else {
    creditCard.style.display = "none";
    creditCardBlocked.style.display = "block";
  }
}

function processCreditCard(event) {
  var thisCreditCard = creditCard.value;

  var oldValue = "";

  // Loop for removing non-numbers
  for (let i = 0; i < thisCreditCard.length; i++) {
    var thisChar = thisCreditCard[i];

    if (thisChar >= 0 || thisChar <= 9) {
      oldValue += thisChar;
    }
  }

  var newValue = "";

  // Loop for adding hyphens
  for (let i = 0; i < oldValue.length; i++) {
    var thisChar = oldValue[i];

    newValue += thisChar;
    console.log(i, oldValue.length - 1);
    if (
      event.inputType != "deleteContentBackward" ||
      i != oldValue.length - 1
    ) {
      if ((i - 3) % 4 == 0 && i != 15) {
        newValue += "-";
      }
    }
  }

  creditCard.value = newValue;

  if (creditCard.value.length != event.target.selectionStart) {
    creditCard.setSelectionRange(
      event.target.selectionStart - 1,
      event.target.selectionStart - 1
    );
  }
}

nameSur.addEventListener("input", filterName);

address.addEventListener("input", showCreditCard);
country.addEventListener("input", showCreditCard);

creditCard.addEventListener("input", processCreditCard);
