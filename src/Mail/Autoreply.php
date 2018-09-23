<?php

namespace GrofGraf\LaravelContactForm\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Autoreply extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $name;
    protected $email;
    protected $content;
    protected $attachment;
    public function __construct($name, $email, $subject, $content, $attachment = null)
    {
        $this->name = $name;
        $this->email = $email;
        $this->subject = $subject;
        $this->content = $content;
        $this->attachment = $attachment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $m = $this->view('contact::emails.autoreply')
          ->with([
            'subject' => $this->subject,
            'content' => $this->content,
            'name' => $this->name,
            'email' => $this->email
          ]);
        return $m;
    }
}
