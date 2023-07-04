<?php 
    // include language configuration file based on selected language
    $lang = "en";
    if (isset($_GET['lang'])) {
    $lang = $_GET['lang'];
        $_SESSION['lang'] = $lang;
    }
    if( isset( $_SESSION['lang'] ) ) {
        $lang = $_SESSION['lang'];
    }else {
        $lang = "en";
    }
    require_once ("../assets/lang/" . $lang . ".php");

    require_once "../config/setting.php";
    require_once "../config/db.php";

    //** AUTH QUOTES */
    $sql = "SELECT * FROM quotes JOIN dataguru ON quotes.namaguru = dataguru.namaguru GROUP BY quotes.id DESC LIMIT 3";
    $stmt = $db->prepare($sql);

    $stmt->execute();
    $lquotes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Start the session
    session_start();

    // Check if the user is logged in
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
    // User is logged in, redirect to the dashboard
    header("Location: ".$base_url['main']."/dashboard/");
    exit;
    }
    
    $username = $password = "";
    $username_err = $password_err = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        if (empty(trim($_POST["username"]))) {
            $username_err = "Please enter username.";
        } else {
            $username = trim($_POST["username"]);
        }

        // Check if password is empty
        if (empty(trim($_POST["password"]))) {
            $password_err = "Please enter your password.";
        } else {
            $password = trim($_POST["password"]);
        }

        // Query the database for a user with the provided username
        $stmt1 = $db->prepare("SELECT * FROM authuser WHERE username = ?");
        $stmt1->execute([$_POST['username']]);

        $stmt2 = $db->prepare("SELECT * FROM authsiswa WHERE username = ?");
        $stmt2->execute([$_POST['username']]);

        $stmt3 = $db->prepare("SELECT * FROM authguru WHERE username = ?");
        $stmt3->execute([$_POST['username']]);

        // Check data
        if ($stmt1->rowCount() > 0) {
            session_start();
            $row = $stmt1->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $row['password'])) {
              // proses login jika password sesuai
              $_SESSION['logged_in'] = true;
              $_SESSION['role'] = $row['role'];
              $_SESSION['nama'] = $row['username'];
              header('Location:'.$base_url['main']);
            } else {
                $password_err = "Your Password is incorrect";
            }
          } else if ($stmt2->rowCount() > 0) {
            $row = $stmt2->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $row['password'])) {
              // proses login jika password sesuai
              $_SESSION['logged_in'] = true;
              $_SESSION['role'] = $row['role'];
              $_SESSION['idpendaftaran'] = $row['idpendaftaran'];
              $_SESSION['username'] = $row['username'];
              header('Location:'.$base_url['main']);
            } else {
                $password_err = "Your Password is incorrect";
            }
          }else if ($stmt3->rowCount() > 0) {
            $row = $stmt3->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $row['password'])) {
              // proses login jika password sesuai
              $_SESSION['logged_in'] = true;
              $_SESSION['role'] = $row['role'];
              $_SESSION['idguru'] = $row['idguru'];
              $_SESSION['namaguru'] = $row['namaguru'];
              $_SESSION['username'] = $row['username'];
              header('Location:'.$base_url['main']);
            } else {
                $password_err = "Your Password is incorrect";
            }
          } else {
            $password_err = "Login Failed: Your user ID or password is incorrect";
          }
    }
    
?>
<!DOCTYPE html>
<html lang="<?php echo $lang ?>">
<head>
    <title><?php echo APP_NAME ?></title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="VeroApps Schools" name="description"/>
    <meta content="Lysca" name="author"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <?php require_once '../layouts/head-style.php' ?>
