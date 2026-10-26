<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Product extends Model 
{
    protected $fillable=['name','sku','price','stock'];
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
