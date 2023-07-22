<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendAnswerMail extends Mailable
{
    use Queueable, SerializesModels;

    //Создание переменных для работы из контроллера ShowReqPageController.php
    public $sendReq;
    public $name;
    public $message;
    public $comment;

    //Инициализация свойства
    public function __construct($sendReq, $name, $message, $comment)
    {
        $this->sendReq = $sendReq;
        $this->name = $name;
        $this->message = $message;
        $this->comment = $comment;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Send Answer Mail',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            markdown: 'mail.answer',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
