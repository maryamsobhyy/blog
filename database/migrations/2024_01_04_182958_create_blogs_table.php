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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id(); // العمود الخاص بالمفتاح الرئيسي
            $table->string('title');
            $table->string('image');
            $table->text('content');
            $table->unsignedBigInteger('user_id'); // ربط الكاتب بجدول آخر
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps(); // العمودان created_at و updated_at لتسجيل الوقت
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
