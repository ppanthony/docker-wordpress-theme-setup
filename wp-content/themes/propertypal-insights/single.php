<?php get_header(); ?>

	<div class="container-fluid maxwidth main" role="main">

		<div class="row gp <?php if(!has_tag( 'no-side' ) || isStudentPage()) { echo 'row-eq-height'; } ?>">
			<?php
if ( function_exists('yoast_breadcrumb') ) {
yoast_breadcrumb('
<p id="breadcrumbs">','</p>
');
}
?>
			<?php
			if(has_tag( 'no-side' ))
				require_once('single-nocolumns.php');
			else
				require_once('single-sidebar.php');
			?>

		</div>

	</div>

<?php get_footer(); ?>
