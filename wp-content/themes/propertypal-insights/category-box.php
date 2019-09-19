<div class="category-boxes">
  <ul class="boxlist boxlist--3col category-boxes-list">

    <?php
      foreach($categories as $category) { 
        $cat_id = $category->term_id; 
        $cat_link = get_category_link( $cat_id ); 
        $cat_name = $category->name;
        $cat_slug= $category->category_nicename;
      ?>
        <li>
          <a href="<?php echo $cat_link ?>" class="box category-box-item" title="<?php echo sprintf( __( "View all posts in %s" ), $cat_name ) ?>">
            <div class="category-box-img" style="background-image: url(<?php bloginfo('template_url'); ?>/css/<?php echo $cat_slug ?>.jpg);"></div>
            <div class="category-box-content">
              <h3><?php echo $cat_name ?></h3>
              <p><?php echo get_subtitle($cat_slug) ?></p>
              <span class="category-box-readmore">View <?php echo strtolower($cat_name) ?> &gt;</span>
            </div>
          </a>
        </li>

    <?php } ?>

  </ul>
</div>