// Crea una variable para almacenar el valor anterior del array
var previousCart = JSON.parse(localStorage.getItem("cart"));

setInterval(function () {
    // Obtiene el valor del array desde localStorage
    var cart = JSON.parse(localStorage.getItem("cart"));

    // Comprueba si es la primera vez que se carga el array
    if (!previousCart) {
        // Establece el valor de la variable previousArray con el nuevo valor de array
        previousCart = cart;
    }

    // Comprueba si el array ha cambiado
    if (previousCart !== cart) {
        // Actualiza el valor de la variable previousArray con el nuevo valor de array
        previousCart = cart;

        // Actualiza el valor del span según la longitud del array
        document.getElementById("cartCount").innerHTML = cart.length;
    }
}, 1000); // Comprueba cada 1000 milisegundos (1 segundo)