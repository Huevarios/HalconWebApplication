<?php
namespace App;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class User extends Authenticatable 
{
    use Notifiable;
    protected $fillable=['name','email','password','role_id','is_active'];
    protected $hidden=['password','remember_token'];
    protected $casts=['email_verified_at'=>'datetime','is_active'=>'boolean'];
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function orders()
    {
        return $this->hasMany(Order::class,'created_by');
    }
}
