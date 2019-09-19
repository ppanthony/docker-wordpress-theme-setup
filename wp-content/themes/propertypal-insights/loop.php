<?php 
	$category = get_queried_object(); 
	$splitByYear = $category->category_nicename !== 'flash-commentary';
	$cat_tag = get_query_var('tag');
?>
<?php if ($splitByYear) : ?>
	<?php 
		query_posts(array('nopaging' => 1, 'category_name'  => $category->category_nicename, 'tag' => $cat_tag /* we want all posts that are not flash commentary on one page, so disable paging. Allow to filter by tag */)); 
	?>
<?php endif; ?>
<?php if (have_posts()) : ?>

	<?php $prev_year = null; ?>
	<?php while (have_posts()) : the_post(); ?>
	<!-- If category is not flash commentary, then split posts by year -->
	<?php if ($splitByYear) : ?>
		<?php $this_year = get_the_date('Y');
			if ($prev_year != $this_year) {
				// Year boundary
				if (!is_null($prev_year)) {
						// A list is already open, close it first
						echo '</div></div>';
				}
				echo '<div class="post-container col-xs-12"><h2 class="post-year">' . $this_year . '</h2>';
				echo '<div>';
			}
			$prev_year = $this_year;
		?>
	<?php endif; ?>

	<div class="col-xs-12 col-sm-6 col-md-6 post-wrapper">

			<div <?php post_class(getAuthorCSS( get_the_author_meta( 'ID' ) )) ?> id="post-<?php the_ID(); ?>">

				<div class="post-image">
						<?php // get post thumbnail
							$image = wp_get_attachment_image_src(
								get_post_thumbnail_id($GLOBALS['post']->ID),
								'post-thumb'
							); 
						?>
					<span class="post-imgFill" style="background-image: url('<?php echo $image[0]; ?>')"></span>
					<div class="clearfix"></div>
				</div>

				<div class="col-xs-12 post-details">
					<!-- Get the PDF attachment -->
					<?php
						$attachment_url = "";
						$query_pdf_args = array(
							'post_type' => 'attachment',
							'post_mime_type' =>'application/pdf',
							'post_status' => 'inherit',
							'numberposts' => 1,
							'posts_per_page' => -1,
							'post_parent'   => get_the_ID()
						);

						$attachments =& get_children($query_pdf_args);

						if ( !empty($attachments) ) {
							foreach ( $attachments as $attachment_id => $attachment ) {
								$attachment_url = wp_get_attachment_url( $attachment_id );
							}
						}
					?>
					<h1 class="title">
						<!-- If there are attachments, link is attachment url, otherwise it's a link to the post -->
						<?php if (!empty($attachments)) : ?>
							<a href="<?php echo $attachment_url ?>" title="Permanent Link to <?php the_title_attribute(); ?>" download><?php the_title(); ?></a>
						<?php else: ?>
							<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
						<?php endif; ?>
					</h1>
					<?php echo(formatDate((int)get_the_time('U') , isAgentAuthor(get_the_author_meta('ID')) ? get_the_author_meta( 'nickname' ) : '' )); ?>

					<div class="download">
						<!-- If there are attachments, link is attachment url, otherwise hide button -->
						<?php
							if ( !empty($attachments) ) {
								foreach ( $attachments as $attachment_id => $attachment ) {
									echo "<a href='$attachment_url' class='download-btn' download>Download PDF</a>";
								}
							} else {
								echo "<span class='no-pdf' download></span>";
							}
						?>
					</div>
					<div class="clearfix"></div>
				</div>

				<div class="clearfix"></div>
			</div>
		</div>
			
	<?php endwhile; ?>
	<!-- Close off year list -->
	<?php if ($splitByYear) : ?>
		</div></div>
	<?php endif; ?>
	 

	<div class="pagination hidden-print">
		<nav>
			<ul class="pager">
				<li class="previous"><?php next_posts_link('<span aria-hidden="true"></span> Older Entries') ?></li>
				<li class="next"><?php previous_posts_link('Newer Entries <span aria-hidden="true"></span>') ?></li>
			</ul>
		</nav>
	</div>

<?php else : ?>

	<div class="row">
		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php get_search_form(); ?>
	</div>

<?php endif; ?>
