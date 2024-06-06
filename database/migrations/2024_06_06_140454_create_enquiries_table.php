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
        Schema::create('enquiries', function (Blueprint $table) {
            $table->id('enq_id');
            $table->string('customer_name');
            $table->string('nationality');
            $table->string('program_interested');
            $table->string('entry_semester');
            $table->string('current_education');
            $table->string('school_name');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('direct_message')->nullable();
            $table->string('where_did_you_hear')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enquiries');
    }
};
