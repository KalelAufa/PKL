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
        Schema::table('news', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->nullable()->change();
            $table->unsignedBigInteger('author_id')->nullable()->change();

            $table->foreign('category_id')->references('id')->on('categories')->nullOnDelete();
            $table->foreign('author_id')->references('id')->on('users')->nullOnDelete();

            $table->index(['status', 'published_at']);
            $table->index('is_featured');
        });
    }

    public function down(): void
    {
        Schema::table('news', function (Blueprint $table) {
            $table->dropIndex(['status', 'published_at']);
            $table->dropIndex(['is_featured']);
            $table->dropForeign(['category_id']);
            $table->dropForeign(['author_id']);

            $table->unsignedBigInteger('category_id')->nullable(false)->change();
            $table->unsignedBigInteger('author_id')->nullable(false)->change();
        });
    }
};
