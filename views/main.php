<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js" integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="assets/scss/style.css">
        <link rel="stylesheet" href="<?php echo$_SESSION['profile_path']; ?>assets/scss/style.css">
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/ScrollMagic.min.js"></script>
    </head>
    <body>
        <div id="wrapper">
            <header>
                  
                <nav class="nav-bar">
                     
                    <ul id="left">
                        <li><a class="brand" href="<?php echo ROOT_URL; ?>">Nikola P.</a></li>
                    </ul>
                    <ul id="right">
                        <li><a href="<?php echo ROOT_URL; ?>">Home</a></li>
                        <li><a href="<?php echo ROOT_URL; ?>shares">Shares</a></li>
                        <?php if (isset($_SESSION['is_logged_in'])) : ?>
                        <li><a href="<?php echo ROOT_URL; ?>users/profile"><img class='profileImg main' src="<?php echo str_replace(' ', '', $_SESSION['profile_path'].$_SESSION['user_data']['profile']); ?>" alt=""><?php echo $_SESSION['user_data']['name']; ?></a></li>  
                        <li><a class="login" href="<?php echo ROOT_URL; ?>users/logout">Log out</a></li>
                        <?php else: ?>

                            <li><a href="<?php echo ROOT_URL; ?>users/register">Sign Up</a></li>
                            <li><a class="login" href="<?php echo ROOT_URL; ?>users/login">Login</a></li>

                        <?php endif; ?>
                    </ul>
                    <div style="clear: both;"></div>
                </nav>
                <div class="responsive-bar">
                    <h3 class="brand"><a href="<?php echo ROOT_URL; ?>">Nikola P.</a></h3>
                    <h4 class="menu" >Menu</h4>
                    <div style="clear: both"></div>
                </div>
            </header>
        </div>
        <section class="content">
            <div class="row">
                <?php require($view); ?>
            </div>
        </section>

        <footer>
            <div class="wrapper-footer">
                <nav>
                    <ul>
                        <li><a href="<?php echo ROOT_URL; ?>#aboutMe">About me</a></li>
                        <li><a href="<?php echo ROOT_URL; ?>#h2-projects">Projects</a></li>
                        <li><a href="<?php echo ROOT_URL; ?>#contact-form">Contact me</a></li>
                        <li><a href="<?php echo ROOT_URL; ?>users/register">Adress: Belyakovec</a></li>
                        <li><a class="active" href="<?php echo ROOT_URL; ?>users/login">Phone number: 088 930 2605</a></li>
                        <li><a class="active" href="<?php echo ROOT_URL; ?>users/login"><small>&copy; 23.3.2018 - <?php echo date('Y'); ?> </small></a></li>
                    </ul>
                </nav>
            </div>
        </footer>
        <script>
            $(document).ready(function () {


                $(window).on('scroll', function () {
                    if ($(window).scrollTop()) {
                        $('nav').addClass('black');
                        $('.responsive-bar').addClass('black');
                    } else {
                        $('nav').removeClass('black');
                        $('.responsive-bar').removeClass('black');
                    }
                });
                $(".menu").click(function () {
                    $(".nav-bar").slideToggle(200);
                });

            });

            $(".add-info").click(function () {
                if ($('.well').attr("id") === "shrinked") {
                    $('.well').attr("id", "full");
                    $(this).html('Normal size');
                } else {
                    $('.well').attr("id", "shrinked");
                    $(this).html('All comments');
                }
            });

            var slideIndex = 1;
            showDivs(slideIndex);

            var slideIndex = 1;
            showDivs(slideIndex);

            function plusDivs(n) {
                showDivs(slideIndex += n);
            }

            function showDivs(n) {
                var i;
                var x = $(".mySlides");
                if (n > x.length) {
                    slideIndex = 1;
                }
                if (n < 1) {
                    slideIndex = x.length;
                }
                for (i = 0; i < x.length; i++) {
                    x[i].style.display = "none";
                }
                x[slideIndex - 1].style.display = "block";
            }

            setInterval(function timer() {
                return plusDivs(1);
            }, 10000);


            function initMap() {
                var location = {lat: 43.100674, lng: 25.587151};
                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 12,
                    center: location
                });
                var marker = new google.maps.Marker({
                    position: location,
                    map: map
                });
            }


            var controller = new ScrollMagic.Controller();

            var scene = new ScrollMagic.Scene({
                triggerElement: '.red-cube'
            })

                    .setClassToggle('.red-cube', 'show')
                    .addTo(controller);
        </script>

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBeDPx3jBwK_2jGMykX6bE8pbn2D8CR2FQ&callback=initMap"
        async defer></script>
    </body>
</html>