<footer>
  <section class="contact-info"></section>
  <section class="double-menu"></section>

  <?php if (($copyright = get_field('copyright', 'option')) && 
    ($created_by = get_field('created_by', 'option'))) : ?>
    
    <section class="copyright">
      <div class="wrapper">
        <p><?php echo $copyright; ?></p>
        <p><?php echo $created_by; ?></p>
      </div>
    </section>

  <?php endif; ?>
</footer>

<?php wp_footer(); ?>
</body>