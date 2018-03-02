<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

use \App\Subscription;
use \App\Product;

$factory->define(App\Subscription::class, function(Faker\Generator $faker){
	return [
		'name' 			=> $faker->sentence(3),
    	'description' 	=> $faker->text(),
    	'origin_name'	=> $faker->name(),
    	'created_at'	=> $faker->dateTimeBetween($startDate = '-5 months', $endDate = 'now'),
    	'updated_at'	=> $faker->dateTimeBetween($startDate = '-5 months', $endDate = 'now')
	];
});

$factory->define(App\Product::class, function(Faker\Generator $faker){
	return [
		'name' 			=> $faker->sentence(1),
		'description' 	=> $faker->text(30),
		'created_at'	=> $faker->dateTimeBetween($startDate = '-5 months', $endDate = 'now'),
    	'updated_at'	=> $faker->dateTimeBetween($startDate = '-5 months', $endDate = 'now')
	];
});

$factory->define(App\SubscriptionRule::class, function(Faker\Generator $faker){
	return [
		'subscription_id'	=> Subscription::all()->random()->id,
		'product_id'		=> Product::all()->random()->id,
		'price' 			=> $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 500),
		'quantity' 			=> $faker->randomFloat(),
		'time_period' 		=> $faker->randomElement(['month', 'quarter', 'year']),
		'priority' 			=> $faker->randomElement([1, 2, 3, 4, 5]),
    	'created_at'		=> $faker->dateTimeBetween($startDate = '-5 months', $endDate = 'now'),
    	'updated_at'		=> $faker->dateTimeBetween($startDate = '-5 months', $endDate = 'now')
	];
});

$factory->define(App\SubscriptionExceptionRule::class, function(Faker\Generator $faker){
	return [
		'account_id'		=> $faker->randomDigit(1, 500),
		'subscription_id'	=> Subscription::all()->random()->id,
		'product_id'		=> Product::all()->random()->id,
		'price' 			=> $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 500),
		'quantity' 			=> $faker->randomFloat(),
		'time_period' 		=> $faker->randomElement(['month', 'quarter', 'year']),
		'priority' 			=> $faker->randomElement([1, 2, 3, 4, 5]),
    	'created_at'		=> $faker->dateTimeBetween($startDate = '-5 months', $endDate = 'now'),
    	'updated_at'		=> $faker->dateTimeBetween($startDate = '-5 months', $endDate = 'now')
	];
});

$factory->define(App\AccountSubscription::class, function(Faker\Generator $faker){
	return [
		'account_id' 		=> $faker->randomDigit(1, 500),
		'subscription_id' 	=> Subscription::all()->random()->id,
		'origin_name'		=> $faker->name(),
		'created_at'		=> $faker->dateTimeBetween($startDate = '-5 months', $endDate = 'now'),
    	'updated_at'		=> $faker->dateTimeBetween($startDate = '-5 months', $endDate = 'now')
	];
});



















