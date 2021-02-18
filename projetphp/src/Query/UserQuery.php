<?php

namespace App\Query;

use App\Core\Database;
use App\Model\User;
use PDO;

class UserQuery
{
    private Database $database;
    private PDO $connexion;
    public function __construct(Database $database)
    {
        $this->connexion = $database->connect();
    }
    public function findOnBy( array $arg = []):User|bool{
        $sql ='SELECT * FROM api.user WHERE ';
        foreach ($arg as $column => $value) {
            $sql .= "user.$column = :$column";
        }
        $sql .= ";";
        // var_dump($sql);
        // exit;

        $query = $this->connexion->prepare($sql);
        $query-> execute($arg);

        $result= $query->fetchObject(User::class);
        return $result;
    }
    public function checkUser(string $login, string $password):bool{
        $user = $this -> findOnBy(['login'=> $login]);
        if ($user && password_verify($password,$user->getPassword())) {
            return true;
        }
        return false;
    }

}