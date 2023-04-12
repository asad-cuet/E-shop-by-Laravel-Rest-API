<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class OrderCollection extends ResourceCollection
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
                    'fname' => $data->fname,
                    'lanme' => $data->lanme,
                    'email' => $data->email,
                    'phone' => $data->phone,
                    'address1' => $data->address1,
                    'address2' => $data->address2,
                    'city' => $data->city,
                    'state' => $data->state,
                    'country' => $data->country,
                    'pincode' => $data->pincode,
                    'total_price' => $data->total_price,
                    'status' => $data->status,
                    'total_price' => $data->total_price,
                    'created_at' => date('d-m-Y',strtotime($data->created_at)),
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
