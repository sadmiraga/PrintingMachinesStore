@extends('layouts.adminPanelLayout')
@section('content')

<script src=//www.codermen.com/js/jquery.js></script>

<div class="adminContainer">
    <div id="formDiv">

        {!! Form::open(['url'=>'/addMachine', 'method'=> 'post' , 'enctype'=> 'multipart/form-data',
        'class'=>'form-horizontal']) !!}
        @csrf


        <label class="machineLabel"> Obvezno * </label>
        {!!Form::text('machineName','',['class'=>'form-control','id'=>'adminPanelTextInput','placeholder'=>'Vpišite ime
        mašine', 'required'=>'required'])!!}


        {!!Form::text('machineModel','',['class'=>'form-control','id'=>'adminPanelTextInput','placeholder'=>'Vpišite
        model mašine'])!!}

        <label class="machineLabel"> Obvezno * </label>
        {!!Form::text('manufacturer','',['class'=>'form-control','id'=>'adminPanelTextInput','placeholder'=>'Vpišite
        proizvajalca masine'])!!}


        {!!Form::text('stockNumber','',['class'=>'form-control','id'=>'adminPanelTextInput','placeholder'=>'Stock
        Number'])!!}


        {!!Form::text('sheetSize','',['class'=>'form-control','id'=>'adminPanelTextInput','placeholder'=>'Sheet
        size'])!!}

        {!!Form::text('serialNumber','',['class'=>'form-control','id'=>'adminPanelTextInput','placeholder'=>'Serial
        Number'])!!}





        <label class="machineLabel"> Stevilo barv</label>
        {!! Form::input('number', 'numberOfColors', 0, ['id' => 'adminPanelTextInput', 'class' => 'form-control']) !!}



        <label class="machineLabel"> Vnesite slike za mašino </label>
        <input id="adminPanelTextInput" placeholder="vnesite slike masine" type="file" name="files[]" multiple>

        {!!Form::text('sheetSize','',['class'=>'form-control','id'=>'adminPanelTextInput','placeholder'=>'Sheet
        size'])!!}

        <label class="machineLabel"> Stanje</label>
        <select id="adminPanelTextInput" class="form-control" name="condition">
            <option value="new" selected> Novo </option>
            <option value="used"> Rabljeno </option>
        </select>

        <label class="machineLabel"> Letnik masine </label>


        {!! Form::input('number', 'year', 2020, ['id' => 'adminPanelTextInput', 'class' => 'form-control', 'min' =>
        1800, 'max' => 2020]) !!}



        {!!Form::text('serialNumber','',['class'=>'form-control','id'=>'adminPanelTextInput','placeholder'=>'Serial
        Number'])!!}


        <label class="machineLabel">Impresions</label>
        {!! Form::input('number', 'impresions', 0, ['id' => 'adminPanelTextInput', 'class' => 'form-control']) !!}




        <label class="machineLabel">Cena (€) - obvezno *</label>

        {!! Form::input('number', 'price', null, ['class' =>
        'form-control','required'=>'required','id'=>'adminPanelTextInput']) !!}
        <br>

        {!! Form::textarea('description', null, [ 'rows' => 4, 'cols' => 54, 'style' =>
        'resize:none','placeholder'=>'Vpišite opis mašine', 'required'=>'required','id'=>'adminPanelTextInput']) !!}
        <br> <br>

        <label class="machineLabel">Izberite Kategorijo</label>
        <select
            style=" width: 50% !important;  margin-right: 25% !important; margin-left: 25% !important; margin-bottom: 3% !important;"
            class="form-control" name="categoryID" id="categoryID">
            <option value="0" selected disabled> Izberite kategorijo </option>
            @foreach ( $categories as $category)
            <option value="{{$category->id}}"> {{$category->name}} </option>
            @endforeach
        </select>

        <br> <br> <br>

        <label class="machineLabel" id="labelForSubCategory">Izberite pod kategorijo</label>
        <select
            style=" width: 50% !important;  margin-right: 25% !important; margin-left: 25% !important; margin-bottom: 3% !important;"
            class="form-control" name="subCategoryID" id="subCategoryID">
            <option value="0" selected disabled> Izberite pod kategorijo </option>
        </select>




        {!! Form::submit('Dodaj',['class'=>'btn btn-success', 'id'=>'adminPanelTextInput']) !!}
        {!! Form::close() !!}

    </div>
</div>




<br><br><br><br><br>

<!-- MACHINES TABLE -->
<table class="table">
    <thead>
        <tr>
            <th scope="col">Name</th>
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
            <th scope="row">{{$machine->name}}</th>
            <td>{{$machine->price}}€</th>
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
            <td onMouseOver="this.style.cursor='pointer'" onclick="location.href='/machineImages/{{$machine->id}}'"><i
                    class="fa fa-picture-o" aria-hidden="true" style="font-size: 35px"></i></td>
            <td><button onclick="location.href='/editMachine/{{$machine->id}}'" class="btn btn-warning">Edit </button>
            </td>
            <td><button onclick="location.href='/deleteMachine/{{$machine->id}}'" class="btn btn-danger">delete</button>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>


<!--script function -->
<script>
//dynamic oblika field
$('#categoryID').change(function() {
    var categoryID = $(this).val();
    if (categoryID) {
        $.ajax({
            type: "GET",
            url: "{{url('getSubCategories')}}?categoryID=" + categoryID,
            success: function(res) {
                if (res) {

                    var numberOfSubCategories = 0;

                    $("#subCategoryID").empty();
                    $("#subCategoryID").append('<option value="0">Select</option>');
                    $.each(res, function(key, value) {
                        numberOfSubCategories++;
                        $("#subCategoryID").append('<option value="' + key + '">' + value +
                            '</option>');
                    });

                    //make second dropdown invisible if array is empty
                    if (numberOfSubCategories == 0) {
                        document.getElementById("subCategoryID").style.visibility = "hidden";
                        document.getElementById("labelForSubCategory").style.visibility = "hidden";
                    } else if (numberOfSubCategories > 0) {
                        document.getElementById("subCategoryID").style.visibility = "visible";
                        document.getElementById("labelForSubCategory").style.visibility = "visible";
                    }
                } else {
                    $("#subCategoryID").empty();
                }
            }
        });
    } else {
        $("#subCategoryID").empty();

    }
});
</script>


@endsection