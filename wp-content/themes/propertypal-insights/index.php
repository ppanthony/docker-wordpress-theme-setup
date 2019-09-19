<?php get_header(); ?>

	<div class="container-fluid maxwidth main" role="main">

		<div class="row row-eq-height">

			<div class="col-xs-12 col-sm-8 col-md-8 posts index">

      <?php
        //loop over each category
        $categories=get_categories();
        require('category-box.php');
      ?>

			</div>

			<?php get_sidebar(); ?>

		</div>

	</div>

<?php get_footer(); ?>
