<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function create()
    {
        return view('pages.product.create', [
            'title' => 'Add New Product'
        ]);
    }

    public function store(CreateProductRequest $request)
    {
        try {
            $data = $request->validated();

            $product = new Product([
                'sku' => $data['sku'],
                'name' => $data['name'],
                'description' => $data['description'],
                'price' => $data['price'],
                'category' => $data['category']
            ]);

            if ($product->save()) {
                $thumbnailFilename = $data['sku'] . '-Thumb.' . $data['thumbnail_image']->getClientOriginalExtension();
                $savedThumbnailFilename = $data['thumbnail_image']->storeAs(
                    'product_images',
                    $thumbnailFilename,
                    'public'
                );

                (new ProductImage([
                    'product_id' => $product->id,
                    'url' => $savedThumbnailFilename,
                    'is_thumbnail' => true
                ]))->save();

                if ($request->hasFile('additional_images')) {
                    foreach ($data['additional_images'] as $key => $image) {
                        $filename = $data['sku'] . '-Img-' . ($key + 1) . '.' . $image->getClientOriginalExtension();
                        $savedFilename = $image->storeAs(
                            'product_images',
                            $filename,
                            'public'
                        );

                        (new ProductImage([
                            'product_id' => $product->id,
                            'url' => $savedFilename,
                            'is_thumbnail' => false
                        ]))->save();
                    }
                }
            }

            Log::channel('custom')->info('New product has been added', [
                'sku' => $product->sku
            ]);

            return to_route('dashboard.main.index')
                ->with([
                    'message' => "New product has been added ({$product->sku})",
                    'message_type' => 'success'
                ]);
        } catch (\Exception $e) {
            Log::channel('custom')->error('Something went wrong', [
                'message' => $e->getMessage(),
                'error' => $e
            ]);

            return to_route('dashboard.main.index')
                ->with([
                    'message' => 'Something went wrong! Your product is not being added.',
                    'message_type' => 'warning'
                ]);
        }
    }
}
