<?php
get_header();

if (have_posts()) {
  while (have_posts()) { the_post();
?>
    <div class="container single-product">
      <div class="row mt-5">
        <div class="col-12 col-md-6">
          <?php the_content(); ?>
        </div>
        <div class="col-12 col-md-6">
          <?php the_post_thumbnail("large") ?>
        </div>
      </div>
    </div>
<?php
  }
}

get_footer();
