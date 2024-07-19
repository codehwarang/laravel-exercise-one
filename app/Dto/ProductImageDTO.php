<?php

namespace App\Dto;

use App\Models\Product;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

readonly class ProductImageDTO
{
    public string|int $productId;
    public string $url;
    public bool $isThumbnail;

    public function __construct(
        private Product $product,
        UploadedFile $file,
        bool $isThumbnail = false
    ) {
        $this->productId = $product->id;
        $this->isThumbnail = $isThumbnail;
        $this->url = $this->saveImage($file);
    }

    private function saveImage(UploadedFile $file): string
    {
        $specialIdentifier = $this->isThumbnail
            ? '-Thumb.'
            : '-Img-' . str(uniqid())->title() . '.';

        $thumbnailFilename = $this->product->sku . $specialIdentifier . $file->getClientOriginalExtension();
        $savedThumbnailFilename = $file->storeAs(
            'product_images',
            $thumbnailFilename,
            'public'
        );

        return $savedThumbnailFilename;
    }

    public function undoSavedImage(): bool
    {
        return Storage::delete($this->url);
    }
}
