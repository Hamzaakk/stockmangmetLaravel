<?php

namespace App\Mail;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class sendMail extends Mailable
{
    use Queueable, SerializesModels;

    private string $email;
    private string $name;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $name, string $email)
    {
        $this->email = $email;
        $this->name= $name;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Mail Automatique Rest Password  ',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        $title = 'bonjour monsier/MMe';
        $href = url('').'/resetpassword/'.base64_encode($this->email.'///'.$this->name);
        return new Content(
            view: 'mail.mail',
            with : [
                'email' => $this->email,
                'name' => $this->name,
                'href' => $href,
        
            ]
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
