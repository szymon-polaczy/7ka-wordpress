<?php if (get_the_content()) : ?>
  <section class="wordpress_content <?php if (!$border) echo 'no-border' ?>">
    <?php the_content(); ?>
  </section>
<?php endif; ?>