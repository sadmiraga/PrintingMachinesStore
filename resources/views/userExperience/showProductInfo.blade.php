+@extends('layouts.mainLayout')

@section('content')



<div class="product-info-wrap">
    <div class="product-info">
        <div class="product-info-name">
            <h1>{{$machine->name}}</h1>
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
                            <p onclick="window.location.href='/productGalery/{{$machine->id}}'" class="img-counter">+{{$numberOfPictures}}</p>
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
                    <h1>Contact us
                    </h1>
                    <p class="make-offer-number">+386 31 790 586</p>
                    <h1>E-mail</h1>
                    <p class="make-offer-email">Mail@gmail.com</p>
                    <button class="make-offer-btn">MAKE OFFER</button>
                </div>
            </div>
        </div>
        <hr>
        <div class="product-info-desc">
            <h1>Description</h1>
            <ul class="product-info-desc-content">
                <li><p class="product-info-data">Name: {{$machine->name}} </p><p class="product-info-data-desc"></p></li>

                @if($machine->model != null)
                    <li><p class="product-info-data">Model: {{$machine->model}} </p><p class="product-info-data-desc"></p></li>
                @endif

                @if($machine->manufacturer != null)
                <li><p class="product-info-data">Manufacturer: {{$machine->manufacturer}} </p><p class="product-info-data-desc"></p></li>
                @endif

                @if($machine->year != null)
                <li><p class="product-info-data">year: {{$machine->year}} </p><p class="product-info-data-desc"></p></li>
            @endif

            @if($machine->numberOfColors != null)
            <li><p class="product-info-data">Number of COlors: {{$machine->numberOfColors}} </p><p class="product-info-data-desc"></p></li>
        @endif


                <li><p class="product-info-data">Condition: {{$machine->condition}} </p><p class="product-info-data-desc"></p></li>


                <li><p class="product-info-data">Sheet size: </p><p class="product-info-data-desc"></p></li>
                <li><p class="product-info-data">Stock number: </p><p class="product-info-data-desc"></p></li>
                <li><p class="product-info-data">Serial number: </p><p class="product-info-data-desc"></p></li>
                <li><p class="product-info-data">Impressions: </p><p class="product-info-data-desc"></p></li>
                <li><p class="product-info-data">Category: </p><p class="product-info-data-desc"></p></li>
                <li><p class="product-info-data">Description : - </li>
         </ul>
        </div>
    </div>
</div>



<script>
function galleryFunction(smallImg) {
    var fullImg = document.getElementById("imageBox");
    fullImg.src = smallImg.src;
}
</script>


@endsection
