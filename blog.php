<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
		<!-- BASICS -->
        <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>GREEN responsive bootstraap template</title>
        <meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- <link rel="stylesheet" type="text/css" href="css/isotope.css" media="screen" />	 -->
		<!-- <link rel="stylesheet" href="js/fancybox/jquery.fancybox.css" type="text/css" media="screen" /> -->
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/bootstrap-theme.css">
		<!-- <link href="css/responsive-slider.css" rel="stylesheet"> -->
		<!-- <link rel="stylesheet" href="css/animate.css"> -->
        <link rel="stylesheet" href="css/style.css">

		<link rel="stylesheet" href="css/font-awesome.min.css">
		<!-- skin -->
		<link rel="stylesheet" href="skin/default.css">
        <link rel="stylesheet" href="css/sociedat-custom.css">
    </head>
	 
    <body>
	
	
	<div class="header">
	<section id="header" class="appear">
		
		<div class="navbar navbar-fixed-top" role="navigation" data-0="line-height:100px; height:100px; background-color:rgba(0,0,0,0.3);" data-300="line-height:60px; height:60px; background-color:rgba(0,0,0,1);">
			
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="fa fa-bars color-white"></span>
					</button>
					<h1><a class="navbar-brand" href="index.html" data-0="line-height:90px;" data-300="line-height:50px;">
                        <img src="img/logo-white.png" style="height:50px;">
					</a></h1>
				</div>
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav" data-0="margin-top:20px;" data-300="margin-top:5px;">
						<li class="active"><a href="index.html#index">Inicio</a></li>
						<li><a href="index.html#section-about">Nosotros</a></li>
						<li><a href="index.html#services">Servicios</a></li>
						<li><a href="index.html#team">Equipo</a></li>
						<li><a href="index.html#line-pricing">Membresías</a></li>
						<li><a href="index.html#section-works">Redes Sociales</a></li>
						<li><a href="index.html#section-contact">Contacto</a></li>
                        <li><a href="index.html#">Blog</a></li>
					</ul>
				</div><!--/.navbar-collapse -->
			</div>
		
		
	</section>
	</div>
	

    <section class="featured">
        <div id="index">
            <!-- Responsive slider - START -->
            <div class="responsive-slider" >
                <div class="slides" data-group="slides">
                    <ul>
                        <li>
                            <div class="slide-body" data-group="slide" style="height:87px; background: black;">
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
          <!-- Responsive slider - END -->
        </div>
    </section>
		
	<!--about-->
	<section id="section-about">
		<div class="container">
			<div class="about">
				<div class="row mar-bot40">
					<div class="col-md-offset-3 col-md-6">
						<div class="title">
							<div class="wow bounceIn">
						
							<h1 class="section-heading animated" data-animation="bounceInUp">Blog</h1>
							
						
							</div>
						</div>
					</div>
				</div>
                <?php
                    include 'php/wordpress_feed.php';
                ?>
                <!--  <div class="wow bounceIn" data-animation-delay="4.8s">
                    <div class="row blog-entry">
                        <div class="col-md-3">
                            <figure><img class="img-circle" src="img/carousel-mini/slide3.jpg" alt=""></figure>
                        </div>
                        <div class="col-md-9">
                            <h2>Título de la entrada</h2>
                            <h4>Categoría</h4>
                            <hr>
                            <p>
                                Nunc velit risus, dapibus non interdum quis, suscipit nec dolor. Vivamus tempor tempus mauris vitae fermentum. In vitae nulla lacus. Sed sagittis tortor vel arcu sollicitudin nec tincidunt metus suscipit.Nunc velit risus, dapibus non interdum.<br>
                                <a href="#">Continuar leyendo</a><br>
                                Fecha
                            </p>
                        </div>
                    </div>
                </div>   -->
                <!-- <div class="wow bounceIn" data-animation-delay="4.8s">
                    <a href="https://sociedatblog.wordpress.com/" target="_blank"><h4 class="text-center green"><span>Ver más publicaciones...</span></h4></a>
                </div> -->
			</div>
			
		</div>
	</section>
	<!--/about-->
		<!-- spacer section:stats -->
		<section id="parallax1" class="section pad-top40 pad-bot40 mar-bot20" data-stellar-background-ratio="0.5">
			<div class="container ">
            <div class="align-center pad-top40 pad-bot40">
                <h4 class="color-white pad-top50">Indoctum accusamus comprehensam</h4>
				<p class="color-white">Nullam id dolor id nibh ultricies vehicula ut id elit. Donec sed odio dui. Fusce dapibus, tellus ac cursus etiam porta sem malesuada magna mollis euismod. commodo, Faccibus mollis interdum. Morbi leo risus, porta ac, vestibulum at eros.Feugiat accumsan Suspendisse eget Duis faucibus tempus pede pede augue pede. Dapibus mollis
								dignissim suscipit porta justo nisl amet Nunc quis semper.</p>
            </div>
			</div>	
		</section>
		
	<section id="footer" class="section footer">
		<div class="container">
			<div class="row animated opacity mar-bot0" data-andown="fadeIn" data-animation="animation">
				<div class="col-sm-12 align-center">
                    <ul class="social-network social-circle">
                        <li><a href="#" class="icoRss" title="Rss"><i class="fa fa-rss"></i></a></li>
                        <li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                    </ul>				
				</div>
			</div>

			<div class="row align-center copyright">
					<div class="col-sm-12"><p>Copyright &copy; 2014 GREEN - by <a href="http://bootstraptaste.com">Bootstrap Themes</a></p></div>
                    <!-- 
                        All links in the footer should remain intact. 
                        Licenseing information is available at: http://bootstraptaste.com/license/
                        You can buy this theme without footer links online at: http://bootstraptaste.com/buy/?theme=Green
                    -->
			</div>
		</div>

	</section>
	<a href="#header" class="scrollup"><i class="fa fa-chevron-up"></i></a>	
        
	<script src="js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
	<script src="js/jquery.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyASm3CwaK9qtcZEWYa-iQwHaGi3gcosAJc&sensor=false"></script> -->
	<script src="js/jquery.isotope.min.js"></script>
	<script src="js/jquery.nicescroll.min.js"></script>
	<script src="js/fancybox/jquery.fancybox.pack.js"></script>
	<!-- <script src="js/jquery.parallax-1.1.3.js" type="text/javascript" ></script> -->
	<script src="js/skrollr.min.js"></script>		
	<script src="js/jquery.scrollTo-1.4.3.1-min.js"></script>
	<script src="js/jquery.localscroll-1.2.7-min.js"></script>
	<script src="js/stellar.js"></script>
	<script src="js/responsive-slider.js"></script>
	<script src="js/jquery.appear.js"></script>
	<script src="js/validate.js"></script>
	<script src="js/grid.js"></script>
    <script src="js/main.js"></script>
        
    <script src="js/sociedat-custom.js"></script>
		 <script src="js/wow.min.js"></script>
	 <script>
	 wow = new WOW(
	 {
	
		}	) 
		.init();
	</script>
	</body>
</html>