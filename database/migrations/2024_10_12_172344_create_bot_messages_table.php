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
        Schema::create('bot_messages', function (Blueprint $table) {
            $table->bigInteger('id');
            $table->bigInteger('chat_id');
            $table->bigInteger('user_id');
            $table->timestamp('date')->nullable();
            $table->mediumText('text');
            $table->mediumText('entities')->nullable();
            $table->timestamps();

            $table->foreign('chat_id')->references('id')->on('bot_chats')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('bot_users')->onDelete('cascade');

            $table->primary('id');
            $table->index('chat_id');
            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bot_messages');
    }
};
