<!doctype html>
<html lang="{{ app()->getLocale() }}">
  <head>
  </head>
  <body>
    <h1>Message from website</h1>
    <p>
      From: {!! $name !!} {!! $email !!}
    </p>
    <p>
      {!! nl2br($content) !!}
    </p>
  </body>
</html>
