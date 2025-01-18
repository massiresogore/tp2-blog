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


}