<?php
$sql = $db->table('post')
						->select('post.id as post_id, post.title, post.image, post.date_create, post.id_category, category.name as category_name, category.slug as category_slug, category.type as category_type')
						->innerJoin('category', 'category.id', 'post.id_category')
						->where('category.id', $_GET['id'])
						->orderBy('post.date_create', 'desc')
						->getAll();

?>

<div class="row">
	<div class="col s12"><h3><?php echo ($_GET['type']=='movie'?'Peliculas':'Posts'); ?> de <?php echo $sql[0]->category_name; ?></h3></div>
	<div class="col s12">
		<table>
			<thead>
				<th>ID</th>
				<th>Titulo</th>
				<th>Fecha</th>
				<th>Opciones</th>
			</thead>
			<tbody>
			<?php
			foreach ($sql as $k => $v) {
				$t = date_create($v->date_create);
			echo "
				<tr id='tr-{$v->post_id}'>
					<td><a href='?m=edit_post&id={$v->post_id}'>{$v->post_id}</a></td>
					<td><a href='?m=edit_post&id={$v->post_id}'>{$v->title}</a></td>
					<td>".date_format($t,"Y - m - d ")."</td>
					<td><a href='#modal' class='delete_post' data-title='{$v->title}' data-id='{$v->post_id}'>Eliminar</a> - <a href='/post/x/{$v->post_id}-x' target='_blank'>Ver</a></td>
				</tr>
				";
			}
			?>
			</tbody>
		</table>
	</div>
</div>
