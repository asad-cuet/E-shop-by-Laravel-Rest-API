<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $table='order_items';
    protected $fillable=['order_id','prod_id','price','qty'];


    public function product()  //making relationship
    {
         return $this->belongsTo(Product::class,'prod_id','id');
    }    
}
