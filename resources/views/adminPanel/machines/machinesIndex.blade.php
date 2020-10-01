@extends('layouts.mainLayout')

@section('content')


{!! Form::open(['url'=>'/addMachine', 'method'=> 'post' , 'enctype'=> 'multipart/form-data']) !!}

{!!Form::text('machineModel','',['class'=>'form-control','id'=>'adminPanelTextInput','placeholder'=>'Vpišite model mašine'])!!}
<br>

{!!Form::text('machineModel','',['class'=>'form-control','id'=>'adminPanelTextInput','placeholder'=>'Vpišite proizvajalca masine'])!!}
<br>

<label> Letnik masine</label>
{{Form::number('year', 2020)}}
<br>

<br>
<label> Vnesite sliko za mašino </label>
<input id="machineImage"  type="file" class="form-control" name="machineImage">
<br>

<label> število barv</label>
{{Form::number('year', 1)}}
<br>

{!!Form::text('sheetSize','',['class'=>'form-control','id'=>'adminPanelTextInput','placeholder'=>'Sheet size'])!!}

<select class="form-control"  name="condition" >
    <option value="new" selected > new </option>
    <option value="used"> used </option>
</select>

{!!Form::text('stockNumber','',['class'=>'form-control','id'=>'adminPanelTextInput','placeholder'=>'Stock Number'])!!}


<label>Impresions</label>
{{Form::number('year', 1)}}
<br>

<label>Price</label>
{{Form::number('year', 1)}} €
<br>

{!! Form::textarea('description', null, [ 'rows' => 4, 'cols' => 54, 'style' => 'resize:none','placeholder'=>'Vpišite opis mašine']) !!}
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

<!--
    you choose category
    check if there is subcategories for that category
    if there is subcategories make other select visible
    if not stay like that
-->



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
        $("#subCategoryID").append('<option>Select</option>');
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





@endsection
