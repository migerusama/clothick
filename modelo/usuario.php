<?php

require_once "modeloUsuario.php";
require_once "tipo.php";

class Usuario
{
    private $id;
    private $nick;
    private $password;
    private $tipo;
    private $email;

    public function __construct($id, $nick, $tipo)
    {
        $this->id = $id;
        $this->nick = $nick;
        $this->tipo = new Tipo($tipo);
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
        return $this;
    }

    public function getNick()
    {
        return $this->nick;
    }

    public function setNick($nick)
    {
        $this->nick = $nick;
        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }
}
