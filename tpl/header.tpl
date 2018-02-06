<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>{$s.title}</title>
	<base href="http://warez.pp/">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!--<link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css"  media="screen,projection"/>-->
	<link rel="stylesheet" href="css/materialize.min.css">
	<link rel="stylesheet" href="css/main.css?{$randcss}">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	{$metas}
</head>
<body>
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.10&appId=1723966947908308";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	<!-- @por Franco Salcedo franco.salcedo.i3@gmail.com -->
	<header>

		<ul id="nav-dropdown" class="dropdown-content">
			{foreach $l.movie as $k => $v}
				<li><a href="categoria/peliculas/{$v->slug}">{$v->name}</a></li>
			{/foreach}
		</ul>

		<ul id="nav-dropdown-mobile" class="dropdown-content">
			{foreach $l.movie as $k => $v}
				<li><a href="categoria/peliculas/{$v->slug}">{$v->name}</a></li>
			{/foreach}
		</ul>

		<nav>
			<div class="nav-wrapper light-blue darken-3">

				<form action="buscar/" method="GET" id="search">
	        <div class="input-field">
	          <input class="search_input" name="q" type="search" required>
	          <label for="search"><i class="material-icons">search</i></label>
	          <i class="material-icons search_close">close</i>
	        </div>
	      </form>

				<div class="all_nav">
				<a href="index.php" class="brand-logo">Warez System</a>
				<a href="#" data-activates="mobile-menu" class="button-collapse"><i class="material-icons">menu</i></a>
				<ul class="right hide-on-med-and-down">
					<li><a class="search"><i class="material-icons">search</i></a></li>
					{foreach $l.category as $k => $v}
						<li><a href="categoria/{$v->slug}">{$v->name}</a></li>
						{if $v@index == 4} {break} {/if}
					{/foreach}
					<li><a class="dropdown-button" href="#!" data-activates="nav-dropdown">Peliculas<i class="material-icons right">arrow_drop_down</i></a></li>
				</ul>

				<ul class="side-nav" id="mobile-menu">
					<li><a class="search"><i class="material-icons">search</i></a></li>
					{foreach $l.category as $k => $v}
						<li><a href="categoria/{$v->slug}">{$v->name}</a></li>
					{/foreach}
					<li class="divider"></li>
					<li><a class="dropdown-button" href="#!" data-activates="nav-dropdown-mobile">Peliculas<i class="material-icons right"></i></a></li>
				</ul>
				</div>
			</div>
		</nav>
	</header>
