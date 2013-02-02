<!DOCTYPE html>
<html lang="en">
<head>

	<!-- Basic Metas -->
	<meta charset="utf-8" />
	<title>{{ $title }}</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

	<!-- Included CSS Files -->
	{{ HTML::style('/bundles/bootstrapper/css/bootstrap00.css') }}
	{{ HTML::style('/css/responsive.css') }}
	{{ HTML::style('/css/style.css') }}
	{{ HTML::style('/css/colors.css') }}

	<!-- IE Fix for HTML5 Tags -->
	<!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

</head>
<body>

	<!-- #infobar -->
	<section id="infobar">
		<div class="container clearfix">
			<p class="grid-12 align-center">Welcome back !</p>
		</div>
	</section>

	<!-- #infobar slide button -->
	<div class="container">
	<a href="#" id="slide-toggle">+</a>
	</div>

	<!-- Header -->
	<header>			

		<!-- #header -->
		<section id="header">
			<div class="container clearfix">
				<!-- #logo -->
				<h1 id="logo" class="grid-6">
					<a href="/">ask</a>
				</h1>

				<!-- #primary-menu -->
				<nav id="primary-menu" class="grid-6">

					<ul class="top-menu pull-right">
						<li>{{ HTML::link_to_route('home', 'Accueil')}}</li>

					@if(!Auth::check())
						<li>{{ HTML::link_to_route('register', 'Inscription')}}</li>
						<li>{{ HTML::link_to_route('login', 'Connexion')}}</li>
					@else
						<li>{{ HTML::link_to_route('ask', 'Ask')}}</li>

						<li class="current">
							<a href="#">Mon compte</a>  
							<ul>
								<li><a href="blog.html">Profile</a></li>
								<li>{{ HTML::link_to_route('my-questions', 'Mes questions')}}</li>  
							</ul>
						</li>

						<li>{{ HTML::link_to_route('logout', 'Déconnexion')}}</li>
					@endif
					</ul>
					
				</nav>
				<!-- #primary-menu end -->

			</div>
		</section>
	</header>

	<!-- #page-info -->
	<section id="page-info">
		
		<div class="container clearfix">
			<h1 class="page-title">{{ $title }}</h1>
		</div>
	</section>

	<div id="main-wrapper">

		<!-- #main -->
		<section id="main">
			<div class="container clearfix">

				<div class="grid-8">

					@if(Session::has('message'))
						<p class="message">{{ Session::get('message') }}</p>
					@endif

					@yield('content')

				</div>

				<aside class="grid-4">

					<h2 class="title-line title"><span>Les catégories</span></h2>
					@if(isset($cats))	
			            @if(count($cats)==0)
			              <p>Aucune catégorie n'a été définie.</p>
			            @else
						<!-- Categories -->
						<ul class="categories">
	              			@foreach($cats as $cat)
	              				<li>{{ HTML::link_to_route('questions', $cat->name.' ('.$cat->questions()->count().')', $cat->id) }}</li>
	              			@endforeach
						</ul>

						@endif
		            @else
		              <p>Aucune catégorie n'a été définie.</p>
					@endif
					
				</aside>

			</div>
		</section>
	</div>

	<!-- Footer -->
	<footer>

		<!-- #footer>
		<section id="footer">
			<div class="container clearfix">

			</div>
		</section -->

		<!-- #copyright -->
		<section id="copyright">

			<!-- Copyright -->
			<div class="container clearfix">
				<div class="grid-6">
					<p>ASK © 2013. All rights reserved.</p>
				</div>

				<!-- Social links -->
				<div class="grid-6">
					<p class="align-right">Socialize with us on <a href="#">Facebook</a>, <a href="#">Twitter</a></p>
				</div>
			</div>

		</section>
	</footer>

	<!-- JS Files -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
	<!-- Easing -->
	<script type="text/javascript" src="http://localhost/js/jquery.easing.1.3.js"></script>
	<!-- Superfish Menu -->
	<script src="http://localhost/js/hoverIntent.js"></script>
	<script src="http://localhost/js/superfish.js"></script>
	<!-- Sequence Slider>
	<script src="/js/sequence.jquery-min.js"></script -->
	<!-- Flex Slider >
	<script src="/js/jquery.flexslider-min.js"></script-->
	<!-- prettyPhoto >
	<script type="text/javascript" src="/js/jquery.prettyPhoto.js"></script-->
	<!-- Quicksand -->
	<script type="text/javascript" src="http://localhost/js/jquery.quicksand.js"></script>
	<!-- TipTip -->
	<script src="http://localhost/js/jquery.tiptip.js"></script>
	<!-- Tweets>
	<script src="/js/jquery.tweet.js"></script -->
	<!-- Google maps>
	<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
	<script src="/js/gmap3.min.js"></script -->
	<!-- Scroll top control -->
	<script src="http://localhost/js/scrolltopcontrol.js"></script>
	<!-- Custom & Functions -->
	<script src="http://localhost/js/custom.js"></script>

</body>
</html>