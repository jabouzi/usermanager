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
		$this->message = vsprintf($message, $messagedata);
	}
	
	public function decorateuser($user, $message)
	{
		$this->message = sprintf($message,
				$user['first_name'],
				$user['last_name'],
				$user['email'],
				$user['password'],
				$user['first_name'],
				$user['last_name'],
				$user['email'],
				$user['password']
			);
	}

	public function decoratepassword($user, $message)
	{
		$this->message = sprintf($message,
				$user['first_name'],
				$user['last_name'],
				$user['email'],
				$user['password'],
				$user['first_name'],
				$user['last_name'],
				$user['email'],
				$user['password']
			);
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

	public function sendusermail($user)
	{
		try {
			$this->mailer = new Mailer();
			$this->mailer->setFrom("TGI", "contact@tonikgrupimage.com");
			$this->mailer->addRecipient($user['first_name'].' '.$user['last_name'], $user['email']);
			$this->mailer->fillSubject(lang('account.email.subject'));
			$this->mailer->fillMessage($this->message);
			$this->mailer->send();
		} catch (Exception $e) {
			echo $e->getMessage();
			exit(0);
		}
	}

	public function sendpasswordmail($user)
	{
		try {
			$this->mailer = new Mailer();
			$this->mailer->setFrom("TGI", "contact@tonikgrupimage.com");
			$this->mailer->addRecipient($user['first_name'].' '.$user['last_name'], $user['email']);
			$this->mailer->fillSubject(lang('title.password'));
			$this->mailer->fillMessage($this->message);
			$this->mailer->send();
		} catch (Exception $e) {
			echo $e->getMessage();
			exit(0);
		}
	}
}
