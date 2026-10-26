<?php
use App\Product;
use Faker\Generator as Faker;
$factory->define(Product::class,function(Faker $faker)
{
    return ['sku'=>$faker->unique()->bothify('SKU-#####'),'name'=>$faker->words(3,true),'price'=>$faker->randomFloat(2,10,3000),'stock'=>$faker->numberBetween(0,100)];
}
);
