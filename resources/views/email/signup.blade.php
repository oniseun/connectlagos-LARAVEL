@extends('master.email')

@section('title','Thank you for signing up on mycraftbook')
@section('content')
Hi <strong>{{ $user_info->name }}</strong>, thank you for signing up!<br>
<p>
We're really excited for you to join our community!  We're passionate about helping young individuals to learn craft and entrepreneurship and become world class in their respective skills. <br>
We hope that we are able to prove you right on our words.
</p>
@endsection