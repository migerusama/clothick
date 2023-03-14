
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

var productos
var containerNovedades = document.getElementById("containerNovedades")
var productosLista = document.getElementById("productosLista")

getProducts().then(function (products) {
    productos = products
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
    card.id = producto.id

    var innerCard = document.createElement("div");
    innerCard.classList.add("card", "bg-black", "border-3", "border-danger");

    var link = document.createElement("a");
    link.href = `../product/product.php?id=${producto.id}`;

    var img = document.createElement("img");
    img.classList.add("card-img-top");
    img.src = producto.image
    link.appendChild(img);

    var cardBody = document.createElement("div");
    cardBody.classList.add("card-body");

    var clearfix = document.createElement("div");
    clearfix.classList.add("clearfix", "mb-3");

    var badge = document.createElement("span");
    badge.classList.add("float-start", "badge", "rounded-pill", "bg-primary", "col-12", "col-lg");
    badge.textContent = producto.name
    clearfix.appendChild(badge);

    var price = document.createElement("span");
    price.classList.add("float-end", "price-hp", "text-white");
    price.innerHTML = `${producto.price}&euro;`
    clearfix.appendChild(price);

    cardBody.appendChild(clearfix);

    var cardTitle = document.createElement("p");
    cardTitle.classList.add("card-title", "text-white", "d-none", "d-lg-block");
    cardTitle.style.fontSize = "medium";
    cardTitle.textContent = producto.description
    cardBody.appendChild(cardTitle);

    var textEnd = document.createElement("div");
    textEnd.classList.add("row", "gx-2");

    var divBuy = document.createElement("div");
    divBuy.classList.add("col");

    var buyBtn = document.createElement("button");
    buyBtn.classList.add("btn", "btn-dark", "btn-outline-danger", "w-100");
    buyBtn.textContent = "ADD TO CART";
    divBuy.appendChild(buyBtn)
    textEnd.appendChild(divBuy);

    buyBtn.addEventListener('click', addToCart)

    var divCheck = document.createElement("div");
    divCheck.classList.add("col");

    var checkBtn = document.createElement("a");
    checkBtn.classList.add("btn", "btn-dark", "btn-outline-danger", "w-100");
    checkBtn.textContent = "CHECK";
    checkBtn.href = `../product/product.php?id=${producto.id}`
    divCheck.appendChild(checkBtn)
    textEnd.appendChild(divCheck);

    cardBody.appendChild(textEnd);

    innerCard.appendChild(link);
    innerCard.appendChild(cardBody);
    card.appendChild(innerCard);

    return card;
}

function addToCart(e) {
    var cart = localStorage.getItem('cart');
    cart = JSON.parse(cart) ?? [];

    var id = e.target.parentNode.parentNode.parentNode.parentNode.parentNode.id
    var product = cart.find(x => x.id === id) ?? productos.find(x => x.id === id)

    if (cart.find(x => x.id === id)) cart.find(x => x.id === id).quantity++
    else {
        product.quantity++
        cart.push(product)
    }

    localStorage.setItem('cart', JSON.stringify(cart));
}

