<?php
session_start(); // You need this on every page you use the $_SESSION variable.

// Include the required files.
include("../backend/connection.php");
include("../backend/functions.php");

if (isset($_SESSION['error'])) { // Checking if the SESSION has been set because you do not want to unset a value that has not been set.
  unset($_SESSION['error']);
}

// Checking if the user has clicked on the post button.
if ($_SERVER['REQUEST_METHOD'] == 'POST') { // If something was posted
  // Collect the users data.
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Checking the email and password.
  if (!empty($email) && !empty($password) && !is_numeric($email)) { // If there are not empty and email is not a number.

    // Read from database.
    $query = "SELECT * FROM users WHERE email = '$email' limit 1";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_num_rows($result) > 0) // If the result is positive and the number of rows is greater than 0.
    {
      $user_data = mysqli_fetch_assoc($result); // Taking the associative array (key - value array).
      if ($user_data['password'] === $password) {
        // The login was successful
        // Set the SESSION id.
        $_SESSION["session_id"] = $user_data['session_id'];
        // Redirect the user.
        if ($user_data['user_type'] === 'STUDENT') {
          header("Location: student.php");
        } elseif ($user_data['user_type'] === 'COMPANY') {
          header("Location: company.php");
        }
        die;
      }
    }
    $_SESSION['error'] = "Το email ή ο κωδικός είναι λανθασμένα.";
  } else {
    $_SESSION['error'] = "Συμπληρώστε όλα τα πεδία με έγκυρους χαρακτήρες.";
  }
}
?>
<!doctype html>
<html lang="en">

