<?php

namespace Model;

use Constant\ProductType;

class Book extends Product
{
    protected float $weight;

    public function __construct(string $sku, string $name, float $price, string $weight = '')
    {
        parent::__construct($sku, $name, $price, $weight);
    }

    function getAttributeName(): string
    {
        return "Weight";
    }

    function getAttributeMeasure(): string
    {
        return "Kg";
    }

    public function setWeight(float $weight): void
    {
        $this->weight = $weight;
        $this->setAttribute((string)$weight);
    }

    function getType(): string
    {
        return ProductType::PRODUCT_TYPE_BOOK;
    }
}
