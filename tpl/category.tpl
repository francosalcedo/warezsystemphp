

	<!-- Category content -->

	<div class="row w-home-list-posts-pre">
		<div class="container">
			<div class="col s12 center-align"><h4>{$name}</h4></div>
			<div class="row w-home-list-posts">
				{foreach $l as $k => $v}
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
			<div class="row">
				<div class="col s12 center-align">
					<ul class="pagination">

						<!--
						<li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
						<li class="active"><a href="#!">1</a></li>
						<li class="waves-effect"><a href="#!">2</a></li>
						<li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
						-->

						{foreach $pagination.count as $k}

						<li class="{if $pagination.current == $k}active{else}waves-effect{/if}"><a href="{$slug.type}/{$slug.now}?p={$k}">{$k}</a></li>
						{/foreach}
					</ul>

				</div>
			</div>
		</div>
	</div>
