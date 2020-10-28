<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>


    <!-- StAyles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>

    <!-- Navbar -->
    <header id="navbarID">
        <img class="logo" id="logoID" src="{{URL::asset('images/logoBlack.png')}}" alt="logo">
        <nav>
            <ul class="nav-links">
                <li class="navbar-li"><a id="home" href="/indexDesign">Home</a></li>
                <li class="navbar-li"><a id="equipment" href="/products">Equipment</a></li>
                <li class="navbar-li"><a id="about" href="/about">About</a></li>
                <a href="/contact"><button id="navbar-buttonID">Contact</button></a>
                <div class="dropdown">
                    <p class="language">English(EN)</p>
                    <ul class="dropdown-content">
                        <li><a href="#">Slovenian(SL)</a></li>
                        <li><a href="#">German(GE)</a></li>
                </div>
            </ul>
        </nav>



        <!--Navbar script -->
        <script>
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
                //small navbar
                var counter = 0;
                document.getElementById("navbarID").style.backgroundColor = "#6AABC1";
                document.getElementById("navbarID").style.fontSize = "20px";
                document.getElementById("navbarID").style.padding = "2px 5%";
                document.getElementById("logoID").style.height = "80px";
                document.getElementById("logoID").src = "/images/logoWhite.png";
                document.getElementById("home").style.color = "white";
                document.getElementById("home").style.marginTop = "20px";
                document.getElementById("equipment").style.color = "white";
                document.getElementById("about").style.color = "white";
                document.getElementById("navbar-buttonID").style.backgroundColor = "white";
                document.getElementById("navbar-buttonID").style.color = "#0088a9";

                if (counter == 0) {
                    //Home animation small
                    document.getElementById("home").onmouseover = function() {
                        mouseOverSmallHome()
                    };
                    document.getElementById("home").onmouseout = function() {
                        mouseOutSmallHome()
                    };

                    function mouseOverSmallHome() {
                        document.getElementById("home").style.color = "#105561";

                    }

                    function mouseOutSmallHome() {
                        document.getElementById("home").style.color = "white";
                    }
                    //Equipment animation small
                    document.getElementById("equipment").onmouseover = function() {
                        mouseOverSmallEquipment()
                    };
                    document.getElementById("equipment").onmouseout = function() {
                        mouseOutSmallEquipment()
                    };

                    function mouseOverSmallEquipment() {
                        document.getElementById("equipment").style.color = "#105561";
                    }

                    function mouseOutSmallEquipment() {
                        document.getElementById("equipment").style.color = "white";
                    }

                    //About animation small
                    document.getElementById("about").onmouseover = function() {
                        mouseOverSmallAbout()
                    };
                    document.getElementById("about").onmouseout = function() {
                        mouseOutSmallAbout()
                    };

                    function mouseOverSmallAbout() {
                        document.getElementById("about").style.color = "#105561";
                    }

                    function mouseOutSmallAbout() {
                        document.getElementById("about").style.color = "white";
                    }

                    //Contact-button animation small
                    document.getElementById("navbar-buttonID").onmouseover = function() {
                        mouseOverSmallContactBtn()
                    };
                    document.getElementById("navbar-buttonID").onmouseout = function() {
                        mouseOutSmallContactBtn()
                    };

                    function mouseOverSmallContactBtn() {
                        document.getElementById("navbar-buttonID").style.color = "white";
                        document.getElementById("navbar-buttonID").style.backgroundColor = "#0088a9";
                    }

                    function mouseOutSmallContactBtn() {
                        document.getElementById("navbar-buttonID").style.color = "#0088a9";
                        document.getElementById("navbar-buttonID").style.backgroundColor = "white";
                    }
                }

            } else {
                counter = 1;
                document.getElementById("navbarID").style.backgroundColor = "rgba(255, 255, 255)";
                document.getElementById("navbarID").style.fontSize = "20px";
                document.getElementById("navbarID").style.padding = "2px 5%";
                document.getElementById("logoID").style.height = "120px";
                document.getElementById("logoID").src = "/images/logoBlack.png";
                document.getElementById("home").style.color = "#0088a9";
                document.getElementById("equipment").style.color = "#0088a9";
                document.getElementById("about").style.color = "#0088a9";
                document.getElementById("navbar-buttonID").style.color = "white";
                document.getElementById("navbar-buttonID").style.backgroundColor = "#0088a9";
                if (counter == 1) {
                    //Home animation big
                    document.getElementById("home").onmouseover = function() {
                        mouseOverBigHome()
                    };
                    document.getElementById("home").onmouseout = function() {
                        mouseOutBigHome()
                    };

                    function mouseOverBigHome() {
                        document.getElementById("home").style.color = "black";
                    }

                    function mouseOutBigHome() {
                        document.getElementById("home").style.color = "#0088a9";
                    }

                    //Equipment animation big
                    document.getElementById("equipment").onmouseover = function() {
                        mouseOverBigEquipment()
                    };
                    document.getElementById("equipment").onmouseout = function() {
                        mouseOutBigEquipment()
                    };

                    function mouseOverBigEquipment() {
                        document.getElementById("equipment").style.color = "black";
                    }

                    function mouseOutBigEquipment() {
                        document.getElementById("equipment").style.color = "#0088a9";
                    }

                    //About animation big
                    document.getElementById("about").onmouseover = function() {
                        mouseOverBigAbout()
                    };
                    document.getElementById("about").onmouseout = function() {
                        mouseOutBigAbout()
                    };

                    function mouseOverBigAbout() {
                        document.getElementById("about").style.color = "black";
                    }

                    function mouseOutBigAbout() {
                        document.getElementById("about").style.color = "#0088a9";
                    }

                    //Contact Button animation big
                    document.getElementById("navbar-buttonID").onmouseover = function() {
                        mouseOverBigContactBtn()
                    };
                    document.getElementById("navbar-buttonID").onmouseout = function() {
                        mouseOutBigContactBtn()
                    };

                    function mouseOverBigContactBtn() {
                        document.getElementById("navbar-buttonID").style.color = "white";
                        document.getElementById("navbar-buttonID").style.backgroundColor = "#105561";
                    }

                    function mouseOutBigContactBtn() {
                        document.getElementById("navbar-buttonID").style.color = "white";
                        document.getElementById("navbar-buttonID").style.backgroundColor = "#0088a9";
                    }
                }
            }
        }
        </script>

    </header>
    <div class="mobile-nav">
        <div id="mySidepanel" class="sidepanel">
            <a href="/indexDesign">Home</a>
            <a href="/products">Equipment</a>
            <a href="/about">About us</a>
            <a href="/contact">Contact us</a>
            <div class="dropdown">
                <p class="language">English(EN)</p>
                <ul class="dropdown-content">
                    <li><a href="#">Slovenian(SL)</a></li>
                    <li><a href="#">German(GE)</a></li>
            </div>
            <a href="pavascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        </div>
        <div class="mobile-nav-wrap-outter">
            <div class="mobile-nav-wrap-inner">
                <img class="logo" id="logoID" src="/images/logoWhiteCenter.png" alt="logo">

                <button class="openbtn" onclick="openNav()">&#9776;</button>
            </div>
        </div>
        <script>
        function openNav() {
            document.getElementById("mySidepanel").style.width = "50%";
        }

        /* Set the width of the sidebar to 0 (hide it) */
        function closeNav() {
            document.getElementById("mySidepanel").style.width = "0";
        }
        </script>
    </div>


    @yield('content')

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-outter-wrap">
            <div class="contact">
                <ul class="footer-ul">
                    <li class="footer-li">
                        <h3>CONTACT</h3>
                    </li>
                    <li class="footer-li">
                        <h3 class="contact-number">+386 31 790 586</h3>
                    </li>
                </ul>
            </div>
            <br><br>
            <div class="footer-wrap">
                <div class="newslatter">
                    <h3>NEWSLETTER</h3>
                    {!! Form::open(['url'=>'/addEmail', 'method'=> 'post' ,'id'=>'newsletterForm', 'enctype'=>
                    'multipart/form-data']) !!}
                    <input type="email" placeholder="E-mail" name="email">
                    {!! Form::close() !!}

                    <script>
                    function submitForm() {
                        document.getElementById("newsletterForm").submit();
                    }
                    </script>

                </div>
                <div class="subscribe-button-div">
                    <button onclick="submitForm()" class="subscribe-button">Subscribe</button>
                </div>
                <div class="footer-social">
                    <i class="fa fa-facebook-square" aria-hidden="true" style="font-size: 30px; color: white;"
                        id="fb-footer"></i>
                    <i class="fa fa-linkedin-square" aria-hidden="true" style="font-size: 30px; color: white;"
                        id="linkedin-footer"></i>
                </div>
            </div>
        </div>

    </footer>


    <script>
    AOS.init({
        duration: 1200,
    })
    </script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.min.js"></script>
</body>

</html>