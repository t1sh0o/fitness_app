<?php namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use App\Card;
use Carbon\Carbon;


class SendExpirationCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'fitness_app:send-expiration-email';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Sends notification email, that fitness card will expire in two days.';

	/**
	 * How many days before the expiration date should subscriber be notified.
	 * 
	 * @var integer
	 */
	public $notificationDays = 2;

	/**
	 * @var \App\Card
	 */
	public $card;

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct(Card $card)
	{
		parent::__construct();

		$this->card = $card;
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		$days = $this->notificationDays;

		$cards = $this->card->notExpired()->notNotified()->willExpireSoon($days)->with('user')->get();

		// print_r($cards);

		foreach ($cards as $card) {
			$username = $this->getUsername($card['user']['email']);
			$center = $card['fitness_center'];
	
			\Mail::send('emails.expiration', compact('days', 'username', 'center'), function($message) use ($card){
				$message->from('notifier@fitness.app');
				$message->to($card['user']['email']);
				$message->subject('Card expiration notification');
			});

			$card['notified'] = 1;

			$card->save();
		}
	}

	private function getUsername($email)
	{
		$emailArray = explode('@', $email);

		return $emailArray[0];
	}

}
