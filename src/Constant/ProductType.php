<?php

namespace Constant;

use Model\Book;
use Model\DVD;
use Model\Furniture;

class ProductType
{
    public const PRODUCT_TYPE_DVD = 'DVD';
    public const PRODUCT_TYPE_BOOK = 'Book';
    public const PRODUCT_TYPE_FURNITURE = 'Furniture';

    public const ALL_PRODUCT_TYPES = [
        self::PRODUCT_TYPE_BOOK,
        self::PRODUCT_TYPE_DVD,
        self::PRODUCT_TYPE_FURNITURE
    ];

    public const ALL_PRODUCT_TYPES_NAMESPACE_MAPPING = [
        self::PRODUCT_TYPE_BOOK => Book::class,
        self::PRODUCT_TYPE_DVD => DVD::class,
        self::PRODUCT_TYPE_FURNITURE => Furniture::class,
    ];

}
