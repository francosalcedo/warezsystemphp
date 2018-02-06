<?php
require_once 'config.php';
require_once 'template.php';

$all = $db->table('post')
						->select('post.id as post_id, post.title, post.image, post.date_create, post.id_category, category.name as category_name, category.slug as category_slug, category.type as category_type')
						->innerJoin('category', 'category.id', 'post.id_category')
						->orderBy('post.date_create', 'desc')
						->getAll();

header('Content-type: text/xml');
echo '<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

foreach ($all as $key => $v) {
  if($v->category_type == 'movie'){
    $url = "http://warez.dev/pelicula/{$v->category_slug}/{$v->post_id}-".warez::slug($v->title);
  }else{
    $url = "http://warez.dev/post/{$v->category_slug}/{$v->post_id}-".warez::slug($v->title);
  }

  echo "
    <url>
      <loc>{$url}</loc>
      <lastmod>".date("Y-m-d")."T10:34:37+00:00</lastmod>
    </url>
  ";

}

echo '</urlset>';
