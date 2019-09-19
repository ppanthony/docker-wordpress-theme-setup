<?php if (have_posts()) : the_post(); ?>
					
	<div <?php post_class('entry ' . getAuthorCSS( get_the_author_meta( 'ID' ) )) ?> id="post-<?php the_ID(); ?>">
		
		<h1><?php the_title(); ?></h1>

		<?php echo(formatDate((int)get_the_time('U') , isAgentAuthor( get_the_author_meta( 'ID' ) ) ? get_the_author_meta( 'nickname' ) : '' )); ?>
		<?php the_content(); ?>
	
		<div class="postInfo hidden-print">
			<?php the_tags( '<p>Tags: ', ', ', '</p>'); ?>
		</div>
		
		<div class="hidden-print">
			<h2>SHARE THIS POST</h2>
			<div class="share-media">
				<a class="share-media-icon share-media-facebook" href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php the_title(); ?>" target="blank"><img src="<?php bloginfo('template_url'); ?>/css/base-facebook.jpg" width="42" height="42" border="0" /></a>
				<a class="share-media-icon share-media-twitter" target="_blank" href="http://twitter.com/share?text=<?php the_title(); ?>&amp;url=<?php the_permalink();?>"><img src="<?php bloginfo('template_url'); ?>/css/base-twitter.jpg" width="42" height="42" border="0" /></a>
				<?php if (function_exists('pp_ef_displayForm')) : ?>
					<a class="share-media-icon share-media-email doShareMediaEmail" target="_blank"><img src="<?php bloginfo('template_url'); ?>/css/share-email.jpg" width="42" height="42" border="0" /></a>
				<?php endif; ?>
				<a class="share-media-icon share-media-print" target="_blank" href="javascript:window.print();"><img src="<?php bloginfo('template_url'); ?>/css/share-print.jpg" width="42" height="42" border="0" /></a>
				<div class="clearfix"></div>
			</div>
			
			<?php if (function_exists('pp_ef_displayForm')) pp_ef_displayForm(); ?>
		</div>

		<?php $author = get_post_meta($post->ID, 'guest-author', true); if (!empty($author)) : ?>
			<div class="authorbio">
				<a href="<?php the_author_url(); ?>"><?php echo get_avatar( get_the_author_id() , 80 ); ?></a>
				<?php the_author_description(); ?>
			</div>
		<?php endif; ?>
		
		<div class="hidden-print">
			<?php if (function_exists('comments_template')) comments_template(); ?>
			<?php if (function_exists('wp_related_posts') ) wp_related_posts(); ?> 
		</div>
		
	</div>
		
<?php else: ?>
	<p>Sorry, no posts matched your criteria.</p>
<?php endif; ?>