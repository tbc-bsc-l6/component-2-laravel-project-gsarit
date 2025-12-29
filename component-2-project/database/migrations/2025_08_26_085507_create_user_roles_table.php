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
        Schema::create('user_roles', function (Blueprint $table) {
            $table->enum('role', ['admin','teacher','student'])->default('student')->after('password');
            $table->boolean('active')->default(true)->after('role');
        });
    }

           // $table->id();
           // $table->string('role')->unique();
         //   $table->timestamps();
        
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['role','active']);
        });

       // Schema::dropIfExists('user_roles');
    }
};
