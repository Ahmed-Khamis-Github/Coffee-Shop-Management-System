<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class OrderProduct extends Model
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

}
