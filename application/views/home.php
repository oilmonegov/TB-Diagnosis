<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>TB Expert System</title>

    <!-- Font Awesome -->
   <link href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('landing/css/bootstrap.min.css'); ?>" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="<?php echo base_url('landing/css/mdb.min.css'); ?>" rel="stylesheet">

    <!-- Template styles -->
    <style rel="stylesheet">
        /* TEMPLATE STYLES */
        /* Necessary for full page carousel*/
        
        html,
        body,
        .view {
            height: 100%;
            width: 100%;
        }
        /* Navigation*/
        
        .navbar {
            background-color: transparent;
        }
        
        .scrolling-navbar {
            -webkit-transition: background .5s ease-in-out, padding .5s ease-in-out;
            -moz-transition: background .5s ease-in-out, padding .5s ease-in-out;
            transition: background .5s ease-in-out, padding .5s ease-in-out;
        }
        
        .top-nav-collapse {
            background-color: #1C2331;
        }
        
        footer.page-footer {
            background-color: #1C2331;
            margin-top: 0;
        }
        
        @media only screen and (max-width: 768px) {
            .navbar {
                background-color: #1C2331;
            }
        }
        /* Carousel*/
        
        .carousel,
        .carousel-item,
        .active {
            height: 100%;
        }
        
        .carousel-inner {
            height: 100%;
        }
        
        .flex-center {
            color: #fff;
        }
        
        .carousel-caption {
            height: 100%;
            padding-top: 7rem;
        }
    </style>

</head>

<body>


    <!--Navbar-->
    <nav class="navbar navbar-toggleable-md navbar-dark fixed-top scrolling-navbar">
        <div class="container">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav1" aria-controls="navbarNav1" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url(); ?>">
                <strong>TB Expert System</strong>
            </a>
            <div class="collapse navbar-collapse" id="navbarNav1">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('home/login'); ?>">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--/.Navbar-->

    <!--Carousel Wrapper-->
    <div id="video-carousel-example2" class="carousel slide carousel-fade" data-ride="carousel">
        <!--Indicators-->
        <ol class="carousel-indicators">
            <li data-target="#video-carousel-example2" data-slide-to="0" class="active"></li>
            <li data-target="#video-carousel-example2" data-slide-to="1"></li>
            <li data-target="#video-carousel-example2" data-slide-to="2"></li>
        </ol>
        <!--/.Indicators-->

        <!--Slides-->
        <div class="carousel-inner" role="listbox">
            <!--First slide-->
            <div class="carousel-item active">
                <!--Mask color-->
                <div class="view hm-black-strong">

                    <!--Video source-->
                    <img src="landing/img/pix2.jpg" />
                    <div class="full-bg-img"></div>
                </div>

                <!--Caption-->
                <div class="carousel-caption">
                    <div class="flex-center animated fadeIn">
                        <ul>
                            <li>
                                <h1 class="h1-responsive">Tuberculosis Diagnosis Expert System</h1></li>
                            <li>
                                <p>The most powerful and free TB Diagnosis Expert System</p>
                            </li>
                            <li>
                                <a href="<?php echo base_url('home/login'); ?>" class="btn btn-primary btn-lg" >Login</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--Caption-->
            </div>
            <!--/First slide-->

            <!--Second slide-->
            <div class="carousel-item">
                <!--Mask color-->
                <div class="view hm-black-strong">
                    <!--Video source-->
                    <img src="landing/img/pix3.jpg" width=100% height=100% />
                    <div class="full-bg-img"></div>
                </div>

                <!--Caption-->
                <div class="carousel-caption">
                    <div class="flex-center animated fadeInDown">
                        <ul>
                            <li>
                                <h1 class="h1-responsive">A powerful AI tool at your disposal</h1>
                            </li>
                            <li>
                                <p>And it is all FREE!</p>
                            </li>
                          <li>
                                <a href="<?php echo base_url('home/login'); ?>" class="btn btn-primary btn-lg" >Login</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--/.Caption-->
            </div>
            <!--/Second slide-->

            <!--Third slide-->
            <div class="carousel-item">
                <!--Mask color-->
                <div class="view hm-black-strong">
                    <!--Video source-->
                     <img src="landing/img/pix1.jpg" width=100% height=100% />
                    <div class="full-bg-img"></div>
                </div>

                <!--Caption-->
                <div class="carousel-caption">
                    <div class="flex-center animated fadeInDown">
                        <ul>
                            <li>
                                <h1 class="h1-responsive">Use our AI tool now</h1></li>
                            <li>
                                <p>Our application can help you with TB diagnosis</p>
                            </li>
                           <li>
                                <a href="<?php echo base_url('home/login'); ?>" class="btn btn-default btn-lg" >Login</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--/.Caption-->
            </div>
            <!--/Third slide-->
        </div>
        <!--/.Slides-->

        <!--Controls-->
        <a class="carousel-control-prev" href="#video-carousel-example2" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#video-carousel-example2" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        <!--/.Controls-->
    </div>
    <!--/.Carousel Wrapper-->

    <!--/.Main layout-->



    <!--Footer-->
    <footer class="page-footer center-on-small-only">

        <!--Footer Links-->
        <div class="container-fluid">
            <div class="row">

                <!--First column-->
                <div class="col-lg-12 offset-lg-12 col-md-12 hidden-lg-down">
                <span style="text-align: center">
                    <h5 class="title">ABOUT TB EXPERT SYSTEM</h5>
                    <p>TB Expert System is a TB diagnosis expert system <br /> developed by Mr. Udochukwu in partial fulfillment for thE award of Master's Degree in Computer Science. <br />
                    It is a powerful AI tool for diagnosing Tuberculosis using fuzzy logic.</p>
                </span>
                </div>
                <hr class="hidden-md-up">
            </div>
        </div>
        <!--/.Footer Links-->

        <hr>

        <!--Call to action-->
        <div class="call-to-action">
            <small>When the purpose of a thing is unknown, abuse is inevitable...</small>
            
        </div>
        <!--/.Call to action-->

        <!--Copyright-->
        <div class="footer-copyright">
            <div class="container-fluid">
                &copy; Udochukwu TBExpertSystem<sup>&reg;</sup> <?php echo date('Y'); ?>

            </div>
        </div>
        <!--/.Copyright-->

    </footer>
    <!--/.Footer-->


    <!-- SCRIPTS -->

    <!-- JQuery -->
    <script type="text/javascript" src="<?php echo base_url('landing/js/jquery-2.2.3.min.js'); ?>"></script>

    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="<?php echo base_url('landing/js/tether.min.js'); ?>"></script>

    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="<?php echo base_url('landing/js/bootstrap.min.js'); ?>"></script>

    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="<?php echo base_url('landing/js/mdb.min.js'); ?>"></script>


</body>

</html>