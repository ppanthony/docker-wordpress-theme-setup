<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header();
?>
	
	<div id="page" class="errorpg errorpg-404">
		
		<article>
			<hgroup class="errorPageHeader">
				<h1>UH OWL!</h1>
				<h2>We couldn't find the page you were looking for.  So we brought you a picture of a cute owl (in a hat) instead.</h2>
			</hgroup>
				
			<img src="<?php bloginfo('template_url'); ?>/css/404_owl.png" alt="UH OWL">
				
			<h3>In case of an emergency</h3>
			<p>If you reached this page and something is clearly wrong, please let us know with a quick email to <a href="mailto:help@propertypal.com">help@propertypal.com</a>.  Be sure to mention (if possible) what caused you to land here in the first place.  We'll owe you one!</p>
			<p>Want to start again? <a href="<?php echo(site_url()); ?>">Click here to go to our homepage.</a></p>		
		</article>
		
	</div>

<?php get_footer(); ?>