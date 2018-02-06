
	<div class="container">
		<div class="row w-home-list-categoery">
			<div class="col s12">
				{foreach $l.category as $k => $v}
				<div class="chip"><a href="categoria/{$v->slug}">{$v->name}</a></div>
				{/foreach}
			</div>
		</div>
	</div>

	<div class="container">
		<h4 class="center-align">Ultimas Peliculas</h4>
		<div class="row w-home-list-movies">
			{foreach $l.movies as $k => $v}
            <div class="col s6 m4 l2 xl2">
            	<a href="pelicula/{$v->category_slug}/{$v->post_id}-{$v->title|slug}">
	            	<div></div>
	            	<div><img src="{$v->image}" alt="{$v->title}" class="responsive-img"></div>
	            	<div>{$v->title}</div>
            	</a>
            </div>
			{/foreach}
		</div>
	</div>

	<hr>

	<div class="row w-home-list-posts-pre">
		<div class="container">
			<h4 class="center-align">Ultimos Posts</h4>
			<div class="row w-home-list-posts">
				{foreach $l.posts as $k => $v}
				<div class="col s6 m4 l3 xl3">
					<div><a href="categoria/{$v->category_slug}">{$v->category_name}</a></div>
					<a href="post/{$v->category_slug}/{$v->post_id}-{$v->title|slug}">
						<div><img src="{$v->image}" alt="{$v->title}" class="responsive-img"></div>
						<div>{$v->title}</div>
					</a>
				</div>
				{/foreach}
			</div>
		</div>
	</div>
