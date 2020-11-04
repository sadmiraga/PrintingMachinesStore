@extends('layouts.adminPanelLayout')
@section('content')




<div class="machine-images-wrap" style="max-width:500px; margin-left:auto; margin-right:auto; padding-bottom:20px;">


    <h3 id="adminPanelTextInput" class="adminPageTitle"> Dodaj ali Izbrisi slike za masinu</h3>
    <h3 style="text-align: center;">
        {{$machine->name}}
    </h3>

    <br><br>


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
    <button onclick="window.location.href='/deleteImage/{{$picture->id}}'" class="btn btn-danger"> Izbriši </button>

</div>

<br> <br>
@endforeach




@endsection
