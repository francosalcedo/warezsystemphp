<?php
// @post
$post = $db->table('post')->select('id')->where('id', $_GET['id'])->get();
if(count($post) < 1) die('no existe el post');


$post = $db->table('post')
			->select('post.id as post_id, post.id_user as user_id, post.id_category as category_id, post.title, post.content, post.image, post.type, post.tags, post.status, post.date_create, category.name as category_name, category.slug as category_slug, user.username as user_name')
			->innerJoin('category', 'category.id', 'post.id_category')
			->innerJoin('user', 'user.id', 'post.id_user')
			->where('post.id', $post->id)
			->get();

$list_post_category = $db->table('post')
						->select('post.id as post_id, post.title, post.id_category, post.type as post_type, category.name as category_name, category.slug as category_slug')
						->innerJoin('category', 'category.id', 'post.id_category')
						->where('id_category', $post->category_id)
						->orderBy('post.date_create', 'desc')
						->limit(10)
						->getAll();


$header['s']['title'] = sprintf($basic->meta->titleFormat, $post->title, $basic->title);
$header['metas']			= warez::metas([
	'title'				=> $post->title,
	'category'		=> $post->category_name,
	'description'	=> $basic->meta->descrptionFormat
]);

$body = [
'post'								=> $post,
'list_category'				=> $sql->categoryGetAll,
'list_post_category'	=> $list_post_category,
'current_location'		=> $_SERVER['REQUEST_URI'],

];

$fenom->display('header.tpl', $header);
$fenom->display('post.tpl', $body);
$fenom->display('footer.tpl');
