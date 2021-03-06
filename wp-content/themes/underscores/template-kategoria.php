<?php /* Template Name: Kategoria */ ?>
<?php get_header(); ?>



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

<div class="wrapper">
	<main>
		<?php require_once 'components/banner.php'; ?>
		<?php require_once 'components/page-title.php'; ?>
		<?php if($paged == 1) : ?>
			<?php $border = false; require_once 'components/wordpress-content.php'; ?>
		<?php endif; ?>
		
		<section class="product-category <?php if($paged > 1) echo 'no-border'; ?>">
			<?php if ($akt_query->have_posts()) :?>
				<?php while ($akt_query->have_posts()) : $akt_query->the_post(); ?>
					<article>
						<?php echo '<h4>' . $post->post_title . '</h4>'; ?>
						<a href="<?php echo get_the_permalink($post->ID); ?>">
							<div class="relative">
								<p class="absolute-top-right btn-square-small-blue"><i class="fas fa-search"></i></p>
								<?php echo get_the_post_thumbnail($post->ID, 'product'); ?>
							</div>
						</a>

						<?php if (have_rows('parametry')) : ?>
							<table class="product-category__parametry">
								<?php while(have_rows('parametry')) : the_row(); ?>
									<tr>
										<?php $nazwa = get_sub_field('nazwa'); $wartosc = get_sub_field('wartosc'); ?>										<td></td>
										<td><?php echo $nazwa; ?></td>
										<td><?php echo $wartosc; ?></td>
									</tr>
								<?php endwhile; ?>
							</table>
						<?php endif; ?>

						<a href="<?php echo get_the_permalink($post->ID); ?>" class="btn-blue">Zobacz</a>
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

	</main>
</div>

<?php get_footer(); ?>