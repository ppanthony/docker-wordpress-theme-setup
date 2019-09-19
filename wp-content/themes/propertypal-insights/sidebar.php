<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>

<div id="sidebar" role="complementary" class="col-xs-12 col-sm-4 col-md-4 hidden-print sbar">
	<div class="sbar-container">
	<?php require_once('author.php'); ?>
	<?php require_once('categories.php'); ?>
	<?php 
	if (is_active_sidebar('global-sidebar')) :
		dynamic_sidebar('global-sidebar');
	endif;
	?>
	</div>
</div>