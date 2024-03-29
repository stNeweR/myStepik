<<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();

            $table->string("title");
            $table->text("description");
            $table->text("body");
            $table->foreignId("user_id")->constrained()->onDelete("cascade");
            $table->integer("price")->nullable();
            $table->boolean("is_published");

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
