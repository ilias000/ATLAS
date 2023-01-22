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

    .btn.btn-primary.btn-sm.preview-btn {
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
                            <li><a href="applications.php">Αιτήσεις</a></li>
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
                            <h1 class="text-white font-weight-bold">Αιτήσεις</h1>
                            <div class="custom-breadcrumbs">
                                <a href="index.php">Αρχική</a> <span class="mx-2 slash">/</span>
                                <a href="loginSignup.php">Είσοδος</a> <span class="mx-2 slash">/</span>
                                <span class="text-white"><strong>Αιτήσεις</strong></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="site-section" id="next" style="width: 100%; padding: 50px 30px">

            <div class="listings">
                <ul class="job-listings mb-5">
                    <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
                        <a href="job-description.php"></a>
                        <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between align-items-center mx-4">
                            <div class="job-listing-position custom-width mb-3 mb-sm-0" style="width: 20%;">
                                <h2>Product Designer</h2>
                                <strong>Adidas</strong>
                            </div>
                            <div class="filter_box">
                                <span>Κατάσταση Αγγελίας: </span>
                                <span style="color: green">Οριστική Υποβολή</span>
                            </div>
                            <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                                <span class="icon-room"></span> New York, New York
                                <br>
                                <i class="fa fa-eur" aria-hidden="true"></i> 1000
                            </div>
                            <button onclick="window.location.href='job-description.php'" class="btn btn-primary btn-sm preview-btn">Προεπισκόπηση</button>
                            <div class="job-listing-meta">
                                <span class="badge badge-danger">Μερική Απασχόληση</span>
                            </div>

                        </div>

                    </li>
                    <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
                        <a href="job-description.php"></a>

                        <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
                            <div class="job-listing-position custom-width mb-3 mb-sm-0" style="width: 20%;">
                                <h2>Digital Marketing Director</h2>
                                <strong>Adidas</strong>
                            </div>
                            <div class="filter_box">
                                <span>Κατάσταση Αγγελίας: </span>
                                <span style="color: grey">Προσωρινά αποθηκευμένη</span>
                            </div>
                            <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                                <span class="icon-room"></span> Overland Park, Kansas
                                <br>
                                <i class="fa fa-eur" aria-hidden="true"></i> 950
                            </div>
                            <button href="#" class="btn btn-outline-red btn-sm post-btn">Οριστική Υποβολή</button>
                            <button onclick="window.location.href='edit-job.php'" class="btn btn-primary btn-sm preview-btn">Επεξεργασία</button>
                            <div class="job-listing-meta">
                                <span class="badge badge-success">Πλήρη Απασχόληση</span>
                            </div>
                        </div>
                    </li>

                    <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
                        <a href="job-description.php"></a>

                        <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
                            <div class="job-listing-position custom-width mb-3 mb-sm-0" style="width: 20%;">
                                <h2>Back-end Engineer (Python)</h2>
                                <strong>Adidas</strong>
                            </div>
                            <div class="filter_box">
                                <span>Κατάσταση Αγγελίας: </span>
                                <span style="color: grey">Προσωρινά αποθηκευμένη</span>
                            </div>
                            <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                                <span class="icon-room"></span> Overland Park, Kansas
                                <br>
                                <i class="fa fa-eur" aria-hidden="true"></i> 673
                            </div>
                            <button href="#" class="btn btn-outline-red btn-sm post-btn">Οριστική Υποβολή</button>
                            <button onclick="window.location.href='edit-job.php'" class="btn btn-primary btn-sm preview-btn">Επεξεργασία</button>
                            <div class="job-listing-meta">
                                <span class="badge badge-success">Πλήρη Απασχόληση</span>
                            </div>
                        </div>
                    </li>

                    <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
                        <a href="job-description.php"></a>

                        <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
                            <div class="job-listing-position custom-width mb-3 mb-sm-0" style="width: 20%;">
                                <h2>Senior Art Director</h2>
                                <strong>Adidas</strong>
                            </div>
                            <div class="filter_box">
                                <span>Κατάσταση Αγγελίας: </span>
                                <span style="color: green">Οριστική Υποβολή</span>
                            </div>
                            <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                                <span class="icon-room"></span> Anywhere
                                <br>
                                <i class="fa fa-eur" aria-hidden="true"></i> 2400
                            </div>
                            <button onclick="window.location.href='job-description.php'" class="btn btn-primary btn-sm preview-btn">Προεπισκόπηση</button>
                            <div class="job-listing-meta">
                                <span class="badge badge-success">Πλήρη Απασχόληση</span>
                            </div>
                        </div>
                    </li>

                    <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
                        <a href="job-description.php"></a>

                        <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
                            <div class="job-listing-position custom-width mb-3 mb-sm-0" style="width: 20%;">
                                <h2>Product Designer</h2>
                                <strong>Adidas</strong>
                            </div>
                            <div class="filter_box">
                                <span>Κατάσταση Αγγελίας: </span>
                                <span style="color: green">Οριστική Υποβολή</span>
                            </div>
                            <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                                <span class="icon-room"></span> San Mateo, CA
                                <br>
                                <i class="fa fa-eur" aria-hidden="true"></i> 1100
                            </div>
                            <button onclick="window.location.href='job-description.php'" class="btn btn-primary btn-sm preview-btn">Προεπισκόπηση</button>
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