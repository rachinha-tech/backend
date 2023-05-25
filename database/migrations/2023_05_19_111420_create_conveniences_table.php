<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('conveniences', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('local_id');
            $table->string('name')->unique();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('conveniences');
    }
};
