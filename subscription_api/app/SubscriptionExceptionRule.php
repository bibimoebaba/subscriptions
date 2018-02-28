<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubscriptionExceptionRule extends Model {
	use SoftDeletes;

	protected $table = 'subscription_rules';
	protected $fillable = [
		'account_id', 'subscription_id', 'product_id', 'price', 'quantity', 'time_period', 'priority'
	];
}