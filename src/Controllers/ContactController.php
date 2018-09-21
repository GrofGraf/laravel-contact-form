<?php

namespace GrofGraf\LaravelContactForm\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use GrofGraf\LaravelContactForm\Mail\Contact;
use GrofGraf\LaravelContactForm\Mail\Autoreply;

class ContactController extends Controller
{
  public function show_form(){
    return view('contact::contact-form');
  }

  public function post_form(Request $request){

    $request->validate($this->rules());

    $name       = $request->name;
    $email      = $request->email;
    $subject    = $request->subject;
    $attachment = $request->attachment;
    $content    = $request->content;
    $recaptcha  = $request["g-recaptcha-response"];

    if(config('contact.recaptcha.sitekey') && config('contact.recaptcha.secret') && !$this->validate_recaptcha($recaptcha)) throw new \Exception("You are a robot!!");

    Mail::to($email, $name)->queue(new Contact($name, $email, $subject, $content, $attachment));

    if(config('contact.autoreply')) Mail::to($email, $name)->queue(new Autoreply($name));

    return redirect()->route('show_contact_form')->with('success', 'Your message was sent successfully!!');
  }

  private function validate_recaptcha($recaptcha){
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $data = [
      'secret'   => config('contact.recaptcha.secret'),
      'response' => $recaptcha
    ];
    $options = [
      'http' => [
        'method'  => 'POST',
        'content' => http_build_query($data),
        'header'  => [
          "Content-Type: application/x-www-form-urlencoded"
        ]
      ]
    ];
    $context = stream_context_create($options);
    $verify = file_get_contents($url, false, $context);
    return json_decode($verify)->success;
  }

  private function rules(){
    return [
      'name' => 'required|string',
      'email' => 'required|email',
      'subject' => 'required|string',
      'attachment' => 'nullable|file|mimetypes:' . implode(',', config('contact.attachment_mimetypes')),
      'content' => 'required',
      'g-recaptcha-response' => 'sometimes|required|string'
    ];
  }
}
