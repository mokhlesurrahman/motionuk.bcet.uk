<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>motionUK</title>
    <meta name="description"
          content="Motion UK">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="css2.css?family=Merriweather:wght@400;700&family=Merriweather+Sans:ital,wght@0,300;0,400;0,700;1,400&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="assets/css/icons.css">
    <link rel="icon" href="favicon.ico" type="image/png">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/bootstrap.js" defer=""></script>
  </head>

  <body>
    <header>
      <a href="#main" class="visually-hidden-focusable">Skip to main content</a>
      <nav class="navbar navbar-expand-md navbar-light py-3" aria-label="Main">
        <div class="container">
          <a href="index.php" class="navbar-brand text-dark">
            <img src="assets/img/logo.png" alt="Motion UK">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars fa-lg"></i>
          </button>
          <div class="collapse navbar-collapse" id="navbar">
            <div class="navbar-nav mt-3 mt-md-0 ms-auto">
              <a class="nav-link px-md-3" href="index.php">Home</a>
            </div>
            <a class="btn btn-primary btn-sm rounded-pill mt-3 mt-md-0 ms-md-3"
               href="index.php#footer">Contact us</a>
          </div>
        </div>
      </nav>
    </header>

    <main id="main">

      <div class="bg-skew bg-skew-light">
        <!-- Gallery -->
        <div class="container py-5">
          <div class="row">
            <div class="col-md-6 mb-4">
                <figure>
                    <img src="assets/img/study-uk.png" width="1200" height="900" class="img-thumbnail mb-3" alt="Study in UK">
                    <!--<figcaption class="h5 link-dark text-center">Study in UK</figcaption>-->
                </figure>
            </div>
            <div class="col-md-6 mb-4">
                <figure>
                    <img src="assets/img/job-uk.png" width="1200" height="900" class="img-thumbnail mb-3" alt="Job in UK">
                    <!--<figcaption class="h5 link-dark text-center">Job in UK</figcaption>-->
                </figure>
            </div>
            <div class="col-md-6 mb-4">
                <figure>
                    <img src="assets/img/career-uk.png" width="1200" height="900" class="img-thumbnail mb-3" alt="Career in UK">
                    <!--<figcaption class="h5 link-dark text-center">Career in UK</figcaption>-->
                </figure>
            </div>
            <div class="col-md-6 mb-4">
                <figure>
                    <img src="assets/img/settlement-uk.png" width="1200" height="900" class="img-thumbnail mb-3" alt="Settlement in UK">
                    <!--<figcaption class="h5 link-dark text-center">Settlement in UK</figcaption>-->
                </figure>
            </div>
          </div>
        </div>
      </div>
      <!-- end bg-skew -->

      <!-- Icon blocks -->
      <div class="container py-5">
        <div class="row g-5">
          <div class="col-md-12 mb-1">
              <img src="assets/img/slider-1.jpg" width="1200" height="900" class="img-thumbnail mb-1" alt="Saas landing page">
          </div>
            <div class="col-md-12 mb-1">
                <img src="assets/img/slider-2.jpg" width="1200" height="900" class="img-thumbnail mb-1" alt="Saas landing page">
            </div>
            <div class="col-md-12 mb-1">
                <img src="assets/img/slider-3.jpg" width="1200" height="900" class="img-thumbnail mb-1" alt="Saas landing page">
            </div>
        </div>
      </div>
    </main>
    <footer class="bg-white pt-5" id="footer">
      <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h2 class="h5">Contact Address:</h2>
                
                <ul class="list-unstyled mb-4">
                    <li class="mb-2">
                    <b>UK:</b> 80a Ashfield Street, Unit 4, London, England, E1 2BJ
                    </li>
                    <li class="mb-2">
                    <b>Bangladesh:</b> R H Home Centre, 74/B/1 Green Road, 1st Floor, Dhaka 1215
                    </li>
                </ul>
            </div>
            <div class="col-lg-3">
                <h2 class="h5">Phone Number:</h2>
                <ul class="list-unstyled mb-4">
                    <li class="mb-2">
                        <i class="fab fa-whatsapp"></i> +880 1791-981818
                    </li>
                    <li class="mb-2">
                        <i class="fab fa-whatsapp"></i> +880 1952-883939
                    </li>
                    <li class="mb-2">
                        <i class="fab fa-whatsapp"></i> +880 1952-883939
                    </li>
                </ul>
            </div>
            <div class="col-lg-3">
                <h2 class="h5">Email Address</h2>
                <ul class="list-unstyled mb-4">
                    <li class="mb-2">
                        <i class="fas fa-envelope"></i> motionuk.study@gmail.com
                    </li>
                </ul>
            </div>
        </div>
        <div class="
            text-center
            border-top
            pt-3
          ">
          <div class="small mb-3">
              Copyright © <?php echo date('Y');?> All rights reserved
          </div>
          <!--<ul class="list-inline">
            <li class="list-inline-item">
              <a class="icon icon-sm icon-secondary" href="#"><i class="icon-inner fab fa-twitter" aria-hidden="true"></i><span class="sr-only">Twitter</span></a>
            </li>
            <li class="list-inline-item">
              <a class="icon icon-sm icon-secondary" href="#"><i class="icon-inner fab fa-facebook-f" aria-hidden="true"></i><span class="sr-only">Facebook</span></a>
            </li>
            <li class="list-inline-item">
              <a class="icon icon-sm icon-secondary" href="#"><i class="icon-inner fab fa-linkedin-in" aria-hidden="true"></i><span class="sr-only">Linkedin</span></a>
            </li>
          </ul>-->
        </div>
      </div>
    </footer>
  </body>
</html>
