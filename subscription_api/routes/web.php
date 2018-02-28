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


//Subscriptions CRUD
$router->get('subscriptions', 'SubscriptionController@index');
$router->get('subscriptions/{id}', 'SubscriptionController@show');
$router->post('subscriptions', 'SubscriptionController@store');
$router->put('subscriptions/{id}', 'SubscriptionController@update');
$router->delete('subscriptions/{id}', 'SubscriptionController@delete');

//Products CRUD
$router->get('products', 'ProductController@index');
$router->get('products/{id}', 'ProductController@show');
$router->post('products', 'ProductController@store');
$router->put('products/{id}', 'ProductController@update');
$router->delete('products/{id}', 'ProductController@delete');

//Subscription_rules CRUD