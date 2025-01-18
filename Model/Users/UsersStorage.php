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

    public function getUserByEmail(string $email): ?User
    {
        $query = Db::getInstance()->prepare('SELECT * FROM users WHERE email = :email');
        $query->execute(['email' => $email]);
        $user = $query->fetch();
        if ($user === false) {
            return null;
        }
        return new User(
            $user['idn'],
            $user['lastname'],
            $user['firstname'],
            $user['email'],
            $user['pwd']
        );
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

    public function updateProfileNameAndFirstname(User $user): bool
    {
        $query = Db::getInstance()->prepare('UPDATE users SET lastname = :lastname, firstname = :firstname WHERE idn = :idn');
        $result = $query->execute([
            'idn' => $user->getId(),
            'lastname' => $user->getLastName(),
            'firstname' => $user->getFirstName()
        ]);

        if ($result && $query->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }


    public function updateProfile(User $user): bool
    {
        $query = Db::getInstance()->prepare('UPDATE users SET lastname = :lastname, firstname = :firstname, email = :email, pwd = :pwd WHERE idn = :idn');
        $result = $query->execute([
            'idn' => $user->getId(),
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

    public function deleteProfile(User $user): bool
    {
        $query = Db::getInstance()->prepare('DELETE FROM users WHERE idn = :idn');
        $result = $query->execute(['idn' => $user->getId()]);

        if ($result && $query->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
