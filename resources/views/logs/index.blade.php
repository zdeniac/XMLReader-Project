@extends('main')


@section('content')

@if ($logs?->isNotEmpty())
<table>
    <thead>
        <th>ID</th>
        <th>Felhasználó ID</th>
        <th>Feltöltés dátuma</th>
    </thead>
    <tbody>
        @foreach ($logs as $log)
        <tr>
            <td>{{$log->id}}</td>
            <td>{{$log->person_id}}</td>
            <td>{{$log->created_at}}</td>
            <td><a href="{{route('logs.show', $log)}}">Megtekintés</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<span>Nincsenek rekordok az adatbázisban.</span>
@endif

@endsection