<?php

namespace GrofGraf\LaravelContactForm\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Contact extends Mailable
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
        $m = $this->view('contact::emails.contact')
          ->with(['content' => $this->content])
          ->subject($this->subject)
          ->replyTo($this->email, $this->name);

        if(config('contact.carbon_copy')){
          $m->cc(config('contact.carbon_copy'));
        }
        if(config('contact.blind_carbon_copy')){
          $m->bcc(config('contact.blind_carbon_copy'));
        }
        if(config('contact.attachment') && $this->attachment){
          $m->attachData($this->attachment);
        }
        return $m;
    }
}
