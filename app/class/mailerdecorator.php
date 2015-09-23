<?php

class Mailerdecorator
{
	private $message;
	private $mailer;

	function __construct()
	{

	}
	
	public function decorate($messagedata, $message)
	{
		$this->message = vsprintf(file_get_contents($message), $messagedata);
	}
	
	public function sendmail($maildata)
	{
		try {
			$this->mailer = new Mailer();
			$this->mailer->setFrom($maildata['name'], $maildata['from']);
			$this->mailer->addRecipient($maildata['first_name'].' '.$maildata['last_name'], $maildata['to']);
			$this->mailer->fillSubject($maildata['subject']);
			$this->mailer->fillMessage($this->message);
			$this->mailer->send();
		} catch (Exception $e) {
			echo $e->getMessage();
			exit(0);
		}
	}
}
