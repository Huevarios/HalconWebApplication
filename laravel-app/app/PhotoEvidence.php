<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhotoEvidence extends Model
{
    protected $table = 'photo_evidences';

    protected $fillable = [
        'order_id',
        'user_id',
        'status',
        'path'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
