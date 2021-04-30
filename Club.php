<?php

include "Config.php";

class Club {

    Private $id;
    Private $nom;
    private $description;
    private $adresse;
    private $domaine;

    function __construct($id,$nom,$description,$adresse,$domaine)
    {
        $this ->id=$id;
        $this ->nom=$nom;
        $this ->description=$description;
        $this ->adresse=$adresse;
        $this ->domaine=$domaine;

    }
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param mixed $adresse
     */
    public function setAdresse($adresse): void
    {
        $this->adresse = $adresse;
    }

    /**
     * @return mixed
     */
    public function getDomaine()
    {
        return $this->domaine;
    }

    /**
     * @param mixed $domaine
     */
    public function setDomaine($domaine): void
    {
        $this->domaine = $domaine;
    }

    public function afficheClub(){
        $sql="select * from club";
        $db=Config::getConnexion();
        try {
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die ('Erreur'.$e->getMessage());
        }

    }

}

