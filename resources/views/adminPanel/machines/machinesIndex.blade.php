@extends('layouts.adminPanelLayout')
@section('content')

<script src=//www.codermen.com/js/jquery.js></script>

<div class="adminContainer">
    <div id="formDiv">

        @if($errors->any())
        <div class="alert alert-danger" id="adminPanelTextInput" role="alert">
            {{$errors->first()}}
          </div>
        @endif

        {!! Form::open(['url'=>'/addMachine', 'method'=> 'post' , 'enctype'=> 'multipart/form-data',
        'class'=>'form-horizontal']) !!}
        @csrf


        <label class="machineLabel"> Obvezno * </label>
        {!!Form::text('machineName','',['class'=>'form-control','id'=>'adminPanelTextInput','placeholder'=>'Vpišite ime mašine', 'required'=>'required'])!!}


        {!!Form::text('machineModel','',['class'=>'form-control','id'=>'adminPanelTextInput','placeholder'=>'Vpišite model mašine'])!!}

        <label class="machineLabel"> Obvezno * </label>
        {!!Form::text('manufacturer','',['class'=>'form-control','id'=>'adminPanelTextInput','placeholder'=>'Vpišite proizvajalca masine'])!!}


        {!!Form::text('stockNumber','',['class'=>'form-control','id'=>'adminPanelTextInput','placeholder'=>'Vpišite kolicinsko stanje'])!!}


        {!!Form::text('sheetSize','',['class'=>'form-control','id'=>'adminPanelTextInput','placeholder'=>'Vpišite velikost lista'])!!}

        {!!Form::text('serialNumber','',['class'=>'form-control','id'=>'adminPanelTextInput','placeholder'=>'Vpišite serijsko število'])!!}





        <label class="machineLabel"> Stevilo barv</label>
        {!! Form::input('number', 'numberOfColors', 0, ['id' => 'adminPanelTextInput', 'class' => 'form-control']) !!}



        <label class="machineLabel"> Vnesite slike za mašino </label>
        <input required="required" id="adminPanelTextInput" placeholder="vnesite slike masine" type="file" name="files[]" multiple>



        <label class="machineLabel"> Stanje</label>
        <select id="adminPanelTextInput" class="form-control" name="condition">
            <option value="new" selected> Novo </option>
            <option value="used"> Rabljeno </option>
        </select>

        <label class="machineLabel"> Letnik masine </label>
        {!! Form::input('number', 'year', 2020, ['id' => 'adminPanelTextInput', 'class' => 'form-control', 'min' =>
        1800, 'max' => 2020]) !!}




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
        <select required
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
            <th scope="col">Ime</th>
            <th scope="col">Cena</th>
            <th scope="col">Stanje</th>
            <th scope="col">Model</th>
            <th scope="col">Proizvajalec</th>
            <th scope="col">Letnik</th>
            <th scope="col">Stevilo barv</th>
            <th scope="col">Velikost lista</th>
            <th scope="col">Stanje</th>
            <th scope="col">Serijsko stevilo</th>
            <th scope="col">Impresions</th>
            <th scope="col">opis</th>
            <th scope="col">Kategorija</th>
            <th scope="col">Podkategorija</th>
            <th scope="col">Slike</th>
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
            <td onMouseOver="this.style.cursor='pointer'" onclick="location.href='/editDescription/{{$machine->id}}'">Pogledaj opis</td>
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
            <td><button onclick="location.href='/editMachine/{{$machine->id}}'" class="btn btn-warning">uredi </button>
            </td>
            <td><button onclick="location.href='/deleteMachine/{{$machine->id}}'" class="btn btn-danger">izbrisi</button>
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
