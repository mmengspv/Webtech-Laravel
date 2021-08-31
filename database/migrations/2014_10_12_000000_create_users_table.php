<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // (nameming convention)
        // table name -> plural
        Schema::create('users', function (Blueprint $table) {
            $table->id();   //primary key -> auto increment -> no compound key -> 'id'
            $table->string('name'); //varchar(255)
            $table->string('email')->unique();  //unique key
            $table->timestamp('email_verified_at')->nullable(); //date time and can null
            $table->string('password'); // varchar(60)
            $table->rememberToken();
            $table->timestamps();   //created_at, updated_at
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
