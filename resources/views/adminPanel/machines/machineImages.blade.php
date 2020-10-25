@extends('layouts.adminPanelLayout')
@section('content')
<br><br><br><br><br><br><br><br>

<div class="machine-images-wrap" style="max-width:500px; margin-left:auto; margin-right:auto; padding-bottom:20px;">
    <h1>
        Ime mašine
    </h1>



    {!! Form::open(['url'=>'/addImageToMachine', 'method'=> 'post' , 'enctype'=> 'multipart/form-data',
    'class'=>'form-horizontal']) !!}

    <label> Dodajte sliko mašine </label>
    <input type="file" name="files[]" multiple>

    <input name="machineID" type="hidden" value="{{$machineID}}">

    {!! Form::submit('Dodaj',['class'=>'btn btn-success']) !!}
    {!! Form::close() !!}
</div>
@foreach($pictures as $picture)
<div class="machine-images-wrap" style="max-width:500px; margin-left:auto; margin-right:auto;">
    <img src="/images/machines/{{$picture->image}}" alt="error Picture missing" width="500" height="500">
    <button onclick="window.location.href='/deleteImage/{{$picture->id}}'" class="btn btn-danger"> Delete </button>

</div>

<br> <br>
@endforeach




@endsection