	<!-- Post container -->
	<div class="container">
		<div class="row">
			<div class="col s12 m10">
				<div class="col s12 w-post-title light-blue darken-3">
					{$post->title}
				</div>
				<div class="col s12 w-post-content">
					{$post->content}
					<hr>
					<div class="col s12 center-align">
					<span>Tags:</span>
						{foreach $post->tags|json_decode as $v}
						<div class="chip"><a href="buscar/?q={$v|slug}">{$v}</a></div>
						{/foreach}
					</div>
				</div>
				<div class="col s12">
					Aporte por: <b>{$post->user_name}</b> - Creado el: {$post->date_create}
					<hr>
					<h4>Comentarios</h4>
					<div class="fb-comments" data-href="http://descargarwarez.pro{$current_location}" data-numposts="5"></div>
				</div>
			</div>
			<div class="col hide-on-small-only m2">
				<div class="col s12 white-text light-blue darken-3">Ultimos aportes</div>
				<ul>
					{foreach $list_post_category as $c => $x}
					{if $x->post_type == 'movie'}
					<li><a href="pelicula/{$x->category_slug}/{$x->post_id}-{$x->title|slug}">{$x->title}</a></li>
					{else}
					<li><a href="post/{$x->category_slug}/{$x->post_id}-{$x->title|slug}">{$x->title}</a></li>
					{/if}
					{/foreach}
				</ul>
			</div>

		</div>
	</div>
