const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const category = urlParams.get('c')
const container = document.getElementById("container")

if (category) document.getElementById("clear").classList.toggle("d-none")

function getAllProducts() {
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

function getProductsByCategory() {
    return new Promise(function (resolve, reject) {
        $.ajax({
            url: '../modelo/index.php',
            type: 'GET',
            dataType: 'json',
            data: { c: category },
            success: function (data) {
                resolve(data);
            },
            error: function (xhr, status, error) {
                reject(error);
            }
        });
    });
}

if (category) {
    getProductsByCategory().then(function (products) {
        let productos = products
        productos.forEach(producto => {
            container.appendChild(createCard(producto))
        });
    }, function (error) {
        console.error(error);
    });
} else {
    getAllProducts().then(function (products) {
        let productos = products
        productos.forEach(producto => {
            container.appendChild(createCard(producto))
        });
    }, function (error) {
        console.error(error);
    });
}

function createCard(producto) {
    var card = document.createElement("div");
    card.classList.add("col-3", "mb-4");
    card.id = producto.id

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

    var cardTitle = document.createElement("p");
    cardTitle.classList.add("card-title", "text-white");
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
    buyBtn.style.fontSize = "2vh"
    divBuy.appendChild(buyBtn)
    textEnd.appendChild(divBuy);

    //TODO: add event listeners

    buyBtn.addEventListener('click', addToCart)

    var divCheck = document.createElement("div");
    divCheck.classList.add("col");

    var checkBtn = document.createElement("button");
    checkBtn.classList.add("btn", "btn-dark", "btn-outline-danger", "w-100");
    checkBtn.textContent = "CHECK";
    checkBtn.style.fontSize = "2vh"
    divCheck.appendChild(checkBtn)
    textEnd.appendChild(divCheck);

    //TODO: add event listeners

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
