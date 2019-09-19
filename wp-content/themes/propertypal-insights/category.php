<?php get_header(); ?>

	<div class="container-fluid maxwidth main" role="main">

		<div class="row row-eq-height">

			<?php 
				// If filtering by tag, add header with tag name
				$tag_slug = get_query_var('tag');
				if($tag_slug) {
					$tag = get_term_by('slug', $tag_slug,'post_tag');
					$tag_name = $tag->name ? $tag->name : $tag_slug;
			?>
				<div class="col-xs-12 col-sm-8 col-md-8">
					<h1 class="pagetitle">Posts Tagged &#8216;<?php echo $tag_name; ?>&#8217;</h1>
				</div>
			<?php } ?>
			
			<div class="col-xs-12 col-sm-8 col-md-8 posts" id="article">



				<?php
				/* Run the loop to output the posts.
				 * If you want to overload this in a child theme then include a file
				 * called loop-category.php and that will be used instead.
				 */
				 get_template_part( 'loop', 'category' );
				?>

			</div>

			<?php get_sidebar(); ?>

		</div>

	</div>

<?php get_footer(); ?>
