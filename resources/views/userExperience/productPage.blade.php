@extends('layouts.mainLayout')

@section('content')


<script>
function submitForm() {
    document.getElementById("searchForm").submit();
}
</script>

<script src=//www.codermen.com/js/jquery.js></script>

<div class="content">
    <div class="sarch-container-bg">
        <div class="search-container-warp">

            {!! Form::open(['url'=>'/search', 'method'=> 'post' , 'enctype'=> 'multipart/form-data',
            'id'=>'searchForm']) !!}

            <input class="form-control" name="query" type="text" id="search-bar" placeholder="Search..">
            <a onclick="submitForm()" href="#"><img class="search-icon"
                    src="http://www.endlessicons.com/wp-content/uploads/2012/12/search-icon.png"></a>
            {{ Form::close() }}
            <div class="form-control-wrap">
                {!! Form::open(['url'=>'/filterMachines', 'method'=> 'post' , 'enctype'=> 'multipart/form-data',
                'class'=>'form-inline']) !!}

                <select class="form-control" name="categoryID" id="categoryID">
                    <option value="0" selected> Category </option>
                    @foreach ( $categories as $category)
                    <option value="{{$category->id}}"> {{$category->name}} </option>
                    @endforeach
                </select>

                <select class="form-control" name="subCategoryID" id="subCategoryID">
                    <option value="0" selected> Subcategory </option>
                </select>
                <select class="form-control" id="sort-filter-id" name="sortFilter" class="dropdown">

                    <option value="0" selected> Sort By </option>
                    <option value="1"> Price: lowest </option>
                    <option value="2"> Price: highest </option>
                    <option value="3"> Date: oldest </option>
                    <option value="4"> Date: newest </option>


                </select>


                {!! Form::submit('Search',['class'=>'btn btn-success']) !!}
                {!! Form::close() !!}

            </div>
        </div>
    </div>

    <div class="product-wrap">

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
                            Year: {{$machine->year}} <br>

                            Condition: {{$machine->condition}}<br>

                            Manufacturer: {{$machine->manufacturer}} <br>

                            Model: {{$machine->model}}

                        </p>

                        <a class="view-more"> View more details.. </a>
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
                        $("#subCategoryID").append('<option value="' + key + '">' +
                            value + '</option>');
                    });

                    //make second dropdown invisible if array is empty
                    if (numberOfSubCategories == 0) {
                        document.getElementById("subCategoryID").style.visibility = "hidden";

                    } else if (numberOfSubCategories > 0) {
                        document.getElementById("subCategoryID").style.visibility = "visible";

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

<div class="content-contact-outter-wrap">
    <div class="content-contact" data-aos="zoom-in">
        <div class="container-contact">
            <div class="text-contact">
                <div data-aos="fade-right">
                    <i class="fa fa-comments-o" aria-hidden="true" style="font-size: 100px; color: #105561;"></i>
                    <h1>How can we be of assistance?</h1>
                    <p> Find answers on most asked questions<br> or contact us for help.</p>
                </div>
                <div class=" contact-button-div" data-aos="fade-left">
                    <a class=contact-a>Contact us</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection