<?php get_header(); ?>

	<div class="container-fluid maxwidth main" role="main">

		<div class="row row-eq-height">

			<div class="col-xs-12 col-sm-8 col-md-8 posts" id="article">

				<?php if ( have_posts() ) : ?>

					<div>
						<div class="col-xs-12 col-sm-12">
							<h1 class="pagetitle">Search Results for: <span><?php get_search_query() ?></span></h1>
						</div>
					</div>

					<?php
					/* Run the loop for the search to output the results.
					 * If you want to overload this in a child theme then include a file
					 * called loop-search.php and that will be used instead.
					 */
					 get_template_part( 'loop', 'search' );
					?>

				<?php else : ?>
				<div class="row">
					<h2 class="center">Not Found</h2>
					<p class="center">Sorry, but you are looking for something that isn't here.</p>
					<?php get_search_form(); ?>
				</div>
				<?php endif; ?>

			</div>

			<?php get_sidebar(); ?>

		</div>

	</div>

<?php get_footer(); ?>
