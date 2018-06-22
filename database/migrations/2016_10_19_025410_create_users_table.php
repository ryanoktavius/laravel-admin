<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('users', function (Blueprint $table) {
          $table->increments('id');
          $table->string('username', 30)->unique();
          $table->string('password');
          $table->string('email')->unique();
          $table->string('name');
          $table->string('navbar_auth')->comment('Set authenticate navigation bar for user , format [mainmenu] - [submenu] | [mainmenu] - [submenu], ex 1-1|1-2|2-1');
          $table->tinyInteger('role')->default(0)->comment('0 = user ; 1 = admin')->index();
          $table->tinyInteger('status')->default(1)->comment('0 = not active ; 1 = active')->index();
          $table->rememberToken();
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
      Schema::drop('users');
    }
}
