
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Free Tour and Travel Website Tempalte | Smarteyeapps.com</title>
    <link rel="shortcut icon" href="<?=base_url()?>assets/login/assets/images/fav.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="<?=base_url()?>assets/login/assets/images/fav.jpg">
    <link rel="stylesheet" href="<?=base_url()?>assets/login/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/login/assets/css/all.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/login/assets/css/animate.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/login/assets/plugins/slider/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/login/assets/plugins/slider/css/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/login/assets/css/style.css" />
</head>

    <body class="form-login-body"> 
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 mx-auto login-desk">
                       <div class="row">
                            <div class="col-md-7 detail-box">
                                <img class="logo" src="<?=base_url()?>assets/login/assets/images/logo.png" alt=""> 
                                <div class="detailsh">
                                     <img class="help" src="<?=base_url()?>assets/login/assets/images/cv.png" alt="">
                                 
                                </div>
                            </div>
                            <div class="col-md-5 loginform">
                                 <h4>Welcome Back</h4>                   
                                 <p>Signin to your Account</p>
                                 <h4><!-- JIKA ADA PESAN FLASHDATA BERNAMA PESAN_GAGAL, MAKA TAMPILKAN PESANNYA -->
										<?php if ($this->session->flashdata('pesan_gagal')) : ?>
											<div class="alert alert-danger">
												<?php echo $this->session->flashdata('pesan_gagal') ?>
											</div>
										<?php endif ?>
										<!-- JIKA ADA PESAN FLASHDATA BERNAMA PESAN_SUKSES, MAKA TAMPILKAN PESANNYA -->
										<?php if ($this->session->flashdata('pesan_sukses')) : ?>
											<div class="alert alert-danger">
												<?php echo $this->session->flashdata('pesan_sukses') ?>
											</div>
										<?php endif ?></h4>
                                 <form method="POST">
                                 	
                              
                                 <div class="login-det">
                                    <div class="form-row">
                                         <label for="">Username</label>
                                             <div class="input-group mb-3">
                                              <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">
                                                    <i class="far fa-user"></i>
                                                </span>
                                              </div>
                                              <input type="text" class="form-control" for="username_pengguna" placeholder="Enter Username" aria-label="Username" aria-describedby="basic-addon1" id="username_pengguna" name="username_pengguna">
                                         </div>
                                    </div>
                                     <div class="form-row">
                                         <label for="">Password</label>
                                             <div class="input-group mb-3">
                                              <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">
                                                    <i class="fas fa-lock"></i>
                                                </span>
                                              </div>
                                              <input type="password" class="form-control" for="password_pengguna" placeholder="Enter Password" aria-label="Username" aria-describedby="basic-addon1"  id="password_pengguna" name="password_pengguna">
                                         </div>
                                    </div>
                               
                                    <!-- <p class="forget"><a href="">Forget Password?</a></p> -->
                                    <p class="help"></p>
                                    
                                    <button class="btn btn-sm btn-danger" type="submit">Login</button>
                                    
                                      
                                    <div class="social-link">
                                        <ul class="socil-icon">
                                            <li>
                                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fab fa-twitter"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fab fa-instagram"></i></a> 
                                            </li>
                                            <li>
                                                <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fab fa-dribbble"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fab fa-behance"></i></a>
                                            </li>
                                       </ul>
                                    </div>
                                    
                                 </div>
                                  </form>
                            </div>
                       </div>
                      
                    </div>
                </div>
            </div>
    </body>

    <script src="<?=base_url()?>assets/login/assets/js/jquery-3.2.1.min.js"></script>
    <script src="<?=base_url()?>assets/login/assets/js/popper.min.js"></script>
    <script src="<?=base_url()?>assets/login/assets/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>assets/login/assets/plugins/scroll-fixed/jquery-scrolltofixed-min.js"></script>
    <script src="<?=base_url()?>assets/login/assets/plugins/slider/js/owl.carousel.min.js"></script>
    <script src="<?=base_url()?>assets/login/assets/js/script.js"></script>
</html>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Free Tour and Travel Website Tempalte | Smarteyeapps.com</title>
    <link rel="shortcut icon" href="assets/images/fav.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="assets/images/fav.jpg">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/plugins/slider/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/plugins/slider/css/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
</head>

    <body>
             
             
             
    </body>

    <script src="<?=base_url()?>assets/login/<?=base_url()?>assets/login/assets/js/jquery-3.2.1.min.js"></script>
    <script src="<?=base_url()?>assets/login/assets/js/popper.min.js"></script>
    <script src="<?=base_url()?>assets/login/assets/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>assets/login/assets/plugins/scroll-fixed/jquery-scrolltofixed-min.js"></script>
    <script src="<?=base_url()?>assets/login/assets/plugins/slider/js/owl.carousel.min.js"></script>
    <script src="<?=base_url()?>assets/login/assets/js/script.js"></script>
</html>
