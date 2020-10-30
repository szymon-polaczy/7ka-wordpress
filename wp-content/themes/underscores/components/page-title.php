<section class="page-title">
  <h1><?php the_title(); ?></h1>
  <?php
    if ($link = get_field('link'))
      echo '<a href="' . $link['url'] . '" title="' . $link['title'] . '">' . $link['title'] . ' <i class="fas fa-angle-down"></i></a>';
  ?>
</section>