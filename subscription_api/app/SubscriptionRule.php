<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubscriptionRule extends Model {
	use SoftDeletes;

	protected $table = 'subscription_rules';
	protected $filalble = ['price', 'quantity', 'date', 'priority'];
}