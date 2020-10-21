@extends('layouts.mainLayout')
@section('content')

<br><br><br><br><br>
<h1> {{$machine->name}} </h1>




<div style="margin-left:25%;margin-right:25%;width:50%;" class="row">
    <a class="prev" onclick="plusSlides(-1)">Previous</a>
    @foreach ($pictures as $picture)
    <div class="mySlides">
        <img src="/images/machines/{{$picture->image}}" style="width:300px" alt="slide">
    </div>
    @endforeach


    <a class="next" onclick="plusSlides(1)">Next</a>
</div>

<div style="display:none;" class="row">
    @foreach ($pictures as $picture)
    <div class="column">
        <img class="demo cursor" src="/images/machines/{{$picture->image}}" style="width:300px"
            onclick="currentSlide({{ $loop->index }})" alt="Image not Available">
    </div>
    @endforeach
</div>




<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("demo");
    var captionText = document.getElementById("caption");
    if (n > slides.length) {
        slideIndex = 1
    }
    if (n < 1) {
        slideIndex = slides.length
    }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
    captionText.innerHTML = dots[slideIndex - 1].alt;
}
</script>



@endsection