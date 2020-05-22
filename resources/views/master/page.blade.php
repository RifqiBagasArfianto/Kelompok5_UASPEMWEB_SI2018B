<!doctype html>
<html lang="en">

<head>

  <!--====== Required meta tags ======-->
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!--====== Title ======-->
  <title>Kang Laundry</title>

  <!--====== Favicon Icon ======-->
  <link rel="shortcut icon" href="<?= URL::to('/'); ?>/assets/images/favicon.png" type="image/png">

  <!--====== Bootstrap css ======-->
  <link rel="stylesheet" href="<?= URL::to('/'); ?>/assets/css/bootstrap.min.css">

  <!--====== Animate css ======-->
  <link rel="stylesheet" href="<?= URL::to('/'); ?>/assets/css/animate.css">

  <!--====== Magnific Popup css ======-->
  <link rel="stylesheet" href="<?= URL::to('/'); ?>/assets/css/magnific-popup.css">

  <!--====== Slick css ======-->
  <link rel="stylesheet" href="<?= URL::to('/'); ?>/assets/css/slick.css">

  <!--====== Line Icons css ======-->
  <link rel="stylesheet" href="<?= URL::to('/'); ?>/assets/css/LineIcons.css">

  <!--====== Default css ======-->
  <link rel="stylesheet" href="<?= URL::to('/'); ?>/assets/css/default.css">

  <!--====== Style css ======-->
  <link rel="stylesheet" href="<?= URL::to('/'); ?>/assets/css/style.css">

  <!--====== Responsive css ======-->
  <link rel="stylesheet" href="<?= URL::to('/'); ?>/assets/css/responsive.css">

  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css">

  <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>

  <style>

    /* The container <div> - needed to position the dropdown content */

    /* Dropdown Content (Hidden by Default) */
    .dropdown-wrap {
      display: none;
      padding-top: 10px;
      position: absolute;
      z-index: 1;
    }

    .product-desc {
      font-size: 13px;
      text-align: justify;
    }


    .search-box {
        background-color: #fe7865;
        color:white;
        padding: 20px;
        text-align: left;
    }

    .dropdown-content {
      min-width: 160px;
      background-color: white;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    }

    /* Links inside the dropdown */
    .header-area .navbar .navbar-nav .nav-item .dropdown-content a {
      color: #777;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
      font-size: 12px
    }

    /* Change color of dropdown links on hover */
    .dropdown-content a:hover {background-color: #ddd;}

    /* Show the dropdown menu on hover */
    .dropdown:hover .dropdown-wrap {display: block;}

    /* Change the background color of the dropdown button when the dropdown content is shown */
    .dropdown:hover .dropbtn {background-color: #3e8e41;}

  </style>


</head>

<body>

  <!--====== PRELOADER PART START ======-->

  <div class="preloader">
    <div class="spin">
      <div class="cube1"></div>
      <div class="cube2"></div>
    </div>
  </div>

  <!--====== PRELOADER PART START ======-->

  <!--====== HEADER PART START ======-->

  <header class="header-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="<?= URL::to('/'); ?>">
              <h2>Laundry</h2>
            </a> <!-- Logo -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="bar-icon"></span>
              <span class="bar-icon"></span>
              <span class="bar-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul id="nav" class="navbar-nav ml-auto">
                <li class="nav-item <?php echo (Request::segment(1) == '') ? 'active' : '' ?>">
                  <a data-scroll-nav="0" href="<?= URL::to('/'); ?>">Home</a>
                </li>
                <li class="nav-item <?php echo (Request::segment(1) == 'browse') ? 'active' : '' ?>">
                  <a data-scroll-nav="0" href="<?= URL::to('browse') ?>">Browse</a>
                </li>

                <?php if(Session::get('loggedin') == "authorized") { ?>
                  <li class="nav-item <?php echo (Request::segment(2) == 'invoice') ? 'active' : '' ?>">
                    <a  href="<?= URL::to('user/invoice') ?>"><i class="lni-clipboard"></i></a>
                  </li>
                  <li class="nav-item">
                    <div class="dropdown">
                      <a href="#"><i class="lni-user"></i></a>
                      <div class="dropdown-wrap" style="right:0">
                        <div class="dropdown-content">
                          <a href="<?= URL::to('user/profile') ?>">My Profile</a>
                          <?php if(Session::get('role') == "vendor") { ?>
                            <a href="<?= URL::to('user/service') ?>">My Service</a>
                          <?php } ?>
                          <a href="<?= URL::to('/logout') ?>">Sign Out</a>
                        </div>
                      </div>
                    </div>
                  </li>
                <?php } else { ?> 
                  <li class="nav-item <?php echo (Request::segment(1) == 'login') ? 'active' : '' ?>">
                    <a data-scroll-nav="0" href="<?= URL::to('login') ?>">Login</a>
                  </li>
                  <li class="nav-item <?php echo (Request::segment(1) == 'signup' || Request::segment(2) == 'signup') ? 'active' : '' ?>">
                    <a data-scroll-nav="0" href="<?= URL::to('signup') ?>">Sign Up</a>
                  </li>
                <?php } ?>
              </ul> <!-- navbar nav -->
            </div>
          </nav> <!-- navbar -->
        </div>
      </div> <!-- row -->
    </div> <!-- container -->
  </header>

    <!--====== HEADER PART ENDS ======-->

    @yield('content')

    <!--====== FOOTER PART START ======-->
    
    <section id="footer" class="footer-area">
        <div class="container">
            <div class="footer-widget pt-75 pb-50">
                <div class="row">
                    <div class="col-lg-3 col-md-5 col-sm-7">
                        <div class="footer-logo mt-50">
                            <h5>Kang Laundry</h5>
                            <p class="mt-10">Kang Laundry Penyedia Layanan Laundry yang Tersebar di Seluruh Indonesia</p>
                        </div> <!-- footer logo -->
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-5">
                        <div class="footer-link mt-50">
                            <h5 class="f-title">Thanks To</h5>
                            <ul>
                                <li><a href="#">Leaflet Js</a></li>
                            </ul>
                        </div> <!-- footer link -->
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-5">
                        <div class="footer-link mt-50">
                            <h5 class="f-title">Link</h5>
                            <ul>
                                <li><a href="<?= URL::to('/') ?>">Home</a></li>
                                <li><a href="<?= URL::to('/browse') ?>">Browse</a></li>
                            </ul>
                        </div> <!-- footer link -->
                    </div>
                    <div class="col-lg-4 col-md-5 col-sm-7">
                        <div class="footer-info mt-50">
                            <h5 class="f-title">Contact Info</h5>
                            <ul>
                                <li>
                                    <div class="single-footer-info mt-20">
                                        <span>Phone :</span>
                                        <div class="footer-info-content">
                                            <p>+88123 4567 890</p>
                                        </div>
                                    </div> <!-- single footer info -->
                                </li>
                                <li>
                                    <div class="single-footer-info mt-20">
                                        <span>Email :</span>
                                        <div class="footer-info-content">
                                            <p>admin@kanglaundry.id</p>
                                        </div>
                                    </div> <!-- single footer info -->
                                </li>
                            </ul>
                        </div> <!-- footer link -->
                    </div>
                </div> <!-- row -->
            </div> <!-- footer widget -->
        </div> <!-- container -->
    </section>
    
    <!--====== FOOTER PART ENDS ======-->
    
    <!--====== BACK TO TOP PART START ======-->
    
    <a href="#" class="back-to-top"><i class="lni-chevron-up"></i></a>
    
    <!--====== BACK TO TOP PART ENDS ======-->
    
    <!--====== jquery js ======-->
    <script src="<?= URL::to('/'); ?>/assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="<?= URL::to('/'); ?>/assets/js/vendor/jquery-1.12.4.min.js"></script>

    <!--====== Bootstrap js ======-->
    <script src="<?= URL::to('/'); ?>/assets/js/bootstrap.min.js"></script>
    
    
    <!--====== Slick js ======-->
    <script src="<?= URL::to('/'); ?>/assets/js/slick.min.js"></script>
    
    <!--====== Magnific Popup js ======-->
    <script src="<?= URL::to('/'); ?>/assets/js/jquery.magnific-popup.min.js"></script>

    
    <!--====== nav js ======-->
    <script src="<?= URL::to('/'); ?>/assets/js/jquery.nav.js"></script>
    
    <!--====== Main js ======-->
    <script src="<?= URL::to('/'); ?>/assets/js/main.js"></script>

    <?php if(Request::segment(2) == "details") { ?>

    <script type="text/javascript">
        $(document).ready(function() {
            <?php if(!empty($location[1])) { ?>
                var mymap = L.map('map').setView([<?= $location[1] ?>, <?= $location[2] ?>], 15);
            <?php } else { ?>
                var mymap = L.map('map').setView([-7.319970, 112.767490], 15);
            <?php } ?>
            L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoicWRyMzExMTIiLCJhIjoiY2s5czN1M3E4MTE5dTNmbzN0dzlvMW84cCJ9.xISAyVMSyc9_MWS3-nf5vQ', {
                maxZoom: 18,
                id: 'mapbox/streets-v11',
                tileSize: 512,
                zoomOffset: -1,
                accessToken: 'pk.eyJ1IjoicWRyMzExMTIiLCJhIjoiY2s5czN1M3E4MTE5dTNmbzN0dzlvMW84cCJ9.xISAyVMSyc9_MWS3-nf5vQ'
            }).addTo(mymap);

            var marker = L.marker([<?= $location[1] ?>, <?= $location[2] ?>]).addTo(mymap);
             marker.bindPopup("<b>Location</b><br><?= $location[0] ?>.").openPopup();

        })
    </script>
    <?php } ?>

    <script>
      <?php if(Request::segment(2) == 'book') {
        foreach($bank as $banks) {
        echo "$('#btn-bankid-".$banks->id."').on('click', function() { 
                let rek = $('#bankid-".$banks->id."').val();
                $('#no-rek').html('<p>'+rek+'</p>');
                $('#no-rekening').val(rek);
              })\n";
        }}
      ?>

        $("#weight").on('keyup', function() {
            let weight = $("#weight").val();
            let price = $("#price-prod").val();
            let total = weight * price;
            $("#price").html("Rp. "+total+"");
            $("#price-tot").val(total);
        })
    </script>

    <script>
      $('.invo-img').on("click", function () {
       var myBookId = $(this).data('id');
       $(".modal-body #ord-id").val( myBookId );
     // As pointed out in comments, 
     // it is unnecessary to have to manually call the modal.
     // $('#addBookDialog').modal('show');
   });
 </script>

</body>

</html>
