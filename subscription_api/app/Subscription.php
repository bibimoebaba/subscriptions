<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscription extends Model {
	use SoftDeletes;
	
	protected $table = 'subscriptions';
	protected $fillable = ['name', 'description', 'origin_name'];
}