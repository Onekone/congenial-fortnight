<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up() : void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('display_name');
            $table->string('external_driver')->nullable()->default(null);
            $table->string('external_id')->nullable()->default(null);
            $table->string('external_access_token')->nullable()->default(null);
            $table->string('external_refresh_token')->nullable()->default(null);
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('users');
    }
};
