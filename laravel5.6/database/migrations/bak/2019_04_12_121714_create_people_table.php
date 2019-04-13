<?php
/**
 * 备注表名
 */
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *  创建的时候用的方法
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100)->default('')->comment('姓名');
            $table->unsignedInteger('uid')->default(0)->comment('用户id')->unique();
            $table->text('jieshao')->comment('用户简介');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *  回滚时创建的方法
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people');
    }
}
