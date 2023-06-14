<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('locals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('modality_id');
            $table->unsignedBigInteger('proprietary_id');
            $table->string('name')->unique();
            $table->integer('value_of_hour');
            $table->float('latitude', 8, 5);
            $table->float('longitude', 8, 5);
            $table->string('description')->nullable();
            $table->string('url_image')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('modality_id')->references('id')->on('modalities');
            $table->foreign('proprietary_id')->references('id')->on('users');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('locals');
    }
};
