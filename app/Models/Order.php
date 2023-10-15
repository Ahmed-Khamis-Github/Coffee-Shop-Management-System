<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id' , 'user_name'  , 'user_address' , 'mobile_number' , 'payment_method' , 'order_status' , 'total'
    ] ;

    public function user()
    {
        return $this->belongsTo(User::class) ;
    }


    public function products()
    {
        return $this->belongsToMany(Product::class) ;
    }
}
