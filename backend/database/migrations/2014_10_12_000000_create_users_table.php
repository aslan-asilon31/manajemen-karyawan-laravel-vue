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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('department_id')->nullable();
            $table->string('role_id')->nullable();
            $table->string('file_id1')->nullable();
            $table->string('file_id2')->nullable();
            $table->string('file_id3')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('image', 2048)->nullable();
            $table->date('date_birth')->nullable();
            $table->string('place_birth')->nullable();
            $table->string('department')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('desc')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
