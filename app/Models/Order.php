<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table='orders';
    protected $fillable=['user_id','fname','lname','email','phone','address1','address2','city','state','country','pincode','totoal_price','status','payment_mode','payment_id','message','tracking_no'];

    public function orderItem()  //making relationship
    {
         return $this->hasMany(OrderItem::class);
    }
}
