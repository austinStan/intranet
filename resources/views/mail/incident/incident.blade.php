
@component('mail::message')
# 

You  have received an incident report !!!

  <h1>  {{$title}} </h1>

  <p> {{$description}} </p><br>

<strong>Sent By </strong>{{$name}} <br>
Thanks<br>
Regards<br>
Kampala Hospital
@endcomponent
