@extends('layouts.mainLayout')

@section('content')




<div class="hero-image">
    <h1>
        <p class="typewrite" data-period="2000"
            data-type='[ "NK MACHINES ARE HERE FOR YOU", "FIND BEST DEALS", "SOME TEXT", "MORE TEXT" ]'>
            <span class="wrap"></span>
        </p>
    </h1>
    <div class="hero-wrap">
        <div class="hero-search" data-aos="fade-in">
            <p>Find the best deal</p>
            <div class="container">
                <input type="text" placeholder="Search...">
                <div class="search"></div>
            </div>
        </div>
    </div>
</div>

<script>
var TxtType = function(el, toRotate, period) {
    this.toRotate = toRotate;
    this.el = el;
    this.loopNum = 0;
    this.period = parseInt(period, 10) || 2000;
    this.txt = '';
    this.tick();
    this.isDeleting = false;
};

TxtType.prototype.tick = function() {
    var i = this.loopNum % this.toRotate.length;
    var fullTxt = this.toRotate[i];

    if (this.isDeleting) {
        this.txt = fullTxt.substring(0, this.txt.length - 1);
    } else {
        this.txt = fullTxt.substring(0, this.txt.length + 1);
    }

    this.el.innerHTML = '<span class="wrap">' + this.txt + '</span>';

    var that = this;
    var delta = 200 - Math.random() * 100;

    if (this.isDeleting) {
        delta /= 2;
    }

    if (!this.isDeleting && this.txt === fullTxt) {
        delta = this.period;
        this.isDeleting = true;
    } else if (this.isDeleting && this.txt === '') {
        this.isDeleting = false;
        this.loopNum++;
        delta = 500;
    }

    setTimeout(function() {
        that.tick();
    }, delta);
};

window.onload = function() {
    var elements = document.getElementsByClassName('typewrite');
    for (var i = 0; i < elements.length; i++) {
        var toRotate = elements[i].getAttribute('data-type');
        var period = elements[i].getAttribute('data-period');
        if (toRotate) {
            new TxtType(elements[i], JSON.parse(toRotate), period);
        }
    }
    // INJECT CSS
    var css = document.createElement("style");
    css.type = "text/css";
    css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid #fff}";
    document.body.appendChild(css);
};
</script>

<div class="content-categories-outter-wrap">
    <div class="content-categories-main" data-aos="fade-in" data-aos-duration="3000">
        <div class="categtories-content">
            <div>
                <p class="categtories-h1">CATEGORIES</p>
            </div>
            <div class='container-fluid'>
                <div class='row'>
                    @foreach($categories as $category)
                    <div data-aos="fade-right" style="overflow: hidden;" class='col-md-4' id="categories-col">
                        <img class="categories-img" style="object-fit: cover;" height="200" width="500"
                            src="images\categories\{{$category->categoryImage}}">
                        <div class="text-block">
                            <p>{{$category->name}}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content-text-outter-wrap">
    <div class="content-text">
        <div class="contact-container" data-aos="fade-right">
            <i class="fa fa-mobile" aria-hidden="true" style="font-size: 100px; color: #105561;" id="mobile"></i>
            <p class="number">+386 69 100 200</p>
            <p class="mail">mail@gmail.com</p>
        </div>
        <div class="text-container" data-aos="zoom-in">
            <p class="text-container-h1">
                BUYING AND SELLING PRINTING
                EQUIPMENT SINCE 1972
            </p>
            <p class="text-container-p">
                After 16 years with AM Multigraphics, Jack Oskin opened Dixie Reproductions to supply print businesses
                with
                used Davidson, Multilith and AB Dick printing presses.<br><br>

                In the late 70s, the company shifted its focus to larger presses, and today it stands as one of the
                nation's
                most trusted dealers in presses, cutters, CTP systems, die cutters, wide format printers and
                more!<br><br>
                In the late 70s, the company shifted its focus to larger presses, and today it stands as one of the
                nation's
                most trusted dealers in presses, cutters, CTP systems, die cutters, wide format printers and more!
            </p>
            <button class="text-container-button">ABOUT US</button>
        </div>
    </div>
</div>

<div class="content-parallax">
    <p class="text-parallax" data-aos="zoom-in ">BUY YOUR MACHINE NOW</p>
    <button class="button-parallax" data-aos="zoom in">EQUIPMENT</button>
</div>

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


</html>


@endsection