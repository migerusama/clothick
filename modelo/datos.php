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
        if ($res) {
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
        } else {
            $this->id = $id;
            $this->name = "";
            $this->lastName = "";
            $this->sex = "otro";
            $this->dateBirth = "";
            $this->address = "";
            $this->country = "";
            $this->creditCard = "";
            $this->notifications = 0;
            $this->newsletter = 0;
            $this->profilePic = "";
        }
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

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    public function getSex()
    {
        return $this->sex;
    }

    public function setSex($sex)
    {
        $this->sex = $sex;
    }

    public function getDateBirth()
    {
        return $this->dateBirth;
    }

    public function setDateBirth($dateBirth)
    {
        $this->dateBirth = $dateBirth;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function setCountry($country)
    {
        $this->country = $country;
    }

    public function getCreditCard()
    {
        return $this->creditCard;
    }

    public function setCreditCard($creditCard)
    {
        $this->creditCard = $creditCard;
    }

    public function getNotifications()
    {
        return $this->notifications;
    }

    public function setNotifications($notifications)
    {
        $this->notifications = $notifications;
    }

    public function getNewsletter()
    {
        return $this->newsletter;
    }

    public function setNewsletter($newsletter)
    {
        $this->newsletter = $newsletter;
    }

    public function getProfilePic()
    {
        return $this->profilePic;
    }

    public function setProfilePic($profilePic)
    {
        $this->profilePic = $profilePic;
    }
}
