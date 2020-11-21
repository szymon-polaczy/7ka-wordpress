<?php get_header(); ?>

<div class="wrapper">
  <main <?php if(is_page('Polityka Prywatności')) echo 'class="privacy-page"'; ?>>
    <?php require_once 'components/slider.php'; ?>
    <?php require_once 'components/page-title.php'; ?>

    <section class="product-category no-border">
			<?php 
				$taxonomies = get_terms( array(
					'taxonomy' => 'product_cat',
					'hide_empty' => true,
					'parent' => 0,
				)); 

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

    <?php $border = true; require_once 'components/wordpress-content.php'; ?>
  </main>
</div>

<?php get_footer(); ?>