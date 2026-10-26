<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Order extends Model 
{
    use SoftDeletes;
    protected $fillable=['invoice_number','customer_id','created_by','status','process_name','process_date','notes'];
    protected $dates=['deleted_at','process_date'];
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function creator()
    {
        return $this->belongsTo(User::class,'created_by');
    }
    public function details()
    {
        return $this->hasMany(OrderDetail::class);
    }
    public function photoEvidences()
    {
        return $this->hasMany(PhotoEvidence::class);
    }
}
