<?php
session_start();

include("../backend/connection.php");
include("../backend/functions.php");

if ((isset($_GET['loggedIn'])) && (!strcmp($_GET['loggedIn'], "true"))) {
  $user_data = check_login($connection); // If the user is not logged in they will be redirected to the loginSignup page else the user_data variable will contain their information.
}
?>

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
</style>

<head>

  <title>Περιγραφή Θέσης</title>
  <link rel="icon" type="image/ico" href="images/favicon.ico">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
      <span class="sr-only">Φότρωση...</span>
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
    <?php
    if ((isset($_GET['loggedIn'])) && (!strcmp($_GET['loggedIn'], "true"))) {
      if ((!isset($user_data)) || (isset($user_data) && !strcmp($user_data['user_type'], "ΦΟΙΤΗΤΗΣ"))) { ?>
        <header class="site-navbar">
          <div class="container-fluid">
            <div class="row align-items-center">
              <div class="site-logo col-6"><a href="index.php">ΑΤΛΑΣ</a></div>

              <nav class="mx-auto site-navigation">
                <ul class="site-menu js-clone-nav d-none d-xl-block ml-0 pl-0">
                  <li><a href="student.php">Αναζήτηση Θέσης</a></li>
                  <li><a href="savedJobs.php">Αγαπημένα</a></li>
                  <li><a href="search.php">Αιτήσεις</a></li>
                  <li><a href="faqStudent.php?loggedIn=true">Βοήθεια</a></li>
                  <li><a href="contact.php?loggedIn=true">Επικοινωνία</a></li>
                </ul>
              </nav>

              <div class="right-cta-menu text-right d-flex aligin-items-center col-6">
                <div class="ml-auto">
                  <a href="studentProfile.php" class="profile-button"><i class="fa fa-user-circle" aria-hidden="true"></i></a>
                  <a href="../backend/logout.php" class="btn btn-outline-red border-width-1 d-none d-lg-inline-block" style="right: -50px; position: relative; color:white">Αποσύνδεση</a>
                </div>
                <a href="#" class="site-menu-toggle js-menu-toggle d-inline-block d-xl-none mt-lg-2 ml-3"><span class="icon-menu h3 m-0 p-0 mt-2"></span></a>
              </div>
            </div>
          </div>
        </header>
      <?php
      } elseif ((!isset($user_data)) || (isset($user_data) && !strcmp($user_data['user_type'], "ΕΤΑΙΡΕΙΑ"))) { ?>
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
      <?php
      }
      ?>
    <?php
    } else { ?>
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
                    <li><a href="./faqStudent.php">Είμαι Φοιτητής/τρια</a></li>
                    <li><a href="./faqCompany.php">Είμαι Φορέας Υποδοχής</a></li>
                  </ul>
                </li>
                <li><a href="contact.php">Επικοινωνία</a></li>
              </ul>
            </nav>

            <div class="right-cta-menu text-right d-flex aligin-items-center col-6">
              <div class="ml-auto">
                <a href="loginSignup.php?to=post-job.php&user_type=company" class="btn btn-outline-white border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-add"></span>Δημιουργία Θέσης</a>
                <a href="loginSignup.php" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-lock_outline"></span>Είσοδος/Εγγραφή</a>
              </div>
              <a href="#" class="site-menu-toggle js-menu-toggle d-inline-block d-xl-none mt-lg-2 ml-3"><span class="icon-menu h3 m-0 p-0 mt-2"></span></a>
            </div>

          </div>
        </div>
      </header>
    <?php
    }
    ?>

    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('images/hero_1.jpg');" id="home-section">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h1 class="text-white font-weight-bold">Περιγραφή Θέσης</h1>
            <?php
            if ((isset($_GET['loggedIn'])) && (!strcmp($_GET['loggedIn'], "true"))) {
              if ((!isset($user_data)) || (isset($user_data) && !strcmp($user_data['user_type'], "ΦΟΙΤΗΤΗΣ"))) { ?>
                <div class="custom-breadcrumbs">
                  <a href="index.php">Αρχική</a> <span class="mx-2 slash">/</span>
                  <a href="loginSignup.php">Είσοδος</a> <span class="mx-2 slash">/</span>
                  <a href="student.php">Αναζήτηση Θέσης</a> <span class="mx-2 slash">/</span>
                  <span class="text-white"><strong>Περιγραφή Θέσης</strong></span>
                </div>
              <?php
              } elseif ((!isset($user_data)) || (isset($user_data) && !strcmp($user_data['user_type'], "ΕΤΑΙΡΕΙΑ"))) { ?>
                <div class="custom-breadcrumbs">
                  <a href="index.php">Αρχική</a> <span class="mx-2 slash">/</span>
                  <a href="loginSignup.php">Είσοδος</a> <span class="mx-2 slash">/</span>
                  <a href="company.php">Ενεργές Θέσεις</a> <span class="mx-2 slash">/</span>
                  <span class="text-white"><strong>Περιγραφή Θέσης</strong></span>
                </div>
              <?php
              }
              ?>
            <?php
            } else { ?>
              <div class="custom-breadcrumbs">
                <a href="index.php">Αρχική</a> <span class="mx-2 slash">/</span>
                <span class="text-white"><strong>Περιγραφή Θέσης</strong></span>
              </div>
            <?php
            }
            ?>
          </div>
        </div>
      </div>
    </section>


    <section class="site-section">
      <div class="container">
        <div class="row align-items-center mb-5">
          <div class="col-lg-8 mb-4 mb-lg-0">
            <div class="d-flex align-items-center">
              <div class="border p-2 d-inline-block mr-3 rounded">
                <img src="images/job_logo_5.jpg" alt="Image">
              </div>
              <div>
                <h2>Product Designer</h2>
                <div>
                  <span class="ml-0 mr-2 mb-2"><span class="icon-briefcase mr-2 job-description-icon"><span class="company-name">Puma</span>
                      <span class="m-2"><span class="icon-room mr-2"></span>Αθήνα</span>
                      <span class="m-2"><span class="icon-clock-o mr-2"></span><span class="text-primary">Πλήρης απασχόληση</span></span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="row">
              <div class="col-6">
                <a href="#" class="btn btn-block btn-light btn-md"><span class="icon-heart-o mr-2 text-danger"></span>Αγαπημένα</a>
              </div>
              <div class="col-6">
                <?php
                if ((!isset($user_data)) || (isset($user_data) && !strcmp($user_data['user_type'], "ΦΟΙΤΗΤΗΣ")))
                  if ((isset($_GET['loggedIn'])) && (!strcmp($_GET['loggedIn'], "true"))) { ?>
                  <a href="request-form.php" class="btn btn-block btn-primary btn-md">Κάνε Αίτηση</a>
                <?php
                  } else { ?>
                  <a href="loginSignup.php?to=request-form.php&user_type=student" class="btn btn-block btn-primary btn-md">Κάνε Αίτηση</a>
                <?php
                  }
                ?>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-8">
            <div class="mb-5">
              <figure class="mb-5"><img src="images/job_single_img_1.jpg" alt="Image" class="img-fluid rounded"></figure>
              <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-align-left mr-3"></span>Περιγραφή Θέσης</h3>
              <p class="job-description-text">Η PUMA SE είναι γερμανική πολυεθνική εταιρεία που σχεδιάζει και κατασκευάζει αθλητικά και άλλα υποδήματα</p>
              <p class="job-description-text">Αναζητούμε έναν Σχεδιαστή Προϊόντος για να ενταχθεί στην ομάδα μας με δεξιότητες προϊόντος, αλληλεπίδρασης και οπτικού σχεδιασμού. Εκτιμούμε τους σχεδιαστές που σκέφτονται σε συστήματα, επιθυμούν να επικυρώσουν τη δουλειά τους με την έρευνα και μπορούν να επικοινωνήσουν αποτελεσματικά τις ιδέες τους σε άλλους. Το ιδανικό άτομο θα ευδοκιμήσει με τη συνεργασία, την ανατροφοδότηση και την καλλιέργεια καλών εργασιακών σχέσεων.</p>
            </div>
            <div class="mb-5 responsibilities">
              <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-rocket mr-3"></span>Ευθύνες</h3>
              <ul class="list-unstyled m-0 p-0">
                <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span>Αναπτύξτε και παραδώστεwireframes & prototypes για να παρουσιάσετε τις ιδέες σας. Αλληλεπιδράστε τακτικά με τους χρήστες και την υπόλοιπη ομάδα προϊόντων και μετατρέψτε τις ιδέες τους σε έννοιες.</span></li>
                <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span>Εστιάστε σε αυτό που κάνετε καλύτερα - σχεδιάστε διεπαφές για κινητά και web.</span></li>
                <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span>Συνεργαστείτε στενά με την υπόλοιπη ομάδα Σχεδιασμού Προϊόντων για την ανάπτυξη και επέκταση του Συστήματος Σχεδιασμού(hosted in Figma).</span></li>
                <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span>Δημιουργήστε journey maps, user maps & user flows.</span></li>
                <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span>Λάβετε μέρος σε κριτικές σχεδιασμού και μοιραστείτε τη δουλειά σας με το C-level.</span></li>
              </ul>
            </div>

            <div class="mb-5 education">
              <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-book mr-3"></span>Εμπειρία</h3>
              <ul class="list-unstyled m-0 p-0">
                <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span>Ένα online portfolio που παρουσιάζει ισχυρή σχεδιαστική δουλειά δημιουργώντας λύσεις σχεδίασης με επίκεντρο τον χρήστη e2e.</span></li>
                <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span>Εμπειρία σε κατασκευή πρωτοτύπων υψηλής πιστότητας με εργαλεία όπως Figma, Sketch, Adobe Creative Suite, Framer (ή παρόμοια)</span></li>
                <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span>Δυνατότητα δοκιμής πρωτοτύπων σε ερευνητικά εργαλεία όπως το Maze (ή παρόμοια).</span></li>
                <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span>Καλές οργανωτικές δεξιότητες, χρονοδιαγράμματα επικοινωνίας και δεξιότητες διαχείρισης ενδιαφερομένων</span></li>
                <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span>Εξοικείωση με τη μεθοδολογία Agile & ικανότητα εκτέλεσης με γρήγορο ρυθμό, επαναληπτική διαδικασία σχεδιασμού υψηλής πίεσης.</span></li>
              </ul>
            </div>

            <div class="mb-5 ">
              <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-turned_in mr-3"></span>Άλλα Οφέλη</h3>
              <ul class="list-unstyled m-0 p-0 ul-other">
                <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span>Ικανοί στη γρήγορη μάθηση σε περιβάλλον με γρήγορο ρυθμό.</span></li>
                <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span>Προσανατολισμένος στη λεπτομέρεια</span></li>
              </ul>
            </div>

            <div class="row mb-5">
              <div class="col-6">
                <a href="#" class="btn btn-block btn-light btn-md"><span class="icon-heart-o mr-2 text-danger"></span>Αποθήκευση </a>
              </div>
              <div class="col-6">
                <?php
                if ((!isset($user_data)) || (isset($user_data) && !strcmp($user_data['user_type'], "ΦΟΙΤΗΤΗΣ")))
                  if ((isset($_GET['loggedIn'])) && (!strcmp($_GET['loggedIn'], "true"))) { ?>
                  <a href="request-form.php" class="btn btn-block btn-primary btn-md">Κάνε Αίτηση</a>
                <?php
                  } else { ?>
                  <a href="loginSignup.php?to=request-form.php&user_type=student" class="btn btn-block btn-primary btn-md">Κάνε Αίτηση</a>
                <?php
                  }
                ?>
              </div>
            </div>

          </div>
          <div class="col-lg-4">
            <div class="bg-light p-3 border rounded mb-4">
              <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Περίληψη Εργασίας</h3>
              <ul class="list-unstyled pl-3 mb-0 text-black">
                <li class="mb-2 job-summary-text"><strong>Διάρκεια:</strong> 6 Μήνες</li>
                <li class="mb-2 job-summary-text"><strong>Τύπος Εργασίας:</strong> Πλήρη</li>
                <li class="mb-2 job-summary-text"><strong>Ημερομηνία Έναρξης:</strong> 05.07.2023</li>
                <li class="mb-2 job-summary-text"><strong>Μηνιαίος Μισθός:</strong> 800€</li>
                <li class="mb-2 job-summary-text"><strong>Τμήμα Θέσης:</strong> Ψηφιακών Τεχνών</li>
                <li class="mb-2 job-summary-text"><strong>Περιφέρεια:</strong> Αττική</li>
              </ul>
            </div>

            <div class="bg-light p-3 border rounded">
              <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Κοινοποιήστε</h3>
              <div class="px-3">
                <a href="#" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-facebook"></span></a>
                <a href="#" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-twitter"></span></a>
                <a href="#" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-linkedin"></span></a>
                <a href="#" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-pinterest"></span></a>
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

  <script src="js/bootstrap-select.min.js"></script>

  <script src="js/custom.js"></script>


</body>

</html>