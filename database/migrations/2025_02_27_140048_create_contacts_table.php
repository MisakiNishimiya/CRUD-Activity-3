<?php
// Step 1: Create the migration file
// Run command: php artisan make:migration create_contacts_table

// database/migrations/yyyy_mm_dd_create_contacts_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->date('birthdate');
            $table->string('workphone')->nullable();
            $table->string('homephone')->nullable();
            $table->string('email')->unique();
            $table->unsignedBigInteger('created_by_id');
            $table->timestamp('created_date');
            $table->foreign('created_by_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};