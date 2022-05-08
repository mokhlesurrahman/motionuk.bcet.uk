<?php
require_once('adm/include/connect.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo strCompanyName; ?></title>
    <meta name="description"
          content="<?php echo strMetaDescription; ?>">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="css2.css?family=Merriweather:wght@400;700&family=Merriweather+Sans:ital,wght@0,300;0,400;0,700;1,400&display=swap" rel="stylesheet">

    <link rel="icon"
        href="favicon.ico" type="image/png">
    <link rel="stylesheet"
          href="assets/css/icons.css">
    <link rel="stylesheet"
          href="assets/css/style.css">

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" integrity="sha512-+EoPw+Fiwh6eSeRK7zwIKG2MA8i3rV/DGa3tdttQGgWyatG/SkncT53KHQaS5Jh9MNOT3dmFL0FjTY08And/Cw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="assets/js/bootstrap.js"
            defer=""></script>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"
              integrity="sha512-IsNh5E3eYy3tr/JiX2Yx4vsCujtkhwl7SLqgnwLNgf04Hrt9BT9SXlLlZlWx+OK4ndzAoALhsMNcCmkggjZB1w=="
              crossorigin="anonymous"
              referrerpolicy="no-referrer"></script>
  </head>

  <body>
    <header>
      <a href="#main" class="visually-hidden-focusable">Skip to main content</a>
      <nav class="navbar navbar-expand-md navbar-light py-3" aria-label="Main">
        <div class="container">
          <a href="index.php" class="navbar-brand text-dark">
              <img src="<?php echo strWebsiteUrl;?>/cdn/logo/<?php echo strLogo;?>"
                   alt="<?php echo strCompanyName;?>"
                   class="img-responsive">
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
        <div class="container pt-5">
          <div class="row">
            <div class="col-md-6 mb-4">
                <figure>
                    <img src="assets/img/study-uk.png" width="1200" height="900" class="img-thumbnail mb-1" alt="Study in UK">
                    <!--<figcaption class="h5 link-dark text-center">Study in UK</figcaption>-->
                </figure>
            </div>
            <div class="col-md-6 mb-4">
                <figure>
                    <img src="assets/img/job-uk.png" width="1200" height="900" class="img-thumbnail mb-1" alt="Job in UK">
                    <!--<figcaption class="h5 link-dark text-center">Job in UK</figcaption>-->
                </figure>
            </div>
            <div class="col-md-6 mb-4">
                <figure>
                    <img src="assets/img/career-uk.png" width="1200" height="900" class="img-thumbnail mb-1" alt="Career in UK">
                    <!--<figcaption class="h5 link-dark text-center">Career in UK</figcaption>-->
                </figure>
            </div>
            <div class="col-md-6 mb-4">
                <figure>
                    <img src="assets/img/settlement-uk.png" width="1200" height="900" class="img-thumbnail mb-1" alt="Settlement in UK">
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
              <img src="assets/img/slider-1.jpg" width="1200" height="900" class="img-thumbnail mb-1" alt="Landing page">
          </div>
            <div class="col-md-12 mb-1">
                <img src="assets/img/slider-2.jpg" width="1200" height="900" class="img-thumbnail mb-1" alt="Landing page">
            </div>
            <div class="col-md-12 mb-1">
                <img src="assets/img/slider-3.jpg" width="1200" height="900" class="img-thumbnail mb-1" alt="Landing page">
            </div>
        </div>
      </div>
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-md-12">
            <div class="owl-carousel owl-theme">
            <?php
            $sql = "SELECT * FROM `dbt_slider` ORDER BY `intSliderID` DESC";
            $query = mysqli_query($db_connection,$sql);
            while ($obj = mysqli_fetch_array($query)) {
            $pk = $obj['intSliderID'];
            ?>
            <div class="item" style="margin: 20px; border: 1px solid #fdfdfd;">
                <img src="cdn/partner/<?php echo $obj['photo'];?>"
                     class="img-responsive"
                     alt="<?php echo $obj['strSmallHeader'];?>">
            </div>
            <?php
            }
            ?>
            </div>
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
                <ul class="list-inline">
		            <?php
		            if (strCompanyFacebook != ''){
			            ?>
                        <li class="list-inline-item">
                            <a class="icon icon-sm icon-secondary"
                               href="<?php echo strCompanyFacebook;?>">
                                <i class="icon-inner fab fa-facebook" aria-hidden="true"></i>
                                <span class="sr-only">Facebook</span>
                            </a>
                        </li>
			            <?php
		            }
		            ?>
		            <?php
		            if (strCompanyInstagram != ''){
			            ?>
                        <li class="list-inline-item">
                            <a class="icon icon-sm icon-secondary"
                               href="<?php echo strCompanyInstagram;?>">
                                <i class="icon-inner fab fa-instagram" aria-hidden="true"></i>
                                <span class="sr-only">Instagram</span>
                            </a>
                        </li>
			            <?php
		            }
		            ?>
		            <?php
		            if (strCompanyYouTube != ''){
			            ?>
                        <li class="list-inline-item">
                            <a class="icon icon-sm icon-secondary"
                               href="<?php echo strCompanyYouTube;?>">
                                <i class="icon-inner fab fa-youtube" aria-hidden="true"></i>
                                <span class="sr-only">YouTube</span>
                            </a>
                        </li>
			            <?php
		            }
		            ?>
		            <?php
		            if (strCompanyPinterest != ''){
			            ?>
                        <li class="list-inline-item">
                            <a class="icon icon-sm icon-secondary"
                               href="<?php echo strCompanyPinterest;?>">
                                <i class="icon-inner fab fa-pinterest" aria-hidden="true"></i>
                                <span class="sr-only">Pinterest</span>
                            </a>
                        </li>
			            <?php
		            }
		            ?>
		            <?php
		            if (strCompanyLinkedIn != ''){
			            ?>
                        <li class="list-inline-item">
                            <a class="icon icon-sm icon-secondary"
                               href="<?php echo strCompanyLinkedIn;?>">
                                <i class="icon-inner fab fa-linkedin" aria-hidden="true"></i>
                                <span class="sr-only">LinkedIn</span>
                            </a>
                        </li>
			            <?php
		            }
		            ?>
                </ul>
            </div>
            <div class="col-lg-3">
                <h2 class="h5">Phone Number:</h2>
                <ul class="list-unstyled mb-4">
	                <?php
                    $phones = explode('|',strHeaderPhone);
                    foreach ($phones as $phone){
                        ?>
                        <li class="mb-2">
                            <a href="https://api.whatsapp.com/send?phone=<?php echo $phone;?>"
                               data-toggle="tooltip"
                               data-placement="top"
                               title=""
                               data-original-title="Whatsapp"
                               target="_blank" style="text-decoration: none !important;">
                                <i class="fab fa-whatsapp"></i> <?php echo $phone;?>
                            </a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
            <div class="col-lg-3">
                <h2 class="h5">Email Address</h2>
                <ul class="list-unstyled mb-4">
                    <li class="mb-2">
                        <i class="fas fa-envelope"></i> <?php echo strHeaderEmail;?>
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
        </div>
      </div>
    </footer>

    <?php
    require_once('popup.php');
    ?>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"></script>

<script>
    $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:4
            },
            1000:{
                items:5
            }
        }
    });
</script>
</html>
