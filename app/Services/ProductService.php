<?php

namespace App\Services;

use App\Dto\ProductDTO;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProductService
{
    public function createProduct(ProductDTO $product)
    {
        try {
            $newProduct = new Product();

            $newProduct->sku = $product->sku;
            $newProduct->name = $product->name;
            $newProduct->description = $product->description;
            $newProduct->price = $product->price;
            $newProduct->category = $product->category;

            if ($newProduct->save()) {
                Log::channel('custom')->info('New product has been created', [
                    'sku' => $product->sku
                ]);

                return $newProduct;
            }

            throw new \Exception('Failed to create new product!');
        } catch (\Exception $e) {
            Log::channel('custom')->error($e->getMessage(), [
                'context' => 'create-product'
            ]);

            throw new \Exception();
        }
    }

    public function createProductImages(Product $product, array $images)
    {
        try {
            $trx = [];

            foreach ($images as $image) {
                $newProductImage = new ProductImage();

                $newProductImage->product_id = $product->id;
                $newProductImage->url = $image->url;
                $newProductImage->is_thumbnail = $image->isThumbnail;

                $trx[] = $newProductImage;
            }

            DB::transaction(function () use ($trx) {
                foreach ($trx as $tx) {
                    $tx->save();
                }
            });

            Log::channel('custom')->info('Product images uploaded successfully', [
                'context' => 'create-product-images',
                'filenames' => array_map(function ($tx) {
                    return $tx->url;
                }, $trx)
            ]);

            return $trx;
        } catch (\Exception $e) {
            foreach ($images as $image) {
                $image->undoSavedImage();
            }

            Log::channel('custom')->error($e->getMessage(), [
                'context' => 'create-product-images'
            ]);

            throw new \Exception();
        }
    }
}
