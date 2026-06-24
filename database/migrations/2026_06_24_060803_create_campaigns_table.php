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
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            $table->string('title');
            $table->text('description');
            $table->string('cover_image')->nullable();

            $table->decimal('target_amount', 14, 2);
            $table->decimal('current_amount', 14, 2)->default(0);

            $table->integer('donor_count')->default(0);

            $table->string('category');
            $table->enum('status', ['draft', 'active', 'completed', 'cancelled'])->default('active');

            $table->timestamp('deadline_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaigns');
    }
};
