<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class OrderProduct extends Pivot
{
    use HasFactory;
    protected $table = 'order_product';
    public $timestamps= false ;

    protected $fillable= [
        'order_id', 'product_id' ,'product_name' ,'price' , 'quantity'
    ] ;

    public function products()
    {
        return $this->hasMany(Product::class)->withDefault([
            'name' => $this->product_name
        ]);
    }


    public function order()
    {
        return $this->belongsTo(Order::class);
    }

}
