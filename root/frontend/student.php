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
        flex-direction: column;
        justify-content: start;
        padding: 10px;
        margin-top: 10px;
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
        height: 150px;
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
</style>

<head>
    <title>Αναζήτηση Θέσης</title>
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
                            <li><a href="student.php">Αναζήτηση Θέσης</a></li>
                            <li><a href="savedJobs.php">Αγαπημένα</a></li>
                            <li><a href="search.php">Αιτήσεις</a></li>
                            <li><a href="faqStudent.html">Βοήθεια</a></li>
                            <li><a href="contact.php">Επικοινωνία</a></li>
                        </ul>
                    </nav>

                    <div class="right-cta-menu text-right d-flex aligin-items-center col-6">
                        <div class="ml-auto">
                            <a href="#" class="profile-button"><i class="fa fa-user-circle" aria-hidden="true"></i></a>
                            <a href="../backend/logout.php" class="btn btn-outline-red border-width-1 d-none d-lg-inline-block" style="right: -50px; position: relative; color:white; font-weight:600;">Αποσύνδεση</a>
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
                            <h1 class="text-white font-weight-bold">Αναζήτηση Θέσης</h1>
                            <div class="custom-breadcrumbs">
                                <a href="index.php">Αρχική</a> <span class="mx-2 slash">/</span>
                                <a href="loginSignup.php">Είσοδος</a> <span class="mx-2 slash">/</span>
                                <span class="text-white"><strong>Αναζήτηση Θέσης</strong></span>
                            </div>
                        </div>
                        <form method="post" class="search-jobs-form">
                            <div class="row mb-5" style="justify-content: space-between; flex-wrap: nowrap">
                                <input type="text" class="form-control form-control-lg" style="width: 75%; height: 50px" placeholder="Τίτλος θέσης απασχόλησης...">
                                <button type="submit" class="btn btn-primary btn-lg btn-block btn-search search-button" style="width: 20%; height: 50px"><span class="icon-search icon mr-2"></span>Αναζήτηση</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <section class="site-section" id="next" style="width: 100%; padding: 50px 30px">

            <div style="display: flex; justify-content: start; color: black">
                <div class="filters">
                    <h5 style="display: flex; text-align: center; justify-content: center">Φίλτρα</h5>
                    <div class="filter_box">
                        <h6>Περιφέρεια</h6>
                        <form method="post" style="margin-right:50px">
                            <select class="selectpicker" data-style="btn-white btn-lg" data-width="200px" data-live-search="true" title="Επέλεξε Περιφέρεια" style="justify-items: center;">
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
                        </form>
                    </div>
                    <div class="filter_box">
                        <h6>Τύπος Εργασίας</h4>
                            <div class="radio_option">
                                <input type="radio" id="full-time" name="job-type">
                                <label for="full-time">Πλήρη Απασχόληση</label><br>
                            </div>
                            <div class="radio_option">
                                <input type="radio" id="part-time" name="job-type">
                                <label for="part-time">Μερική Απασχόληση</label><br>
                            </div>
                    </div>
                    <div class="filter_box">
                        <h6>Ημερομηνία έναρξης</h6>
                        <input type="date" id="start" name="trip-start" value="2023-03-01" min="2023-01-23" max="2026-01-01">
                    </div>
                    <div class="filter_box">
                        <h6>Διάρκεια</h6>
                        <input type="number" id="duration" name="duration" min="1" max="12" placeholder="Μήνες"></input>
                    </div>
                    <div class="filter_box">
                        <h6>Μηνιαίος Μισθός</h6>
                        <input type="number" id="salary" name="salary" min="0" max="100000" placeholder="€" data-type="currency"></input>
                    </div>
                    <div class="filter_box">
                        <h6>Τμήμα Θέσης</h6>
                        <select class="selectpicker" data-style="btn-white btn-lg" data-width="200px" data-live-search="true" title="Επέλεξε Τμήμα" style="justify-items: center;">
                            <option value="Επιλέξτε Τμήμα">Επιλέξτε Τμήμα</option>
                            <option value="Τμήμα Πληροφορικής και Τηλεπικοινωνιών">Τμήμα Πληροφορικής και Τηλεπικοινωνιών</option>
                            <option value="Τμήμα Φυσικής">Τμήμα Φυσικής</option>
                            <option value="Τμήμα Χημείας">Τμήμα Χημείας</option>
                            <option value="Τμήμα Μαθηματικών">Τμήμα Μαθηματικών</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary" style="width: 100%; margin: 0; margin-top: 10px">Εφαρμογή</button>
                </div>

                <div class="listings">
                    <ul class="job-listings mb-5">
                        <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
                            <a href="job-description.php"></a>
                            <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
                                <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                                    <h2>Product Designer</h2>
                                    <strong>Adidas</strong>
                                </div>
                                <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                                    <span class="icon-room"></span> New York, New York
                                    <br>
                                    <i class="fa fa-eur" aria-hidden="true"></i> 1000
                                </div>
                                <div class="job-listing-meta">
                                    <span class="badge badge-danger">Μερική Απασχόληση</span>
                                </div>
                            </div>

                        </li>
                        <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
                            <a href="job-description.php"></a>

                            <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
                                <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                                    <h2>Digital Marketing Director</h2>
                                    <strong>Sprint</strong>
                                </div>
                                <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                                    <span class="icon-room"></span> Overland Park, Kansas
                                    <br>
                                    <i class="fa fa-eur" aria-hidden="true"></i> 950
                                </div>
                                <div class="job-listing-meta">
                                    <span class="badge badge-success">Πλήρη Απασχόληση</span>
                                </div>
                            </div>
                        </li>

                        <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
                            <a href="job-description.php"></a>

                            <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
                                <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                                    <h2>Back-end Engineer (Python)</h2>
                                    <strong>Amazon</strong>
                                </div>
                                <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                                    <span class="icon-room"></span> Overland Park, Kansas
                                    <br>
                                    <i class="fa fa-eur" aria-hidden="true"></i> 673
                                </div>
                                <div class="job-listing-meta">
                                    <span class="badge badge-success">Πλήρη Απασχόληση</span>
                                </div>
                            </div>
                        </li>

                        <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
                            <a href="job-description.php"></a>

                            <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
                                <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                                    <h2>Senior Art Director</h2>
                                    <strong>Microsoft</strong>
                                </div>
                                <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                                    <span class="icon-room"></span> Anywhere
                                    <br>
                                    <i class="fa fa-eur" aria-hidden="true"></i> 2400
                                </div>
                                <div class="job-listing-meta">
                                    <span class="badge badge-success">Πλήρη Απασχόληση</span>
                                </div>
                            </div>
                        </li>

                        <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
                            <a href="job-description.php"></a>

                            <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
                                <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                                    <h2>Product Designer</h2>
                                    <strong>Puma</strong>
                                </div>
                                <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                                    <span class="icon-room"></span> San Mateo, CA
                                    <br>
                                    <i class="fa fa-eur" aria-hidden="true"></i> 1100
                                </div>
                                <div class="job-listing-meta">
                                    <span class="badge badge-success">Πλήρη Απασχόληση</span>
                                </div>
                            </div>
                        </li>
                        <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
                            <a href="job-description.php"></a>

                            <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
                                <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                                    <h2>Product Designer</h2>
                                    <strong>Adidas</strong>
                                </div>
                                <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                                    <span class="icon-room"></span> New York, New York
                                    <br>
                                    <i class="fa fa-eur" aria-hidden="true"></i> 1000
                                </div>
                                <div class="job-listing-meta">
                                    <span class="badge badge-danger">Μερική Απασχόληση</span>
                                </div>
                            </div>

                        </li>
                        <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
                            <a href="job-description.php"></a>

                            <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
                                <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                                    <h2>Digital Marketing Director</h2>
                                    <strong>Sprint</strong>
                                </div>
                                <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                                    <span class="icon-room"></span> Overland Park, Kansas
                                    <br>
                                    <i class="fa fa-eur" aria-hidden="true"></i> 2500
                                </div>
                                <div class="job-listing-meta">
                                    <span class="badge badge-success">Πλήρη Απασχόληση</span>
                                </div>
                            </div>
                        </li>

                    </ul>
                    <div class="all-positions-div" style="justify-content: end;">
                        <div class="row pagination-wrap page-selector">
                            <div class="col-md-6 text-center inner-page-selector">
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