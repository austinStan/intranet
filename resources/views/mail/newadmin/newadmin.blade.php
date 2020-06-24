@component('mail::message')

We welcome You <h1>{{$name}}<h1> <br>

<h1>Account Login Credentials</strong><br>

Email Address: {{$email}} <br>

Password : {{$password}} <br>

@component('mail::button', ['url' => url('http://localhost:8000/admin/login'),'color' => 'blue'])
Account Login
@endcomponent

Thanks<br>
Regards<br>
Kampala Hospital
@endcomponent
