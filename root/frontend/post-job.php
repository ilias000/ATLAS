<!doctype html>
<html lang="en">

<style>
  .profile-button {
    position: relative;
    top: 10px;
    right: -20px;
    color: white;
    font-size: 2.5em;
  }

  .profile-button:hover {
    color: #A3C8FF;
    text-decoration: none;
  }

  .dropdown-item.active,
  .dropdown-item:active {
    background-color: #3C6EAD !important;
  }

  .editor {
    color: black;
  }
</style>

<head>
  <title>Δημιουργία Θέσης</title>
  <link rel="icon" type="image/ico" href="images/favicon.ico">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="css/custom-bs.css">
  <link rel="stylesheet" href="css/jquery.fancybox.min.css">
  <link rel="stylesheet" href="css/bootstrap-select.min.css">
  <link rel="stylesheet" href="fonts/icomoon/style.css">
  <link rel="stylesheet" href="fonts/line-icons/style.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/animate.min.css">
  <link rel="stylesheet" href="css/quill.snow.css">


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
    <header class="site-navbar">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="site-logo col-6"><a href="index.php">ΑΤΛΑΣ</a></div>

          <nav class="mx-auto site-navigation">
            <ul class="site-menu js-clone-nav d-none d-xl-block ml-0 pl-0">
              <li><a href="company.php">Ενεργές Θέσεις</a></li>
              <li><a href="post-job.php">Δημιουργία Θέσης</a></li>
              <li><a href="requests.php">Αιτήσεις</a></li>
              <li><a href="faqCompany.php?loggedIn=true">Βοήθεια</a></li>
            </ul>
          </nav>

          <div class="right-cta-menu text-right d-flex aligin-items-center col-6">
            <div class="ml-auto">
              <a href="companyProfile.php" class="profile-button"><i class="fa fa-user-circle" aria-hidden="true"></i></a>
              <a href="../backend/logout.php" class="btn btn-outline-red border-width-1 d-none d-lg-inline-block" style="right: -50px; position: relative; color:white">Αποσύνδεση</a>
            </div>
            <a href="#" class="site-menu-toggle js-menu-toggle d-inline-block d-xl-none mt-lg-2 ml-3"><span class="icon-menu h3 m-0 p-0 mt-2"></span></a>
          </div>
        </div>
      </div>
    </header>

    <section class="section-hero overlay inner-page bg-image" style="background-image: url('images/hero_1.jpg');" id="home-section">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-12" style="margin-top:80px">
            <div class="mb-5 text-left">
              <h1 class="text-white font-weight-bold">Δημιουργία Θέσης</h1>
              <div class="custom-breadcrumbs">
                <a href="index.php">Αρχική</a> <span class="mx-2 slash">/</span>
                <a href="loginSignup.php">Είσοδος</a> <span class="mx-2 slash">/</span>
                <span class="text-white"><strong>Δημιουργία Θέσης</strong></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="site-section">
      <div class="container">

        <div class="row align-items-center mb-5">
          <div class="col-lg-8 mb-4 mb-lg-0">
            <div class="d-flex align-items-center">
            </div>
          </div>
          <div class="col-lg-4">
            <div class="row">
              <div class="col-6">
                <a href="#" class="btn btn-block btn-primary btn-md" style="width: 180px; position: absolute; right: 15px; border: 1px solid #3C6EAD">Αποθήκευση</a>
              </div>
              <div class="col-6">
                <a href="#" class="btn btn-block btn-outline-red btn-md" style="width: 180px; position: absolute; right: 15px; border-width: 1px">Οριστική υποβολή</a>
              </div>
            </div>
          </div>
        </div>
        <div class="row mb-5">
          <div class="col-lg-12">
            <form class="p-4 p-md-5 border rounded" method="post">
              <h3 class="text-black mb-5 border-bottom pb-2">Στοιχεία Αγγελίας</h3>

              <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" placeholder="company@mail.com">
              </div>
              <div class="form-group">
                <label for="job-title">Τίτλος Αγγελίας</label>
                <input type="text" class="form-control" id="job-title" placeholder="Product Designer">
              </div>
              <div class="form-group">
                <label for="job-location">Τοποθεσία</label>
                <select class="selectpicker border rounded" id="job-type" data-style="btn-black" data-width="100%" data-live-search="true" title="Παρακαλώ επιλέξτε">
                  <option>Επέλεξε Περιφέρεια</option>
                  <option>Αττική</option>
                  <option>Θεσσαλία</option>
                  <option>Πελοπόννησος</option>
                  <option>Κρήτη</option>
                  <option>Ηπείρου</option>
                  <option>Δυτικής Μακεδονίας</option>
                  <option>Στερεάς Ελλάδας</option>
                  <option>Βόρειου Αιγαίου</option>
                  <option>Νότιου Αιγαίου</option>
                  <option>Κεντρικής Μακεδονίας</option>
                  <option>Ήπειρος</option>
                  <option>Δυτικής Ελλάδας</option>
                  <option>Στερεάς Ελλάδας</option>
                  <option>Πελοποννήσου</option>
                  <option>Κρήτης</option>
                  <option>Ηπείρου</option>
                  <option>Θεσσαλίας</option>
                  <option>Ιονίων Νήσων</option>
                  <option>Δυτικής Μακεδονίας</option>
                  <option>Κεντρικής Μακεδονίας</option>
                  <option>Κρήτης</option>
                  <option>Ηπείρου</option>
                  <option>Θεσσαλίας</option>
                  <option>Ιονίων Νήσων</option>
                  <option>Δυτικής Μακεδονίας</option>
                  <option>Κεντρικής
                </select>
              </div>

              <div class="form-group">
                <label for="job-type">Τρόπος Απασχόλησης</label>
                <select class="selectpicker border rounded" id="job-type" data-style="btn-black" data-width="100%" title="Παρακαλώ επιλέξτε">
                  <option>Παρακαλώ επιλέξτε</option>
                  <option>Πλήρης Απασχόληση</option>
                  <option>Μερική Απασχόληση</option>
                </select>
              </div>

              <div class="form-group">
                <label for="job-duration">Διάρκεια</label>
                <select class="selectpicker border rounded" id="job-duration" data-style="btn-black" data-width="100%" title="Παρακαλώ επιλέξτε">
                  <option>Παρακαλώ επιλέξτε</option>
                  <option>3 μήνες</option>
                  <option>6 μήνες</option>
                </select>
              </div>

              <div class="form-group">
                <label for="job-salary">Μηνιαία Αμοιβή</label>
                <input type="number" id="salary" name="salary" min="0" max="100000" placeholder="€" data-type="currency"></input>
              </div>

              <div class="form-group">
                <label for="job-start-date">Ημερομηνία έναρξης</label>
                <input type="date" id="job-start-date" name="job-start-date" class="form-control">
                <label for="job-end-date">Ημερομηνία λήξης</label>
                <input type="date" id="job-end-date" name="job-end-date" class="form-control">
              </div>

              <div class="form-group">
                <label for="job-description">Περιγραφή Αγγελίας</label>
                <textarea name="job-description" id="job-description" cols="30" rows="10" class="form-control"></textarea>
              </div>
            </form>
          </div>


        </div>
        <div class="row align-items-center mb-5">

          <div class="col-lg-4 ml-auto">
            <div class="row">
              <div class="col-6">
                <a href="#" class="btn btn-block btn-primary btn-md" style="width: 180px; position: absolute; right: 15px; border: 1px solid #3C6EAD">Αποθήκευση</a>
              </div>
              <div class="col-6">
                <a href="#" class="btn btn-block btn-outline-red btn-md" style="width: 180px; position: absolute; right: 15px; border-width: 1px">Οριστική υποβολή</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer style="margin-bottom: 30px;">
      <table style="margin: 0 auto 0 auto;">
        <tr>
          <td><a href="http://minedu.gov.gr/" target="_blank"><img src="images/footer1.png" alt="Υπουργείο Παιδείας και Θρησκευμάτων" height="60"></a></td>
          <td><a href="http://www.grnet.gr/" target="_blank"><img src="images/footer2.png" alt="ΕΔΕΤ"></a></td>
        </tr>
      </table>
    </footer>

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
  <script src="js/quill.min.js"></script>


  <script src="js/bootstrap-select.min.js"></script>

  <script src="js/custom.js"></script>



</body>

</html>