</head>
<body>
<div class="auth-page">
    <div class="container-fluid p-0">
        <div class="row g-0">
            <div class="col-xxl-3 col-lg-4 col-md-5">
                <div class="auth-full-page-content d-flex p-sm-5 p-4">
                    <div class="w-100">
                        <div class="d-flex flex-column h-100">
                            <div class="mb-4 mb-md-5 text-center">
                                <a href="<?php echo $base_url['main']; ?>" class="d-block auth-logo">
                                    <img src="<?php echo $base_url['assets']; ?>images/logo-sm.svg" alt="" height="28"> <span class="logo-txt"><?php echo APP_NAME?></span>
                                </a>
                            </div>
                            <div class="auth-content my-auto">
                                <div class="text-center">
                                    <h5 class="mb-0">Welcome Back !</h5>
                                    <p class="text-muted mt-2">Sign in to continue to <?php echo APP_NAME?>.</p>
                                </div>
                                <form class="custom-form mt-4 pt-2" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                    <div class="mb-3 <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                                        <label class="form-label" for="username">Username</label>
                                        <input type="text" class="form-control" id="username" placeholder="Enter username" name="username">
                                        <span class="text-danger"><?php echo $username_err; ?></span>
                                    </div>
                                    <div class="mb-3 <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                                        <div class="d-flex align-items-start">
                                            <div class="flex-grow-1">
                                                <label class="form-label" for="password">Password</label>
                                            </div>
                                        </div>

                                        <div class="input-group auth-pass-inputgroup">
                                            <input type="password" class="form-control" placeholder="Enter password" name="password" aria-label="Password" aria-describedby="password-addon">
                                            <button class="btn btn-light ms-0" type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                        </div>
                                        <span class="text-danger"><?php echo $password_err; ?></span>
                                    </div>
                                    <div class="mb-3">
                                        <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Log In</button>
                                    </div>
                                </form>
                            </div>
                            <div class="mt-4 mt-md-5 text-center">
                                <p class="mb-0">© <script>
                                        document.write(new Date().getFullYear())
                                    </script> Minia . Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end auth full page content -->
            </div>
            <!-- end col -->
            <div class="col-xxl-9 col-lg-8 col-md-7">
                <div class="auth-bg pt-md-5 p-4 d-flex">
                    <div class="bg-overlay bg-primary"></div>
                    <ul class="bg-bubbles">
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                    <!-- end bubble effect -->
                    <div class="row justify-content-center align-items-center">
                        <div class="col-xl-7">
                            <div class="p-0 p-sm-4 px-xl-0">
                                <div id="reviewcarouselIndicators" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-indicators carousel-indicators-rounded justify-content-start ms-0 mb-0">
                                        <button type="button" data-bs-target="#reviewcarouselIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                        <button type="button" data-bs-target="#reviewcarouselIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                        <button type="button" data-bs-target="#reviewcarouselIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                    </div>
                                    <!-- end carouselIndicators -->
                                    <div class="carousel-inner">
                                        <?php
                                            foreach ($lquotes as $key => $quote) {
                                                $active = $key == 0 ? 'active' : '';
                                                echo '
                                                    <div class="carousel-item '.$active.'">
                                                        <div class="testi-contain text-white">
                                                        <i class="bx bxs-quote-alt-left text-success display-6"></i>
        
                                                        <h4 class="mt-4 fw-medium lh-base text-white">“'.$quote['deskripsi'].'”
                                                        </h4>
                                                        <div class="mt-4 pt-3 pb-5">
                                                            <div class="d-flex align-items-start">
                                                                <div class="flex-shrink-0">
                                                                    <img src="'.$base_url['foto'].'/fotoguru/'.$quote['foto'].'" class="avatar-md img-fluid rounded-circle" alt="...">
                                                                </div>
                                                                <div class="flex-grow-1 ms-3 mb-4">
                                                                    <h5 class="font-size-18 text-white">'.$quote['namaguru'].'
                                                                    </h5>
                                                                    <p class="mb-0 text-white-50">Web Designer</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                ';
                                            }
                                        ?>
                                    </div>

                                    <!-- end carousel-inner -->
                                </div>
                                <!-- end review carousel -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container fluid -->
</div>


<!-- JAVASCRIPT -->

<?php require_once '../layouts/vendor-scripts.php'; ?>
<!-- password addon init -->
<script src="<?php echo $base_url['assets']; ?>js/pages/pass-addon.init.js"></script>

</body>

</html>