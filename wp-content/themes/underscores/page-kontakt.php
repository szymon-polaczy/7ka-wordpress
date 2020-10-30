<?php get_header(); ?>

<div class="wrapper">
  <main>
    <?php require_once 'components/slider.php'; ?>
    <?php require_once 'components/page-title.php'; ?>

    <section class="contact">
      <article>
        <p><?php the_field('nazwa_firmy', 'option'); ?></p>
        <p><?php the_field('email', 'option'); ?></p>
        <p><?php the_field('telefon', 'option'); ?></p>
        <p><?php the_field('adres', 'option'); ?></p>
        <p><?php if ($nip = get_field('nip', 'option')) echo 'NIP: '.$nip; ?></p>
        <p><?php if ($regon = get_field('regon', 'option')) echo 'REGON: '.$regon; ?></p>
      </article>
      <?php if ($google_map = get_field('google_map', 'option')) echo '<article>'.$google_map.'</article>'; ?>
    </section>
  </main>
</div>

<?php get_footer(); ?>