<?php
// @category

$slug = $_GET['category'];

$pagination = new stdclass();
$pagination->max 		= $basic->categoryMaxResults;
$pagination->page 	= (!empty($_GET['p'])? $_GET['p']:0);

$sql->listCategory = $db->table('post')
						->select('post.id as post_id, post.title, post.image, post.date_create, post.id_category, category.name as category_name, category.slug as category_slug, category.type as category_type')
						->innerJoin('category', 'category.id', 'post.id_category')
						->where('category.slug', $slug)
						->orderBy('post.date_create', 'desc')
						->limit(($pagination->page*$pagination->max),$pagination->max)
						->getAll();

$all = $db->table('post')
						->select('post.id as post_id, post.title, post.image, post.date_create, post.id_category, category.name as category_name, category.slug as category_slug, category.type as category_type')
						->innerJoin('category', 'category.id', 'post.id_category')
						->where('category.slug', $slug)
						->orderBy('post.date_create', 'desc')
						->getAll();

$header['title'] = 'Descargar ' . $post->name . ' - ' . $basic->title;

switch ($_GET['type']) {
	case 'category':
		$slug_type = 'categoria';
		break;
	case 'movies':
		$slug_type = 'categoria/peliculas';
		break;
}

$body = [
	'name'			=> $sql->listCategory[0]->category_name,
	'type'			=> $_GET['type'],
	'slug'			=> ['type' => $slug_type, 'now' => $slug],
	'l' 				=> $sql->listCategory,
	'pagination' 	=> [
							'current'		=> $pagination->page,
							'max'				=> $pagination->max,
							'count'			=> range(0,(count($all)/$pagination->max))
						],

];

$fenom->display('header.tpl', $header);
$fenom->display('category.tpl', $body);
$fenom->display('footer.tpl');
