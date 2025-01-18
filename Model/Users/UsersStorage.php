<?php

namespace App\Model\Users;

use App\Core\Db;

class UsersStorage
{


    public function isUserExist(string $email): bool
    {
        $query = Db::getInstance()->prepare('SELECT * FROM users WHERE email = :email');
        $query->execute(['email' => $email]);
        $user = $query->fetch();
        if ($user === false) {
            return false;
        }
        return true;
    }
    
    public function getUserById(int $id): ?User
    {
        $query = Db::getInstance()->prepare('SELECT * FROM users WHERE idn = :idn');
        $query->execute(['idn' => $id]);
        $user = $query->fetch();
        if ($user === false) {
            return null;
        }
        return new User(
            $user['idn'],
            $user['lastname'],
            $user['firstname'],
            $user['email'],
            $user['password']
        );
    }

    public function addUser(User $user): bool
    {
        $query = Db::getInstance()->prepare('INSERT INTO users (lastname, firstname, email, pwd) VALUES (:lastname, :firstname, :email, :pwd)');
        $result = $query->execute([
            'lastname' => $user->getLastName(),
            'firstname' => $user->getFirstName(),
            'email' => $user->getEmail(),
            'pwd' => $user->getPassword()
        ]);

        if ($result && $query->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
