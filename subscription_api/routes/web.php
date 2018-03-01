<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

/**
 *	CRUD actions for subscriptions
 */
$router->get('subscriptions', 'SubscriptionController@index');
$router->get('subscriptions/{id}', 'SubscriptionController@show');
$router->post('subscriptions', 'SubscriptionController@store');
$router->put('subscriptions/{id}', 'SubscriptionController@update');
$router->delete('subscriptions/{id}', 'SubscriptionController@delete');

/**
 * 	CRUD actions for products
 */
$router->get('products', 'ProductController@index');
$router->get('products/{id}', 'ProductController@show');
$router->post('products', 'ProductController@store');
$router->put('products/{id}', 'ProductController@update');
$router->delete('products/{id}', 'ProductController@delete');

/**
 * 	CRUD actions for subscription rules
 */
$router->get('rules', 'SubscriptionRuleController@index');
$router->get('rules/{id}', 'SubscriptionRuleController@show');
$router->post('rules','SubscriptionRuleController@store');
$router->put('rules/{id}', 'SubscriptionRuleController@update');
$router->delete('rules/{id}', 'SubscriptionRuleController@delete');

/**
 * 	CRUD actions for exception rules
 */
$router->get('exceptions', 'SubscriptionExceptionRuleController@index');
$router->get('exceptions/{id}', 'SubscriptionExceptionRuleController@show');
$router->post('exceptions','SubscriptionExceptionRuleController@store');
$router->put('exceptions/{id}', 'SubscriptionExceptionRuleController@update');
$router->delete('exceptions/{id}', 'SubscriptionExceptionRuleController@delete');

/**
 * 	CRUD actions for account subscriptions
 */
$router->get('account/subscriptions', 'AccountSubscriptionController@index');
$router->get('account/subscriptions/{id}', 'AccountSubscriptionController@show');
$router->post('account/subscriptions','AccountSubscriptionController@store');
$router->put('account/subscriptions/{id}', 'AccountSubscriptionController@update');
$router->delete('account/subscriptions/{id}', 'AccountSubscriptionController@delete');