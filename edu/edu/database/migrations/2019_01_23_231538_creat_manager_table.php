<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatManagerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return 创建表格
     */
    public function up()
    {
        Schema::create('manager',function (Blueprint $table){
           $table->increments('id');
           $table->string('username',20)->notNull();
           $table->string('password')->notNull();
           $table->enum('gender',[1,2,3])->notNull()->default('1');
           $table->string('mobile',11);
           $table->string('email',40);
           $table->tinyInteger('role_id');
           $table->timestamps();//系统自动创建create和update，两个行
           $table->rememberToken();
           $table->enum('status',[1,2])->notNull()->default('2');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return 删除表格
     */
    public function down()
    {
        Schema::dropIfExists('manager');
    }
}
