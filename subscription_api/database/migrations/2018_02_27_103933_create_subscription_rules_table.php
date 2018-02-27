<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriptionRulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscription_rules', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('subscription_id')->unsigned();
            $table->foreign('subscription_id')
                    ->references('id')
                    ->on('subscriptions');
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')
                    ->references('id')
                    ->on('products');
            $table->decimal('price');
            $table->integer('quantity')->unsigned();
            $table->date('time_period');
            $table->integer('priority')->unsigned();
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
        Schema::dropIfExists('subscription_rules');
    }
}
