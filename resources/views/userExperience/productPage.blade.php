@extends('layouts.mainLayout')

@section('content')


<div class="content">
    <div class="search-container-warp">
        <form class="search-container">
            <input type="text" id="search-bar" placeholder="Search..">
            <a href="#"><img class="search-icon"
                    src="http://www.endlessicons.com/wp-content/uploads/2012/12/search-icon.png"></a>
        </form>
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
            <div class="product">

            </div>
        </div>
    </div>
</div>

@endsection