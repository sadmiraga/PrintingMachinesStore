<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    +

    <head>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>

    <body>
        <div class="gallery-wraper">
            <i onclick="goBack()" class="fa fa-times" aria-hidden="true" id="close-window"></i>

            <div class="row">
                <a class="prev" onclik="plusSlides(-1)"><i class="fa fa-angle-left"></i></a>
                @foreach ($pictures as $picture)
                <div class="mySlides">
                    <img src="/images/machines/{{$picture->image}}" alt="slide">
                </div>
                @endforeach

                <a class="next" onclick="plusSlides(1)"><i class="fa fa-angle-right"></i></a>
            </div>

            <?php
            $count = $pictures->count();
        ?>

            <h4>{{$machine->name}}</h4>
            <p id="caption" style="font-weight:bolder;"></p>


            <div style="display:none;" class="row">
                @foreach ($pictures as $picture)
                <div class="column">
                    <img class="demo cursor" src="/images/machines/{{$picture->image}}" style="width:100%"
                        onclick="currentSlide({{ $loop->index }})" alt="Image not Available">
                </div>
                @endforeach
            </div>


            <script>
            function goBack() {
                window.history.back();
            }
            </script>

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
                var allPictures = <?php echo $count ?>;
                captionText.innerHTML = slideIndex + "/" + allPictures;
            }
            </script>


    </body>

    </html>