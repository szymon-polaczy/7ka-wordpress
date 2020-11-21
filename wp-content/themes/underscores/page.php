<?php get_header(); ?>

<?php 
  if (get_query_var('taxonomy') != 'product_cat') :
    get_header(); ?>
    <div class="wrapper">
      <main>
        <?php the_content(); ?>
      </main>
    </div>
    <?php get_footer();

  else :

		$taxonomies = get_terms( array(
			'taxonomy' => 'product_cat',
			'hide_empty' => true,
		) );

    $term = get_queried_object();

    $children = get_terms( $term->taxonomy, array(
    'parent'    => $term->term_id,
    'hide_empty' => true
    ) );
    if($children) :
        $taxonomies = get_terms( array(
          'taxonomy' => 'product_cat',
          'hide_empty' => true,
          'parent' => $term->term_id,
        ) );?>
        
      <div class="wrapper">
        <main>
          <!--<?php require_once 'components/banner.php'; ?>-->
          <?php require_once 'components/page-title.php'; ?>

          <section class="product-category no-border">
            <?php 
              foreach($taxonomies as $tax) {
                $icon_id = get_field('miniaturka', 'product_cat_' . $category1->term_id);
                $thumbnail_id = get_woocommerce_term_meta( $tax->term_id, 'thumbnail_id', true ); 
                $image = wp_get_attachment_url( $thumbnail_id ); 

                echo '<article>';
                  echo "<h4>{$tax->name}</h4>";

                  echo '<a href="'.get_term_link($tax).'">';
                    echo '<div class="relative">';
                      echo '<p class="absolute-top-right btn-square-small-blue">';
                        echo '<i class="fas fa-search"></i>';
                      echo '</p>';
                      echo "<img src='{$image}'/>";
                    echo '</div>';
                  echo '</a>';
                  echo '<a href="'.get_term_link($tax).'" class="btn-blue">Zobacz</a>';
                echo '</article>';
              }
            ?>
          </section>
        </main>
      </div>
      
    <?php else :
      $args = array(
        'numberposts' => -1,
        'posts_per_page' => -1,
        'order' => 'ASC',
        'post_type' => 'product',
        'tax_query' => array(
          array(
            'taxonomy' => 'product_cat',
            'field' => 'slug',
            'terms' => $term->name,
          )
        )
      );
      $akt_query = new WP_Query($args);

      print_r($akt_query->found_posts); ?>

      <div class="wrapper">
        <main>
          <!--<?php require_once 'components/banner.php'; ?>-->
          <?php require_once 'components/page-title.php'; ?>
          
          <section class="product-category no-border">
            <?php if ($akt_query->have_posts()) : global $product; ?>

              <?php while ($akt_query->have_posts()) : $akt_query->the_post(); ?>

                <article>
                  <?php echo '<h4>' . $post->post_title . '</h4>'; ?>
                  <a href="<?php echo get_the_permalink($post->ID); ?>">
                    <div class="relative">
                      <p class="absolute-top-right btn-square-small-blue"><i class="fas fa-search"></i></p>
                      <?php echo get_the_post_thumbnail($post->ID, 'product'); ?>
                    </div>
                  </a>

                  <?php $product_attributes = $product->get_attributes();?>
                  <?php if ($product_attributes) : ?>
                    <table class="product-category__parametry">
                      <?php foreach ( $product_attributes as $key => $attr ) : ?>
                        <tr>
                          <th><?php echo wp_kses_post( $attr['name'] ); ?></th>
                          <td><?php echo wp_kses_post( $attr['value'] ); ?></td>
                        </tr>
                      <?php endforeach; ?>
                    </table>
                  <?php endif; ?>

                  <a href="<?php echo get_the_permalink($post->ID); ?>" class="btn-blue">Zobacz</a>
                </article>
              <?php endwhile; ?>
            <?php endif; ?>
          </section>
        </main>
      </div>

      
    <?php endif; ?>
    <?php endif; ?>

<?php get_footer(); ?>