<!DOCTYPE html>
<html lang="en">    
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap Styles -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

        <!-- FontAwesome Icons -->
        <link rel="stylesheet" href="fontawesome/css/all.min.css">

        <!-- custom styles -->
        <link rel="stylesheet" href="./styles/custom.css">

        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />

        <title>Market Place</title>
    </head>
<body>
    <!-- Header-->
    <header class="masthead d-flex align-items-center">
        <div class="container px-4 px-lg-5 text-center">
            <h1 class="mb-1 text-success">MARKET PLACE</h1>
            <h4 class="mb-4 text-white"><em>You deserve a platform that gets your product to your ideal customers</em></h4>

            <div class="d-flex justify-content-center">
                <a class="btn btn-success btn-lg mx-3" href="register.php">Register</a>
                <a class="btn btn-outline-success btn-lg" href="login.php">Login</a>
            </div>
        </div>
    </header>
    
    <!-- About-->
    <section class="content-section bg-light" id="about">
        <div class="container px-4 px-lg-5 text-center my-3 py-3">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-10">
                    <h2><strong>Market Place</strong> is beautifully crafted just for you!</h2>
                    <p class="lead mb-3 mt-4">
                        We do not plan to replace some of what you consider to be the best. We care about your growth and the growth of your business, that is why we created <strong>Market Place.</strong> Trust us when we say we understand your problem and have the perfect permanent solution to your sales, marketing and all round. 
                    </p>

                    <p class="lead mb-5">
                        We built <strong>Market Place</strong> platform  after making in-depth research about small businesses, their growth process and how best to catalyse their growth. It has always been about you! So jump right in let's get you started
                    </p>


                    <a class="btn btn-dark btn-lg" href="#services">What We Offer</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Services-->
    <section class="content-section bg-dark text-white text-center py-5" id="services">
        <div class="container px-4 px-lg-5">
            <div class="content-section-heading">
                <h3 class="text-success mb-0">Services</h3>
                <h2 class="mb-5">What We Offer</h2>
            </div>
            <div class="row gx-4 gx-lg-5">
                <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
                    <span class="service-icon rounded-circle mx-auto mb-3"><i class="fa fa-mobile"></i></span>

                    <h4 class="text-success"><strong>Register</strong></h4>
                    <p class="text-faded mb-0">register and get access to a customizable dashboard so you can upload your product</p>
                </div>
                <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
                    <span class="service-icon rounded-circle mx-auto mb-3"><i class="fas fa-toolbox "></i></span>
                    <h4 class="text-success"><strong>Tooltips</strong></h4>
                    <p class="text-faded mb-0">access to strong analytic tools to track metrics and insights</p>
                </div>
                <div class="col-lg-3 col-md-6 mb-5 mb-md-0">
                    <span class="service-icon rounded-circle mx-auto mb-3"><i class="fas fa-ad"></i></span>
                    <h4 class="text-success"><strong>Advertisement</strong></h4>
                    <p class="text-faded mb-0">
                       upload your product, we will help you get it in the face of your ideal customers
                    </p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <span class="service-icon rounded-circle mx-auto mb-3"><i class="fa fa-search "></i></span>
                    <h4 class="text-success"><strong>Search</strong></h4>
                    <p class="text-faded mb-0">Search products owned by other vendors and see if you stand a chance</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer-->
    <footer class="footer text-center  bg-dark ">
        <div class="container px-4 px-lg-5">
            <h4 class="text-center text-success mb-5">Connect With Me</h4>
            <ul class="list-inline mb-5">
                <li class="list-inline-item">
                    <a class="social-link rounded-circle text-white mr-3" href="https://linkedin.com/daniel-okoronkwo-a0a0821b2"><i class="fab fa-linkedin"></i></a>
                </li>
                <li class="list-inline-item">
                    <a class="social-link rounded-circle text-white mr-3" href="https://twitter.com/@varsilias"><i class="fab fa-twitter"></i></a>
                </li>
                <li class="list-inline-item">
                    <a class="social-link rounded-circle text-white" href="https://github.com/danielokoronkwo-coder"><i class="fab fa-github"></i></a>
                </li>
            </ul>
            <p class="mb-0 text-white">Copyright &copy; Market Place <?= date('Y')?> Made with &#10084; by <a href="https://twitter.com/@varsilias">Daniel Okoronkwo</a></p>
        </div>
    </footer>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script> -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
</body>
</html>
