<?php

use Illuminate\Database\Seeder;

class AccountSubscriptionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\AccountSubscription::class, 15)->create();
    }
}
