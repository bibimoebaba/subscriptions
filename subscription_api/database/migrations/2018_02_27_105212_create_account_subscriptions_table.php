<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_subscriptions', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('account_id')->unsigned();
            // $table->foreign('account_id')
            //         ->references('id')      HOW DO WE GET ACCOUNTS TO THIS TABLE?
            //         ->on('account');
            $table->integer('subscription_id')->unsigned();
            $table->foreign('subscription_id')
                    ->references('id')
                    ->on('subscriptions');
            $table->string('origin_name');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('account_subscriptions');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
