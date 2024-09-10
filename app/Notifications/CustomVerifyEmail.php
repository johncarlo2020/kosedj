<?php

namespace App\Notifications;

use App\Mail\PhpMailerService;
use Illuminate\Notifications\Notification;

class CustomVerifyEmail extends Notification
{
    protected $url;

    public function __construct($url)
    {
        $this->url = $url;
    }

    public function toMail($notifiable)
    {
        // Custom PHPMailer service
        $mailer = new PhpMailerService();

        // Customize your email content
        $subject = 'Verify your email address';
        $body = "Please click the following link to verify your email address: <a href=\"{$this->url}\">Verify Email</a>";

        // Send the email using PHPMailer
        $mailer->send($notifiable->email, $subject, $body);

        // Return a dummy MailMessage to satisfy the interface
        return (new \Illuminate\Notifications\Messages\MailMessage())->subject($subject);
    }

    public function via($notifiable)
    {
        return ['mail'];
    }
}
