<?php
namespace App\Controller;

use App\Model\Users\User;
use App\Service\Container;

class AuthController extends Container{

    public function registerPage()
    {

      return $this->getViewController()->render('home/users/registration');
    }

    public function loginPage()
    {

      return $this->getViewController()->render('home/users/connect');
    }

    public function register()
    {
        $message = "";
        if($this->getRequest()->isPost()){
            $data = $this->getRequest()->getData();

            //Onv verifie si l'email existe
            if($this->getUsersStorage()->isUserExist($data['email'])){
                $message.= "Cet email existe déjà";
                $this->setSession('Authmessage', $message);
                //On recupère toute les données du formulaire on le met dans une session
                $this->setSession('dataSaveByIncorrect', $data);
            }else{

            //Vérifie si les champs sont vides
            if(empty($data['lastname']) || empty($data['firstname']) || empty($data['email']) || empty($data['confirm_email']) || empty($data['pwd']) || empty($data['confirm_pwd'])){
                $message.= "Tous les champs sont obligatoires";
                $this->setSession('Authmessage', $message);
                //On recupère toute les données du formulaire on le met dans une session
                $this->setSession('dataSaveByIncorrect', $data);
            }
            
            //Vérifie si email et confirm_email sont identiques
            if($data['email'] !== $data['confirm_email']){
                $message.= "Les emails ne sont pas identiques";
                $this->setSession('Authmessage', $message);
                
                //On recupère toute les données du formulaire on le met dans une session
                $this->setSession('dataSaveByIncorrect', $data);
            }
            //Vérifie si pwd et confirm_pwd sont identiques
            if($data['pwd'] !== $data['confirm_pwd']){
                $message.="Les mots de passe ne sont pas identiques";
                $this->setSession('Authmessage', $message);
                //On recupère toute les données du formulaire on le met dans une session
                $this->setSession('dataSaveByIncorrect', $data);
            }

            //On hash le mot de passe
            $data['pwd'] = password_hash($data['pwd'], PASSWORD_DEFAULT);
            //On supprime le confirm_pwd et confirm_email
            unset($data['confirm_pwd']);
            unset($data['confirm_email']);

            //On cree l'utilisateur dans un objet User puis on l'ajoute dans la base de données
            $user = new User(
                null,
                $data['lastname'],
                $data['firstname'],
                $data['email'],
                $data['pwd']
            );
          if($this->getUsersStorage()->addUser($user)){
            //On cree un message de success
            $message = "Votre compte a été créé avec succès";
            $this->setSession('Authmessage', $message);
            //On sauvegarde l'utilisateur dans une session
            $this->setSession('user', $user);
            
            //On redirige l'utilisateur vers la page d'accueil
            header('Location: /');
          }
            
            }


            return $this->getViewController()->render('home/users/registration');
        }
    }
}

