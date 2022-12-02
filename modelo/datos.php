<?php

require_once "modeloDatos.php";
class Datos
{
    private $id;
    private $name;
    private $lastName;
    private $sex;
    private $dateBirth;
    private $address;
    private $country;
    private $creditCard;
    private $notifications;
    private $newsletter;
    private $profilePic;

    public function __construct($id)
    {
        $mod = new ModeloDatos();
        $res = $mod->select($id);
        $this->id = $id;
        $this->name = $res["name"];
        $this->lastName = $res["lastName"];
        $this->sex = $res["sex"];
        $this->dateBirth = $res["dateBirth"];
        $this->address = $res["address"];
        $this->country = $res["country"];
        $this->creditCard = $res["creditCard"];
        $this->notifications = $res["notifications"];
        $this->newsletter = $res["newsletter"];
        $this->profilePic = $res["profilePic"];
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

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }

    public function getSex()
    {
        return $this->sex;
    }

    public function setSex($sex)
    {
        $this->sex = $sex;
        return $this;
    }

    public function getDateBirth()
    {
        return $this->dateBirth;
    }

    public function setDateBirth($dateBirth)
    {
        $this->dateBirth = $dateBirth;
        return $this;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function setCountry($country)
    {
        $this->country = $country;
        return $this;
    }

    public function getCreditCard()
    {
        return $this->creditCard;
    }

    public function setCreditCard($creditCard)
    {
        $this->creditCard = $creditCard;
        return $this;
    }

    public function getNotifications()
    {
        return $this->notifications;
    }

    public function setNotifications($notifications)
    {
        $this->notifications = $notifications;
        return $this;
    }

    public function getNewsletter()
    {
        return $this->newsletter;
    }

    public function setNewsletter($newsletter)
    {
        $this->newsletter = $newsletter;
        return $this;
    }

    public function getProfilePic()
    {
        return $this->profilePic;
    }

    public function setProfilePic($profilePic)
    {
        $this->profilePic = $profilePic;
        return $this;
    }
}
