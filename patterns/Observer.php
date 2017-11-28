<?php
interface Subject {

	public function attach($observers); // добавить наблютеля

	public function dettach($observer); // убрать наблютеля

	public function notify(); // оповестить
}


interface Observer { // наблюдатель слушатель 

	public function handle(); 
}


############

class Login implements Subject
{

	protected $observers = [];

	public function attach($observers)
	{

		if(is_array($observers))
		{
			$this->attachObservers($observers);

			return;
		}

		$this->observers[] = $observers;
	}


	public function dettach($index)
	{
		unset($this->observer[$index]);
	}


	public function notify()
	{
		foreach($this->observers as $observer)
		{
			$observer->handle();
		}

		return $this;
	}


	private function attachObservers(array $observers)
	{
		foreach ($observers as $observer)
			{
				if( ! $observer instanceof Observer)
					throw new Exception;
					

				$this->attach($observer);
			}
	}
}



class LogHandler implements Observer {

	public function handle()
	{
		var_dump('Log somthing important');
	}
}

class EmailNotifier implements Observer {

	public function handle()
	{
		var_dump('Send email and login about login to ');
	}

}


$login = new Login;

$login->attach([
	new LogHandler,
	new EmailNotifier
]);

$login->notify();



