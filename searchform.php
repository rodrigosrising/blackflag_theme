<form method="get" id="searchform" action="<?php bloginfo('home'); ?>/" role="search" class="search-form">
	<div class="input-group">
		<input type="text" class="busca-campo-top" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" id="s" placeholder="<?php esc_attr_e( 'Buscar...', 'shape' ); ?>" />
		<div class="input-group-button">
			<button  type="submit" class="button submit-button" name="submit" id="searchsubmit"><i class="fa fa-search" aria-hidden="true"></i></button>
			<!-- <input type="submit" class="button submit-button" name="submit" id="searchsubmit" value="&#xf002;" /> -->
		</div>
	</div>
</form>