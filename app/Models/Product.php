<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable =[
        'name','price','image','slug','quantity','category_id'
    ] ;
    public function category(){
        return $this->belongsTo(Category::class);
    }


    public function orders()
    {
        return $this->belongsToMany(Order::class) ;
    }
}
