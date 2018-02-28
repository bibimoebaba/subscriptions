<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubscriptionRule extends Model {
	use SoftDeletes;

	protected $table = 'subscription_rules';
	protected $fillable = ['subscription_id','product_id','price', 'quantity', 'time_period', 'priority'];
}