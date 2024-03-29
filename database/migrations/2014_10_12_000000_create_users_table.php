<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('age')->default('n/a');
            $table->enum('gender', ['male', 'female', 'other', 'n/a'])->default('n/a');
            $table->string('weight')->default('n/a');
            $table->string('height')->default('n/a');
            $table->string('strongPoints')->default('n/a');
            $table->string('weakPoints')->default('n/a');
            $table->string('pfp', 255)->default('n/a');;
            $table->integer('role')->default('0');
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
        Schema::dropIfExists('users');
    }
};
