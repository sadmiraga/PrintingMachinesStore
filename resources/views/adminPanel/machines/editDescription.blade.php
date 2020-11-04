@extends('layouts.adminPanelLayout')
@section('content')

<div id="formDiv">

    <h3 id="adminPanelTextInput" class="adminPageTitle"> Uredi Opis</h3>
    <h5 id="adminPanelTextInput" style="text-align: center;" > {{$machine->name}}</h5>

    <div class="editDescriptionDiv">

        {!! Form::open(['url'=>'/editDescription', 'method'=> 'post' , 'enctype'=> 'multipart/form-data', 'class'=>'form-horizontal']) !!}

        <textarea id="adminPanelTextInput"  class="editDescriptionTextArea" name="machineDescription" rows="4" cols="50">
            {{$machine->description}}
        </textarea>

        <input type="hidden" name="machineID" value="{{$machine->id}}">

        {!! Form::submit('Shrani',['class'=>'btn btn-success', 'id'=>'adminPanelTextInput']) !!}
        {!! Form::close() !!}
    </div>
</div>




@endsection
