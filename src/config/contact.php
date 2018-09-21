<?php

return [
  /*
    list of availeble attachment mime types
    example: ['application/pdf', 'text/*']
    empty array [] to disable attachment
    ['*'] to allow all mime types
  */
  'attachment_mimetypes' => ['*'],


  /*
    if you want to enable human verification you have assign
    recaptcha keys you get from https://www.google.com/recaptcha
  */
  'recaptcha' => [

    /*
      if you dont assign sitekey, no verification will be performed
      if you assign only sitekey, only client side verification will be performed
    */
    'sitekey' => env('RECAPTCHA_SITEKEY', null)

    /*
    for server side verification you must assign sitekey and secret key
    */
    'secret' => env('RECAPTCHA_SECRET', null)
  ],


  /*
    set to null, 0, false or empty to disable autoreply
    set to any string to enable
  */
  'autoreply' => 'on',


  /*
    list of emails for mail cc
    example: ['mail@example.com', 'info@example.com']
  */
  'carbon_copy' => [],


  /*
    list of emails for mail cc
    example: ['mail@example.com', 'info@example.com']
    empty array [] for none
  */
  'blind_carbon_copy' => [],


  /*
    Name and adress that will be used for contact emails,
    same as main config/Mail from address by default
  */
  'from' => [
    'address'  => env('CONTACT_FROM_EMAIL', config('mail.from.address')), //from email, same as mail settings by default
    'name' => env('CONTACT_FROM_NAME', config('mail.from.name')) //from name, same as mail settings by default
  ],
];
