<?php if (have_rows('slider')) : ?>
  <section class="slider">
    <?php while (have_rows('slider')) : the_row(); ?>
      <?php $slide = get_sub_field('slide'); ?>
      <img class="slider--slide slider--active-slide" src="<?php echo $slide['url']; ?>"/>
    <?php endwhile; ?>

    <button class="slider--button slider--button__prev" onclick="prev()">
      <i class="fas fa-angle-left"></i>
    </button>
    <button class="slider--button slider--button__next" onclick="next()">
      <i class="fas fa-angle-right"></i>
    </button>
  </section>
<?php endif; ?>

<script>
  const images = document.querySelectorAll('.slider--slide');
  const numer_of_slides = images.length - 1;
  let index = numer_of_slides;

  function prev() {
    index = (index == 0 ? numer_of_slides : index - 1);

    images.forEach(image => {
      image.classList.remove('slider--active-slide');
    });

    images[index].classList.add('slider--active-slide');
  }

  function next() {
    index = (index == numer_of_slides ? 0 : index + 1);

    images.forEach(image => {
      image.classList.remove('slider--active-slide');
    });

    images[index].classList.add('slider--active-slide');
  }
</script>