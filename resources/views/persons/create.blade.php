@extends('main')


@section('content')

@if ($errors->any())
    <div>
        <span>{{$errors->first()}}</span>
    </div>
    @if (session()->get('missingData'))
    <div>
        <ul>
        @foreach (session()->get('missingData') as $missingData)
            <li>{{$missingData}}</li>
        @endforeach
        </ul>
    </div>
    @endif
@endif

<form action="{{route('persons.store')}}"
      method="POST"
      enctype="multipart/form-data"
>
    @csrf
    <input type="file" name="file">
    <button type="submit">Feltöltés</button>
</form>

@endsection