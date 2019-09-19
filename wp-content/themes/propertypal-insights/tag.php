<?php get_header(); ?>

	<div class="container-fluid maxwidth main" role="main">

		<div class="row row-eq-height">

			<div class="col-xs-12 col-sm-8 col-md-8 posts" id="article">

				<div>
					<div class="col-xs-12 col-sm-12">
						<h1 class="pagetitle">Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h1>
					</div>
				</div>

				<?php
				/* Run the loop to output the posts.
				 * If you want to overload this in a child theme then include a file
				 * called loop-tag.php and that will be used instead.
				 */
				 get_template_part( 'loop', 'tag' );
				?>

			</div>

			<?php get_sidebar(); ?>

		</div>

	</div>

<?php get_footer(); ?>
