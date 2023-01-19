<!doctype html>
<html lang="en">

<head>

  <title>ΑΤΛΑΣ</title>
  <link rel="icon" type="image/ico" href="images/favicon.ico">

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="" />
  <meta name="keywords" content="" />

  <link rel="stylesheet" href="css/custom-bs.css">
  <link rel="stylesheet" href="css/jquery.fancybox.min.css">
  <link rel="stylesheet" href="css/bootstrap-select.min.css">
  <link rel="stylesheet" href="fonts/icomoon/style.css">
  <link rel="stylesheet" href="fonts/line-icons/style.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/animate.min.css">

  <!-- MAIN CSS -->
  <link rel="stylesheet" href="css/style.css">
</head>

<body id="top">

  <div id="overlayer"></div>
  <div class="loader">
    <div class="spinner-border text-primary" role="status">
      <span class="sr-only">Φόρτωση...</span>
    </div>
  </div>


  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->


    <!-- NAVBAR -->
    <header class="site-navbar mt-3">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="site-logo col-6"><a href="index.php">ΑΤΛΑΣ</a></div>

          <nav class="mx-auto site-navigation">
            <ul class="site-menu js-clone-nav d-none d-xl-block ml-0 pl-0">
              <li><a href="search.php">Αναζήτηση Θέσης</a></li>
              <li class="has-children">
                <a href="#">Βοήθεια</a>
                <ul class="dropdown">
                  <li><a href="./faqStudent.html">Είμαι Φοιτητής/ια</a></li>
                  <li><a href="./faqCompany.html">Είμαι Φορέας Υποδοχής</a></li>
                </ul>
              </li>
              <li><a href="contact.php">Επικοινωνία</a></li>
            </ul>
          </nav>

          <div class="right-cta-menu text-right d-flex aligin-items-center col-6">
            <div class="ml-auto">
              <a href="post-job.php" class="btn btn-outline-white border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-add"></span>Δημιουργία Θέσης</a>
              <a href="loginSignup.php" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-lock_outline"></span>Είσοδος/Εγγραφή</a>
            </div>
            <a href="#" class="site-menu-toggle js-menu-toggle d-inline-block d-xl-none mt-lg-2 ml-3"><span class="icon-menu h3 m-0 p-0 mt-2"></span></a>
          </div>

        </div>
      </div>
    </header>

    <!-- HOME -->
    <section class="home-section section-hero overlay bg-image" style="background-image: url('images/hero_1.jpg');" id="home-section">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-12" style="top:40px">
            <div class="mb-5 text-center">
              <h1 class="text-white font-weight-bold">Θέσεις Πρακτικής Άσκησης</h1>
              <p>Απέκτησε την εμπειρία που ψάχνεις με την πρακτική που σου ταιριάζει!</p>
            </div>
            <form method="post" class="search-jobs-form">
              <div class="row mb-5">
                <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                  <input type="text" class="form-control form-control-lg" placeholder="Τίτλος εργασίας, Εταιρία...">
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                  <select class="selectpicker" data-style="btn-white btn-lg" data-width="100%" data-live-search="true" title="Επέλεξε Περιφέρεια" style="justify-items: center;">
                    <option>Όλες</option>
                    <option>Ανατολική / Θράκη</option>
                    <option>Κεντρική Μακεδονία</option>
                    <option>Δυτική Μακεδονία</option>
                    <option>Ήπειρος</option>
                    <option>Θεσσαλία</option>
                    <option>Ιόνιοι Νήσοι</option>
                    <option>Δυτική Ελλάδα</option>
                    <option>Στερεά Ελλάδα</option>
                    <option>Αττική</option>
                    <option>Πελοπόννησος</option>
                    <option>Βόρειο Αιγαίο</option>
                    <option>Νότιο Αιγαίο</option>
                    <option>Κρήτη</option>
                  </select>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                  <select class="selectpicker" data-style="btn-white btn-lg" data-width="100%" data-live-search="true" title="Τύπος θέσης">
                    <option>Πλήρη Απασχόληση</option>
                    <option>Μερική Απασχόληση</option>
                  </select>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                  <button type="submit" class="btn btn-primary btn-lg btn-block btn-search search-button"><span class="icon-search icon mr-2"></span>Αναζήτηση</button>
                </div>
              </div>
            </form>
          </div>
          <a href="#next" class="scroll-button smoothscroll">
            <span class=" icon-keyboard_arrow_down"></span>
          </a>
        </div>
      </div>
    </section>

    <section class="site-section" id="next">
      <div class="row mb-5 justify-content-center">
        <div class="col-md-7 text-center">
          <h2 class="section-title mb-2">Νέες Θέσεις Πρακτικής</h2>
        </div>
      </div>

      <ul class="job-listings mb-5">
        <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
          <a href="job-single.html"></a>
          <div class="job-listing-logo">
            <img src="images/job_logo_1.jpg" alt="Free Website Template by Free-Template.co" class="img-fluid">
          </div>

          <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
            <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
              <h2>Product Designer</h2>
              <strong>Adidas</strong>
            </div>
            <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
              <span class="icon-room"></span> New York, New York
            </div>
            <div class="job-listing-meta">
              <span class="badge badge-danger">Part Time</span>
            </div>
          </div>

        </li>
        <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
          <a href="job-single.html"></a>
          <div class="job-listing-logo">
            <img src="images/job_logo_2.jpg" alt="Free Website Template by Free-Template.co" class="img-fluid">
          </div>

          <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
            <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
              <h2>Digital Marketing Director</h2>
              <strong>Sprint</strong>
            </div>
            <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
              <span class="icon-room"></span> Overland Park, Kansas
            </div>
            <div class="job-listing-meta">
              <span class="badge badge-success">Full Time</span>
            </div>
          </div>
        </li>

        <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
          <a href="job-single.html"></a>
          <div class="job-listing-logo">
            <img src="images/job_logo_3.jpg" alt="Free Website Template by Free-Template.co" class="img-fluid">
          </div>

          <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
            <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
              <h2>Back-end Engineer (Python)</h2>
              <strong>Amazon</strong>
            </div>
            <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
              <span class="icon-room"></span> Overland Park, Kansas
            </div>
            <div class="job-listing-meta">
              <span class="badge badge-success">Full Time</span>
            </div>
          </div>
        </li>

        <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
          <a href="job-single.html"></a>
          <div class="job-listing-logo">
            <img src="images/job_logo_4.jpg" alt="Free Website Template by Free-Template.co" class="img-fluid">
          </div>

          <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
            <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
              <h2>Senior Art Director</h2>
              <strong>Microsoft</strong>
            </div>
            <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
              <span class="icon-room"></span> Anywhere
            </div>
            <div class="job-listing-meta">
              <span class="badge badge-success">Full Time</span>
            </div>
          </div>
        </li>

        <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
          <a href="job-single.html"></a>
          <div class="job-listing-logo">
            <img src="images/job_logo_5.jpg" alt="Free Website Template by Free-Template.co" class="img-fluid">
          </div>

          <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
            <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
              <h2>Product Designer</h2>
              <strong>Puma</strong>
            </div>
            <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
              <span class="icon-room"></span> San Mateo, CA
            </div>
            <div class="job-listing-meta">
              <span class="badge badge-success">Full Time</span>
            </div>
          </div>
        </li>
        <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
          <a href="job-single.html"></a>
          <div class="job-listing-logo">
            <img src="images/job_logo_1.jpg" alt="Free Website Template by Free-Template.co" class="img-fluid">
          </div>

          <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
            <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
              <h2>Product Designer</h2>
              <strong>Adidas</strong>
            </div>
            <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
              <span class="icon-room"></span> New York, New York
            </div>
            <div class="job-listing-meta">
              <span class="badge badge-danger">Part Time</span>
            </div>
          </div>

        </li>
        <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
          <a href="job-single.html"></a>
          <div class="job-listing-logo">
            <img src="images/job_logo_2.jpg" alt="Free Website Template by Free-Template.co" class="img-fluid">
          </div>

          <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
            <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
              <h2>Digital Marketing Director</h2>
              <strong>Sprint</strong>
            </div>
            <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
              <span class="icon-room"></span> Overland Park, Kansas
            </div>
            <div class="job-listing-meta">
              <span class="badge badge-success">Full Time</span>
            </div>
          </div>
        </li>

      </ul>

      <div class="all-positions-div">
        <button type="submit" class="all-positions">Όλες οι θέσεις</button>
        <div class="row pagination-wrap page-selector">
          <div class="col-md-6 text-center text-md-right inner-page-selector">
            <div class="custom-pagination ml-auto">
              <a href="#" class="prev">Προηγούμενη</a>
              <div class="d-inline-block">
                <a href="#" class="active">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#">4</a>
              </div>
              <a href="#" class="next">Επόμενη</a>
            </div>
          </div>
        </div>
      </div>

  </div>
  </section>

  <footer>
    <table style="margin: 0 auto 0 auto;">
      <tr>
        <td><a href="http://minedu.gov.gr/" target="_blank"><img src="images/footer1.png" alt="Υπουργείο Παιδείας και Θρησκευμάτων" height="60"></a></td>
        <td><a href="http://www.grnet.gr/" target="_blank"><img src="images/footer2.png" alt="ΕΔΕΤ"></a></td>
      </tr>
    </table>
  </footer>
  <!-- </footer> -->

  </div>

  <!-- SCRIPTS -->
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/isotope.pkgd.min.js"></script>
  <script src="js/stickyfill.min.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>

  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>

  <script src="js/bootstrap-select.min.js"></script>

  <script src="js/custom.js"></script>
</body>

</html>