<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Carbon\Carbon;

class CreateCardRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'fitness_center' => 'required|min:3',
			'max_visits' => 'required|integer',
			'expire_date' => 'required|date|after:' . Carbon::now()
		];
	}

}
