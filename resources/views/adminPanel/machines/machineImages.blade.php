@extends('layouts.mainLayout')
@section('content')
<br><br><br><br><br><br><br><br>

@foreach($pictures as $picture)

<img  src="/images/machines/{{$picture->image}}" alt="error Picture missing" width="100" height="100">
<button onclick="window.location.href='/deleteImage/{{$picture->id}}'" class="btn btn-danger"> Delete </button>
<br> <br>
@endforeach



{!! Form::open(['url'=>'/addImageToMachine', 'method'=> 'post' , 'enctype'=> 'multipart/form-data', 'class'=>'form-horizontal']) !!}

<label> Dodajte sliko mašine </label>
<input   type="file" name="files[]" multiple > <br/>

<input name="machineID" type="hidden" value="{{$machineID}}">

{!! Form::submit('Dodaj',['class'=>'btn btn-success']) !!}
{!! Form::close() !!}




@endsection
