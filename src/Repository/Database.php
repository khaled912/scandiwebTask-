<?php

namespace Repository;

use Exception;
use Model\Product;
use PDO;
use PDOException;

class Database
{
    private PDO $pdo;

    /**
     * @throws Exception
     */
    public function __construct()
    {
        $dsn = sprintf('%s:host=%s;port=%s;dbname=%s',
            getenv('DB_CONNECTION'),
            getenv('DB_HOST'),
            getenv('DB_PORT'),
            getenv('DB_DATABASE'),
        );

        try {
            $this->pdo = new PDO(
                $dsn, getenv('DB_USERNAME'), getenv('DB_PASSWORD'));
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw new Exception("Connection failed: " . $e->getMessage());
        }
    }

    public function getProducts()
    {
        $statement = $this->pdo->prepare('SELECT * FROM product ORDER BY sku');
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductBySku($sku)
    {
        $statement = $this->pdo->prepare('SELECT * FROM product WHERE sku = :sku');
        $statement->bindValue(':sku', $sku);
        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function deleteProduct($skuIds): bool
    {
        $sql = 'DELETE FROM product WHERE sku IN (' . rtrim(str_repeat('?, ', count($skuIds)), ', ') . ')';
        $statement = $this->pdo->prepare($sql);
        foreach ($skuIds as $key => $sku) {
            $statement->bindValue(($key + 1), $sku);
        }
        return $statement->execute();
    }

    public function createProduct(Product $product)
    {
        $statement = $this->pdo->prepare("INSERT INTO product (sku, name, price, type, attribute)
                VALUES (:sku, :name, :price, :type, :attribute)");

        $statement->bindValue(':sku', $product->getSkU());
        $statement->bindValue(':name', $product->getName());
        $statement->bindValue(':price', $product->getPrice());
        $statement->bindValue(':type', $product->getType());
        $statement->bindValue(':attribute', $product->getAttribute());

        $statement->execute();
    }
}