<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AccountSubscription extends Model {
	use SoftDeletes;

	protected $table = 'account_subscriptions';
	protected $fillable = [
		'account_id', 'subscription_id', 'start_date', 'origin_name'
	];
}