<?php if ($baner = get_field('baner')) : ?>
	<section class="banner">
		<?php echo '<img src="'.$baner['url'].'" alt="'.$baner['title'].'"/>'; ?>
	</section>
<?php endif; ?>