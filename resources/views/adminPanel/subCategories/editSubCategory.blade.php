@extends('layouts.app')

@section('content')

{!! Form::open(['url'=>'/updateSubCategory', 'method'=> 'post']) !!}
@csrf

{!!Form::text('subCategoryName',$subCategory->name,['class'=>'form-control','id'=>'adminPanelTextInput','required'=>'required'])!!}



<select class="form-control"  name="categoryID" id="categoryID">
    <option value="0" selected disabled> Izberite kategorijo </option>
    @foreach ( $categories as $category)
        @if($category->id == $subCategory->categoryID)
            <option value="{{$category->id}}" selected> {{$category->name}} </option>
        @else
            <option value="{{$category->id}}"> {{$category->name}} </option>
        @endif

    @endforeach
</select>

<input name="subCategoryID" type="hidden" value="{{$subCategory->id}}">

{!! Form::submit('Shrani',['class'=>'btn btn-success']) !!}

{!! Form::close() !!}


@endsection
