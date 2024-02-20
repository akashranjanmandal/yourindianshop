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
        Schema::table('users', function (Blueprint $table) {
            $table->string('fname');
            $table->string('lname');
            $table->string('contact');
            $table->string('rcode')->nullable();
            $table->string('address')->nullable();
            $table->string('plan');
            $table->boolean('verified')->default(false);
            $table->string('verification_token')->nullable();



            // Add other fields as needed
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['fname', 'lname', 'contact', 'rcode' ,'address']);
            // Drop other columns added in the up method
        });
    }
};
