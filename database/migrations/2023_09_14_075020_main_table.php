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
        Schema::create('dash_table', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('badge')->unique();
            $table->string('area');
            $table->string('supervisor');
            $table->integer('pts')->nullable();
            $table->date('trans_date')->nullable();
            $table->string('trans_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