<head>
  <title>Είσοδος/Εγγραφή &mdash; Website Template by Colorlib</title>
  <link rel="icon" type="image/ico" href="images/favicon.ico">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


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
      <span class="sr-only">Loading...</span>
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
              <li><a href="search.html">Αναζήτηση Θέσης</a></li>
              <li class="has-children">
                <a href="#">Βοήθεια</a>
                <ul class="dropdown">
                  <li><a href="studentHelp.html">Είμαι Φοιτητής</a></li>
                  <li><a href="companyHlep.html">Είμαι Φορέας Υποδοχής</a></li>
                </ul>
              </li>
              <li><a href="contact.html">Επικοινωνία</a></li>
              <li class="d-lg-none"><a href="post-job.html"><span class="mr-2">+</span>Δημιουργία Θέσης</a></li>
              <li class="d-lg-none"><a href="login.html">Είσοδος/Εγγραφή</a></li>
            </ul>
          </nav>


          <div class="right-cta-menu text-right d-flex aligin-items-center col-6">
            <div class="ml-auto">
              <a href="post-job.html" class="btn btn-outline-white border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-add"></span>Δημιουργία Θέσης</a>
              <!-- <a href="login.html" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-lock_outline"></span>Είσοδος</a> -->
            </div>
            <a href="#" class="site-menu-toggle js-menu-toggle d-inline-block d-xl-none mt-lg-2 ml-3"><span class="icon-menu h3 m-0 p-0 mt-2"></span></a>
          </div>

        </div>
      </div>
    </header>

    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('images/hero_1.jpg');" id="home-section">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h1 class="text-white font-weight-bold">Εγγραφή / Είσοδος</h1>
            <div class="custom-breadcrumbs">
              <a href="index.html">Αρχική</a> <span class="mx-2 slash">/</span>
              <span class="text-white"><strong>Είσοδος</strong></span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Forms -->

    <script>
      function toggleSignUp() {
        var x = document.getElementById("student");
        var y = document.getElementById("company");
        if (x.style.display === "none") {
          x.style.display = "block";
          y.style.display = "none";
        } else {
          x.style.display = "none";
          y.style.display = "block";
        }
      }
    </script>

    <section class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 mb-5" id="student">
            <!-- Form 1 -->
            <div style="display: flex; justify-content:space-between; align-items: baseline;">
              <h2 class="mb-4">Εγγραφή Φοιτητή/ιας</h2>
              <button onclick="toggleSignUp()" class="btn px-4 btn-primary text-white" style="height: 40px;">Εγγραφή Εταιρείας</button>
            </div>
            <form action="#" class="p-4 border rounded">

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="fname">Email</label>
                  <input type="text" id="fname" class="form-control" placeholder="Ηλεκτρονική διεύθυνση">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="fname">Όνομα</label>
                  <input type="text" id="fname" class="form-control" placeholder="Όνομα">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="fname">Επώνυμο</label>
                  <input type="text" id="fname" class="form-control" placeholder="Επώνυμο">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <div class="signupdiv">
                    <label class="text-black" for="fname">Πανεπιστήμιο</label>
                    <select>

                      <option>Επιλέξτε Πανεπιστήμιο</option>
                      <option>Εθνικού και Καποδιστριακού Πανεπιστημίου Αθηνών</option>
                      <option>Εθνικό Μετσόβιο Πολυτεχνείο</option>
                      <option>Γεωπονικό Πανεπιστήμιο Αθηνών</option>
                      <option>Χαροκόπειο Πανεπιστήμιο</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <div class="signupdiv">
                    <label class="text-black" for="fname">Τμήμα</label>
                    <select>
                      <option>Επιλέξτε Τμήμα</option>
                      <option>Τμήμα Πληροφορικής και Τηλεπικοινωνιών</option>
                      <option>Τμήμα Φυσικής</option>
                      <option>Τμήμα Χημείας</option>
                      <option>Τμήμα Μαθηματικών</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="fname">Κωδικός πρόσβασης</label>
                  <input type="password" id="fname" class="form-control" placeholder="Κωδικός πρόσβασης">
                </div>
              </div>
              <div class="row form-group mb-4">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="fname">Επιβεβαίωση κωδικού</label>
                  <input type="password" id="fname" class="form-control" placeholder="Πληκτρολογήστε ξανά τον κωδικό πρόσβασης">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Εγγραφή" class="btn px-4 btn-primary text-white">
                </div>
              </div>
            </form>
          </div>

          <div class="col-lg-6 mb-5" id="company" style="display: none;">
            <!-- Form 1 -->
            <div style="display: flex; justify-content:space-between; align-items: baseline;">
              <h2 class="mb-4">Εγγραφή Εταιρείας</h2>
              <button onclick="toggleSignUp()" class="btn px-4 btn-primary text-white" style="height: 40px;">Εγγραφή Φοιτητή/τριας</button>
            </div>
            <form action="#" class="p-4 border rounded">

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="fname">Όνομα</label>
                  <input type="text" id="fname" class="form-control" placeholder="Όνομα">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="fname">Επώνυμο</label>
                  <input type="text" id="fname" class="form-control" placeholder="Επώνυμο">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <div class="signupdiv">
                    <label class="text-black" for="fname">Είδος φορέα</label>
                    <select>
                      <option>Επιλέξτε Είδος Φορέα</option>
                      <option>Ιδιωτικός Φορέας</option>
                      <option>Δημόσιος Φορέας</option>
                      <option>Μ.Κ.Ο.</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <div class="signupdiv">
                    <label class="text-black" for="fname">Πεδίο δραστηριότητας</label>
                    <select>
                      <option>Πληροφορική</option>
                      <option>Αθλητισμός</option>
                      <option>Βιοϊατρική</option>
                      <option>Δημόσιες σχέσεις</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="fname">Επωνυμία</label>
                  <input type="text" id="fname" class="form-control" placeholder="Επωνυμία">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="fname">Α.Φ.Μ.</label>
                  <input type="text" id="fname" class="form-control" placeholder="Α.Φ.Μ.">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <div class="signupdiv">
                    <label class="text-black" for="fname">Δ.Ο.Υ.</label>
                    <select>
                      <option>Επιλέξτε Δ.Ο.Υ</option>
                      <option>ΑΘΗΝΩΝ Α</option>
                      <option>ΑΘΗΝΩΝ Δ</option>
                      <option>ΑΘΗΝΩΝ ΙΒ</option>
                      <option>ΑΙΓΑΛΕΩ</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="fname">Email</label>
                  <input type="text" id="fname" class="form-control" placeholder="Ηλεκτρονική διεύθυνση">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="fname">Κωδικός πρόσβασης</label>
                  <input type="password" id="fname" class="form-control" placeholder="Κωδικός πρόσβασης">
                </div>
              </div>
              <div class="row form-group mb-4">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="fname">Επιβεβαίωση κωδικού</label>
                  <input type="password" id="fname" class="form-control" placeholder="Πληκτρολογήστε ξανά τον κωδικό πρόσβασης">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Εγγραφή" class="btn px-4 btn-primary text-white">
                </div>
              </div>
            </form>
          </div>
          <div class="col-lg-6">
            <!-- Form 2 -->
            <h2 class="mb-4">Είσοδος</h2>
            <form method="post" class="p-4 border rounded">

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="email">Email</label>
                  <input name="email" type="text" id="email" class="form-control" placeholder="Ηλεκτρονική διεύθυνση">
                </div>
              </div>
              <div class="row form-group mb-4">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="password">Κωδικός πρόσβασης</label>
                  <input name="password" type="password" id="password" class="form-control" placeholder="Κωδικός πρόσβασης">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Είσοδος" class="btn px-4 btn-primary text-white">
                </div>
              </div>

              <?php if (isset($_SESSION['error'])) : ?>
                <p style="color:red;"><?php echo $_SESSION['error'] ?></p>
              <?php endif; ?>

            </form>


          </div>
        </div>
      </div>
    </section>

    <footer>
      <table style=" margin: 0 auto 0 auto;">
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