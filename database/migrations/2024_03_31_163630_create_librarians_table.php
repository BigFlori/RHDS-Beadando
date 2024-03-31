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
        Schema::create('librarians', function (Blueprint $table) {
            $table->increments('librarian_id');
            $table->string('username')->unique();
            $table->string('password');
        });

        // Példa adat hozzáadása (Hashed password)
        DB::table('librarians')->insert([
            'username' => 'admin',
            'password' => Hash::make('default_password'),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('librarians');
    }
};
