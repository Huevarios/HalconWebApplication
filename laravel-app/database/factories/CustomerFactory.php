<?php
use App\Customer;
use Faker\Generator as Faker;
$factory->define(Customer::class,function(Faker $faker)
{
    return ['customer_number'=>$faker->unique()->bothify('CUST-#####'),'name'=>$faker->name,'email'=>$faker->safeEmail,'phone'=>$faker->phoneNumber];
}
);
