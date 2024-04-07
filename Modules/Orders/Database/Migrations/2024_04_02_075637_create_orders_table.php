<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->text('note')->nullable();
            $table->foreignId('customer_id')->references('id')->on('users')->cascadeOnDelete();
            $table->decimal('discount', 4, 2);
            $table->string('discount_type')->nullable();
            $table->string('status')->nullable();
            $table->decimal('total_amount', 8, 2);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
