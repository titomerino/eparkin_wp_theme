<?php
$image = get_field('masthead_image') ?: get_field('fallback_masthead_image', 'option');
$title = get_field('masthead_title') ?: wp_title('', false);
?>

<section
  class="<?= $args['class'] ?: 'site-masthead' ?>"
  style="background-image: url(<?= esc_url($image); ?>)"
>
  <div class="container">
    <h1 class="h2 tribe-events-page-title _text-caps">
      <strong><?= esc_html($title); ?></strong>
    </h1>
  </div>
</section>
