<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Card extends Model{

	protected $table = 'fitness_card';

	protected $fillable = ['user_id', 'fitness_center', 'max_visits', 'expire_date'];

	public $dates = ['expire_date'];

	function scopeNotExpired($query) 
	{
		$query->where('expire_date', '>', Carbon::now());
	}

	function scopeWillExpireSoon($query, $days) 
	{
		$query->where('expire_date', '<', Carbon::now()->addDays($days));
	}

	function scopeNotNotified($query) 
	{
		$query->where('notified', 0);
	}


	function user()
	{
		return $this->belongsTo('\App\User');
	}

	function incrementVisits()
	{
		if ($this->times_visited >= $this->max_visits)
			return $this;

		$this->times_visited++;
		return $this;
	}
}