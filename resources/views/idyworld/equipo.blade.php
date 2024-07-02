<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>IdyWorld</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="../EstilosIDY/css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="../EstilosIDY/css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="../EstilosIDY/css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="../EstilosIDY/images/logo.png" type="image/x-icon">
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="../EstilosIDY/css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>
   <!-- body -->
   <body class="main-layout inner_page">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="../EstilosIDY/images/loading.gif" alt="#"/></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      <header class="full_bg">
         <!-- header inner -->
         <div class="header">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo">
                              <a href="{{ route ('idyhome')}}"><img src="../EstilosIDY/images/logo.png" alt="#" /></a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                     <nav class="navigation navbar navbar-expand-md navbar-dark ">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExample04">
                           <ul class="navbar-nav mr-auto">
                              <li class="nav-item ">
                                 <a class="nav-link" href="{{ route ('idyhome')}}">Inicio</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="{{ route ('sobrenosotros')}}">Sobro Nosotros</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="{{ route ('carreras')}}">Carreras</a>
                              </li>
                              <li class="nav-item active">
                                 <a class="nav-link" href="{{ route ('equipo')}}">Equipo</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="{{ route ('contacto')}}">Contactanos</a>
                              </li>
                           </ul>
                        </div>
                     </nav>
                  </div>
               </div>
            </div>
         </div>
         <!-- end header inner -->
         <!-- end header -->
         <!-- banner -->
       
      </header>
      <!-- end banner -->
     <div class="back_re">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="title">
                        <h2>Pricing</h2>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- pricing -->
      <div class="pricing_main">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                   
                     <span>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy </span>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="pricing">
                     <h4>STARTER PLAN</h4>
                     <h3><span>$</span>60</h3>
                     <p>Unlimited access to content Fully Secure online backup One Year round the clock support FREE complimentary lanyard</p>
                     <a class="read_more dark_bg" href="Javascript:void(0)"> Starte Now</a>
                  </div>
               </div>
               <div class="col-md-4 ho_bor">
                  <div class="pricing ">
                     <h4>STARTER PLAN</h4>
                     <h3><span>$</span>60</h3>
                     <p>Unlimited access to content Fully Secure online backup One Year round the clock support FREE complimentary lanyard</p>
                     <a class="read_more dark_bg" href="Javascript:void(0)"> Starte Now</a>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="pricing">
                     <h4>STARTER PLAN</h4>
                     <h3><span>$</span>60</h3>
                     <p>Unlimited access to content Fully Secure online backup One Year round the clock support FREE complimentary lanyard</p>
                     <a class="read_more dark_bg" href="Javascript:void(0)"> Starte Now</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end pricing -->
     
      <!--  footer -->
      <footer>
         <div class="footer">
            <div class="container">
               <div class="row">
                  <div class="col-md-8 offset-md-2">
                     <div class="newslatter">
                        <h4>Subscribe Our Newsletter</h4>
                        <form class="bottom_form">
                           <input class="enter" placeholder="Enter your email" type="text" name="Enter your email">
                           <button class="sub_btn">subscribe</button>
                        </form>
                     </div>
                  </div>
                  <div class="col-sm-12">
                     <div class=" border_top1"></div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-4">
                     <h3>ENLACES</h3>
                     <ul class="link_menu">
                        <li><a href="{{ route ('idyhome')}}">Inicio</a></li>
                        <li><a href="{{ route ('sobrenosotros')}}">Sobre Nosotros</a></li>
                        <li><a href="{{ route ('carreras')}}">Carreras</a></li>
                        <li><a href="{{ route ('equipo')}}">Equipo</a></li>
                        <li><a href="{{ route ('contacto')}}">Contactanos</a></li>
                     </ul>
                  </div>
                  <div class=" col-md-3">
                     <h3>IDY</h3>
                     <p class="many">
                        IDY World, creemos que la atención médica debería ser una experiencia sin complicaciones y centrada en el paciente.
                     </p>
                  </div>
                  <div class="col-lg-3 offset-mdlg-2     col-md-4 offset-md-1">
                     <h3>Contact </h3>
                     <ul class="conta">
                        <li><i class="fa fa-map-marker" aria-hidden="true"></i>Calle de Niza 67, Juárez, Cuauhtémoc, 06600 Ciudad de México, CDMX</li>
                        <li> <i class="fa fa-envelope" aria-hidden="true"></i><a href="#">idyworld2024@gmail.com</a></li>
                        <li><i class="fa fa-mobile" aria-hidden="true"></i> Telefono:+52 5513950050 </li>
                     </ul>
                     <ul class="social_icon">
                        <li><a href="https://www.facebook.com/people/Idy-W-Lidtm/pfbid0fy9X6N5CrniasQ3Nm8KEQeFZVVzoxLrTS1Myy115y9XKT8fUHKm4ExSG96RwGeXsl/" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="https://x.com/IdyWorld" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="https://www.linkedin.com/in/idy-world-270963312/" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        <li><a href="https://www.instagram.com/idyworld6/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="copyright">
               <div class="container">
                  <div class="row">
                     <div class="col-md-10 offset-md-1">
                        <p>"Haz realidad tus ideas en el mundo digital de Idy World." Design by <a href="https://utc.mx/nosotros/planteles/zona-rosa"> El Futuro</a></p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!-- end footer -->
      <!-- Javascript files-->
      <script src="../EstilosIDY/js/jquery.min.js"></script>
      <script src="../EstilosIDY/js/bootstrap.bundle.min.js"></script>
      <script src="../EstilosIDY/js/jquery-3.0.0.min.js"></script>
      <!-- sidebar -->
      <script src="../EstilosIDY/js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="../EstilosIDY/js/custom.js"></script>
   </body>
</html>