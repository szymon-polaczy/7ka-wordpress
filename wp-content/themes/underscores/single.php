<?php get_header(); ?>

<div class="wrapper">
  <main>
    <!--BANNER-->
    <?php require_once 'components/page-title.php'; ?>

    <?php if (have_rows('galeria')) : ?>
      <section class="produkt">
        <article class="produkt__main-image">
          <?php 
            $active = false;
            while(have_rows('galeria')) {
              the_row();
              $obraz = get_sub_field('obraz');
              echo '<img src="'.$obraz['url'].'" alt="'.$obraz['title'].'" class="'.($active ? '' : 'active-image').'"/>';
              $active = true;
            }
          ?>
        </article>

        <article class="produkt__info">
          <?php if ($opis = get_field('opis')) echo '<p>'.$opis.'</p>'; ?>
          <?php
            if (have_rows('parametry')) {
              while(have_rows('parametry')) {
                the_row();

                $nazwa = get_sub_field('nazwa');
                $wartosc = get_sub_field('wartosc');

                echo '<p class="produkt__info-parametry"><b>'.$nazwa.': </b>'.$wartosc.'</p>';
              }
            }
          ?>
        </article>

        <article class="produkt__small-gallery">
          <?php 
            while(have_rows('galeria')) {
              the_row();
              $obraz = get_sub_field('obraz');
              $js_title = "'".$obraz['title']."'";
              echo '<img src="'.$obraz['url'].'" alt="'.$obraz['title'].'" 
                onclick="showBigImage('.$js_title.')"/>';
            }
          ?>
        </article>
      </section>

      <script>
        function showBigImage(title) {
          title = title.toString();
          document.querySelectorAll('.produkt__main-image img').forEach(img => img.classList.remove('active-image'));
          document.querySelector('.produkt__main-image img[alt="' + title +'"]').classList.add('active-image');
        }
      </script>
    <?php endif; ?>
  </main>
</div>

<?php get_footer(); ?>