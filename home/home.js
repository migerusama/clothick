class Producto {
    id
    nombre
    precio
    img
    constructor(id, nombre, precio, img) {
        this.id = id
        this.nombre = nombre
        this.precio = precio
        this.img = img
    }
}
//cargar navbar
$(function () {
    $("#nav-placeholder").load("../navbar/navbar.html");
});

var containerNovedades = document.getElementById("containerNovedades")
var productosLista = document.getElementById("productosLista")

var productosNovedades = [
    new Producto(0, "producto1", 10, "https://cdn.frankerfacez.com/avatar/twitch/244099803"),
    new Producto(0, "producto1", 10, "https://cdn.frankerfacez.com/avatar/twitch/244099803"),
    new Producto(0, "producto1", 10, "https://cdn.frankerfacez.com/avatar/twitch/244099803"),
    new Producto(0, "producto1", 10, "https://cdn.frankerfacez.com/avatar/twitch/244099803"),
    new Producto(0, "producto1", 10, "https://cdn.frankerfacez.com/avatar/twitch/244099803"),
    new Producto(0, "producto1", 10, "https://cdn.frankerfacez.com/avatar/twitch/244099803"),
    new Producto(0, "producto1", 10, "https://cdn.frankerfacez.com/avatar/twitch/244099803"),
    new Producto(0, "producto1", 10, "https://cdn.frankerfacez.com/avatar/twitch/244099803")
]
var productos = [
    new Producto(0, "producto1", 10, "https://cdn.frankerfacez.com/avatar/twitch/244099803"),
    new Producto(0, "producto1", 10, "https://cdn.frankerfacez.com/avatar/twitch/244099803"),
    new Producto(0, "producto1", 10, "https://cdn.frankerfacez.com/avatar/twitch/244099803"),
    new Producto(0, "producto1", 10, "https://cdn.frankerfacez.com/avatar/twitch/244099803"),
    new Producto(0, "producto1", 10, "https://cdn.frankerfacez.com/avatar/twitch/244099803"),
    new Producto(0, "producto1", 10, "https://cdn.frankerfacez.com/avatar/twitch/244099803"),
    new Producto(0, "producto1", 10, "https://cdn.frankerfacez.com/avatar/twitch/244099803"),
    new Producto(0, "producto1", 10, "https://cdn.frankerfacez.com/avatar/twitch/244099803")
]

productosNovedades.forEach(producto => {
    createProductCard(producto, containerNovedades, "col-4")
});

productos.forEach(producto => {
    createProductCard(producto, productosLista, "col-2")
})

function createProductCard(producto, container, col) {
    var card = document.createElement("div")
    card.classList.add("card", col, "bg-dark")
    var img = document.createElement("img")
    img.classList.add("card-img-top")
    img.src = producto.img
    var body = document.createElement("div")
    body.classList.add("card-body")
    var titulo = document.createElement("h5")
    titulo.classList.add("card-tittle", "text-white")
    titulo.innerText = producto.nombre
    body.appendChild(titulo)
    card.appendChild(img)
    card.appendChild(body)
    container.appendChild(card)
}