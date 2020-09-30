<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="mainLayout.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- StAyles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <header id="navbarID">
        <img class="logo" id="logoID" src="images/logoBlack.png" alt="logo">
        <nav>
            <ul class="nav-links">
                <li class="navbar-li"><a id="home" href="#">Home</a></li>
                <li class="navbar-li"><a id="equipment" href="#">Equipment</a></li>
                <li class="navbar-li"><a id="about" href="#">About</a></li>
            </ul>
        </nav>
        <a href="#"><button id="navbar-buttonID">Contact</button></a>
    </header>


    <script>
    window.onscroll = function() {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
            document.getElementById("navbarID").style.backgroundColor = "#6AABC1";
            document.getElementById("navbarID").style.fontSize = "20px";
            document.getElementById("navbarID").style.padding = "2px 5%";
            document.getElementById("logoID").style.height = "80px";
            document.getElementById("logoID").src = "images/logoWhite.png";
            document.getElementById("home").style.color = "white";
            document.getElementById("home").style.marginTop = "20px";
            document.getElementById("equipment").style.color = "white";
            document.getElementById("about").style.color = "white";
            document.getElementById("navbar-buttonID").style.backgroundColor = "white";
            document.getElementById("navbar-buttonID").style.color = "#0088a9";
        } else {
            document.getElementById("navbarID").style.backgroundColor = "rgba(255, 255, 255, 0.8)";
            document.getElementById("navbarID").style.fontSize = "20px";
            document.getElementById("navbarID").style.padding = "2px 5%";
            document.getElementById("logoID").style.height = "120px";
            document.getElementById("logoID").src = "images/logoBlack.png";
            document.getElementById("home").style.color = "#0088a9";
            document.getElementById("equipment").style.color = "#0088a9";
            document.getElementById("about").style.color = "#0088a9";
            document.getElementById("navbar-buttonID").style.color = "white";
            document.getElementById("navbar-buttonID").style.backgroundColor = "#0088a9";

        }
    }
    </script>

    <div class="hero">
        <img class="heroimg" src="images/heroTest.png">
    </div>
    <div class="content">
        content
    </div>

    <footer class="footer">
        <div class="contact">
            <ul class="footer-ul">
                <li class="footer-li">
                    <h3>CONTACT</h3>
                </li>
                <li class="footer-li">
                    <h3 class="contact-number">+386 069 100 200</h3>
                </li>
            </ul>
        </div>
        <br><br>
        <div class="newslatter">
            <h3>NEWSLETTER</h3>
            <input type="email" placeholder="E-mail" name="email" required>
            <button class="subscribe-button">Subscribe</button>
        </div>
    </footer>

</body>

</html>