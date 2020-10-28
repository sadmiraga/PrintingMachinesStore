@extends('layouts.mainLayout')

@section('content')

<script>
function submitForm() {
    document.getElementById("searchForm").submit();
}
</script>



<div class="product-info-wrap">
    <div class="product-info">

        @isset ($message)
        <div class="alert alert-success">
            {{$message}}
        </div>
        @endisset



        {!! Form::open(['url'=>'/search', 'method'=> 'post' , 'enctype'=> 'multipart/form-data',
        'id'=>'searchForm']) !!}

        <input class="form-control" name="query" type="text" id="search-bar" placeholder="Search..">
        <a onclick="submitForm()" href="#"><img class="search-icon"
                src="http://www.endlessicons.com/wp-content/uploads/2012/12/search-icon.png"></a>
        {{ Form::close() }}

        <div class="product-info-name">
            <h2>{{$machine->name}}</h2>
        </div>
        <div class="product-info-gallery-wrap">
            <div class="product-info-gallery">

                <?php
                    $counter = 0;
                ?>

                <div class="gallery-small"></div>
                @foreach($pictures as $picture)

                <?php
                        if($counter==0){
                            $mainImage = $picture->image;
                        }
                        $counter++;

                        $numberOfPictures = $pictures->count()-5;

                    ?>



                @if($counter == 5)
                <div class="show-all-img-container">
                    <img style="background: rgba(0, 0, 0, 0.5);" class="show-all-img"
                        src='{{URL::asset("images/machines/$picture->image")}}'
                        onclick="window.location.href='/productGalery/{{$machine->id}}'">
                    <p onclick="window.location.href='/productGalery/{{$machine->id}}'" class="img-counter">
                        +{{$numberOfPictures}}</p>
                </div>
                @break
                @else
                <img class="gallery-small-img" src='{{URL::asset("images/machines/$picture->image")}}'
                    onclick="galleryFunction(this)">
                @endif

                @endforeach



            </div>
            <div class="img-container">
                <img id="imageBox" class="container-img" src='{{URL::asset("images/machines/$mainImage")}}'>
            </div>
            <div class="make-offer-wrap">
                <div class="make-offer-container">
                    <h2>Contact us
                    </h2>
                    <p class="make-offer-number">+386 31 790 586</p>
                    <h2>E-mail</h2>
                    <p class="make-offer-email">Mail@gmail.com</p>
                    <button id="make-offer-btn" class="make-offer-btn">REQUEST PRICE</button>
                </div>
            </div>

            <!-- The Modal -->
            <div id="myModal" class="modal">

                <!-- Modal content -->
                <div class="modal-content">
                    <span class="close">&times;</span>
                    {!! Form::open(['url'=>'/sendMail', 'method'=> 'post' , 'enctype'=> 'multipart/form-data']) !!}

                    <input class="form-control" id="#m" name="email" type="text" placeholder="Input your email">

                    <input type="hidden" id="machineID" name="machineID" value="{{$machine->id}}">

                    <button onclick="submitForm()" id="make-offer-btn" class="make-offer-btn">REQUEST PRICE</button>

                    {{ Form::close() }}
                </div>
            </div>

        </div>
        <div class="product-info-desc">
            <h2>Description</h2>
            <div class="product-info-desc-content">
                <dl class="product-info-data">
                    <dt>Name: </dt>
                    <dd>
                        @if($machine->name != null)

                        {{$machine->name}}
                        @else
                        /
                        @endif
                    </dd>

                    @if($machine->model != null)
                    <dt>Model: </dt>
                    <dd>

                        {{$machine->model}}

                        @endif
                    </dd>
                    <dt>Manufacturer: </dt>
                    <dd>
                        @if($machine->manufacturer != null)

                        {{$machine->manufacturer}}
                        @else
                        /
                        @endif
                    </dd>
                    <dt>Year: </dt>
                    <dd>
                        @if($machine->year != null)

                        {{$machine->year}}
                        @else
                        /
                        @endif
                    </dd>
                    <dt>Number of Colors: </dt>
                    <dd>
                        @if($machine->numberOfColors != null)

                        {{$machine->numberOfColors}}
                        @else
                        /
                        @endif
                    </dd>
                    <dt>Condition: </dt>
                    <dd>
                        {{$machine->condition}}
                    </dd>
                    <dt>Sheet size: </dt>
                    <dd>
                        @if($machine->sheetSize != null)

                        {{$machine->sheetSize}}
                        @else
                        /
                        @endif
                    </dd>
                    <dt>Stock Number: </dt>
                    <dd>
                        @if($machine->stockNumber != null)

                        {{$machine->stockNumber}}
                        @else
                        /
                        @endif
                    </dd>
                    <dt>Serial number: </dt>
                    <dd>
                        @if($machine->serialNumber != null)

                        {{$machine->serialNumber}}
                        @else
                        /
                        @endif
                    </dd>
                    <dt>Impresions: </dt>
                    <dd>
                        @if($machine->impresions != null)

                        {{$machine->impresions}}
                        @else
                        /
                        @endif
                    </dd>
                    <dt>Category: </dt>
                    <dd>
                        @if($machine->categoryID != null)

                        {{$categoryName}}
                        @else
                        /
                        @endif
                    </dd>
                    <dt>Subcategory: </dt>
                    <dd>

                        @if($machine->subCategoryID != null)

                        {{$subCategoryName}}
                        @else
                        /
                        @endif
                    </dd>
            </div>
        </div>
    </div>
</div>

<iframe
    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2753.584566976981!2d15.105529215840997!3d46.35778888139304!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x476567284cdade01%3A0xcb884d5a5ae91c38!2sLjubljanska%20cesta%205a%2C%203320%20Velenje!5e0!3m2!1sen!2ssi!4v1603291171490!5m2!1sen!2ssi"
    width="100%" height="600" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
    tabindex="0"></iframe>

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
                    <a class="contact-a" href="/contact">Contact us</a>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("make-offer-btn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

function galleryFunction(smallImg) {
    var fullImg = document.getElementById("imageBox");
    fullImg.src = smallImg.src;
}
</script>


@endsection