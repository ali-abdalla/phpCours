<?php

namespace App\Query;

use App\Core\Database;
use App\Model\Product;
use PDO;

class ProductQuery
{

    private PDO $connexion;
    public function __construct(Database $database)
    {
        $this->connexion = $database->connect();
    }
    // public function findOnByProduct(array $arg = []): Product|bool
    // {
    //     $sql = 'SELECT * FROM api.product WHERE ';
    //     foreach ($arg as $column => $value) {
    //         $sql .= "product.$column = :$column";
    //     }
    //     $sql .= ";";
    //     // var_dump($sql);
    //     // exit;

    //     $query = $this->connexion->prepare($sql);
    //     $query->execute($arg);

    //     $result = $query->fetchObject(Product::class);
    //     return $result;
    // }

    public function getAll():array
    {
        $sql = 'SELECT * FROM api.product;';
        $query = $this->connexion->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_CLASS, Product::class);
        return $results;
    }
    public function insert(object $object): void
    {
        $sql = 'INSERT INTO api.product VALUE(NULL, :name);';
        $query = $this->connexion->prepare($sql);
        $query->execute([
            'name' => $object->name,
        ]);
    }
    
}