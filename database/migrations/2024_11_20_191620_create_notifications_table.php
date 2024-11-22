<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('type');
            $table->text('message')->nullable();
            $table->json('data');
            $table->unsignedBigInteger('product_id')->constrained()->onDelete('cascade')->nullable();
            $table->timestamp('read_at')->nullable();
            $table->morphs('notifiable');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
