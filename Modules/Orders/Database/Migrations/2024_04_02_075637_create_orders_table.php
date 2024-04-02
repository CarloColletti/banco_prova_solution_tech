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
            $table->string('name');
            $table->text('note');
            $table->foreignId('creator_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreignId('customer_id')->references('id')->on('users')->cascadeOnDelete();
            $table->decimal('discount', 4, 2);
            $table->string('discount_type');
            $table->string('status');
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
