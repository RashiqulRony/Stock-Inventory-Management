<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->on('users')->references('id')->onDelete('cascade');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedTinyInteger('vat')->default(0);
            $table->decimal('subtotal_amount', 10, 2)->default(0.00);
            $table->decimal('total_amount', 10, 2)->default(0.00);
            $table->decimal('pay_amount', 10, 2)->default(0.00);
            $table->decimal('return_amount', 10, 2)->default(0.00);
            $table->decimal('point_withdraw', 10, 2)->default(0.00);
            $table->decimal('point_discount_amount', 10, 2)->default(0.00);
            $table->decimal('dew_amount', 10, 2)->default(0.00);
            $table->enum('status', ['Paid', 'Dew', 'Refund', 'Pending'])->default('Pending');
            $table->enum('payment_option', ['Cash', 'Card', 'bKash', 'Nagad', 'Rocket'])->default('Cash');
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
        Schema::dropIfExists('sales');
    }
}
