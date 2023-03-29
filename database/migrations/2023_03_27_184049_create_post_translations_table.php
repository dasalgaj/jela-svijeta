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
        Schema::create('post_translations', function (Blueprint $table) {
            $table->id();
            $table->string('locale')->index();

            $table->string('title');
            $table->string('ingredients');
            $table->string('category');
            $table->string('tags');
            $table->string('status');

            $table->foreignId('post_id')->unsigned();
            $table->unique(['post_id', 'locale']);
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_translations');
    }
};
