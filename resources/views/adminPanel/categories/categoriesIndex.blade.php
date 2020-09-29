@extends('layouts.app')
@section('content')


{!! Form::open(['url'=>'/addCategory', 'method'=> 'post']) !!}

{!!Form::text('categoryName','',['class'=>'form-control','id'=>'adminPanelTextInput','placeholder'=>'Vpišite ime kategorije','required'=>'required'])!!}
<br>


<label> Vnesite sliko kategorije </label>
<input id="categoryImage"  type="file" class="form-control" name="categoryImage">
<br>


{!! Form::submit('Dodaj',['class'=>'btn btn-success']) !!}


{!! Form::close() !!}


<table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">Ime Kategorije</th>
        <th scope="col">#</th>
        <th scope="col">#</th>
      </tr>
    </thead>
    <tbody>

        @foreach($categories as $category)

      <tr>
        <td scope="row">{{$category->name}}</td>
        <td><button onclick="location.href='/editCategory/{{$category->id}}'" class="btn btn-warning">Uredi</button></td>
        <td><button onclick="location.href='/deleteCategory/{{$category->id}}'" class="btn btn-danger">Izbriši</button></td>
      </tr>

      @endforeach

    </tbody>
  </table>

@endsection
