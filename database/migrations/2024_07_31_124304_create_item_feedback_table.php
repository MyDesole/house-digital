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
        Schema::create('item_feedback', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Item::class, 'item_id');
            $table->string('header');
            $table->text('body');
            $table->integer('score');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_feedback');
    }
};
