
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="San Diego based appliance repair company, we fix all major appliances. The estimate is FREE with the repair." />
        <meta name="author" content="Rescue My Appliances company service SoCal" />
        <title>Rescue My Appliances repair company</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico"  />
       <!-- Flaticon icons -->
       <link rel="stylesheet"  type="text/css" href="css/icons/font/flaticon.css">
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="preload"  as="font" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="preload" as="font" type="text/css" />
        <!-- Third party plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/style.min.css" rel="stylesheet" type="text/css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    // reset form
          // send email
          $(document).ready(function() {
            //   alert initial message
              $msg='Please call us at 619-888-6420';
           $('.myform').on('submit',function(){

           // Add text 'loading...' right after clicking on the submit button. 
        //    $('.output_message').text('Loading...'); 

           var form = $(this);
                $.ajax({
                url: "./mail.php",
                method: form.attr('method'),
                data: form.serialize(),
                success: function(result){
                    if (result){
                        $msg='Your request has been sent! We will contact you shortly.'; 
                        $('#alert').removeClass('alert-danger');
                    } else {
                        $msg='Something wrong. Please call us.';
                        $('#alert').addClass('alert-danger');
                    }
                    $("#alert").html($msg).show().delay(5000).fadeOut(); 
                    $( '#myform' ).each(function(){
                        this.reset();
                    });
                }
    });

    // Prevents default submission of the form after clicking on the submit button. 
    return false;   
  });
  });

    </script>
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">Rescue My Appliances</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto my-2 my-lg-0">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger service-request" href="#request">Service Request</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">About</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#services">Services</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#portfolio">Portfolio</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div id="alert" class="alert alert-success" role="alert">
            
        </div>
        <!-- Masthead-->
        <header class="masthead" id="request">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center text-center">
                <div class="col-md-6 col-lg-7 mb-4">
                    <div class="col-lg-10 align-self-end">
                        <h1 class="text-uppercase text-white font-weight-bold">Appliance repair company</h1>
                        <hr class="divider my-4" />
                    </div>
                    <div class="col-lg-10 align-self-baseline">
                        <p class="text-white-75 font-weight-light mb-5">The diagnostic is <del>$95</del> FREE with the service
                           
                        </p>
                        <a class="btn btn-primary" href="tel:6198886420" >Call now 619-888-6420</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-5">
                    <form id="myform" method="POST" class="myform" action=""> 
                        <p class="text-white output_message">Service Request</p>
                        <div class="form-group">
                            <input type="text" name="name" class="form-control form-control-lg" id="name" aria-describedby="name" placeholder="Name" required>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control form-control-lg" id="email" aria-describedby="emailHelp" placeholder="Email address" required>
                        </div>
                        <div class="form-group">
                            <input type="tel" name="phone" class="form-control form-control-lg" id="phone"  aria-describedby="phone" placeholder="Phone number" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="address" class="form-control form-control-lg" id="address" placeholder="Street address" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="appliance" class="form-control form-control-lg" id="appliance" placeholder="Appliance" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="problem" class="form-control form-control-lg" id="problem" placeholder="How can we help you?" required>
                        </div>
                        <input class="btn btn-primary form-control" name="submit" type="submit" value="Submit" />
                    </form>
                </div>
                </div>
            </div>
        </header>
        <!-- About-->
        <section class="page-section" id="about">
            <div class="container">
                <div class="row">
                <div class="col-md-6">
                    <h2>WE ARE A GROUP OF PROFESSIONAL APPLIANCE REPAIR TECHNICIANS</h2>
                    <hr class="divider my-4">
                    <p class=" font-weight-light mb-5">Since our beginning in 2005, the Rescue My Appliances
                       of San Diego has been repairing home appliances for 
                       customers in over 200 apartment buildings and management 
                       firms in and around San Diego. Our 15 Years in customer 
                       service has created a staff of reliable, efficient and 
                       professional home appliance technicians.
                    </p>
                    <p class="font-weight-light mb-5">
                        The Rescue My Appliances specializes in affordable,
                         same-day appliance repair for a variety of major 
                         home appliances, specifically refrigerator repair, 
                         dryer, dishwasher, washing machine, oven, microwave, 
                         and range repair, always at affordable prices.
                    </p>
                </div>
                <div class="col-md-6">
                    <img src="assets/img/appliance-technician-min.jpg" loading="lazy" width="640" height="360" class="img-fluid" alt="The technician of Rescue My Appliances">
                </div>
            </div>
            </div>
        </section>
        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container">
                <h2 class="text-center mt-0">We service</h2>
                <hr class="divider my-4" />
                <div class="row">
                    <div class="col-lg-4 col-md-6 text-center">
                        <div class="mt-5">
                            <i class="flaticon-refrigerator flaticon" ></i>
                            <h3 class="h4 text-left mb-2">Refrigerator repair and maintanance</h3>
                            <p class="text-muted text-left mb-0">Whether your refrigerator is not cooling properly,
                                 your doors are not closing or the ice maker is broken we can fix it.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 text-center">
                        <div class="mt-5">
                            <i class="flaticon-washer flaticon" ></i>
                            <h3 class="h4 text-left mb-2">Washing machine repair</h3>
                            <p class="text-muted text-left mb-0">Whether your washing machine’s detergent dispenser
                                 is broken, the unit isn’t draining properly or it stops in mid-cycle we can fix it.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 text-center">
                        <div class="mt-5">
                            <i class="flaticon-dishwasher flaticon" ></i>
                            <h3 class="h4 text-left mb-2">Dishwasher repair</h3>
                            <p class="text-muted text-left mb-0">Whether your dishwasher isn’t cleaning properly, you 
                                notice water left at the end of a cycle, or the soap dispenser is broken we can fix it.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 text-center">
                        <div class="mt-5">
                            <i class="flaticon-microwave flaticon" ></i>
                            <h3 class="h4 text-left mb-2">Microwave repair and maintanance</h3>
                            <p class="text-muted text-left mb-0">Whether your microwave is not heating properly, the 
                                timer is not working or sparking we can fix it.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 text-center">
                        <div class="mt-5">
                            <i class="flaticon-dryer flaticon" ></i>
                            <h3 class="h4 text-left mb-2">Dryer repair and maintanance</h3>
                            <p class="text-muted text-left mb-0">Whether your dryer is not heating properly or it stops
                                 in mid cycle we can fix it.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 text-center">
                        <div class="mt-5">
                            <i class="flaticon-oven flaticon" ></i>
                            <h3 class="h4 text-left mb-2">Oven repair and maintanance</h3>
                            <p class="text-muted text-left mb-0">Whether your oven isn’t lighting properly, has a burner
                                 that doesn’t work or the temperature is off  we can fix it.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Portfolio-->
        <div id="portfolio">
            <div class="container-fluid p-0">
                <div class="row no-gutters">
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="assets/img/portfolio/fullsize/1.jpg">
                            <img class="img-fluid" loading="lazy" width="640" height="426" src="assets/img/portfolio/thumbnails/1.jpg" alt="" />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Dishwasher</div>
                                <div class="project-name">Filter cleaning</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="assets/img/portfolio/fullsize/2.jpg">
                            <img class="img-fluid" loading="lazy" width="640" height="426" src="assets/img/portfolio/thumbnails/2.jpg" alt="" />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Washer</div>
                                <div class="project-name">Changing door boot</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="assets/img/portfolio/fullsize/3.jpg">
                            <img class="img-fluid" loading="lazy" width="640" height="426" src="assets/img/portfolio/thumbnails/3.jpg" alt="" />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Microwave</div>
                                <div class="project-name">Changing magnetron</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="assets/img/portfolio/fullsize/4.jpg">
                            <img class="img-fluid" loading="lazy" width="640" height="426" src="assets/img/portfolio/thumbnails/4.jpg" alt="" />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Refrigerator</div>
                                <div class="project-name">Repairing seal system</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="assets/img/portfolio/fullsize/5.jpg">
                            <img class="img-fluid" loading="lazy" width="640" height="426" src="assets/img/portfolio/thumbnails/5.jpg" alt="" />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Double oven</div>
                                <div class="project-name">Repairing broil element</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="assets/img/portfolio/fullsize/6.jpg">
                            <img class="img-fluid" loading="lazy" width="640" height="426" src="assets/img/portfolio/thumbnails/6.jpg" alt="" />
                            <div class="portfolio-box-caption p-3">
                                <div class="project-category text-white-50">Dryer</div>
                                <div class="project-name">Fixing door latch</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Call to action-->
        <section class="page-section bg-dark text-white">
            <div class="container text-center">
                <h2 class="mb-4">Service area</h2>
  
            <div class="row">
                <div class="col-xs-6 col-sm-6  col-md-3">
                    <p class="text-white-75 font-weight-light text-left">San Diego</p>
                    <p class="text-white-75 font-weight-light text-left">Poway, Ca</p>
                    <p class="text-white-75 font-weight-light text-left">El Cajon, Ca</p>
                    <p class="text-white-75 font-weight-light text-left">North Park, Ca</p>
                    <p class="text-white-75 font-weight-light text-left">Logan Heights, Ca</p>
                    <p class="text-white-75 font-weight-light text-left">Linda Vista, Ca</p>
                    <p class="text-white-75 font-weight-light text-left">Bay Park, Ca</p>
                    <p class="text-white-75 font-weight-light text-left">Pacific Beach, Ca</p>
                </div>
                <div class="col-xs-6 col-sm-6  col-md-3">
                    <p class="text-white-75 font-weight-light text-left">Mission Valley, Ca</p>
                    <p class="text-white-75 font-weight-light text-left">Ocean Beach, Ca</p>
                    <p class="text-white-75 font-weight-light text-left">Point Loma, Ca</p>
                    <p class="text-white-75 font-weight-light text-left">Hillcrest, Ca</p>
                    <p class="text-white-75 font-weight-light text-left">Solana Beach, Ca</p>
                    <p class="text-white-75 font-weight-light text-left">Santee, Ca</p>
                    <p class="text-white-75 font-weight-light text-left">Normal Heights, Ca</p>
                    <p class="text-white-75 font-weight-light text-left">Clairemont Mesa, Ca</p>
                </div>
                <div class="col-xs-6 col-sm-6  col-md-3">
                    <p class="text-white-75 font-weight-light text-left">Carlsbad, Ca</p>
                    <p class="text-white-75 font-weight-light text-left">Coronado, Ca</p>
                    <p class="text-white-75 font-weight-light text-left">Del Cerro, Ca</p>
                    <p class="text-white-75 font-weight-light text-left">Sorrento Valley, Ca</p>
                    <p class="text-white-75 font-weight-light text-left">University City, Ca</p>
                    <p class="text-white-75 font-weight-light text-left">Kearney Mesa, Ca</p>
                    <p class="text-white-75 font-weight-light text-left">Tierrasanta, Ca</p>
                    <p class="text-white-75 font-weight-light text-left">Mira Mesa, Ca</p>
                </div>
                <div class="col-xs-6 col-sm-6  col-md-3">
                    <p class="text-white-75 font-weight-light text-left">Rancho Bernardo, Ca</p>
                    <p class="text-white-75 font-weight-light text-left">Encinitas, Ca</p>
                    <p class="text-white-75 font-weight-light text-left">La Mesa, Ca</p>
                    <p class="text-white-75 font-weight-light text-left">Rancho Santa Fe, Ca</p>
                    <p class="text-white-75 font-weight-light text-left">Carmel Valley, Ca</p>
                    <p class="text-white-75 font-weight-light text-left">Scripps Ranch, Ca</p>
                    <p class="text-white-75 font-weight-light text-left">Paradise Hills, Ca</p>
                    <p class="text-white-75 font-weight-light text-left">San Ysidro, Ca</p>
                </div>
            </div>
        </div>
        </section>
        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-left">
                        <h4 class="mt-0">Contact information</h4>
                        <!-- <hr class="divider my-4" /> -->
                        <p class="text-muted text-left">Mon-Fri: 8am - 5pm</p>
                        <p class="text-muted text-left">Sat: 8am - 3pm</p>
                        <p class="text-muted text-left"><i class="flaticon-maps-and-flags"></i>
                        2517 Northside dr. San Diego, Ca 92108
                        </p>
                        <p class="text-muted text-left"><i class="flaticon-email"></i>
                        rescuemyappliancesdispatch@gmail.com
                        </p>
                        <a class="contactInfo"><i class="flaticon-phone"></i>  619-888-6420</a>
                    </div>
                </div>
                
            </div>
        </section>
        <!-- Footer-->
        <footer class="bg-light py-5">
            <div class="container"><div class="small text-center text-muted">Copyright <span class="copyright">&copy;</span> <?php echo date("Y"); ?> - Rescue My Appliances</div></div>

        </footer>
        <a class=" callNow btn btn-primary d-lg-none" href="tel:6198886420"> 
           <i class="flaticon-phone"></i> 619-888-6420
        </a> 

        <script src="js/jquery-3.2.1.min.js" ></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js" ></script>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
        <script src="js/scripts.js" ></script>
    </body>
</html>
