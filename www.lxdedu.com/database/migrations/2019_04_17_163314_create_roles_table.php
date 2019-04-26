<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('role_name',100)->default('')->comment('角色名称');
            $table->string('auths',500)->default('')->comment('角色权限，用逗号隔开');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('role_permission', function (Blueprint $table) {
            $table->unsignedInteger('rid')->default(0)->comment('角色id');
            $table->unsignedInteger('pid')->default(0)->comment('权限id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
        Schema::dropIfExists('role_permission');
    }
}
