@extends('layouts.adminPanelLayout')
@section('content')

<div id="formDiv">

    @if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

{!! Form::open(['url'=>'/updateCategory', 'method'=> 'post' , 'enctype'=> 'multipart/form-data']) !!}
@csrf

{!!Form::text('categoryName',$category->name,['class'=>'form-control','id'=>'adminPanelTextInput','required'=>'required'])!!}
<br>


<label class="machineLabel"> Vnesite novo sliko za kategorijo </label>
<input style="width: 50%; margin-right: 25%; margin-left: 25%; margin-bottom: 3%;" id="categoryImage"  type="file" class="form-control" name="categoryImage">
<br>

<input name="categoryID" type="hidden" value="{{$category->id}}">

{!! Form::submit('Shrani',['class'=>'btn btn-success', 'id'=>'adminPanelTextInput']) !!}


{!! Form::close() !!}

</div>

@endsection
