@extends('layouts.app')
@section('content')

{!! Form::open(['url'=>'/updateCategory', 'method'=> 'post' , 'enctype'=> 'multipart/form-data']) !!}

{!!Form::text('categoryName',$category->name,['class'=>'form-control','id'=>'adminPanelTextInput','required'=>'required'])!!}
<br>


<label style="color:white;"> Vnesite novo sliko za kategorijo </label>
<input id="categoryImage"  type="file" class="form-control" name="categoryImage">
<br>

<input name="categoryID" type="hidden" value="{{$category->id}}">

{!! Form::submit('Shrani',['class'=>'btn btn-success']) !!}


{!! Form::close() !!}



@endsection
