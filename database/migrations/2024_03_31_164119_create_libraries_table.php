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
        Schema::create('libraries', function (Blueprint $table) {
            $table->integer('member_id')->unsigned()->primary();
            $table->string('inventory_number', 20);
            $table->date('borrow_date')->nullable();
            $table->date('return_date')->nullable();

            $table->foreign('member_id')->references('id')->on('members');
            $table->foreign('inventory_number')->references('inventory_number')->on('inventory');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libraries');
    }
};
