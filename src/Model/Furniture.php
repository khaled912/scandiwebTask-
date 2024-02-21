<?php

namespace Model;

use Constant\ProductType;

class Furniture extends Product
{
    private float $height;
    private float $width;
    private float $length;

    public function __construct(
        string $sku,
        string $name,
        string $price,
        string $dimension = ''
    )
    {
        parent::__construct($sku, $name, $price, $dimension);
        $values = explode("*", $dimension);

        $this->height = empty($values[0]) ? 0 : $values[0];
        $this->width = empty($values[1]) ? 0 : $values[1];
        $this->length = empty($values[2]) ? 0 : $values[2];
    }

    function getAttributeName(): string
    {
        return "Dimensions";
    }

    function getAttributeMeasure(): string
    {
        return "";
    }

    public function setHeight(float $height): void
    {
        $this->height = $height;
        $this->setAttribute($this->formatDimensions($height, $this->width, $this->length));
    }

    public function setWidth(float $width): void
    {
        $this->width = $width;
        $this->setAttribute($this->formatDimensions($this->height, $width, $this->length));
    }

    public function setLength(float $length): void
    {
        $this->length = $length;
        $this->setAttribute($this->formatDimensions($this->height, $this->width, $length));
    }

    private function formatDimensions($height, $width, $length): string
    {
        return sprintf("%s * %s * %s", $height, $width, $length);
    }

    function getType(): string
    {
        return ProductType::PRODUCT_TYPE_FURNITURE;
    }
}
