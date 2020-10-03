@extends('layouts.mainLayout')

@section('content')


{!! Form::open(['url'=>'/addMachine', 'method'=> 'post' , 'enctype'=> 'multipart/form-data', 'class'=>'form-horizontal']) !!}
@csrf

{!!Form::text('machineModel','',['class'=>'form-control','id'=>'adminPanelTextInput','placeholder'=>'Vpišite model mašine'])!!}
<br>

{!!Form::text('manufacturer','',['class'=>'form-control','id'=>'adminPanelTextInput','placeholder'=>'Vpišite proizvajalca masine'])!!}
<br>

<label> Letnik masine </label> <br>
{{Form::number('year', '')}}
<br>

<br>
<label> Vnesite slike za mašino </label>
<input   type="file" name="files[]" multiple > <br/>
<br>

<label> število barv</label>
{{Form::number('numberOfColors', 0)}}
<br>

{!!Form::text('sheetSize','',['class'=>'form-control','id'=>'adminPanelTextInput','placeholder'=>'Sheet size'])!!}

<select class="form-control"  name="condition" >
    <option value="new" selected > new </option>
    <option value="used"> used </option>
</select>

{!!Form::text('stockNumber','',['class'=>'form-control','id'=>'adminPanelTextInput','placeholder'=>'Stock Number'])!!}

{!!Form::text('serialNumber','',['class'=>'form-control','id'=>'adminPanelTextInput','placeholder'=>'Serial Number'])!!}


<label>Impresions</label>
{{Form::number('impresions', 0)}}
<br>

<label>Price</label>

{!! Form::input('number', 'price', null, ['class' => 'form-control','required'=>'required']) !!}
<br>

{!! Form::textarea('description', null, [ 'rows' => 4, 'cols' => 54, 'style' => 'resize:none','placeholder'=>'Vpišite opis mašine', 'required'=>'required']) !!}
<br> <br>

<label>Izberite Kategorijo</label>
<select class="form-control"  name="categoryID" id="categoryID">
    <option value="0" selected disabled> Izberite kategorijo </option>
    @foreach ( $categories as $category)
        <option value="{{$category->id}}"> {{$category->name}} </option>
    @endforeach
</select>

<br> <br> <br>

<label id="labelForSubCategory" >Izberite pod kategorijo</label>
<select class="form-control" name="subCategoryID" id="subCategoryID" >
    <option value="0" selected disabled> Izberite pod kategorijo </option>
</select>

        <!-- ajax -->
        <script src=//www.codermen.com/js/jquery.js></script>

{!! Form::submit('Dodaj',['class'=>'btn btn-success']) !!}
{!! Form::close() !!}


<!--script function -->
<script>
    //dynamic oblika field
    $('#categoryID').change(function(){
var categoryID = $(this).val();
if(categoryID){
    $.ajax({
    type:"GET",
    url:"{{url('getSubCategories')}}?categoryID="+categoryID,
    success:function(res){
    if(res){

        var numberOfSubCategories = 0;

        $("#subCategoryID").empty();
        $("#subCategoryID").append('<option value="0">Select</option>');
        $.each(res,function(key,value){
            numberOfSubCategories++;
        $("#subCategoryID").append('<option value="'+key+'">'+value+'</option>');
        });

        //make second dropdown invisible if array is empty
        if(numberOfSubCategories == 0){
            document.getElementById("subCategoryID").style.visibility = "hidden";
            document.getElementById("labelForSubCategory").style.visibility = "hidden";
        } else if(numberOfSubCategories > 0){
            document.getElementById("subCategoryID").style.visibility = "visible";
            document.getElementById("labelForSubCategory").style.visibility = "visible";
        }
    }else{
        $("#subCategoryID").empty();
    }
    }
    });
}else{
    $("#subCategoryID").empty();

}
});
</script>

<br><br><br><br><br>

<!-- MACHINES TABLE -->
<table class="table">
    <thead>
      <tr>
        <th scope="col">Price</th>
        <th scope="col">Condition</th>
        <th scope="col">Model</th>
        <th scope="col">Manufacturer</th>
        <th scope="col">Year</th>
        <th scope="col"># of colors</th>
        <th scope="col">Sheet size</th>
        <th scope="col">Stock Number</th>
        <th scope="col">Serial Number</th>
        <th scope="col">Impresions</th>
        <th scope="col">Description</th>
        <th scope="col">Category</th>
        <th scope="col">Sub Category</th>
        <th scope="col">Images</th>
        <th scope="col">#</th>
        <th scope="col">#</th>

      </tr>
    </thead>
    <tbody>

      @foreach($machines as $machine)

        <tr>
            <th scope="row">{{$machine->price}}€</th>
            <td>{{$machine->condition}}</td>
            <td>{{$machine->model}}</td>
            <td>{{$machine->manufacturer}}</td>
            <td>{{$machine->year}}</td>
            <td>{{$machine->numberOfColors}}</td>
            <td>{{$machine->sheetSize}}</td>
            <td>{{$machine->stockNumber}}</td>
            <td>{{$machine->serialNumber}}</td>
            <td>{{$machine->impresions}}</td>
            <td>description</td>
            <td>
                @foreach($categories as $category)
                    @if($category->id == $machine->categoryID)
                        {{$category->name}}
                    @endif
                @endforeach
            </td>
            <td>
                @foreach($subCategories as $subCategory)
                    @if($subCategory->id == $machine->subCategoryID)
                        {{$subCategory->name}}
                    @endif
                @endforeach
            </td>
            <td onMouseOver="this.style.cursor='pointer'" onclick="location.href='/machineImages/{{$machine->id}}'">Pictures</td>
            <td><button onclick="location.href='/editMachine/{{$machine->id}}'" class="btn btn-warning">Edit </button></td>
            <td><button onclick="location.href='/deleteMachine/{{$machine->id}}'" class="btn btn-danger">delete</button></td>
        </tr>
      @endforeach

    </tbody>
  </table>



@endsection
