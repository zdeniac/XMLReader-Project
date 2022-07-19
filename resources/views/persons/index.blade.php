@extends('main')


@section('content')

@if (session()->has('success'))
<div>
    <span>{{session()->get('success')}}</span>
</div>
@endif

@if ($persons?->isNotEmpty())
<table>
    <thead>
        <th>ID</th>
        <th>ID2</th>
        <th>Adószám</th>
        <th>Teljes név</th>
        <th>Email</th>
        <th>Bejelentkezés dátuma</th>
        <th>Kijelentkezés dátuma</th>
        <th></th>
        <th></th>
    </thead>
    <tbody>
        @foreach ($persons as $person)
        <tr>
            <td>{{$person->id}}</td>
            <td>{{$person->id2}}</td>
            <td>{{$person->tax_number}}</td>
            <td>{{$person->full_name}}</td>
            <td>{{$person->email}}</td>
            <td>{{$person->login_date}}</td>
            <td>{{$person->logout_date}}</td>
            <td><a href="{{route('persons.show', $person)}}">Adat megtekintés</a></td>
            <td><a href="{{route('logs.show', $person->log)}}">Log megtekintése</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<span>Nincsenek rekordok az adatbázisban.</span>
@endif

@endsection