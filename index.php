<?php
require_once 'config.php';
require_once 'template.php';

/*
	@Default header querys
*/
$sql->categoryGetAll 	= $db->table('category')->select('*')->where('type','category')->getAll();
$sql->movieGetAll 		= $db->table('category')->select('*')->where('type', 'movie')->getAll();

$header = [
			'l' => [
						'category'		=> $sql->categoryGetAll,
						'movie'				=> $sql->movieGetAll
					],
			'randcss' => rand(0,9999)
];

switch ($current['type']) {
	case 'post':
	case 'movie':
		include 'post.php';
		break;

	case 'category':
	case 'movies':
		include 'category.php';
		break;

	case 'search':
		include 'search.php';
		break;

	default:
		include 'home.php';
		break;
}
