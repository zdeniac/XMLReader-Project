@extends('main')

@section('content')
<div>
    <ul>
        <li>ID: {{$person?->id}}</li>
        <li>ID2: {{$person?->id2}}</li>
        <li>Adószám: {{$person?->tax_number}}</li>
        <li>Teljes név: {{$person?->full_name}}</li>
        <li>Email: {{$person?->email}}</li>
        <li>Bejelentkezés dátuma: {{$person?->login_date}}</li>
        <li>Kijelentkezés dátuma: {{$person?->logout_date}}</li>
        <li><a href="{{route('logs.show', $person?->log?->id)}}">Log</a></li>
    </ul>
</div>
@endsection