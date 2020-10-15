@extends('layouts.adminPanelLayout')
@section('content')

<div id="formDiv">


{!! Form::open(['url'=>'/addSubCategory', 'method'=> 'post']) !!}
@csrf



{!!Form::text('subCategoryName','',['class'=>'form-control','id'=>'adminPanelTextInput','placeholder'=>'Vpišite ime podkategorije','required'=>'required'])!!}

<label class="machineLabel">Izberite kategorijo kateri potkategorija pripada </label>
<select class="form-control"  name="categoryID" id="categoryID">
    <option value="0" selected disabled> Izberite kategorijo </option>
    @foreach ( $categories as $category)
        <option value="{{$category->id}}"> {{$category->name}} </option>
    @endforeach
</select>

{!! Form::submit('Dodaj',['class'=>'btn btn-success', 'id'=>'adminPanelTextInput']) !!}

{!! Form::close() !!}



<table class="table">
    <thead>
      <tr>
        <th scope="col">Ime Podkategorije</th>
        <th scope="col">Ime kategorije kojoj pripada</th>
        <th scope="col">#</th>
        <th scope="col">#</th>
      </tr>
    </thead>
    <tbody>

        @foreach($subCategories as $subCategory)

      <tr>
        <td scope="row">{{$subCategory->name}}</td>
        <td scope="row">
            @foreach($categories as $category)
                @if($category->id == $subCategory->categoryID)
                    {{$category->name}}
                @endif
            @endforeach
        </td>
        <td><button onclick="location.href='/editSubCategory/{{$subCategory->id}}'" class="btn btn-warning">Uredi</button></td>
        <td><button onclick="location.href='/deleteSubCategory/{{$subCategory->id}}'" class="btn btn-danger">Izbriši</button></td>
      </tr>

      @endforeach

    </tbody>
  </table>



</div>
@endsection
