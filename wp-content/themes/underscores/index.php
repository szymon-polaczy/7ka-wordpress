<?php get_header(); ?>

<div class="wrapper">
  <main <?php if(is_page('Polityka Prywatności')) echo 'class="privacy-page"'; ?>>
    <?php require_once 'components/slider.php'; ?>
    <?php require_once 'components/page-title.php'; ?>
    <?php require_once 'components/wordpress-content.php'; ?>
  </main>
</div>

<?php get_footer(); ?>