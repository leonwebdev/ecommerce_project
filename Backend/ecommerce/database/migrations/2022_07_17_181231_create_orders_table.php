<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\SoftDeletes;

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
            $table->integer('user_id');
            $table->decimal('gst');
            $table->decimal('pst');
            $table->decimal('vat');
            $table->decimal('sub_total');
            $table->decimal('shipping_charge');
            $table->decimal('total');
            $table->enum('order_status', [
                "pending",
                "confirmed",
                "delivered",
                "cancelled",
            ]);
            $table->string('shipping_address');
            $table->string('billing_address');
            $table->softDeletes();
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