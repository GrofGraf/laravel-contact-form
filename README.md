# Laravel Contact Form

Contact form package for Laravel. Automatic creation of routes, controllers, email templates and views needed for contact form. Option of enabling captcha validation and sending mail attachments.

## Requiremenets
* `Laravel 5.5` or above
* Configure your [mail]('https://laravel.com/docs/5.5/mail') settings to make sure your server can send emails.
* [Google reCAPTCHA](https://www.google.com/recaptcha) key, if you want to have human verification enabled.

## Installation
```bash
 $ composer require grofgraf/laravel-contact-form
```

## Configuration
First add the service provider to the main configuration file located at `config/app.php`
```php
'providers' => [
  ...
  GrofGraf\LaravelContactForm\Providers\ContactServiceProvider::class
]
```

Now you can navigate to `/contact` and you will see a default contact form.

### Recaptcha
If you want to enable human verification, you have to register a site with [Google reCAPTCHA](https://www.google.com/recaptcha) and receive a pair of keys.

After that, you can add those keys to your `.env` file.
```.env
RECAPTCHA_SITEKEY=<your_site_key>
RECAPTCHA_SECRET=<your_secret_key>
```

If only site key is defined, the client side validation is performed without server validation

If both keys are defined client and server side validation is performed.

If client key or both keys are undefined, no validation is performed and reCAPTCHA widget is not displayed by default.

### Mail attachments

By default, all mime types are enabled for mail attachment.
You can disable or enable mail attachment, or change allowed mime types, by editing the configuration file. To do so, you want to publish the configuration file by running
```bash
$ php artisan vendor:publish --tag=config
```
In the `config` directory  `contact.php` file will be generated, where you can change `attachment_mimetypes` value.

To allow only certain mime types list them as array:
```php
...
'attachment_mimetypes' => ['application/pdf', 'text/*'],
...
```

By leaving array empty `'attachment_mimetypes' => []`, attachment will be disabled and input field won't be shown in email form.

To allow all mime types for attachment, set the value to  `'attachment_mimetypes' => ['*']`.

## Usage

### Overriding configurations

To override configuration file, run `php artisan vendor:publish --tag=config` command, that will create `config/contact.php` file. By editing this file you can choose between different [configuration options]('https://github.com/GrofGraf/laravel-contact-form/tree/master/src/config/contact.php'), like enabling or disabling autoreply and human verification, adding addresses to mail carbon copy (cc), or choosing attachment mime types.
> If you don't want to publish configuration file, you can override some options by assigning variables in `.env` file


### Overriding views

If you want to make changes to the views, you can publish them by running `php artisan vendor:publish --tag=views` in the root of your project.

By running this command the files that override the default views will be generated and stored to the `/resources/views/contact` directory. Now you can edit them as you wish and make then fit your needs. By default, available variables for your email templates are:
* `$name` name of the sender
* `$email` email of the sender
* `$subject` email subject
* `$content` content of email

### Overriding mailables

By running `php artisan vendor:publish --tag=mail` command, `Contact.php` and `Autoreply,php` files will be generated in `app\Mail` directory. In these file you can override [mail]('https://laravel.com/docs/5.7/mail') logic.

### Override controllers

By running `php artisan vendor:publish --tag=controllers` command, 'ContactController.php' will be generated in `app\Mail` directory. Here you can override controllers logic.

### Overriding routes

By running `php artisan vendor:publish --tag=routes` command, `contact.php` file will be generated in `routes` directory. In this file, you can override used paths or assign them to different controllers.


## Authors
* [GrofGraf](https://github.com/GrofGraf)

## License
The MIT License (MIT)

Copyright (c) 2017 GrofGraf

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
