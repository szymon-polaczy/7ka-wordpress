<?php global $product; ?>

<?php get_header(); ?>

<?php if (have_posts()) : ?>
  <?php while(have_posts()) : the_post();/* echo $product;*/ ?>

    <div class="wrapper">
      <main>
        <?php require_once 'components/banner.php'; ?>
        <?php require_once 'components/page-title.php'; ?>

        <?php if ($attachment_ids = $product->get_gallery_image_ids()) : ?>
          <section class="produkt">
            <article class="produkt__main-image">
              <?php
                $active = false;
                foreach($attachment_ids as $attachment_id) {
                  $img = wp_get_attachment_image_src($attachment_id, 'product');
                  $img_title = get_the_title($attachment_id);
                  echo '<img src="'.$img[0].'" alt="'.$img_title.'" 
                    class="'.($active ? '' : 'active-image').'"/>';
                  $active = true;
                }
              ?>
            </article>

            <article class="produkt__info">
              <?php if ($short_description = apply_filters( 'woocommerce_short_description', $post->post_excerpt ))
                echo $short_description; ?>
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

              <?php $product_attributes = $product->get_attributes();?>
              <?php if ($product_attributes) : ?>
                <table class="woocommerce-product-attributes shop_attributes">
                  <?php foreach ( $product_attributes as $product_attribute_key => $product_attribute ) : ?>
                    <tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--<?php echo esc_attr( $product_attribute_key ); ?>">
                      <th class="woocommerce-product-attributes-item__label"><?php echo wp_kses_post( $product_attribute['name'] ); ?></th>
                      <td class="woocommerce-product-attributes-item__value"><?php echo wp_kses_post( $product_attribute['value'] ); ?></td>
                    </tr>
                  <?php endforeach; ?>
                </table>
              <?php endif; ?>
            </article>

            <article class="produkt__small-gallery">
              <h4>Kliknij w miniaturkę aby powiększyć <i class="fas fa-search"></i></h4>
              <?php 
                foreach($attachment_ids as $attachment_id) {
                  $img = wp_get_attachment_image_src($attachment_id, 'small-product');
                  $img_title = get_the_title($attachment_id);
                  $js_title = "'".$img_title."'";
                  echo '<img src="'.$img[0].'" alt="'.$img_title.'" 
                    onclick="showBigImage('.$js_title.')"/>';
                  $active = true;
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

  <?php endwhile; ?>
<?php endif; ?>

<?php get_footer();