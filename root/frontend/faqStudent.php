<!DOCTYPE html>
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
  <title>Συχνές Eρωτήσεις Φοιτητής/τρια</title>
  <link rel="icon" type="image/ico" href="images/favicon.ico" />
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


  <link rel="stylesheet" href="css/custom-bs.css" />
  <link rel="stylesheet" href="css/jquery.fancybox.min.css" />
  <link rel="stylesheet" href="css/bootstrap-select.min.css" />
  <link rel="stylesheet" href="fonts/icomoon/style.css" />
  <link rel="stylesheet" href="fonts/line-icons/style.css" />
  <link rel="stylesheet" href="css/owl.carousel.min.css" />
  <link rel="stylesheet" href="css/animate.min.css" />
  <link rel="stylesheet" href="css/quill.snow.css" />

  <!-- MAIN CSS -->
  <link rel="stylesheet" href="css/style.css" />
</head>

<body id="top"></body>
<div id="overlayer"></div>
<div class="loader">
  <div class="spinner-border text-primary" role="status">
    <span class="sr-only">Φόρτωση...</span>
  </div>
</div>

<div class="site-wrap" style="padding-bottom: 20vh">
  <div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
      <div class="site-mobile-menu-close mt-3">
        <span class="icon-close2 js-menu-toggle"></span>
      </div>
    </div>
    <div class="site-mobile-menu-body"></div>
  </div>
  <!-- .site-mobile-menu -->

  <!-- NAVBAR -->
  <?php
  if ((isset($_GET['loggedIn'])) && (!strcmp($_GET['loggedIn'], "true"))) { ?><header class="site-navbar">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="site-logo col-6"><a href="index.php">ΑΤΛΑΣ</a></div>
          <nav class="mx-auto site-navigation">
            <ul class="site-menu js-clone-nav d-none d-xl-block ml-0 pl-0">
              <li><a href="student.php">Αναζήτηση Θέσης</a></li>
              <li><a href="savedJobs.php">Αγαπημένα</a></li>
              <li><a href="applications.php">Αιτήσεις</a></li>
              <li><a href="faqStudent.php?loggedIn=true">Βοήθεια</a></li>
              <li><a href="contact.php?loggedIn=true">Επικοινωνία</a></li>
            </ul>
          </nav>
          <div class="right-cta-menu text-right d-flex aligin-items-center col-6">
            <div class="ml-auto"><a href="studentProfile.php" class="profile-button"><i class="fa fa-user-circle" aria-hidden="true"></i></a><a href="../backend/logout.php" class="btn btn-outline-red border-width-1 d-none d-lg-inline-block" style="right: -50px; position: relative; color:white">Αποσύνδεση</a></div><a href="#" class="site-menu-toggle js-menu-toggle d-inline-block d-xl-none mt-lg-2 ml-3"><span class="icon-menu h3 m-0 p-0 mt-2"></span></a>
          </div>
        </div>
      </div>
    </header><?php
            } else { ?><header class="site-navbar mt-3">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="site-logo col-6"><a href="index.php">ΑΤΛΑΣ</a></div>
          <nav class="mx-auto site-navigation">
            <ul class="site-menu js-clone-nav d-none d-xl-block ml-0 pl-0">
              <li><a href="search.php">Αναζήτηση Θέσης</a></li>
              <li class="has-children"><a href="#">Βοήθεια</a>
                <ul class="dropdown">
                  <li><a href="./faqStudent.php">Είμαι Φοιτητής/τρια</a></li>
                  <li><a href="./faqCompany.php">Είμαι Φορέας Υποδοχής</a></li>
                </ul>
              </li>
              <li><a href="contact.php">Επικοινωνία</a></li>
            </ul>
          </nav>
          <div class="right-cta-menu text-right d-flex aligin-items-center col-6">
            <div class="ml-auto"><a href="loginSignup.php?to=post-job.php&user_type=company" class="btn btn-outline-white border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-add"></span>Δημιουργία Θέσης</a><a href="loginSignup.php" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-lock_outline"></span>Είσοδος/Εγγραφή</a></div><a href="#" class="site-menu-toggle js-menu-toggle d-inline-block d-xl-none mt-lg-2 ml-3"><span class="icon-menu h3 m-0 p-0 mt-2"></span></a>
          </div>
        </div>
      </div>
    </header><?php
            }
              ?>

  <!-- HOME -->
  <section class="section-hero overlay inner-page bg-image" style="background-image: url('images/hero_1.jpg')" id="home-section">
    <div class="container">
      <div class="row">
        <div class="col-md-7">
          <h1 class="text-white font-weight-bold">
            Συχνές Eρωτήσεις Φοιτητής/τρια
          </h1>
          <?php
          if ((isset($_GET['loggedIn'])) && (!strcmp($_GET['loggedIn'], "true"))) { ?>
            <div class="custom-breadcrumbs">
              <a href="index.php">Αρχική</a> <span class="mx-2 slash">/</span>
              <a href="loginSignup.php">Είσοδος</a> <span class="mx-2 slash">/</span>
              <span class="text-white"><strong>FAQ</strong></span>
            </div>
          <?php
          } else { ?>
            <div class="custom-breadcrumbs">
              <a href="index.php">Αρχική</a> <span class="mx-2 slash">/</span>
              <span class="text-white"><strong>FAQ</strong></span>
            </div>
          <?php
          }
          ?>
        </div>
      </div>
    </div>
  </section>

  <section class="site-section" id="accordion">
    <div class="container">
      <div class="row accordion justify-content-center block__76208">
        <div class="col-lg-5 ml-auto">
          <div class="accordion-item">
            <h3 class="mb-0 heading">
              <a class="btn-block h4" data-toggle="collapse" href="#collapseFive" role="button" aria-expanded="true" aria-controls="collapseFive">Πώς μπορώ να εγγραφώ/εισέλθω στο σύστημα;<span class="icon"></span></a>
              <div id="collapseFive" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="body-text">
                  <p>
                    Για να εισέλθετε στο σύστημα δεν απαιτείται κάποια εγγραφή. Μπορείτε να συνδεθείτε με το όνομα χρήστη και τον κωδικό πρόσβασης που έχετε λάβει από το οικείο σας Ίδρυμα.
                  </p>
                </div>
              </div>
            </h3>
          </div>
          <!-- .accordion-item -->

          <div class="accordion-item">
            <h3 class="mb-0 heading">
              <a class="btn-block h4" data-toggle="collapse" href="#collapseSix" role="button" aria-expanded="false" aria-controls="collapseSix">Τι μπορώ να κάνω σε περίπτωση που χάσω τους κωδικούς μου / αντιμετωπίζω πρόβλημα με την είσοδό μου στο λογαριασμό μου;<span class="icon"></span></a>
              <div id="collapseSix" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="body-text">
                  <p>
                    Για θέματα που αφορούν την πρόσβασή σας στο λογαριασμό σας (Όνομα Χρήστη/Κωδικός Πρόσβασης) θα πρέπει να απευθυνθείτε στις αντίστοιχες υπηρεσίες (γραφείο μηχανοργάνωσης ή κέντρο δικτύων) του οικείου σας ιδρύματος.
                  </p>
                </div>
              </div>
            </h3>
          </div>
          <!-- .accordion-item -->

          <div class="accordion-item">
            <h3 class="mb-0 heading">
              <a class="btn-block h4" data-toggle="collapse" href="#collapseSeven" role="button" aria-expanded="false" aria-controls="collapseSeven">Ποιές είναι οι προϋποθέσεις για να επιλεγώ για μία θέση Πρακτικής Άσκησης; <span class="icon"></span></a>
              <div id="collapseSeven" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="body-text">
                  <p>
                    Κάθε ακαδημαϊκό τμήμα έχει συγκεκριμένες προϋποθέσεις για τη συμμετοχή των φοιτητών στην Πρακτική Άσκηση. Για περισσότερες πληροφορίες μπορείτε να απευθυνθείτε στο αρμόδιο Γραφείο Πρακτικής Άσκησης του Ιδρύματός σας.
                  </p>
                </div>
              </div>
            </h3>
          </div>
          <!-- .accordion-item -->

          <div class="accordion-item">
            <h3 class="mb-0 heading">
              <a class="btn-block h4" data-toggle="collapse" href="#collapseEight" role="button" aria-expanded="false" aria-controls="collapseEight">Βρήκα κάποιες θέσεις Πρακτικής Άσκησης που με ενδιαφέρουν, τι θα πρέπει να κάνω;<span class="icon"></span></a>
              <div id="collapseEight" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="body-text">
                  <p>
                    Μπορείτε να υποβάλετε αίτηση, προς το Γραφείο Πρακτικής Άσκησης του Ιδρύματός σας, με τις θέσεις που σας ενδιαφέρουν και εφόσον αντιστοιχιστείτε σε κάποια θέση πρακτικής άσκησης να ενημερώνεστε από το λογαριασμό σας για την εξέλιξή της.
                  </p>
                </div>
              </div>
            </h3>
          </div>
          <!-- .accordion-item -->
        </div>
      </div>
    </div>
  </section>
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

<footer style="margin-bottom: 30px;">
  <table style="margin: 0 auto 0 auto;">
    <tr>
      <td><a href="http://minedu.gov.gr/" target="_blank"><img src="images/footer1.png" alt="Υπουργείο Παιδείας και Θρησκευμάτων" height="60"></a></td>
      <td><a href="http://www.grnet.gr/" target="_blank"><img src="images/footer2.png" alt="ΕΔΕΤ"></a></td>
    </tr>
  </table>
</footer>

</html>