<!doctype html>
<html lang="{{ app()->getLocale() }}">
  <head>
  </head>
  <body>
    <h1>Dear {!! $name !!}</h1>
    <p>
      Your contact was received.
    </p>
    <p>
      We will get back to you as soon as possible.
    </p>
    <p>
      Your message:
      <i>{!! nl2br($content) !!}</i>
    </p>
  </body>
</html>
