<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
        	SubscriptionTableSeeder::class,
        	ProductTableSeeder::class,
        	SubscriptionRuleTableSeeder::class,
            SubscriptionExceptionRuleTableSeeder::class,
            AccountSubscriptionTableSeeder::class
        ]);
    }
}
