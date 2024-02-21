<?php

namespace Library;

use Model\Product;
use Repository\Database;

class AddProduct
{
    /**
     * @throws \Exception
     */
    public function execute(Product $product): Product
    {
        $database = new Database();

        $isSkuExist = $database->getProductBySku($product->getSkU());

        if ($isSkuExist) {
            throw new \Exception("that SKU is exist before.");
        }

        $database->createProduct($product);
        return $product;
    }

}
