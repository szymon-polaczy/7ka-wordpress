<footer class="main-footer">
  <section class="main-footer__contact">
    <div class="wrapper">
      <article>
        <i class="fas fa-home"></i>
        <p><?php the_field('adres', 'option'); ?></p>
      </article>
      <article>
        <i class="fas fa-phone"></i>
        <p><?php the_field('telefon', 'option'); ?></p>
      </article>
      <article>
        <i class="fas fa-envelope"></i>
        <p><?php the_field('email', 'option'); ?></p>
      </article>
    </div>
  </section>

  <?php if (have_rows('menu', 'option')) : ?>
  <section class="main-footer__menu">
    <div class="wrapper">
      <?php while (have_rows('menu', 'option')) : the_row(); ?>
        <article>
          <h3><?php if (get_sub_field('tytul')) the_sub_field('tytul'); ?></h3>
          <?php 
            if (have_rows('linki')) {
              while (have_rows('linki')) {
                the_row();
                $link = get_sub_field('link');
                echo '<a href="'.$link['url'].'" title="'.$link['title'].'">'.$link['title'].'</a>';
              }
            }
          ?>
        </article>
      <?php endwhile; ?>
    </div>
  </section>
  <?php endif; ?>

  <?php if (($copyright = get_field('copyright', 'option')) && 
    ($created_by = get_field('created_by', 'option'))) : ?>
    
    <section class="main-footer__copyright">
      <div class="wrapper">
        <p><?php echo $copyright; ?></p>
        <p><?php echo $created_by; ?></p>
      </div>
    </section>

  <?php endif; ?>
</footer>

<?php wp_footer(); ?>
</body>