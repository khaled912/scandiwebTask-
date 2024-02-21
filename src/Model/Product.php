<?php

namespace Model;

abstract class Product
{
    private string $sku;
    private string $name;
    private float $price;
    private string $attribute;

    public function __construct(string $sku, string $name, float $price, string $attribute = '') {
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
        $this->attribute = $attribute;
    }

    abstract function getAttributeName();
    abstract function getAttributeMeasure();
    abstract function getType();

    public function getSkU(): string
    {
        return $this->sku;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getAttribute(): string
    {
        return $this->attribute;
    }

    public function setSku(string $sku)
    {
        $this->sku = $sku;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function setPrice(float $price)
    {
        $this->price = $price;
    }

    public function setAttribute(string $attribute)
    {
        $this->attribute = $attribute;
    }
}
