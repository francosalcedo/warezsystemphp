<?php
session_start();
if(empty($_SESSION['loginz'])) header('Location: login.php');

require_once '../config.php';
require_once 'functions.php';

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Admin</title>
	<link rel="stylesheet" href="../css/materialize.min.css">
	<link rel="stylesheet" href="main.css?<?php echo rand(0,9999);?> ">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>

	<!-- Modal Structure -->
	<div id="modal1" class="modal">
		<div class="modal-content">
			<b id="pre_message"></b>
			<h4 id="pre_title"></h4>
		</div>
		<div class="modal-footer">
			<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat red darken-2 white-text confirm">ELIMINAR</a>
			<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">CANCELAR</a>
		</div>
	</div>

		<div class="row">
			<div class="col s12">
				<a href="index.php"><h1>Warez System Panel</h1></a>
			</div>
			<div class="col s12 m2">
				<span>Peliculas:</span>
				<ul>
					<li><a href="?m=add_post&type=movie">[+] Pelicula</a></li>
					<li><a href="?m=add_category">[+] Categoria</a></li>
					<li>
						<ol>
<?php
	$ls = $db->table('category')->select('*')->where('type', 'movie')->getAll();
	foreach ($ls as $k => $v) {
		echo "<li id='category-{$v->id}'><a href='?m=list_posts&type=movie&id={$v->id}'>{$v->name}</a> <span class='x'><a class='delete_category' data-name='{$v->name}' data-id='{$v->id}' href='#!'>✘</a></span></li>";
	}
?>
						</ol>
					</li>
				</ul>
				<hr>
				<span>Posts</span>
				<ul>
					<li><a href="?m=add_post&type=post">[+] Post</a></li>
					<li><a href="?m=add_category">[+] Categorias</a></li>
					<li>
						<ol>
<?php
	$ls = $db->table('category')->select('*')->where('type', 'category')->getAll();
	foreach ($ls as $k => $v) {
		echo "<li><a href='?m=list_posts&type=post&id={$v->id}'>{$v->name}</a> <span class='x'><a class='delete_category' data-name='{$v->name}' data-id='{$v->id}' href='#!'>✘</a></span></li>";
	}
?>



						</ol>
					</li>
				</ul>

			</div>
			<div class="col s12 m10">
			<?php
			require_once "modulos/".(empty($_GET['m'])?'home':$_GET['m']).".php"
			?>
			</div>
		</div>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/materialize.min.js"></script>
<script type="text/javascript" src="main.js?<?php echo rand(0,99999); ?>"></script>
</body>
</html>
