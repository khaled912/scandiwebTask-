<?php

namespace Model;

use Constant\ProductType;

class DVD extends Product {

    protected float $size;

    public function __construct(string $sku, string $name, float $price, string $size = '') {
        parent::__construct($sku, $name, $price, $size);
    }

    function getAttributeName(): string
    {
        return "Size";
    }

    function getAttributeMeasure(): string
    {
        return "MB";
    }

    public function setSize(float $size): void
    {
        $this->size = $size;
        $this->setAttribute((string)$size);
    }

    function getType(): string
    {
        return ProductType::PRODUCT_TYPE_DVD;
    }
}
