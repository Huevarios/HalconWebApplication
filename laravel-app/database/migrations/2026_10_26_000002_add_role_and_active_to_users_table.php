<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class AddRoleAndActiveToUsersTable extends Migration 
{
    public function up()
    {
        Schema::table('users',function(Blueprint $table)
        {
            $table->unsignedBigInteger('role_id')->nullable();
            $table->boolean('is_active')->default(true);
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('set null');
        }
        );
    }
    public function down()
    {
        Schema::table('users',function(Blueprint $table)
        {
            $table->dropForeign(['role_id']);
            $table->dropColumn(['role_id','is_active']);
        }
        );
    }
}
