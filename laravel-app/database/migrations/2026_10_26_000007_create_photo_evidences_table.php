<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreatePhotoEvidencesTable extends Migration 
{
    public function up()
    {
        Schema::create('photo_evidences',function(Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->enum('status',['In Route','Delivered']);
            $table->string('path');
            $table->timestamps();
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        }
        );
    }
    public function down()
    {
        Schema::dropIfExists('photo_evidences');
    }
}
