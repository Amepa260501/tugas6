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
            $table->id(id);
            $table->char(name);
            $table->char(alamat);
            $table->char(telepon);
            $table->enum('admin', 'operator', 'gudang');
            $table->char(email);
            $table->timestamps(email_verified_at);
            $table->char(password);
            $table->char(remember_token);
            $table->timestamps(created_at);
            $table->timestamps(updated_at);
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
