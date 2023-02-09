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
var productos

function getProducts() {
    return new Promise(function (resolve, reject) {
        $.ajax({
            url: '../modelo/index.php',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                resolve(data);
            },
            error: function (xhr, status, error) {
                reject(error);
            }
        });
    });
}

var containerNovedades = document.getElementById("containerNovedades")
var productosLista = document.getElementById("productosLista")

getProducts().then(function (products) {
    productos = products
    productos.forEach(producto => {
        containerNovedades.appendChild(createCard(producto, "m-2"))
    });
    productos.forEach(producto => {
        productosLista.appendChild(createCard(producto))
    })
}, function (error) {
    console.error(error);
});

function createCard(producto, margin = "") {
    var card = document.createElement("div");
    card.classList.add("col");
    if (margin) card.classList.add(margin);

    var innerCard = document.createElement("div");
    innerCard.classList.add("card", "bg-dark");

    var link = document.createElement("a");
    link.href = "";

    var img = document.createElement("img");
    img.classList.add("card-img-top");
    img.src = producto.image
    link.appendChild(img);

    var cardBody = document.createElement("div");
    cardBody.classList.add("card-body");

    var clearfix = document.createElement("div");
    clearfix.classList.add("clearfix", "mb-3");

    var badge = document.createElement("span");
    badge.classList.add("float-start", "badge", "rounded-pill", "bg-primary");
    badge.textContent = producto.name
    clearfix.appendChild(badge);

    var price = document.createElement("span");
    price.classList.add("float-end", "price-hp");
    price.innerHTML = `${producto.price}&euro;`
    clearfix.appendChild(price);

    cardBody.appendChild(clearfix);

    var cardTitle = document.createElement("h5");
    cardTitle.classList.add("card-title", "text-white");
    cardTitle.textContent = producto.description
    cardBody.appendChild(cardTitle);

    var textEnd = document.createElement("div");
    textEnd.classList.add("text-end");

    var buyBtn = document.createElement("button");
    buyBtn.classList.add("btn", "btn-dark", "btn-outline-primary");
    buyBtn.textContent = "BUY";
    textEnd.appendChild(buyBtn);

    //TODO: add event listeners

    var checkBtn = document.createElement("button");
    checkBtn.classList.add("btn", "btn-dark", "btn-outline-primary");
    checkBtn.textContent = "CHECK";
    textEnd.appendChild(checkBtn);

    //TODO: add event listeners

    cardBody.appendChild(textEnd);

    innerCard.appendChild(link);
    innerCard.appendChild(cardBody);
    card.appendChild(innerCard);

    return card;
}
