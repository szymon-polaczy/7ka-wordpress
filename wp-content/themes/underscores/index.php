<?php get_header(); ?>

<div class="wrapper">
  <main <?php if(is_page('Polityka Prywatności')) echo 'class="privacy-page"'; ?>>
    <?php require_once 'components/slider.php'; ?>
    <?php require_once 'components/page-title.php'; ?>

    <section class="product-category no-border">
			<?php if (have_rows('wybrane_kategorie')) :?>
				<?php while (have_rows('wybrane_kategorie')) : the_row(); $link = get_sub_field('link_kategoria'); ?>
					<article>
						<?php echo '<h4>' . get_sub_field('title') . '</h4>'; ?>
						<a href="<?php echo $link['url']; ?>">
							<div class="relative">
								<p class="absolute-top-right btn-square-small-blue"><i class="fas fa-search"></i></p>
                <?php $miniaturka = get_sub_field('thumbnail'); 
                  echo '<img src="'.$miniaturka['url'].'" alt="'.$miniaturka['title'].'"/>'; ?>
							</div>
						</a>

						<?php if (have_rows('parametry')) : ?>
							<table class="product-category__parametry">
								<?php while(have_rows('parametry')) : the_row(); ?>
									<tr>
										<?php $nazwa = get_sub_field('nazwa'); $wartosc = get_sub_field('wartosc'); ?>
										<td><?php echo $nazwa; ?></td>
                    <?php if ($wartosc) : ?><td><?php echo $wartosc; ?></td><?php endif; ?>
									</tr>
								<?php endwhile; ?>
							</table>
						<?php endif; ?>

						<a href="<?php echo $link['url']; ?>" class="btn-blue">Zobacz</a>
					</article>
				<?php endwhile; ?>
			<?php endif; ?>
		</section>

    <?php $border = true; require_once 'components/wordpress-content.php'; ?>
  </main>
</div>

<?php get_footer(); ?>