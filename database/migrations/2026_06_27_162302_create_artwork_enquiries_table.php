<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // ✅ Only create if it does NOT exist
        if (!Schema::hasTable('artwork_enquiries')) {
            Schema::create('artwork_enquiries', function (Blueprint $table) {
                $table->id();
                $table->foreignId('artwork_id')->constrained()->onDelete('cascade');
                $table->string('name');
                $table->string('email');
                $table->string('phone')->nullable();
                $table->text('message');
                $table->boolean('is_read')->default(false);
                $table->timestamps();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('artwork_enquiries');
    }
};