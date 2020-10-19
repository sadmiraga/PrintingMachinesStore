@extends('layouts.mainLayout')

@section('content')


<script>
function submitForm() {
    document.getElementById("searchForm").submit();
}
</script>

<script src=//www.codermen.com/js/jquery.js></script>

<div class="content">
    <div class="search-container-warp">

        {!! Form::open(['url'=>'/search', 'method'=> 'post' , 'enctype'=> 'multipart/form-data',
         'id'=>'searchForm']) !!}

        <input class="form-control" name="query" type="text" id="search-bar" placeholder="Search..">
        <a onclick="submitForm()" href="#"><img class="search-icon"
                src="http://www.endlessicons.com/wp-content/uploads/2012/12/search-icon.png"></a>
        {{ Form::close() }}
    </div>

    <div class="products">
        {!! Form::open(['url'=>'/filterMachines', 'method'=> 'post' , 'enctype'=> 'multipart/form-data', 'class'=>'form-horizontal']) !!}


        <select class="form-control" name="sortFilter" class="dropdown">

                <option value="0" selected > Sort By </option>
                <option value="1"> Price: lowest </option>
                <option value="2"> Price: highest </option>
                <option value="3"> Date: oldest </option>
                <option value="4"> Date: newest </option>


        </select>



        <select  class="form-control"  name="categoryID" id="categoryID">
            <option value="0" selected > Izberite kategorijo </option>
            @foreach ( $categories as $category)
                <option value="{{$category->id}}"> {{$category->name}} </option>
            @endforeach
        </select>

        <select  class="form-control" name="subCategoryID" id="subCategoryID" >
            <option value="0" selected > Izberite pod kategorijo </option>
        </select>

        {!! Form::submit('Apply',['class'=>'btn btn-success']) !!}
    {!! Form::close() !!}

        <hr>
        <div class="product-wrap">
            <div class="panel-group" id="accordion">

                @foreach($categories as $category)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                                {{$category->name}}</a>
                        </h4>
                    </div>
                    <div id="collapse1" class="panel-collapse collapse in">
                        <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                            minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                            commodo consequat.</div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class='container-fluid'>
                <div class='row'>
                    @foreach($machines as $machine)

                    <?php
                            //get first image for machine
                            foreach($pictures as $picture){
                                if($picture->machineID == $machine->id){
                                    $image = $picture;
                                break;
                                }
                            }
                        ?>

                    <div onclick="window.location.href='/productInfo/{{$machine->id}}'" id="productCard"
                        class="card col-md-3" style="width: 18rem;">
                        <img class="categories-img" style="object-fit: cover;" height="200" width="500"
                            src="images\machines\{{$image->image}}">
                        <div class="card-body">
                            <h5 class="card-title">{{$machine->name}}</h5>
                            <p class="card-text">
                                year: {{$machine->year}} <br>
                                manufacturer: {{$machine->manufacturer}} <br>
                                model: {{$machine->model}}
                            </p>

                            <button class="makeOfferButton"> make offer </button>
                        </div>
                    </div>


                    @endforeach
                </div>
            </div>

        </div>
    </div>

    <!-- pages -->
    <div class="d-flex">
        <div class="mx-auto">
            {{$machines->links()}}
        </div>
    </div>

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

            } else if(numberOfSubCategories > 0){
                document.getElementById("subCategoryID").style.visibility = "visible";
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
