@extends('layouts.app')
@section('content')



{!! Form::open(['url'=>'/addSubCategory', 'method'=> 'post']) !!}

{!!Form::text('subCategoryName','',['class'=>'form-control','id'=>'adminPanelTextInput','placeholder'=>'Vpišite ime podkategorije','required'=>'required'])!!}


<select class="form-control"  name="skupinaID" id="skupinaID">
    <option value="0" selected disabled> Izberite kategorijo </option>
    @foreach ( $categories as $category)
        <option value="{{$category->id}}"> {{$category->name}} </option>
    @endforeach
</select>

{!! Form::submit('Dodaj',['class'=>'btn btn-success']) !!}

{!! Form::close() !!}





@endsection
