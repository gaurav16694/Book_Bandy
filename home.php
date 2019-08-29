<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8" />
    <link href="Content/bootstrap-theme.css" rel="stylesheet" />
    <link href="Content/bootstrap.css" rel="stylesheet" />
    <link href="Content/body.css" rel="stylesheet" />
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!-- js -->
    <script src="js/jquery-1.11.1.min.js"></script>
    <!-- //js -->
</head>
<body>
<?php
?>
    <nav class="nav navbar-header">
        <div>
            <img src="file.jpg" width="1366" height="150" />
        </div>


    </nav>
    <ul class="nav nav-tabs">
        <li role="presentation" class="active"><a href="home.php">Home</a></li>
        <li role="presentation"><a href="index.php">Login</a></li>
        <li role="presentation"><a href="register.php">Register</a></li>
        <li role="presentation"><a href="#">About Us</a></li>
    </ul>


    <div class="text-center">
        <div class="container">
            <h1>
                Welcome To Book Bandy
            </h1>

        </div>
    </div>

    <div class="header">
        <div class="container">




        </div>
    </div>
    <!-- //header -->
    <!-- banner -->
    <div class="banner">
        <!-- Slider-starts-Here -->
        <script src="js/responsiveslides.min.js"></script>
        <script>
				    // You can also use "$(window).load(function() {"
				    $(function () {
				      // Slideshow 4
				      $("#slider3").responsiveSlides({
				        auto: true,
				        pager: false,
				        nav: false,
				        speed: 3000,
				        namespace: "callbacks",
				        before: function () {
				          $('.events').append("<li>before event fired.</li>");
				        },
				        after: function () {
				          $('.events').append("<li>after event fired.</li>");
				        }
				      });

				    });
        </script>
        <!--//End-slider-script -->
        <div id="top" class="callbacks_container">
            <ul class="rslides" id="slider3">
                <li>
                    <div class="banner-info">

                        <!--pics content part-->

                    </div>
                </li>
                <li>
                    <div class="banner-info1">

                        <!--pics content part-->


                    </div>
                </li>
                <li>
                    <div class="banner-info2">

                        <!--pics content part-->

                    </div>


                </li>
                <li>
                    <div class="banner-info3">

                        <!--pics content part-->

                    </div>


                </li>
                <li>
                    <div class="banner-info4">

                        <!--pics content part-->

                    </div>


                </li>
                <li>
                    <div class="banner-info5">

                        <!--pics content part-->

                    </div>


                </li>
                <li>
                    <div class="banner-info6">

                        <!--pics content part-->

                    </div>


                </li>
                <li>
                    <div class="banner-info7">

                        <!--pics content part-->

                    </div>


                </li>
            </ul>
        </div>

    </div>
    <!-- //banner -->




    <script type="text/javascript">
							$(window).load(function() {
								$("#flexiselDemo1").flexisel({
									visibleItems: 3,
									animationSpeed: 1000,
									autoPlay: true,
									autoPlaySpeed: 3000,
									pauseOnHover: true,
									enableResponsiveBreakpoints: true,
									responsiveBreakpoints: {
										portrait: {
											changePoint:480,
											visibleItems: 1
										},
										landscape: {
											changePoint:640,
											visibleItems:3
										},
										tablet: {
											changePoint:768,
											visibleItems: 3
										}
									}
								});

							});
    </script>
    <script type="text/javascript" src="js/jquery.flexisel.js"></script>
</body>
</html>
