@extends('layouts.mainLayout')

@section('content')

<div class="product-info-wrap">
    <div class="product-info">
        <div class="product-info-name">
            <h1>Product Info Name</h1>
        </div>
        <div class="product-info-gallery-wrap">
            <div class="product-info-gallery">
                <div class="gallery-small"></div>
                <img class="gallery-small-img" src="{{URL::asset('images/machines/testmachine.jpg')}}"
                    onclick="galleryFunction(this)">
                <img class="gallery-small-img" src="{{URL::asset('images/machines/20201013221729-ca4a26a91f.jpg')}}"
                    onclick="galleryFunction(this)">
                <img class="gallery-small-img" src="{{URL::asset('images/machines/20201013223019-profi.jpg')}}"
                    onclick="galleryFunction(this)">
                <img class="gallery-small-img" src="{{URL::asset('images/machines/20201013223137-profi2.jpg')}}"
                    onclick=galleryFunction(this)>
                <div class="show-all-img-container">
                    <img style="background: rgba(0, 0, 0, 0.5);" class="show-all-img"
                        src="{{URL::asset('images/machines/20201013221729-ca4a26a91f.jpg')}}"
                        onclick="showAllImg(this)">
                    <p onclick="showAllImg(this)" class="img-counter">10+</p>
                </div>
            </div>
            <div class="img-container">
                <img id="imageBox" class="container-img" src="{{URL::asset('images/machines/testmachine.jpg')}}">
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
    </div>

</div>
<script>
function galleryFunction(smallImg) {
    var fullImg = document.getElementById("imageBox");
    fullImg.src = smallImg.src;
}
</script>

<script>
function showAllImg(smallImg) {
    window.location.href = 'home.blade.php';
}
</script>
@endsection