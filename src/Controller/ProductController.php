<?php

namespace Controller;

use Helper\RenderView;
use Library\AddProduct;
use Library\DeleteProduct;
use Library\GetProductBySku;
use Library\ListProduct;
use Library\ProductTypeFactory;
use Validator\AddProductValidator;

class ProductController
{

    public static function addProduct()
    {
        $product = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $errors = AddProductValidator::validate($_POST);
            if (!empty($errors)) {
                http_response_code(422);
                echo json_encode(['errors' => $errors]);
                exit;
            }

            $product = (new AddProduct())->execute(ProductTypeFactory::create($_POST));
        }

        RenderView::render([
            'product' => $product
        ], 'AddProduct');

    }


    public static function deleteProduct()
    {
        $requestData = json_decode(file_get_contents('php://input'), true);

        if (isset($requestData['productSkus']) && is_array($requestData['productSkus'])) {
            (new DeleteProduct())->execute($requestData['productSkus']);

            http_response_code(200);
            echo json_encode(['message' => 'Products deleted successfully']);
        } else {
            http_response_code(400);
            echo json_encode(['error' => 'Product IDs must be provided as an array']);
        }
    }

    public static function getProductBySku()
    {
        $product = '';
        if (is_string($_GET['sku'])) {
            $product = (new GetProductBySku())->execute($_GET['sku']);
        }

        http_response_code(200);
        echo json_encode($product);
    }

    public static function getProducts()
    {
        RenderView::render([
            'products' => (new ListProduct())->execute()
        ], 'listProducts');
    }

}
