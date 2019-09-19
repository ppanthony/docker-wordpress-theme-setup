<?php

define('SITE_URL', 'https://www.propertypal.com');

function init() {

	automatic_feed_links();

	add_action('wp_head', 'public_header');
	add_action('wp_footer', 'public_footer');
	add_filter('the_content', 'facebook_like_content');
	add_filter( 'category_rewrite_rules', 'vipx_filter_category_rewrite_rules' );
	remove_action('wp_head', 'wp_generator');
	add_theme_support('html5');

	#update_option('image_default_link_type','none');
	add_theme_support('post-thumbnails');
	set_post_thumbnail_size( 410, 261, true ); // Normal post thumbnails

	add_action('widgets_init', 'wpr_widgets_init');

	if (!is_admin())
		add_action('wp_enqueue_scripts', 'public_scripts');
}

function wpr_widgets_init() {
	register_sidebar( array(
		'name' => 'Gobal sidebar',
		'id' => 'global-sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>'
	) );
}

function public_header() {
?>
<meta name="twitter:creator" content="@propertypal">
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-1422424-2']);
  _gaq.push(['_setDomainName', 'propertypal.com']);
  _gaq.push(['_trackPageview']);
  (function() {
	var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>

<script type="text/javascript" src="https://partner.googleadservices.com/gampad/google_service.js"></script>
<script type="text/javascript">
GS_googleAddAdSenseService("ca-pub-7517666270900527");
GS_googleEnableAllServices();
</script>
<script type="text/javascript">
GA_googleAddSlot("ca-pub-7517666270900527", "728x90top_blog_all");
GA_googleAddSlot("ca-pub-7517666270900527", "300x250varright1_blog_all");
GA_googleAddSlot("ca-pub-7517666270900527", "300x250varright2_blog_all");
</script>
<script type="text/javascript">
GA_googleFetchAds();
</script>

<?php
}

function public_footer() {

?>
	<script>window.twttr = (function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0],
	    t = window.twttr || {};
	  if (d.getElementById(id)) return t;
	  js = d.createElement(s);
	  js.id = id;
	  js.src = "https://platform.twitter.com/widgets.js";
	  fjs.parentNode.insertBefore(js, fjs);

	  t._e = [];
	  t.ready = function(f) {
	    t._e.push(f);
	  };

	  return t;
	}(document, "script", "twitter-timeline"));</script>
<?php
}

