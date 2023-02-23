<?php
$conn = new mysqli('localhost', 'root', '', 'clothick');

$query = "SELECT * FROM products";
$result = $conn->query($query);

$products = array();

while ($row = $result->fetch_assoc()) {
    // Agrega cada producto como un objeto en el array
    $products[] = (object) $row;
}

// Devuelve el array de productos en formato JSON
header("Content-Type: application/json");
echo json_encode($products);
