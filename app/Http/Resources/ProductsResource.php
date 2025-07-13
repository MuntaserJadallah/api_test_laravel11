<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductsResource extends JsonResource
{
    public function toArray(Request $request): array
    {
       return[
        'product #'           => $this->id,
        'product-name'        => $this->name,
        'product-description' => $this->description,
        'product-price'       => $this->price,
        'product-created_at'  => $this->created_at,
       ];
    }
}
