<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateOrdersTable extends Migration 
{
    public function up()
    {
        Schema::create('orders',function(Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->string('invoice_number')->unique();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->enum('status',['Ordered','In Process','In Route','Delivered'])->default('Ordered');
            $table->string('process_name')->nullable();
            $table->dateTime('process_date')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
        }
        );
    }
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
