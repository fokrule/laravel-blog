<!-- resources/views/emails/password.blade.php -->

Click here to reset your password:<br>
<a href="{{ $link=url('password/reset/'.$token).'?email='.urlencode($user->getEmailForPasswordReset())}}">{{$link}}</a>
