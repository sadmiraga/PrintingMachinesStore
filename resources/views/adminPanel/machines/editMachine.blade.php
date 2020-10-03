@extends('layouts.mainLayout')
@section('content')

<br><br><br><br><br><br><br>

{!! Form::open(['url'=>'/updateMachine', 'method'=> 'post' , 'enctype'=> 'multipart/form-data', 'class'=>'form-horizontal']) !!}
@csrf

<input name="machineID" type="hidden" value="{{$machine->id}}">

<!-- MODEL -->
@if($machine->model != null)
    {!!Form::text('machineModel',$machine->model,['class'=>'form-control','id'=>'adminPanelTextInput','placeholder'=>'Vpišite model mašine'])!!}
    <br>
@endif

<!-- MANUFACTURER -->
@if($machine->manufacturer != null)
    {!!Form::text('manufacturer',$machine->manufacturer,['class'=>'form-control','id'=>'adminPanelTextInput','placeholder'=>'Vpišite proizvajalca masine'])!!}
    <br>
@endif


<!-- YEAR -->
@if($machine->year != 0)
    <label> Letnik masine </label> <br>
    {{Form::number('year', $machine->year)}}
    <br>
@endif


<!-- NUMBER OF COLORS -->
@if($machine->numberOfColors != 0)
    <label> število barv</label>
    {{Form::number('numberOfColors', $machine->numberOfColors)}}
    <br>
@endif

@if($machine->sheetSize != null)
    {!!Form::text('sheetSize',$machine->sheetSize,['class'=>'form-control','id'=>'adminPanelTextInput','placeholder'=>'Sheet size'])!!}
@endif


<!-- CONDITION -->
<select class="form-control"  name="condition" >
     @if($machine->condition == 'new')
        <option value="new" selected > new </option>
        <option value="used"> used </option>
     @elseif($machine->condition == 'used')
        <option value="new" > new </option>
        <option value="used" selected> used </option>
     @endif
</select>

<!-- STOCK NUMBER -->
@if($machine->stockNumber != null)
    {!!Form::text('stockNumber',$machine->stockNumber,['class'=>'form-control','id'=>'adminPanelTextInput','placeholder'=>'Stock Number'])!!}
@endif


<!-- SERIAL NUMBER -->
@if($machine->serialNumber != null)
    {!!Form::text('serialNumber',$machine->serialNumber,['class'=>'form-control','id'=>'adminPanelTextInput','placeholder'=>'Serial Number'])!!}
@endif

@if($machine->impresions != null || $machine->impresions == 0)
    <label>Impresions</label>
    {{Form::number('impresions', $machine->impresions)}}
    <br>
@endif

<label>Price</label>
{!! Form::input('number', 'price', $machine->price, ['class' => 'form-control','required'=>'required']) !!}


<!-- KATEGORIJA -->
<label>Izberite Kategorijo</label>
<select class="form-control"  name="categoryID" id="categoryID">
    <option value="0" selected disabled> Izberite kategorijo </option>
    @foreach ( $categories as $category)
        @if($category->id == $machine->categoryID)
            <option selected value="{{$category->id}}"> {{$category->name}} </option>
        @else
            <option value="{{$category->id}}"> {{$category->name}} </option>
        @endif
    @endforeach
</select>


<!-- POD KATEGORIJA -->
<br> <br>

<label id="labelForSubCategory" >Izberite pod kategorijo</label>
<select class="form-control" name="subCategoryID" id="subCategoryID" >
    <option value="0" selected disabled> Izberite pod kategorijo </option>
    @foreach ( $subCategories as $subCategory)
        @if($subCategory->id == $machine->subCategoryID)
            <option selected value="{{$subCategory->id}}"> {{$subCategory->name}} </option>
        @else
            <option value="{{$subCategory->id}}"> {{$subCategory->name}} </option>
        @endif
    @endforeach
</select>



{!! Form::submit('Shrani',['class'=>'btn btn-success']) !!}
{!! Form::close() !!}


<script src=//www.codermen.com/js/jquery.js></script>


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




@endsection
