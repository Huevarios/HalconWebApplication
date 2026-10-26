<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateCustomersTable extends Migration 
{
    public function up()
    {
        Schema::create('customers',function(Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->string('customer_number')->unique();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone',30)->nullable();
            $table->timestamps();
        }
        );
    }
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
