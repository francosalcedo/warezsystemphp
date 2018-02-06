	<!-- Search content -->

	<div class="row w-home-list-posts-pre">
		<div class="container">
			<div class="col s12 center-align"><h4>Resultados para: {$q}</h4></div>
			<div class="row w-home-list-posts">
				{foreach $l.search as $k => $v}
				<div class="col s6 m4 l3 xl3">
					{if $v->category_type == 'movie'}
					<a href="pelicula/{$v->category_slug}/{$v->post_id}-{$v->title|slug}">
					{else}
					<a href="post/{$v->category_slug}/{$v->post_id}-{$v->title|slug}">
					{/if}
						<div></div>
						<div><img src="{$v->image}" alt="{$v->title}" class="responsive-img"></div>
						<div>{$v->title}</div>
					</a>
				</div>
				{/foreach}
			</div>
		</div>
	</div>
