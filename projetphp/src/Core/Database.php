<?php

namespace App\Core;

use PDO;

//permet de retrouver URL/route

class Database {

    public function connect():\PDO {
        $connection =new PDO(
            "mysql:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_NAME']};charset=UTF8",
            $_ENV['DB_USER'],
            $_ENV['DB_PASSWORD'],
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            ]

        );
        return $connection;
    }
}
