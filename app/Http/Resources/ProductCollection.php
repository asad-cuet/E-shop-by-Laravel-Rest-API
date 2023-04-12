<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductCollection extends ResourceCollection
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
                    'name' => $data->name,
                    'selling_price' => $data->selling_price,
                    'original_price' => $data->original_price,
                    'image' => asset('assets/uploads/product/'.$data->image),
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
