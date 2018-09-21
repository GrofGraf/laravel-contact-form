<form action="{!! route('post_contact_form') !!}" method="post">
  {{ csrf_field() }}
  <div>
    <label for="name">Name</label>
    <input name="name" type="text" @if(old('name')) value="{!! old('name') !!}" @endif required>
  </div>
  <div>
    <label for="email">Email</label>
    <input name="email" type="text" @if(old('email')) value="{!! old('email') !!}" @endif required>
  </div>
  <div>
    <label for="subject">Subject</label>
    <input name="subject" type="text" @if(old('subject')) value="{!! old('subject') !!}" @endif required>
  </div>
  @if(count(config('contact.attachment_mimetypes')) > 0)
    <div>
      <label for="attachment">Attachment</label>
      <input name="attachment" type="file">
    </div>
  @endif
  <div>
    <label for="content">Content</label>
    <textarea name="content" rows="10" required>@if(old('content')){!! old('content') !!}@endif</textarea>
  </div>
  @if(config('contact.recaptcha.sitekey'))
    <div class="g-recaptcha" data-sitekey="{!! config('contact.recaptcha.sitekey') !!}"></div>
  @endif
  <button type="submit">Send</button>

  @if(config('contact.recaptcha.sitekey'))
    <script src='https://www.google.com/recaptcha/api.js'></script>
  @endif
</form>
