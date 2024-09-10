<?php

namespace App\Mail;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class PhpMailerService
{
    protected $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer(true);

        // SMTP configuration
        $this->mail->isSMTP();
        $this->mail->Host = env('MAIL_HOST', 'mail.experienceloccitane.com');
        $this->mail->SMTPAuth = true;
        $this->mail->Username = env('MAIL_USERNAME');
        $this->mail->Password = env('MAIL_PASSWORD');
        $this->mail->SMTPSecure = env('MAIL_ENCRYPTION', 'ssl');
        $this->mail->Port = env('MAIL_PORT', 465);

        // Sender info
        $this->mail->setFrom(env('MAIL_FROM_ADDRESS'), 'Sekkisei Event');
    }

    public function send($to, $subject, $body)
    {
        try {
            $this->mail->addAddress($to);
            $this->mail->isHTML(true);
            $this->mail->Subject = $subject;
            $this->mail->Body = $body;

            $this->mail->send();
            return true;
        } catch (Exception $e) {
            return 'Message could not be sent. Mailer Error: ' . $this->mail->ErrorInfo;
        }
    }
}
