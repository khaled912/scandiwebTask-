<?php

namespace Library;

use Constant\ProductType;
use Model\Book;
use Model\DVD;
use Model\Furniture;

class ProductTypeFactory
{
    public static function create($data)
    {
        $type = $data['type'];
        $productType = ProductType::ALL_PRODUCT_TYPES_NAMESPACE_MAPPING[$type];

        $product = new $productType($data['sku'], $data['name'], $data['price']);
        return self::$type($data, $product);
    }

    private static function DVD($data, DVD $dvdProduct): DVD
    {
        $dvdProduct->setSize($data['size']);
        return $dvdProduct;
    }

    private static function Book($data, Book $bookProduct): Book
    {
        $bookProduct->setWeight($data['weight']);
        return $bookProduct;
    }

    private static function Furniture($data, Furniture $furnitureProduct): Furniture
    {
        $furnitureProduct->setHeight(floatval($data['height']));
        $furnitureProduct->setLength(floatval($data['length']));
        $furnitureProduct->setLength(floatval($data['width']));
        return $furnitureProduct;
    }
}
