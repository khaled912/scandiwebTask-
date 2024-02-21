<?php

namespace Library;

use Repository\Database;

class DeleteProduct
{

    public function execute(array $productIds): bool
    {
        $database = new Database();
        $database->deleteProduct($productIds);
        return true;
    }

}
