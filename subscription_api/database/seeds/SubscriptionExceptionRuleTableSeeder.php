<?php

use Illuminate\Database\Seeder;

class SubscriptionExceptionRuleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\SubscriptionExceptionRule::class, 15)->create();
    }
}
