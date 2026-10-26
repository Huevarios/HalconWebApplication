<?php
use App\Order;
use App\Customer;
use Faker\Generator as Faker;
$factory->define(Order::class,function(Faker $faker)
{
    $status=$faker->randomElement(['Ordered','In Process','In Route','Delivered']);
    return ['invoice_number'=>$faker->unique()->bothify('INV-######'),'customer_id'=>Customer::inRandomOrder()->first()->id,'status'=>$status,'process_name'=>$status,'process_date'=>$faker->dateTimeBetween('-30 days','now'),'notes'=>$faker->sentence];
}
);
