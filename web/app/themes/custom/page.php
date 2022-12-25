<?php
use utils\Utils;

get_header();
get_template_part('template-parts/masthead');

$breadcrumbs = Utils::menu_breadcrumbs('Main Menu');
$current_branch = Utils::menu_current_branch('Main Menu');
?>

<div class="section-wrapper _pt-0">
  <div class="container">

    <main id="main" role="main">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; endif; ?>
    </main>

  </div>
</div>

<?php get_footer(); ?>
