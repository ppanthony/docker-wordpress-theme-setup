<div class="categories col-xs-12 no-horizontal-padding">
  <h2 class="categories-title">Categories</h2>
  <div class="categories-wrapper">
    <?php
    //loop over each category
    $categories=get_categories($cat_args);
    foreach($categories as $category) { 
      $cat_name = $category->name;
      $cat_slug = $category->category_nicename;
      $cat_count = $category->count;
      $cat_id = $category->term_id;
      $cat_link = get_category_link( $cat_id );
      $cat_title = sprintf( __( "View all posts in %s" ), $cat_name );
    ?>
      <div class="categories-content">
        <a href="<?php echo $cat_link ?>" title="<?php echo $cat_title ?>" class="categories-name"><?php echo $cat_name ?>      <span class="categories-count">(<?php echo $cat_count ?>)</span>
        </a>
        <!-- Get all tags included in category -->
        <?php tag_cloud_by_category($cat_id, $cat_slug); ?>
      </div>
    <?php } ?>
  </div>
</div>