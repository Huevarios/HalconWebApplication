<?php
use Illuminate\Database\Seeder;
use App\Role;
use App\User;
use App\Customer;
use App\Product;
use App\Order;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder 
{
    public function run()
    {
        foreach(['Administrator','Sales','Warehouse','Purchasing','Route'] as $name)
        {
            Role::firstOrCreate(['name'=>$name]);
        }
        $admin=User::firstOrCreate(['email'=>'admin@halcon.test'],['name'=>'Halcon Admin','password'=>Hash::make('password123'),'role_id'=>Role::where('name','Administrator')->first()->id,'is_active'=>true]);
        factory(App\User::class,8)->create()->each(function($u)
        {
            $u->role_id=Role::inRandomOrder()->first()->id;
            $u->save();
        }
        );
        factory(App\Customer::class,12)->create();
        factory(App\Product::class,12)->create();
        factory(App\Order::class,25)->create(['created_by'=>$admin->id]);
    }
}
