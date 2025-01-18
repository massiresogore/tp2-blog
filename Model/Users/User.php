<?php

namespace App\Model\Users;

class User{

    public function __construct(
        private ?int $idn,
        private ?string $lastname,
        private ?string $firstname,
        private ?string $email,
        private ?string $password
    ){

    }

    public function getId(){
        return $this->idn;
    }

    public function getLastName(){
        return $this->lastname;
    }

    public function getFirstName(){
        return $this->firstname;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getPassword(){
        return $this->password;
    }

    public function setLastName($lastname){
        $this->lastname = $lastname;
    }

    public function setFirstName($firstname){
        $this->firstname = $firstname;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function setPassword($password){
        $this->password = $password;
    }

    public function setId($id){
        $this->idn = $id;
    }

    public function __toString(){
        return $this->firstname . ' ' . $this->lastname;
    }


}