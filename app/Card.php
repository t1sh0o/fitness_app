<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Card extends Model{

	protected $table = 'fitness_card';

	protected $fillable = ['user_id', 'fitness_center', 'max_visits', 'expire_date'];

	function scopeNotExpired($query) {
		$query->where('expire_date', '>', Carbon::now());
	}

	function user()
	{
		return $this->hasOne('\App\User');
	}

	function incrementVisits()
	{
		if ($this->times_visited >= $this->max_visits)
			return $this;

		$this->times_visited++;
		return $this;
	}
}