<?php

  class Individu {

    public $id;
    public $nom;
    public $prenoms;
    public $email;
    public $telephone;
    public $password;
    public $sexe;
    public $date_naissance;
    public $profession;
    public $photo;
    public $date_ins;
    public $nationalite;
    public $religion;
    public $id_ville;
    public $id_pays;
    public $id_description;
    public $id_ci;
    public $id_critere;

    public $taux;
    public $matches;

    public function __construct($row)
    {
      if (isset($row['id'])) {
        $this->id = $row['id'];
      }
      if (isset($row['nom'])) {
        $this->nom = $row['nom'];
      }
      if (isset($row['prenoms'])) {
        $this->prenoms = $row['prenoms'];
      }
      if (isset($row['email'])) {
        $this->email = $row['email'];
      }
      if (isset($row['telephone'])) {
        $this->telephone = $row['telephone'];
      }
      if (isset($row['password'])) {
        $this->password = $row['password'];
      }
      if (isset($row['sexe'])) {
        $this->sexe = $row['sexe'];
      }
      if (isset($row['date_naissance'])) {
        $this->date_naissance = $row['date_naissance'];
      }
      if (isset($row['profession'])) {
        $this->profession = $row['profession'];
      }
      if (isset($row['photo'])) {
        $this->photo = $row['photo'];
      }
      if (isset($row['date_ins'])) {
        $this->date_ins = $row['date_ins'];
      }
      if (isset($row['nationalite'])) {
        $this->nationalite = $row['nationalite'];
      }
      if (isset($row['religion'])) {
        $this->religion = $row['religion'];
      }
      if (isset($row['id_ville'])) {
        $this->id_ville = $row['id_ville'];
      }
      if (isset($row['id_pays'])) {
        $this->id_pays = $row['id_pays'];
      }
      if (isset($row['id_description'])) {
        $this->id_description = $row['id_description'];
      }
      if (isset($row['id_ci'])) {
        $this->id_ci = $row['id_ci'];
      }
      if (isset($row['id_critere'])) {
        $this->id_critere = $row['id_critere'];
      }

      $this->taux = 0;
      $this->matches = [];
    }

    public function destroyPassword()
    {
      $this->password = null;
    }

    // public function toArray()
    // {
    //   return array(
    //     'id'=>$this->id,'nom'=>$this->nom,'prenoms'=>$this->prenoms,
    //     'email'=>$this->email,'telephone'=>$this->telephone,'password'=>$this->password,
    //     'sexe'=>$this->sexe,'date_naissance'=>$this->date_naissance,'profession'=>$this->profession,
    //     'photo'=>$this->photo,'date_ins'=>$this->date_ins,'nationalite'=>$this->nationalite,
    //     'id_ville'=>$this->id_ville,'id_pays'=>$this->id_pays,'id_description'=>$this->id_description,
    //     'id_ci'=>$this->id_ci,'id_critere'=>$this->id_critere
    //   );
    // }

  }

 ?>
