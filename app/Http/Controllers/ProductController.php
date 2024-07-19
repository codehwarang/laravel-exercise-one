<?php

namespace App\Http\Controllers;

use App\Dto\ProductDTO;
use App\Dto\ProductImageDTO;
use App\Http\Requests\CreateProductRequest;
use App\Services\ProductService;
use App\Traits\HasFlash;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    use HasFlash;

    public function create()
    {
        return view('pages.product.create', [
            'title' => 'Add New Product'
        ]);
    }

    public function store(CreateProductRequest $request, ProductService $productService)
    {
        try {
            $data = $request->validated();

            $productDto = new ProductDTO(
                $data['sku'],
                $data['name'],
                $data['description'],
                $data['price'],
                $data['category']
            );

            $product = $productService->createProduct($productDto);

            $thumbnailImageDto = new ProductImageDTO($product, $data['thumbnail_image'], true);
            $additionalImagesDto = [$thumbnailImageDto];

            if ($request->hasFile('additional_images') || !empty($data['additional_images'])) {
                foreach ($data['additional_images'] as $additionalImage) {
                    $additionalImagesDto[] = new ProductImageDTO($product, $additionalImage, false);
                }

                $productService->createProductImages($product, $additionalImagesDto);
            }

            Log::channel('custom')->info('New product has been added', [
                'sku' => $product->sku
            ]);

            return to_route('dashboard.main.index')
                ->with($this->flashMessage("New product has been added ({$product->sku})", 'success'));
        } catch (\Exception $e) {
            Log::channel('custom')->error('Something went wrong', [
                'message' => $e->getMessage(),
                'error' => $e
            ]);

            return to_route('dashboard.main.index')
                ->with($this->flashMessage('Something went wrong! Your product is not being added.', 'warning'));
        }
    }
}
