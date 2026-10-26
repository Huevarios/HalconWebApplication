<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Customer extends Model 
{
    protected $fillable=['name','email','phone','customer_number'];
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
