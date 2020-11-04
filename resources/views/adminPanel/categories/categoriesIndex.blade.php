@extends('layouts.adminPanelLayout')
@section('content')

<div id="formDiv">

    <h3 id="adminPanelTextInput" class="adminPageTitle"> Kategorije </h3>

    @if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

{!! Form::open(['url'=>'/addCategory', 'method'=> 'post' , 'enctype'=> 'multipart/form-data']) !!}

@csrf

{!!Form::text('categoryName','',['class'=>'form-control','id'=>'adminPanelTextInput','placeholder'=>'Vpišite ime kategorije','required'=>'required'])!!}
<br>


<label class="machineLabel"> Vnesite sliko kategorije </label>
<input id="adminPanelTextInput" id="categoryImage"  type="file" class="form-control" name="categoryImage">


{!! Form::submit('Dodaj',['class'=>'btn btn-success', 'id'=>'adminPanelTextInput']) !!}


{!! Form::close() !!}

<br> <br>

<hr>
<br> <br><br>


<table  class="table">
    <thead>
      <tr>
        <th scope="col">Ime Kategorije</th>
        <th scope="col">Slika kategorije</th>
        <th scope="col">#</th>
        <th scope="col">#</th>
      </tr>
    </thead>
    <tbody>

        @foreach($categories as $category)

      <tr>
        <td scope="row">{{$category->name}}</td>
        <td scope="row">
            <img  src="images\categories\{{$category->categoryImage}}" alt="error Picture missing" width="100" height="100">
        </td>
        <td><button onclick="location.href='/editCategory/{{$category->id}}'" class="btn btn-warning">Uredi</button></td>
        <td><button onclick="location.href='/deleteCategory/{{$category->id}}'" class="btn btn-danger">Izbriši</button></td>
      </tr>

      @endforeach

    </tbody>
  </table>

</div>

@endsection
