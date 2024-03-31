<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->string('zip_code');
            $table->string('name');
            $table->string('street');
            $table->string('house_number');
            $table->string('email');
            $table->string('phone_number')->nullable();
            $table->smallInteger('member_type_id');
            $table->timestamps();

            $table->foreign('zip_code')->references('zip_code')->on('cities');
            $table->foreign('member_type_id')->references('id')->on('member_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
