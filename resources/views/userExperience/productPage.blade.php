@extends('layouts.mainLayout')

@section('content')

<script>
function submitForm() {
    document.getElementById("searchForm").submit();
}
</script>

<div class="content">
    <div class="search-container-warp">
        {!! Form::open(['url'=>'/search', 'method'=> 'post' , 'enctype'=> 'multipart/form-data',
        'class'=>'search-container', 'id'=>'searchForm']) !!}

        <input name="query" type="text" id="search-bar" placeholder="Search..">
        <a onclick="submitForm()" href="#"><img class="search-icon"
                src="http://www.endlessicons.com/wp-content/uploads/2012/12/search-icon.png"></a>
        {{ Form::close() }}
    </div>

    <div class="products">
        <div class="info-sort">
            <div class="category-name">
                <h2>Category<h2 class="category-counter">[100]</h2>
                </h2>
            </div>
            <div class="sort">
                <p>Sort by:</p>
                <div class="dropdown">
                    <button class="dropdownbtn">Date: newest
                        <i class="fa fa-angle-down" aria-hidden="true"></i>
                    </button>
                    <div class="dropdown-content">
                        <a href="#">Price: highest</a>
                        <a href="#">Date: lowest</a>
                        <a href="#">Date: oldest</a>
                    </div>
                </div>
            </div>
        </div>
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


    @endsection