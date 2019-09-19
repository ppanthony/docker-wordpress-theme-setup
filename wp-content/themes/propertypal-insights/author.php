<?php
  $attachmentID = 12958;
  $imageSizeName = "thumbnail";
  $img = wp_get_attachment_image_src($attachmentID, $imageSizeName);
  $imgSrc = $img ? $img : "https://blog.propertypal.com/wp-content/uploads/2019/05/Jordan-Buchanan_956A8768-e1558525738852.jpg";
?>
<div class="author col-xs-12 no-horizontal-padding">
  <h2 class="author-title">Author</h2>
  <div class="author-wrapper">
    <div class="author-content">
      <span class="author-img"><img src="<?php echo $imgSrc ?>" alt="Jordan Buchanan"></span>
      <div class="author-details">
        <span class="author-name">Jordan Buchanan</span>
        <span class="author-role">Chief Economist</span>
        <a target="_blank" href="https://twitter.com/jbuchanan0707" class="author-twitter">@jbuchanan0707</a>
      </div>
    </div>
    <div class="author-text">Jordan is an experienced economist and research professional. He has published extensive analytical research on key issues affecting the UK and NI economies. His recent work includes research on the housing sector.</div>
    <div class="author-contact">
      <a href="mailto:jordan.buchanan@propertypal.com" class="author-btn">Contact Jordan</a>
    </div>
  </div>
</div>