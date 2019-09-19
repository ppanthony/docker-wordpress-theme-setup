<div class="pgheader pghead-bordered pgheader-default">
	<div class="container-fluid maxwidth">
		<div class="row">
			<div class="col-sm-12">
				<?php
					$header_title = "Street Smart.";
					$header_subtitle = "Fun articles. Smart Tips. All about Property."
				?>
				<?php if (have_posts()) : ?>
					<?php
						$category;
						if(get_post_type() === 'post' && is_singular()) {
							$category = get_the_category()[0];
						} else if($name) {
							$category = get_category_by_slug($name);
						} else {
							$category = get_category( get_query_var( 'cat' ), false );
						}
						if(!$category->errors || $name) {
							$cat_slug = $category->category_nicename; 
							$cat_name = $category->cat_name; 
							$header_title = $cat_name;
							$header_subtitle = get_subtitle($cat_slug);
						}
					?>
				<?php endif; ?>
				<?php echo "<h1>$header_title</h1>"; ?>
				<?php echo "<h2>$header_subtitle</h2>"; ?>
			</div>
		</div>
	</div>
</div>