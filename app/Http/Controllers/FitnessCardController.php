<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Card;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class FitnessCardController extends Controller {

	public $card;

	public function __construct(Card $card)
	{
		$this->card = $card;
		$this->middleware('auth');
	}

	public function index()
	{
		$cards = Auth::user()->cards()->notExpired()->get();

		return view('cards', compact('cards'));
	}

	public function store(Requests\CreateCardRequest $request)
	{
		$this->card->fill($request->only(['fitness_center', 'max_visits', 'expire_date']));
		$this->card->user_id = Auth::user()->id;
		$this->card->save();

		return back();
	}

	public function update($id)
	{
		$card = $this->card->findOrFail($id);
		$card->incrementVisits()->save();

		return back();
	}

}
