<?php

namespace Library;

use Repository\Database;

class GetProductBySku
{
    public function execute(string $sku)
    {
        $database = new Database();
        $product = $database->getProductBySku($sku);

        return $product;

    }

}
