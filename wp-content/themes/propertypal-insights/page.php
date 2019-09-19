<?php
get_header();
?>

	<div class="container-fluid maxwidth main" role="main">

		<div class="row row-eq-height">

			<div class="col-xs-12 col-sm-7 col-md-8" id="article">

				<?php if (have_posts()) : the_post(); ?>

					<div <?php post_class('entry post') ?> id="post-<?php the_ID(); ?>">

						<h1><?php the_title(); ?></h1>
						<?php the_content(); ?>

					</div>

				<?php else: ?>
					<p>Sorry, no posts matched your criteria.</p>
				<?php endif; ?>

			</div>

			<?php get_sidebar(); ?>

		</div>

	</div>

<?php get_footer(); ?>
