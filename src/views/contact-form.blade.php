<!doctype html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <h1>Cotact Form</h1>
      <div class="row">
        <div class="col-md-6">
          <form action="{!! route('post_contact_form') !!}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="name">Name</label>
              <input name="name" class="form-control" type="text" @if(old('name')) value="{!! old('name') !!}" @endif required>
            </div>
            <div>
              <label for="email">Email</label>
              <input name="email" class="form-control" type="text" @if(old('email')) value="{!! old('email') !!}" @endif required>
            </div>
            <div class="form-group">
              <label for="subject">Subject</label>
              <input name="subject" class="form-control" type="text" @if(old('subject')) value="{!! old('subject') !!}" @endif required>
            </div>
            @if(count(config('contact.attachment_mimetypes')) > 0)
              <div class="form-group">
                <label for="attachment">Attachment</label>
                <input name="attachment" class="form-control" type="file" accept="{!! implode(',', config('contact.attachment_mimetypes')) !!}">
              </div>
            @endif
            <div class="form-group">
              <label for="content">Content</label>
              <textarea name="content" class="form-control" rows="10" required>@if(old('content')){!! old('content') !!}@endif</textarea>
            </div>
            @if(config('contact.recaptcha.sitekey'))
              <div class="form-group">
                <div class="g-recaptcha" data-sitekey="{!! config('contact.recaptcha.sitekey') !!}"></div>
              </div>
            @endif
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-lg btn-block">Send</button>
            </div>

            @if(config('contact.recaptcha.sitekey'))
              <script src='https://www.google.com/recaptcha/api.js'></script>
            @endif
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
