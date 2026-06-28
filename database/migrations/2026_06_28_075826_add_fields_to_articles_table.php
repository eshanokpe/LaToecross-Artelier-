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
        Schema::table('articles', function (Blueprint $table) {
            // Add missing fields if they don't exist
            if (!Schema::hasColumn('articles', 'excerpt')) {
                $table->text('excerpt')->nullable()->after('slug');
            }
            
            if (!Schema::hasColumn('articles', 'content')) {
                $table->longText('content')->after('excerpt');
            }
            
            if (!Schema::hasColumn('articles', 'image')) {
                $table->string('image')->nullable()->after('content');
            }
            
            if (!Schema::hasColumn('articles', 'category')) {
                $table->string('category')->nullable()->after('image');
            }
            
            if (!Schema::hasColumn('articles', 'author')) {
                $table->string('author')->default('Latocross Artelier')->after('category');
            }
            
            if (!Schema::hasColumn('articles', 'views')) {
                $table->integer('views')->default(0)->after('is_published');
            }
            
            if (!Schema::hasColumn('articles', 'comments_count')) {
                $table->integer('comments_count')->default(0)->after('views');
            }
        });

        // Add indexes after columns are added
        Schema::table('articles', function (Blueprint $table) {
            // Only add indexes if they don't exist
            $table->index('category');
            $table->index('author');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            // Drop columns
            $columns = ['excerpt', 'content', 'image', 'category', 'author', 'views', 'comments_count'];
            foreach ($columns as $column) {
                if (Schema::hasColumn('articles', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
        
        // Drop indexes
        Schema::table('articles', function (Blueprint $table) {
            $table->dropIndex(['category']);
            $table->dropIndex(['author']);
        });
    }
};