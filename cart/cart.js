class Product {
	name
	description
	price
	imageUrl
	quantity
	constructor(name, description, price, imageUrl, quantity) {
		this.name = name
		this.description = description
		this.price = price
		this.imageUrl = imageUrl
		this.quantity = quantity
	}
};

var ticket = document.getElementById("ticket")
var lista = document.getElementById("listaProductos")
var producto = new Product(
	"producto",
	"Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi suscipit tempora ",
	13,
	"../assets/img/cursor/cursor.png",
	2
)

for (let index = 0; index < 5; index++) {
	lista.appendChild(addProductToList(producto))
	ticket.appendChild(addProductToTicket(producto))
}


/* <div class="row py-2 me-1 align-items-center" id="listaProductos">
					<div class="col-2">
						<img src="../assets/img/cursor/cursor.png" alt="" class="w-75 border border-3">
					</div>
					<div class="col-8">
						<h4>Producto1</h4>
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi suscipit tempora </p>
					</div>
					<div class="col-2">
						<input type="number" value="1" min="0" class="w-50 text-end">
						<button class="btn btn-danger">
							<i class="bi bi-trash"></i>
						</button>
					</div>
				</div>
				<hr> 

				<div class="d-flex justify-content-between">
					<p>Producto1</p>
					<p>1 x 24.99$</p>
				</div>*/

function addProductToList(product) {
	// Create the outer container for the product row
	const row = document.createElement("div");
	row.classList.add("row", "py-2", "me-1", "align-items-center");
	row.id = "listaProductos";

	// Create the image column
	const imageCol = document.createElement("div");
	imageCol.classList.add("col-2");
	const image = document.createElement("img");
	image.src = product.imageUrl;
	image.alt = product.name;
	image.classList.add("w-75", "border", "border-3");
	imageCol.appendChild(image);
	row.appendChild(imageCol);

	// Create the product details column
	const detailsCol = document.createElement("div");
	detailsCol.classList.add("col-8");
	const name = document.createElement("h4");
	name.textContent = product.name;
	detailsCol.appendChild(name);
	const description = document.createElement("p");
	description.textContent = product.description;
	detailsCol.appendChild(description);
	row.appendChild(detailsCol);

	// Create the quantity and delete button column
	const buttonCol = document.createElement("div");
	buttonCol.classList.add("col-2");
	const quantity = document.createElement("input");
	quantity.type = "number";
	quantity.value = product.quantity;
	quantity.min = 0;
	quantity.classList.add("w-50", "text-end");
	buttonCol.appendChild(quantity);
	const deleteButton = document.createElement("button");
	deleteButton.classList.add("btn", "btn-danger");
	const deleteIcon = document.createElement("i");
	deleteIcon.classList.add("bi", "bi-trash");
	deleteButton.appendChild(deleteIcon);
	buttonCol.appendChild(deleteButton);
	row.appendChild(buttonCol);

	// Create a horizontal rule to separate the product rows
	const hr = document.createElement("hr");
	row.appendChild(hr);

	return row;
}


function addProductToTicket(product) {
	const div = document.createElement('div');
	div.classList.add('d-flex', 'justify-content-between');

	const productName = document.createElement('p');
	productName.innerText = product.name;
	div.appendChild(productName);

	const productPrice = document.createElement('p');
	productPrice.innerText = `1 x ${product.price}$`;
	div.appendChild(productPrice);

	return div;
}
