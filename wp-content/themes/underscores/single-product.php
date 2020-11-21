<?php global $product; ?>

<?php get_header(); ?>

<?php if (have_posts()) : ?>
  <?php while(have_posts()) : the_post(); ?>

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

              <?php $product_attributes = $product->get_attributes();?>
              <?php if ($product_attributes) : ?>
                <table>
                  <?php foreach ( $product_attributes as $key => $attr ) : ?>
                    <tr>
                      <th><?php echo wp_kses_post( $attr['name'] ); ?></th>
                      <td><?php echo wp_kses_post( $attr['value'] ); ?></td>
                    </tr>
                  <?php endforeach; ?>
                </table>
              <?php endif; ?>

              <p class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?>">
                <?php echo $product->get_price_html(); ?>
              </p>

              <?php woocommerce_template_single_add_to_cart() ?>
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