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
            $table->increments('id')->unsigned();
            $table->string('username', 20)->unique()->index();
            $table->string('email', 50)->unique()->index();
            $table->string('password');
            $table->string('slug', 20)->unique();
            $table->integer('comment_count')->unsigned()->default(0);
            $table->integer('article_count')->unsigned()->default(0);
            $table->rememberToken();
            $table->ipAddress('register_ip');
            $table->ipAddress('last_login_ip');
            $table->dateTime('last_login')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('users');
    }
}
