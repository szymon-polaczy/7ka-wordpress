<?php /* Template Name: Kategoria */ ?>
<?php get_header(); ?>

<div class="wrapper">
	<main>
		<?php require_once 'components/banner.php'; ?>
		<?php require_once 'components/page-title.php'; ?>

		<?php
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$args = array(
				'numberposts' => -1,
				'posts_per_page' => get_field('ilosc_na_strone') ?? 12,
				'paged' => $paged,
				'order' => 'ASC',
				'post_type' => 'produkt',
				'tax_query' => array(
					array(
						'taxonomy' => 'rodzaj_produktu',
						'field' => 'slug',
						'terms' => get_field('rodzaj_produktu') ?? ''
					)
				)
			);
			$akt_query = new WP_Query($args);
		?>
		
		<section class="product-category">
			<?php if ($akt_query->have_posts()) :?>
				<?php while ($akt_query->have_posts()) : $akt_query->the_post(); ?>
					<article>
						<?php echo get_the_post_thumbnail($post->ID, 'product'); ?>
						<div class="wow fadeInLeft animated">
							<?php echo '<h2>' . $post->post_title . '</h2><h4>' . get_the_date('d-m-yy', $post->ID) . '</h4>'; ?>
						</div>
						<a href="<?php echo get_the_permalink($post->ID); ?>">Zobacz</a>
					</article>
				<?php endwhile; ?>
			<?php endif; ?>

			<?php
				if ($akt_query->max_num_pages > 1) {
					$current_page = max(1, get_query_var('paged'));

					echo '<article class="pagination">';
						echo paginate_links(array(
							'base' => get_pagenum_link(1) . '%_%',
							'format' => '/page/%#%',
							'current' => $current_page,
							'total' => $akt_query->max_num_pages,
							'prev_text' => __('«'),
							'next_text' => __('»')
						));
					echo '</article>';
				}
			?>
		</section>

		<?php require_once 'components/wordpress-content.php'; ?>
	</main>
</div>

<?php get_footer(); ?>