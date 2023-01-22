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

    .upload-btn-label {
        background-color: #3C6EAD;
        color: white;
        padding: 0.5rem;
        font-family: sans-serif;
        border-radius: 0.3rem;
        cursor: pointer;
        margin: 1rem 0;
    }

    #file-chosen {
        margin-left: 0.3rem;
        color: black;
    }
</style>

<head>
    <title>Επεξεργασία Αίτησης</title>
    <link rel="icon" type="image/ico" href="images/favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

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
    <header class="site-navbar mt-3">
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
                    <div class="ml-auto">
                        <a href="studentProfile.php" class="profile-button"><i class="fa fa-user-circle" aria-hidden="true"></i></a>
                        <a href="../backend/logout.php" class="btn btn-outline-red border-width-1 d-none d-lg-inline-block" style="right: -50px; position: relative; color:white">Αποσύνδεση</a>
                    </div>
                    <a href="#" class="site-menu-toggle js-menu-toggle d-inline-block d-xl-none mt-lg-2 ml-3"><span class="icon-menu h3 m-0 p-0 mt-2"></span></a>
                </div>
            </div>
        </div>
    </header>

    <!-- onoma epitheto email thl keimeno arxeio prosorini apoth oristiki ypoboli -->

    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('images/hero_1.jpg')" id="home-section">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h1 class="text-white font-weight-bold">
                        Επεξεργασία αίτησης
                    </h1>
                    <div class="custom-breadcrumbs">
                        <a href="index.php">Αρχική</a> <span class="mx-2 slash">/</span>
                        <a href="loginSignup.php">Είσοδος</a> <span class="mx-2 slash">/</span>
                        <a href="student.php">Αναζήτηση Θέσης</a> <span class="mx-2 slash">/</span>
                        <a href="job-description.php?loggedIn=true">Περιγραφή Θέσης</a> <span class="mx-2 slash">/</span>
                        <span class="text-white"><strong>Επεξεργασία Αίτησης</strong></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="site-section" style="height: 1000px;">
        <form method="POST" class="p-4 border rounded" action="student.php" style="height: 100%; color:black">
            <label for="first_name">Όνομα</label><br>
            <input type="text" name="first_name" placeholder="Όνομα" required oninvalid="this.setCustomValidity('Παρακαλώ εισάγετε ένα όνομα')" oninput="this.setCustomValidity('')" value="FirstNameExample"><br>
            <label for="last_name">Επίθετο</label><br>
            <input type="text" name="last_name" placeholder="Επίθετο" required oninvalid="this.setCustomValidity('Παρακαλώ εισάγετε ένα επίθετο')" oninput="this.setCustomValidity('')" value="LastNameExample"><br>
            <label for=" email">Email</label><br>
            <input type=" email" name="email" placeholder="Email" required oninvalid="this.setCustomValidity('Παρακαλώ εισάγετε ένα email')" oninput="this.setCustomValidity('')" value="example@mail.com"><br>
            <label for="phone">Τηλέφωνο</label><br>
            <input type="tel" name="phone" placeholder="Τηλέφωνο" required oninvalid="this.setCustomValidity('Παρακαλώ εισάγετε ένα τηλέφωνο')" oninput="this.setCustomValidity('')" value="6900000000"><br>
            <label for="message">Γιατί ενδιαφερεστε γι' αυτήν την θέση;</label><br>
            <textarea name="message" style="width: 97%; height:200px" placeholder="" required oninvalid="this.setCustomValidity('Παρακαλώ εισάγετε την απάντησή σας')" oninput="this.setCustomValidity('')">Ενδιαφέρομαι για την συγκεκριμένη θέση καθώς πιστεύω ότι οι ικανότητες μου πληρούν τις προϋποθέσεις που έχετε και διότι θα είμαι σίγουρα μία πολύ καλή προσθήκη στο πνεύμα της ομάδας σας.</textarea><br>
            <input type="file" id="upload-btn" hidden required oninvalid="this.setCustomValidity('Παρακαλώ ανεβάστε ένα αρχείο')" oninput="this.setCustomValidity('')">
            <label for="upload-btn" class="upload-btn-label">Επιλογή Αρχείου</label><span id="file-chosen">No file chosen</span><br>
            <script>
                const upload_btn = document.getElementById('upload-btn');
                const fileChosen = document.getElementById('file-chosen');

                upload_btn.addEventListener('change', function() {
                    fileChosen.textContent = this.files[0].name
                })
            </script>
            <div style="display: flex; justify-content:space-between">
                <input type="submit" onclick="confirmSubmitTemp()" name="submit_temp" class="btn px-4 btn-primary text-white" style="width:35%; border-radius: 5px" value="Προσωρινή Αποθήκευση">
                <input type="submit" onclick="confirmSubmitPerm()" name="submit_perm" class="btn px-4 btn-outline-red" style="width:35%; border-radius: 5px" value="Οριστική Υποβολή">
            </div>
            <script>
                function confirmSubmitPerm() {
                    if (confirm("Θέλετε σίγουρα να υποβάλλετε την αίτηση οριστικά?")) {
                        return confirm("Η αίτησή σας καταχωρήθηκε με επιτυχία!");
                    }
                }

                function confirmSubmitTemp() {
                    if (confirm("Θέλετε σίγουρα να κάνετε προσωρινή αποθήκευση της αίτησης?")) {
                        return confirm("Η αίτησή σας απθηκεύτηκε με επιτυχία!");
                    }
                }
            </script>
        </form>
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