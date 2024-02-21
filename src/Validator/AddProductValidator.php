<?php

namespace Validator;

use Constant\ProductType;

class AddProductValidator
{
    public static function validate(array $data): array
    {
        $errors = [];

        if (empty($data['sku'])) {
            $errors[] = "SKU is required.";
        }

        if (empty($data['name'])) {
            $errors[] = "Name is required.";
        }

        if (!is_numeric($data['price']) || $data['price'] <= 0) {
            $errors[] = "Price must be a valid positive number.";
        }

        if (!in_array($data['type'], ProductType::ALL_PRODUCT_TYPES)) {
            $errors[] = "Invalid Product Type.";
            return $errors;
        }
        $productType = $data['type'];
        $productTypeErrors = self::$productType($data);
        if (!empty($productTypeErrors)) {
            $errors[] = $productTypeErrors;
        }

        return $errors;
    }

    private static function DVD($data): array
    {
        $errors = [];
        if (!is_numeric($data['size']) || $data['size'] <= 0) {
            $errors[] = "Size must be a valid positive number.";
        }
        return $errors;
    }

    private static function Book($data): array
    {
        $errors = [];
        if (!is_numeric($data['weight']) || $data['weight'] <= 0) {
            $errors[] = "Weight must be a valid positive number.";
        }
        return $errors;
    }

    private static function Furniture($data): array
    {
        $errors = [];
        if (!is_numeric($data['height']) || $data['height'] <= 0) {
            $errors[] = "Height must be a valid positive number.";
        }

        if (!is_numeric($data['width']) || $data['width'] <= 0) {
            $errors[] = "Width must be a valid positive number.";
        }

        if (!is_numeric($data['length']) || $data['length'] <= 0) {
            $errors[] = "Length must be a valid positive number.";
        }
        return $errors;
    }

}
