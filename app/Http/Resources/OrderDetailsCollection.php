<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class OrderDetailsCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection->map(function($data) {
                return [
                    'id' => $data->id,
                    'product_image' => asset('assets/uploads/product/'.$data->product->image),
                    'product_name' => $data->product->name,
                    'product_quantity' => $data->qty,
                    'product_price' => $data->price,

                ];
            })
        ];
    }

    public function with($request)
    {
        return [
            'success' => true
        ];
    }
}
