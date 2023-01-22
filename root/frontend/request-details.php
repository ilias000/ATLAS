<?php
session_start();

include("../backend/connection.php");
include("../backend/functions.php");

$user_data = check_login($connection); // If the user is not logged in they will be redirected to the loginSignup page else the user_data variable will contain their information.
?>

<!doctype html>
<html lang="en">

<style>
    input[type=radio] {
        border: 0px;
        width: 20%;
        height: 0.7em;
        align-items: baseline;
    }

    .radio_option {
        display: flex;
        flex-wrap: nowrap;
        align-items: baseline;
        font-size: small;
    }

    .filter_box {
        border: 1px solid #ccc;
        border-radius: 6px;
        display: flex;
        justify-content: space-between;
        padding: 10px;
        color: black;
        width: 450px;
        flex-direction: row;
        align-items: center;
    }

    .listings {
        display: flex;
        flex-direction: column;
        justify-content: start;
        padding: 10px;
        margin-left: 10px;
        width: 100%;
    }

    .dropdown-item.active,
    .dropdown-item:active {
        color: #fff;
        text-decoration: none;
        background-color: #3C6EAD !important;
    }

    .job-listing {
        height: 250px !important;
    }

    .section-hero.inner-page,
    .section-hero.inner-page>.container>.row {
        padding-top: 3em !important;
    }

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

    .btn.btn-outline-green.btn-sm.preview-btn {
        position: absolute;
        right: 10px;
        bottom: 10px;
    }

    .btn.btn-outline-red.btn-sm.post-btn {
        position: absolute;
        right: 130px;
        bottom: 10px;
    }
</style>

<head>
    <title>Αίτηση</title>
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
                            <h1 class="text-white font-weight-bold">Αίτηση</h1>
                            <div class="custom-breadcrumbs">
                                <a href="index.php">Αρχική</a> <span class="mx-2 slash">/</span>
                                <a href="loginSignup.php">Είσοδος</a> <span class="mx-2 slash">/</span>
                                <a href="requests.php">Αιτήσεις</a> <span class="mx-2 slash">/</span>
                                <span class="text-white"><strong>Αίτηση</strong></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="site-section" id="next" style="width: 100%; padding: 50px 30px">
            <div style="border: 1px solid #e6e6e6; border-radius: 5px; padding: 20px 20px; margin: 0 auto 0 auto; width: 100%; max-width: 1000px; color:black">
                <h4>Στοιχεία Αίτησης</h4>
                <hr>
                <h6>Όνομα</h6>
                <p>StudentName</p>
                <h6>Επώνυμο</h6>
                <p>StudentLastname</p>
                <h6>Email</h6>
                <p>student@mail.com</p>
                <h6>Τηλέφωνο</h6>
                <p>0000000000</p>
                <h6>Λόγος ενδιαφέροντος</h6>
                <p>Απάντηση στο ερώτημα: Γιατί ενδιαφερεστε γι' αυτήν την θέση;</p>
                <h6>Αναλυτική βαθμολογία</h6>
                <p style="text-decoration: underline">analytiki_vathmologia.pdf</p>
                <div style="position: relative;">
                    <button onclick="window.location.href='rejection.php'" class="btn btn-outline-red btn-sm post-btn">Απόρριψη</button>
                    <button onclick="window.location.href='edit-job.php'" class="btn btn-outline-green btn-sm preview-btn">Αποδοχή</button>
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