<?php

require_once "modeloProductos.php";
class Productos
{
    private $id;
    private $name;
    private $description;
    private $quantity;
    private $price;
    private $image;
    private $category;

    public function __construct($id)
    {
        $mod = new ModeloProductos();
        $res = $mod->select($id);
        $this->id = $id;
        $this->name = $res["name"];
        $this->description = $res["description"];
        $this->quantity = $res["quantity"];
        $this->price = $res["price"];
        $this->image = $res["image"];
        $this->category = $res["category"];
    }
}
