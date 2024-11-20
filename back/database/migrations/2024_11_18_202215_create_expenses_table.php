<?php

use App\Enums\ExpenseCategoryEnum;
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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references(columns: 'id')->on('users')->onDelete('cascade');
            $table->decimal('amount', 10, 2);
            $table->string('category')->default(ExpenseCategoryEnum::OTHERS->value);
            $table->date('date');
            $table->text('description')->nullable();
            $table->timestamps();
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
