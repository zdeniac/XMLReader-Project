@extends('main')

@section('content')
<div>
    <ul>
        <li>ID: {{$log?->id}}</li>
        <li>Feltöltés dátuma: {{$log?->created_at}}</li>
    </ul>
</div>
@endsection