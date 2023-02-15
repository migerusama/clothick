class Product {
	id = 0
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
document.addEventListener('DOMContentLoaded', () => {
	var ticket = document.getElementById("ticket")
	var lista = document.getElementById("listaProductos")
	var total = 0
	var productos = localStorage.getItem('cart');
	productos = JSON.parse(productos) ?? [];
	productos.forEach(product => {
		lista.appendChild(addProductToList(product))
		ticket.appendChild(addProductToTicket(product))
		total += (product.quantity * product.price)
	})
	document.getElementById("total").innerText = total.toFixed(2)

	function addProductToList(product) {
		// Create the outer container for the product row
		const row = document.createElement("div");
		row.classList.add("row", "py-2", "me-1", "align-items-center");
		row.id = product.id;

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
		quantity.min = 1;
		quantity.classList.add("w-50", "text-end");
		buttonCol.appendChild(quantity);
		quantity.addEventListener("input", addProduct)
		const deleteButton = document.createElement("button");
		deleteButton.classList.add("btn", "btn-danger");
		const deleteIcon = document.createElement("i");
		deleteIcon.classList.add("bi", "bi-trash");
		deleteIcon.style.pointerEvents = 'none'
		deleteButton.appendChild(deleteIcon);
		deleteButton.addEventListener('click', deleteProduct)
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
		div.id = product.id

		const productName = document.createElement('p');
		productName.innerText = product.name;
		div.appendChild(productName);

		const productPrice = document.createElement('p');
		productPrice.innerText = `${product.quantity} x ${product.price}$`;
		div.appendChild(productPrice);

		return div;
	}

	function deleteProduct(e) {
		var parentNode = e.target.parentNode.parentNode
		var elements = document.getElementsByName(parentNode.getAttribute("name"))
		elements[0].remove()
		elements[0].remove()
		//TODO: eliminar del array
	}

	function addProduct(e) {
		//COMPROBAR QUE NO ESTÉ VACIO
		if (e.target.value == "") e.target.value = 1

		var cart = localStorage.getItem('cart');
		cart = JSON.parse(cart);

		//ACTUALIZAR CANTIDAD
		var product = cart.find(x => x.id === e.target.parentNode.parentNode.id)
		product.quantity = e.target.value
		localStorage.setItem('cart', JSON.stringify(cart));

		//ACTUALIZAR CANTIDAD DEL TICKET
		var ticket = document.getElementById("ticket").querySelector(`.d-flex.justify-content-between[id='${product.id}']`);
		ticket.getElementsByTagName("p")[1].innerText = `${product.quantity} x ${product.price}$`;

		//ACTUALIZAR TOTAL
		total = 0
		cart.forEach(product => {
			total += (product.quantity * product.price)
		})
		document.getElementById("total").innerText = total.toFixed(2)
	}
})
