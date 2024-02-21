<?php

namespace Library;

use Constant\ProductType;
use Exception;
use Repository\Database;

class ListProduct
{
    /**
     * @throws Exception
     */
    public function execute(): array
    {
        $productsObjs = [];
        $database = new Database();
        $products = $database->getProducts();
        foreach ($products as $product) {
            $productType = ProductType::ALL_PRODUCT_TYPES_NAMESPACE_MAPPING[$product['type']];
            $productsObjs[] = new $productType($product['sku'], $product['name'], floatval($product['price']), $product['attribute']);
        }
        return $productsObjs;
    }

}
