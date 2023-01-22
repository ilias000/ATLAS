<?php
session_start(); // You need this on every page you use the $_SESSION variable.

// Include the required files.
include("../backend/connection.php");
include("../backend/functions.php");

if (isset($_SESSION['error_login'])) { // Checking if the SESSION has been set because you do not want to unset a value that has not been set.
  unset($_SESSION['error_login']);
}

if (isset($_SESSION['error_signup'])) { // Checking if the SESSION has been set because you do not want to unset a value that has not been set.
  unset($_SESSION['error_signup']);
}

if (isset($_SESSION['success_signup'])) { // Checking if the SESSION has been set because you do not want to unset a value that has not been set.
  unset($_SESSION['success_signup']);
}

if (isset($_GET['status']) && $_GET['status'] == 'success') {
  $_SESSION['success_signup'] = "Επιτυχής εγγραφή!";
}

// Checking if the user has clicked on the post button.
if ($_SERVER['REQUEST_METHOD'] == 'POST') { // If something was posted

  if (isset($_POST['login'])) { // Login POST request.
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
          if ($user_data['user_type'] === 'ΦΟΙΤΗΤΗΣ') {
            header("Location: student.php");
          } elseif ($user_data['user_type'] === 'ΕΤΑΙΡΕΙΑ') {
            header("Location: company.php");
          }
          die;
        }
      }
      $_SESSION['error_login'] = "Το email ή ο κωδικός είναι λανθασμένα.";
    } else {
      $_SESSION['error_login'] = "Συμπληρώστε όλα τα πεδία με έγκυρους χαρακτήρες.";
    }
  } elseif (isset($_POST['student_signup'])) { // Signup POST request.
    // Collect the users data.
    $email = $_POST['email'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $selected_university = $_POST['selected_university'];
    $selected_department = $_POST['selected_department'];
    $password = $_POST['password'];
    $password_check = $_POST['password_check'];

    if (!empty($email) && !is_numeric($email)) {
      if (!empty($first_name)) {
        if (!empty($last_name)) {
          if ($selected_university != "Επιλέξτε Πανεπιστήμιο") {
            if ($selected_department != "Επιλέξτε Τμήμα") {
              if (!empty($password)) {
                if (!empty($password_check) && !strcmp($password, $password_check)) {
                  // Create user_id for the session of the user.
                  $max_length = 20;
                  $session_id = random_number($max_length); // Creating a random session_id.

                  // Save to database.
                  // Saving the email and password.
                  $query = "INSERT INTO users (session_id, email, password, user_type) VALUES ('$session_id', '$email', '$password', 'ΦΟΙΤΗΤΗΣ')";

                  // If the save was successful.
                  if (mysqli_query($connection, $query)) {
                    // Taking the users id.
                    $query = "SELECT * FROM users WHERE session_id = $session_id";
                    $result = mysqli_query($connection, $query);
                    $user_data = mysqli_fetch_assoc($result);
                    $user_id = $user_data['id'];
                  }
                  // Taking the departments id.
                  $query = "SELECT * FROM departments WHERE name = '$selected_department'";
                  $result = mysqli_query($connection, $query);
                  $department_data = mysqli_fetch_assoc($result);
                  $department_id = $department_data['id'];

                  // Saving the first_name, last_name, university and department.
                  $query = "INSERT INTO students (first_name, last_name, university_id, department_id, user_id) VALUES ('$first_name', '$last_name', '$selected_university', $department_id, $user_id)";
                  mysqli_query($connection, $query);
                  header("Location: loginSignup.php?status=success");
                  die;
                } else {
                  $_SESSION['error_signup'] = "Η επιβεβαίωση κωδικού δεν ταιριάζει με τον κωδικό πρόσβασης.";
                }
              } else {
                $_SESSION['error_signup'] = "Παρακαλώ εισάγετε έναν κωδικό πρόσβασης.";
              }
            } else {
              $_SESSION['error_signup'] = "Παρακαλώ επιλέξτε Τμήμα.";
            }
          } else {
            $_SESSION['error_signup'] = "Παρακαλώ επιλέξτε Πανεπιστήμιο.";
          }
        } else {
          $_SESSION['error_signup'] = "Το επίθετο είναι λανθασμένο.";
        }
      } else {
        $_SESSION['error_signup'] = "Το όνομα είναι λανθασμένο.";
      }
    } else {
      $_SESSION['error_signup'] = "Το email είναι λανθασμένο.";
    }
  } elseif (isset($_POST['company_signup'])) { // Signup POST request.
    // Collect the companies data.
    $email = $_POST['email'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $company_type = $_POST['company_type'];
    $field = $_POST['field'];
    $title = $_POST['title'];
    $afm = $_POST['afm'];
    $doy = $_POST['doy'];
    $password = $_POST['password'];
    $password_check = $_POST['password_check'];

    if (!empty($email) && !is_numeric($email)) {
      if (!empty($first_name)) {
        if (!empty($last_name)) {
          if ($company_type != "Επιλέξτε Είδος Φορέα") {
            if ($field != "Πεδίο δραστηριότητας") {
              if (!empty($title)) {
                if (!empty($afm)) {
                  if ($doy != "Επιλέξτε Δ.Ο.Υ") {
                    if (!empty($password)) {
                      if (!empty($password_check) && !strcmp($password, $password_check)) {
                        // Create user_id for the session of the user.
                        $max_length = 20;
                        $session_id = random_number($max_length); // Creating a random session_id.

                        // Save to database.
                        // Saving the email and password.
                        $query = "INSERT INTO users (session_id, email, password, user_type) VALUES ('$session_id', '$email', '$password', 'ΕΤΑΙΡΕΙΑ')";

                        // If the save was successful.
                        if (mysqli_query($connection, $query)) {
                          // Taking the users id.
                          $query = "SELECT * FROM users WHERE session_id = $session_id";
                          $result = mysqli_query($connection, $query);
                          $user_data = mysqli_fetch_assoc($result);
                          $user_id = $user_data['id'];
                        }

                        // Saving the title, company_type, field, afm, doy, first_name and last_name.
                        $query = "INSERT INTO companies (title, company_type, field, afm, doy, first_name, last_name, user_id) VALUES ('$title', '$company_type', '$field', $afm, '$doy', '$first_name', '$last_name', $user_id)";
                        mysqli_query($connection, $query);
                        header("Location: loginSignup.php?status=success");
                        die;
                      } else {
                        $_SESSION['error_signup'] = "Η επιβεβαίωση κωδικού δεν ταιριάζει με τον κωδικό πρόσβασης.";
                      }
                    } else {
                      $_SESSION['error_signup'] = "Παρακαλώ εισάγετε έναν κωδικό πρόσβασης.";
                    }
                  } else {
                    $_SESSION['error_signup'] = "Παρακαλώ επιλέξτε ΔΟΥ.";
                  }
                } else {
                  $_SESSION['error_signup'] = "Παρακαλώ εισάγετε το ΑΦΜ.";
                }
              } else {
                $_SESSION['error_signup'] = "Παρακαλώ εισάγετε τον τίτλο της εταιρείας.";
              }
            } else {
              $_SESSION['error_signup'] = "Παρακαλώ επιλέξτε Πεδίο δραστηριότητας.";
            }
          } else {
            $_SESSION['error_signup'] = "Παρακαλώ επιλέξτε Επιλέξτε Είδος Φορέα.";
          }
        } else {
          $_SESSION['error_signup'] = "Παρακαλώ εισάγετε Επώνυμο.";
        }
      } else {
        $_SESSION['error_signup'] = "Παρακαλώ εισάγετε Όνομα.";
      }
    } else {
      $_SESSION['error_signup'] = "Το email είναι λανθασμένο.";
    }
  }
}
?>
<!doctype html>
<html lang="en">

<head>
  <title>Είσοδος/Εγγραφή</title>
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
                  <li><a href="studentHelp.php">Είμαι Φοιτητής</a></li>
                  <li><a href="companyHelp.php">Είμαι Φορέας Υποδοχής</a></li>
                </ul>
              </li>
              <li><a href="contact.php">Επικοινωνία</a></li>
              <li class="d-lg-none"><a href="post-job.php"><span class="mr-2">+</span>Δημιουργία Θέσης</a></li>
            </ul>
          </nav>


          <div class="right-cta-menu text-right d-flex aligin-items-center col-6">
            <div class="ml-auto">
              <a href="post-job.php" class="btn btn-outline-white border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-add"></span>Δημιουργία Θέσης</a>
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
              <a href="index.php">Αρχική</a> <span class="mx-2 slash">/</span>
              <span class="text-white"><strong>Είσοδος/Εγγραφή</strong></span>
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
              <button onclick="toggleSignUp()" class="btn px-4 btn-primary text-white" style="height: 40px; font-size: 80%; display:flex; align-items:center">Εγγραφή Εταιρείας</button>
            </div>
            <form method="POST" class="p-4 border rounded">

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="email">Email</label>
                  <input name="email" type="text" id="email" class="form-control" placeholder="Ηλεκτρονική διεύθυνση">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="first_name">Όνομα</label>
                  <input name="first_name" type="text" id="first_name" class="form-control" placeholder="Όνομα">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="last_name">Επώνυμο</label>
                  <input name="last_name" type="text" id="last_name" class="form-control" placeholder="Επώνυμο">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <div class="signupdiv">
                    <label class="text-black" for="selected_university">Πανεπιστήμιο</label>
                    <select name="selected_university">
                      <option value="Επιλέξτε Πανεπιστήμιο">Επιλέξτε Πανεπιστήμιο</option>
                      <?php
                      $query = "SELECT * FROM universities";
                      $result = mysqli_query($connection, $query);
                      ?>
                      <?php
                      while ($university = mysqli_fetch_array(
                        $result,
                        MYSQLI_ASSOC
                      )) :;
                      ?>
                        <option value="<?php echo $university["id"]; ?>">
                          <?php echo $university["name"]; ?>
                        </option>
                      <?php
                      endwhile;
                      ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <div class="signupdiv">
                    <label class="text-black" for="selected_department">Τμήμα</label>
                    <select name="selected_department">
                      <option value="Επιλέξτε Τμήμα">Επιλέξτε Τμήμα</option>
                      <option value="Τμήμα Πληροφορικής και Τηλεπικοινωνιών">Τμήμα Πληροφορικής και Τηλεπικοινωνιών</option>
                      <option value="Τμήμα Φυσικής">Τμήμα Φυσικής</option>
                      <option value="Τμήμα Χημείας">Τμήμα Χημείας</option>
                      <option value="Τμήμα Μαθηματικών">Τμήμα Μαθηματικών</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="password">Κωδικός πρόσβασης</label>
                  <input name="password" type="password" id="password" class="form-control" placeholder="Κωδικός πρόσβασης">
                </div>
              </div>
              <div class="row form-group mb-4">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="password_check">Επιβεβαίωση κωδικού</label>
                  <input name="password_check" type="password" id="password_check" class="form-control" placeholder="Πληκτρολογήστε ξανά τον κωδικό πρόσβασης">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input name="student_signup" type="submit" value="Εγγραφή" class="btn px-4 btn-primary text-white">
                  <?php if (isset($_SESSION['error_signup'])) : ?>
                    <p style="color:red;"><?php echo $_SESSION['error_signup'] ?></p>
                  <?php endif; ?>
                  <?php if (isset($_SESSION['success_signup']) && !isset($_SESSION['error_signup'])) : ?>
                    <p style="color:green;"><?php echo $_SESSION['success_signup'] ?></p>
                  <?php endif; ?>
                </div>
              </div>
            </form>
          </div>

          <div class="col-lg-6 mb-5" id="company" style="display: none;">
            <!-- Form 1 -->
            <div style="display: flex; justify-content:space-between; align-items: baseline;">
              <h2 class="mb-4">Εγγραφή Εταιρείας</h2>
              <button onclick="toggleSignUp()" class="btn px-4 btn-primary text-white" style="height: 40px; font-size: 80%; display:flex; align-items:center">Εγγραφή Φοιτητή/τριας</button>
            </div>
            <form method="POST" class="p-4 border rounded">

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="first_name">Όνομα</label>
                  <input name="first_name" type="text" id="first_name" class="form-control" placeholder="Όνομα">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="last_name">Επώνυμο</label>
                  <input name="last_name" type="text" id="last_name" class="form-control" placeholder="Επώνυμο">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <div class="signupdiv">
                    <label class="text-black" for="company_type">Είδος φορέα</label>
                    <select name="company_type">
                      <option value="Επιλέξτε Είδος Φορέα">Επιλέξτε Είδος Φορέα</option>
                      <option value="ΙΔΙΩΤΙΚΟΣ">Ιδιωτικός Φορέας</option>
                      <option value="ΔΗΜΟΣΙΟΣ">Δημόσιος Φορέας</option>
                      <option value="Μ.Κ.Ο.">Μ.Κ.Ο.</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <div class="signupdiv">
                    <label class="text-black" for="field">Πεδίο δραστηριότητας</label>
                    <select name="field">
                      <option value="Πεδίο δραστηριότητας">Πεδίο δραστηριότητας</option>
                      <option value="ΠΛΗΡΟΦΟΡΙΚΗ">Πληροφορική</option>
                      <option value="ΒΙΟΛΟΓΙΑ">Βιολογία</option>
                      <option value="ΑΘΛΗΤΙΣΜΟΣ">Αθλητισμός</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class=" row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="title">Επωνυμία</label>
                  <input name="title" type="text" id="title" class="form-control" placeholder="Επωνυμία">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="afm">Α.Φ.Μ.</label>
                  <input name="afm" type="text" id="afm" class="form-control" placeholder="Α.Φ.Μ.">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <div class="signupdiv">
                    <label class="text-black" for="doy">Δ.Ο.Υ.</label>
                    <select name="doy">
                      <option value="Επιλέξτε Δ.Ο.Υ">Επιλέξτε Δ.Ο.Υ</option>
                      <option value="Α ΑΘΗΝΩΝ">Α Αθηνών</option>
                      <option value="Β ΑΘΗΝΩΝ">Β Αθηνών</option>
                      <option value="Γ ΑΘΗΝΩΝ">Γ Αθηνών</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="email">Email</label>
                  <input name="email" type="text" id="email" class="form-control" placeholder="Ηλεκτρονική διεύθυνση">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="password">Κωδικός πρόσβασης</label>
                  <input name="password" type="password" id="fname" class="form-control" placeholder="Κωδικός πρόσβασης">
                </div>
              </div>
              <div class="row form-group mb-4">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="password_check">Επιβεβαίωση κωδικού</label>
                  <input name="password_check" type="password" id="fname" class="form-control" placeholder="Πληκτρολογήστε ξανά τον κωδικό πρόσβασης">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <input name="company_signup" type="submit" value="Εγγραφή" class="btn px-4 btn-primary text-white">
                </div>
              </div>
            </form>
          </div>
          <div class="col-lg-6">
            <!-- Form 2 -->
            <h2 class="mb-4">Είσοδος</h2>
            <form method="POST" class="p-4 border rounded">

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
                  <input name="login" type="submit" value="Είσοδος" class="btn px-4 btn-primary text-white">
                </div>
              </div>

              <!-- Display error if needed. -->
              <?php if (isset($_SESSION['error_login'])) : ?>
                <p style="color:red;"><?php echo $_SESSION['error_login'] ?></p>
              <?php endif; ?>

            </form>


          </div>
        </div>
      </div>
    </section>

    <footer style="margin-bottom: 30px;">
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