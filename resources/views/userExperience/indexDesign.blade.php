@extends('layouts.mainLayout')

@section('content')




<div class="hero-image">
    <h1 translate="no">

        <!-- izlomljeni if -->

        <script>
                var langVariable = sessionStorage.getItem("lang");

                if(langVariable === 'Slovenian(SL)'){
                    var tag = '$';
                    var name = "langVariablePHP='";
                    var value = langVariable;
                    var last = "'";
                    var all = tag+name+value+last;
                    document.writeln(all)
                }
        </script>












        <span class="notranslate">
        <p  class="typewrite" data-period="2000"
            data-type='[ "NK MACHINES ARE HERE FOR YOU", "FIND BEST DEALS", "WE ARE OFFERING BEST MACHINES"]'>
            <span class="wrap"></span>
        </p>
    </span>
    </h1>
    <div class="hero-wrap">
        <div class="hero-search" data-aos="fade-in">
            <p onclick="checkLang();">Find the best deal</p>

            {!! Form::open(['url'=>'/search', 'method'=> 'post' , 'enctype'=> 'multipart/form-data',
            'id'=>'searchForm']) !!}

            <input class="form-control" name="query" type="text" id="search-bar" placeholder="Search..">
            <a onclick="submitForm()" href="#"><img class="search-icon"
                    src="http://www.endlessicons.com/wp-content/uploads/2012/12/search-icon.png"></a>
            {{ Form::close() }}

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

                    <div onclick="window.location.href='/products/byCategory/{{$category->id}}'" data-aos="fade-right"
                        style="overflow: hidden;" class='col-md-4' id="categories-col">
                        <img class="categories-img" style="object-fit: cover;" height="200" width="500"
                            src="/images/categories/{{$category->categoryImage}}">
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
            <a class="number" href="tel:+38631790586">+386 31 790 586</a>
            <a class="mail" href="mailto:nk.graphicmachines@gmail.com">nk.graphicmachines@gmail.com</a>
        </div>
        <div class="text-container" data-aos="zoom-in">
            <p class="text-container-h1">
                Trust and seriousness are the basis of the daily work at NK machines
            </p>
            <p class="text-container-p">
                This basis in the cooperation with clients and employees allows us to successfully implement the orders and wishes of our customers,
                whereby we always punctuality and in every situation guarantee a high standard of quality in execution.<br><br>

                With our experienced employees, we take on the responsibility to meet the requirements of our customers and to ensure that our own goals
                 of offering a comprehensive professional service are also implemented.<br><br>

                We believe that it is important not only to work with the best team, but also with the best.
            </p>
            <a href="/about"><button class="text-container-button">ABOUT US</button></a>
        </div>
    </div>
</div>

<div class="content-parallax">
    <p class="text-parallax" data-aos="zoom-in ">BUY YOUR MACHINE NOW</p>
    <a href="/products"><button class="button-parallax" data-aos="zoom in">EQUIPMENT</button></a>
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
                    <a class="contact-a" href="/contact">Contact us</a>
                </div>
            </div>
        </div>
    </div>
</div>


</html>


@endsection
