<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model{


	protected $table = 'fitness_card';

	protected $fillable = ['user_id', 'fitness_center', 'max_visits', 'expire_date'];
}