function facebook_like_content($original) {

	$preContent = '';

	if(is_singular()) {

		$preContent .= '<p></p><div class="fb-like" data-href="http://' . esc_attr($_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']) . '" data-layout="button_count" data-action="like" data-show-faces="true" data-share="false"></div>';
	}

	$postContent = '';

	return $preContent . $original . $postContent;
}

function public_scripts() {
	 wp_deregister_script('wp-embed');

	 wp_deregister_script('jquery');
   wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js', null, '2.1.3');
   wp_enqueue_script('jquery');
   wp_enqueue_script('jquery-migrate');

   wp_deregister_script('modernizr');
   wp_register_script('modernizr', 'https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js', array('jquery'), '2.8.3', true);
   wp_enqueue_script('modernizr');

   wp_register_script('bootstrap', get_bloginfo('template_url') . '/js/bootstrap.min.js', array('jquery', 'modernizr'), '3.0.3', true);
   wp_enqueue_script('bootstrap');

   wp_register_script('layout', get_bloginfo('template_url') . '/js/layout.js', array('jquery', 'modernizr', 'bootstrap'), null, true);
   wp_enqueue_script('layout');

   wp_register_script('imgLiquid', get_bloginfo('template_url') . '/js/imgLiquid-min.js', array('jquery'), '0.9.944', true);
   wp_enqueue_script('imgLiquid');

	 wp_register_script('selectorquery', get_bloginfo('template_url') . '/js/jquery.selectorquery.js', array('jquery'), '1.0', true);
   wp_enqueue_script('selectorquery');

   wp_register_script('general', get_bloginfo('template_url') . '/js/general.js', array('jquery', 'modernizr', 'bootstrap', 'selectorquery'), null, true);
   wp_enqueue_script('general');

}

function isStudentPage() {
	$is_student = false;
	$student_id = 462;

	if (!is_home() && is_category()) {
		$thisCat = get_category(get_query_var('cat'), false);
		$category_id = $thisCat->term_id;
		if( $category_id == $student_id) {
			$is_student = true;
		}
	}
	else if ( is_single() ) {
		$categories = get_the_category(get_the_id());
		foreach($categories as $category) {
			if( $category->term_id == $student_id ) {
				$is_student = true;
				break;
			}
		}
	}
	return $is_student;
}

function formatDate($postdate, $authorNickName = null) {
		return sprintf('<div class="posted">%s</div>',
				date(get_option('date_format'), $postdate));
}

function get_author_ID() {
	global $post;
	$author_id = $post->post_author;
	return $author_id;
}

if (!function_exists('the_author_ID')) {
	function the_author_ID() {
		echo(get_author_ID());
	}
}

function getAuthorCSS( $authorID )
{
	if( isAgentAuthor($authorID ) )
    	return 'ppblog-postwrapper-agent';
	else
		return null;
}

function getAuthorsNotAdmin()
{
	$authors_result = array();
	$args  = array(
		// search only for Authors role
		'role' => 'Author',
		// order results by display_name
		'orderby' => 'display_name'
	);
	// Create the WP_User_Query object
	$wp_user_query = new WP_User_Query($args);
	// Get the results
	$authors = $wp_user_query->get_results();
	// Check for results
	if ( !empty($authors) )
	{
		// loop trough each author
		foreach ($authors as $author)
		{
			if( $author->ID != 1)
				$authors_result[] = $author->ID;
		}
	}

	return $authors_result;
}


function isAgentAuthor( $authorID )
{
	$authors = getAuthorsNotAdmin();
	if( !empty($authors) )
		if ( in_array($authorID, $authors) )
    		return true;
	return false;
}

function get_tags_in_use($category_ID, $type = 'name'){
	// Set up the query for our posts
	$my_posts = new WP_Query(array(
		'cat' => $category_ID, // Your category id
		'posts_per_page' => -1 // All posts from that category
	));

	// Initialize our tag arrays
	$tags_by_id = array();
	$tags_by_name = array();
	$tags_by_slug = array();
	$all_tag_details = array();

	// If there are posts in this category, loop through them
	if ($my_posts->have_posts()): while ($my_posts->have_posts()): $my_posts->the_post();

		// Get all tags of current post
		$post_tags = wp_get_post_tags($my_posts->post->ID);

		// Loop through each tag
		foreach ($post_tags as $tag):

			// Set up our tags by id, name, and/or slug
			$tag_id = $tag->term_id;
			$tag_name = $tag->name;
			$tag_slug = $tag->slug;

			// Push each tag into our main array if not already in it
			if (!in_array($tag_id, $tags_by_id))
				array_push($tags_by_id, $tag_id);

			if (!in_array($tag_name, $tags_by_name))
				array_push($tags_by_name, $tag_name);

			if (!in_array($tag_slug, $tags_by_slug))
				array_push($tags_by_slug, $tag_slug);

		endforeach;
	endwhile; endif;

	// Return value specified
	if ($type == 'id')
			return $tags_by_id;

	if ($type == 'name')
			return $tags_by_name;

	if ($type == 'slug')
			return $tags_by_slug;
}

function tag_cloud_by_category($category_ID, $category_slug){
	// Get our tag array
	$tags = get_tags_in_use($category_ID, 'id');

	// Start our output variable
	echo '<div class="categories-tags">';

	// Cycle through each tag and set it up
	foreach ($tags as $tag):
			// Get our count
			$term = get_term_by('id', $tag, 'post_tag');
			$count = $term->count;

			// Get tag name
			$tag_info = get_tag($tag);
			$tag_slug = $tag_info->slug;
			$tag_name = $tag_info->name;
			$tag_title = sprintf( __( "View all posts in %s" ), $tag_name );
			
			// Get category url
			$category_link = get_category_link( $category_ID );
			// Get tag url
			$tag_link = esc_url( add_query_arg( "tag", $tag_slug, $category_link ));

			echo '<a class="categories-tag" href="'.$tag_link.'" title="'.$tag_title.'">'.$tag_name.'</a>';

	endforeach;

	echo '</div>';
}

function vipx_filter_category_rewrite_rules( $rules ) {
	$categories = get_categories( array( 'hide_empty' => false ) );

	if ( is_array( $categories ) && ! empty( $categories ) ) {
			$slugs = array();
			foreach ( $categories as $category ) {
					if ( is_object( $category ) && ! is_wp_error( $category ) ) {
							if ( 0 == $category->category_parent ) {
									$slugs[] = $category->slug;
							} else {
									$slugs[] = trim( get_category_parents( $category->term_id, false, '/', true ), '/' );
							}
					}
			}

			if ( ! empty( $slugs ) ) {
					$rules = array();

					foreach ( $slugs as $slug ) {
							$rules[ '(' . $slug . ')/feed/(feed|rdf|rss|rss2|atom)?/?$' ] = 'index.php?category_name=$matches[1]&feed=$matches[2]';
							$rules[ '(' . $slug . ')/(feed|rdf|rss|rss2|atom)/?$' ] = 'index.php?category_name=$matches[1]&feed=$matches[2]';
							$rules[ '(' . $slug . ')(/page/(\d+)/?)?$' ] = 'index.php?category_name=$matches[1]&paged=$matches[3]';
					}
			}
	}
	return $rules;
}

function get_subtitle($cat_slug) {
	if($cat_slug == "economic-outlook") {
		return "Industry-leading advice, data and research on economic outlooks, analysis and forecasts.";
	} else if($cat_slug == "residential-reviews") {
		return "In-depth research and analysis into property market trends and forecasts";
	} else if($cat_slug == "flash-commentary") {
		return "Market-leading commentary to help you make the right property decisions.";
	}
}

if ( ! function_exists( 'twentytwelve_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own twentytwelve_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', 'twentytwelve' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<header class="comment-meta comment-author vcard">
				<?php
					printf( '<cite class="fn">%1$s %2$s</cite>',
						get_comment_author_link(),
						// If current post author is also comment author, make it known visually.
						( $comment->user_id === $post->post_author ) ? '<span> ' . __( 'Post author', 'twentytwelve' ) . '</span>' : ''
					);

					printf( '<a class="dateTime" href="%1$s"><time datetime="%2$s">%3$s</time></a>',
						esc_url( get_comment_link( $comment->comment_ID ) ),
						get_comment_time( 'c' ),
						/* translators: 1: date, 2: time */
						sprintf( __( '%1$s at %2$s', 'twentytwelve' ), get_comment_date(), get_comment_time() )
					);
				?>

                <span class="reply"> <span class="pipe">|</span>
	                <?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'twentytwelve' ), 'after' => '', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                </span><!-- .reply -->
			</header><!-- .comment-meta -->

			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'twentytwelve' ); ?></p>
			<?php endif; ?>

			<section class="comment-content comment">
				<?php comment_text(); ?>
				<?php edit_comment_link( __( 'Edit', 'twentytwelve' ), '<p class="edit-link">', '</p>' ); ?>
			</section><!-- .comment-content -->


		</article><!-- #comment-## -->
	<?php
		break;
	endswitch; // end comment_type check
}
endif;

add_action( 'after_setup_theme', 'init' );
?>
