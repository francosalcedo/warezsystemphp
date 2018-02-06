<?php
// @index


$header['s'] = [
	'title' 	=> $basic->title . ' - ' . $basic->slogan

];


$sql->listMovies = $db->table('post')
						->select('post.id as post_id, post.title, post.image, post.date_create, post.id_category, category.name as category_name, category.slug as category_slug')
						->innerJoin('category', 'category.id', 'post.id_category')
						->where('post.type', 'movie')
						->orderBy('post.date_create', 'desc')
						->limit(6)
						->getAll();

$sql->listPosts = $db->table('post')
						->select('post.id as post_id, post.title, post.image, post.date_create, post.id_category, category.name as category_name, category.slug as category_slug')
						->innerJoin('category', 'category.id', 'post.id_category')
						->where('post.type', 'post')
						->orderBy('post.date_create', 'desc')
						->limit(20)
						->getAll();


$vars = [
	'l' => [
		'category' 	=> $sql->categoryGetAll,
		'posts'			=> $sql->listPosts,
		'movies'		=> $sql->listMovies
	],
];


$fenom->display('header.tpl', $header);
$fenom->display('home.tpl', $vars);
$fenom->display('footer.tpl');
