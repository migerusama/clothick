<?php

require_once "modeloUsuario.php";
require_once "tipo.php";
require_once "datos.php";

class Usuario
{
    private $id;
    private $nick;
    private $email;
    private $tipo;
    private $password;
    private $datos;

    public function __construct($id, $nick, $email, $tipo, $password = "", $datos = "")
    {
        $this->id = $id;
        $this->nick = $nick;
        $this->email = $email;
        $this->password = $password;
        $this->tipo = new Tipo($tipo);
        if (empty($datos)) $this->datos = new Datos($id);
        else $this->datos = $datos;
    }

    public function login()
    {
        $mod = new ModeloUsuario();
        $mod->login($this->nick, $this->password);
    }

    public function insert()
    {
        $mod = new ModeloUsuario();
        $mod->insert($this);
    }
    public function update()
    {
        $mod = new ModeloUsuario();
        $mod->update($this);
    }
    public function select()
    {
        $mod = new ModeloUsuario();
        $mod->select($this->id);
    }
    public function delete()
    {
        $mod = new ModeloUsuario();
        $mod->delete($this);
    }


    /* GETTER & SETTER */

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNick()
    {
        return $this->nick;
    }

    public function setNick($nick)
    {
        $this->nick = $nick;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getDatos()
    {
        return $this->datos;
    }

    public function setDatos($datos)
    {
        $this->datos = $datos;
    }
}
