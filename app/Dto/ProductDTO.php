<?php

namespace App\Dto;

readonly class ProductDTO
{
    public function __construct(
        public string $sku,
        public string $name,
        public string $description,
        public string $price,
        public string $category
    ) {}
}
