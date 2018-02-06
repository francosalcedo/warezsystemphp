<?php
// @search

$q = ucwords(warez::slug($_GET['q'], ' '));
if(empty($q)) header("Location: /");

$header['s'] = [
	'title'  =>  "Resultados para: {$q} - " . $basic->slogan
];

$sql->listSearch = $db->query("SELECT post.id as post_id, post.title, post.image, post.date_create, post.id_category, category.name as category_name, category.slug as category_slug, category.type as category_type FROM post INNER JOIN category ON category.id = post.id_category
WHERE MATCH(post.title, post.content)
AGAINST('{$q}' IN NATURAL LANGUAGE MODE WITH QUERY EXPANSION)
ORDER BY post.date_create DESC LIMIT 50");


$vars = [
	'l' => [
		'search' 	=> $sql->listSearch,
	],
  'q'         => $q
];


$fenom->display('header.tpl', $header);
$fenom->display('search.tpl', $vars);
$fenom->display('footer.tpl');
